@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" alt="" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="/storage/{{$post->user->profile->image}}" alt="" class="w-100 rounded-circle" style="max-width : 40px">
                    </div>
                    <div class="">
                        <div class="font-weight-bold"><a href="/profile/{{ $post->user->profile->user_id}}"><span class="text-dark">{{ $post->user->username }}</</span></a>
                            <span class="pl-3"><a href="#">Follow</a></span>
                        </div>
                    </div>
                </div>
                <div class="pt-4">
                    <p><a href="/profile/{{ $post->user->profile->user_id}}"><span class="text-dark">{{ $post->user->username }} </span> </a> {{ $post->caption}} </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
