@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
    <div class="row">
        <div class="col-6 offset-3">
            <a href="/profile/{{ $post->user->id }}"><img src="/storage/{{$post->image}}" alt="" class="w-100"></a>
        </div>
    </div>
    <div class="row pb-4">
        <div class="col-6 offset-3">
            <div>
                <!-- <hr> -->
                <div class="pt-4">
                    <p><a href="/profile/{{ $post->user->profile->user_id}}"><span class="text-dark">{{ $post->user->username }} </span> </a> {{ $post->caption}} </p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection
