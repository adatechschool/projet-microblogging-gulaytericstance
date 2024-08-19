<div>
<!-- resources/views/profile/show.blade.php -->
@extends('layouts.app')

@section('title', $user->name . ' - Profile')

@section('content')
<div class="profile-header">
    <img src="{{ $user->profile_photo }}" alt="{{ $user->name }}">
    <h1>{{ $user->name }}</h1>
    <p>{{ $user->biography }}</p>
    <button onclick="document.getElementById('follow-form').submit();">
        {{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}
    </button>
    <form id="follow-form" action="{{ route('profile.follow', $user) }}" method="POST" style="display: none;">
        @csrf
    </form>
</div>

<div class="profile-stats">
    <span>{{ $followersCount }} followers</span>
    <span>{{ $followingCount }} following</span>
</div>

<div class="profile-posts">
    @foreach($posts as $post)
        <div class="post">
            <img src="{{ $post->image_path }}" alt="Post Image">
            <p>{{ $post->caption }}</p>
            <div class="comments">
                @foreach($post->comments as $comment)
                    <div class="comment">
                        <p>{{ $comment->content }}</p>
                        <small>by {{ $comment->user->name }}</small>
                    </div>
                @endforeach
            </div>
            <form action="{{ route('comment.store', $post) }}" method="POST">
                @csrf
                <textarea name="content" placeholder="Add a comment"></textarea>
                <button type="submit">Comment</button>
            </form>
        </div>
    @endforeach
</div>
@endsection
</div>
