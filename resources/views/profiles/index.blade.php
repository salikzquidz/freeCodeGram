@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="{{$user->profile->profileImage()}}" style="width: 100%" class="rounded-circle" alt="">
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username}}</div>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
            @can('update', $user->profile)
                <a href="/p/create">Add new Post</a>
            @endcan
                
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan
            <div class="d-flex">
                <div class="pr-4"><strong>{{ count($user->posts)}}</strong> posts</div>
                <div class="pr-4"><strong>{{ $user->profile->followers->count() }} </strong> followers</div>
                <div class="pr-4"><strong>{{ $user->following->count() }} </strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title}}</div>
            <div class="">{{ $user->profile->description}}</div>
            <div class=""><a href="#">{{$user->profile->url }}</a></div>
        </div>
    </div>

    <div class="row pt-4">
        @foreach($user->posts as $post) 
        <div class="col-4 pb-4">
            <a href="/p/{{ $post->id}}">
                <img class="w-100" src="/storage/{{ $post->image}}" alt="">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
