@extends('user.partials.post.layouts.app')

{{-- Title --}}
@section('title','User Dashboard')
    
{{-- Navbar Section --}}
@section('navbar')
    @php 
        use App\Models\User;
        $user = session()->has('login_id') ? User::find(session('login_id')) : null;    
    @endphp
    {{-- Navbar --}}
    <nav class="user-navbar">
        {{-- Navbar Left --}}
        <div class="navbar-left">
            <img src="{{ asset('images/mit.jpeg')}}" alt="MIT logo" class="logo-img">     
        </div>
        {{-- Navbar Center --}}
        <div class="navbar-center">
            <a href="{{ route('post') }}" class="nav-link">
                <i class="fa-solid fa-house"></i> Home
            </a>            
        </div>
        {{-- Navbar Right --}}
        <div class="navbar-right">
            @if($user && $user->image)
                <img src="{{ asset('Register_Image/'.$user->image) }}" class="image-profile">
            @else
                <img src="{{ asset('Register_Image/default.png') }}" class="image-profile">
            @endif
            {{-- Select --}}
            <select onchange="if(this.value) window.location.href=this.value;">
                <option>Select</option>
                {{-- Profile --}}
                <option value="{{ route('profile', session('login_id')) }}">Profile</option>
                {{-- Logout --}}
                <option value="{{ route('logout') }}">Log Out</option>
            </select>
        </div>
    </nav>
@endsection

{{-- Container --}}
@section('content')
    <div class="post-container">
        {{-- Create New Post --}}
        <div class="create-post-card">
            <div class="create-post-header">
                <a href="{{ route('profile',$postUser->id) }}">
                    <img src="{{ asset('Register_Image/'.$postUser->image) }}" class="post-user-img">
                </a>
                <span class="create-post-username">{{ $postUser->name }}</span>
            </div>
            <form action="{{ route('post_add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <textarea name="description" class="post-textarea" placeholder="What's on your mind?" required></textarea>
                <input type="file" name="image" class="post-file-input">
                <button type="submit" class="post-submit">Post</button>
            </form>
        </div>
        {{-- Display All Posts --}}
        @foreach($posts as $post)
            @php $postUser = $post->user; @endphp
            <div class="post-card">
                <div class="post-header">
                    @if($postUser && $postUser->image)
                        <a href="{{ route('profile', $postUser->id) }}">
                            <img src="{{ asset('Register_Image/'.$postUser->image) }}" class="post-user-img">
                        </a>
                    @else
                        <img src="{{ asset('Register_Image/default.png') }}" class="post-user-img">
                    @endif
                    <span class="post-username">{{ $post->user->name}}</span>
                    {{-- Show Delete "X" only for post owner --}}
                    <form action="{{ route('post_delete', $post->id) }}" method="POST" class="delete-post-form">
                        @csrf
                        <button type="submit" class="delete-post-btn">×</button>
                    </form>
                </div>
                {{-- Description --}}
                <div class="post-description">
                    <p>{{ $post->description }}</p>
                </div>
                {{-- Image --}}
                @if($post->image)
                    <div class="post-image">
                        <img src="{{ asset('Post_Image/'.$post->image) }}" alt="Post Image">
                    </div>
                @endif  
                {{-- Like & Comment Buttons --}}
                <div class="post-actions">
                <form action="{{ route('post_like', $post->id) }}" method="POST">
                    @csrf
                    @php
                        $liked = $post->likes->where('user_id', session('login_id'))->count() > 0;
                    @endphp
                        <button type="submit" class="like-btn">
                        @if($liked)
                            <i class="fa-solid fa-thumbs-up"></i> Liked ({{ $post->likes->count() }})
                        @else
                            <i class="fa-solid fa-thumbs-up" id="like-solid"></i> Like ({{ $post->likes->count() }})
                        @endif
                        </button>
                    </form>
                    <button class="comment-btn">
                        <i class="fa-solid fa-comment"></i> Comment ({{ $post->comments->count() }})
                    </button>
                </div>
                {{-- Comments --}}
                <div class="comment-section">
                    @foreach($post->comments as $comment)
                        <div class="single-comment">
                        {{-- User Image --}}
                        <a href="{{ route('profile',$comment->user_id) }}">
                            <img src="{{ $comment->user->image ? asset('Register_Image/'.$comment->user->image) : asset('default-user.png') }}" 
                                alt="{{ $comment->user->name ?? 'Unknown' }}" class="comment-user-img">
                        </a>
                        {{-- Comment Content --}}
                        <div class="comment-content">
                            <strong>{{ $comment->user->name ?? 'Unknown' }}:</strong>
                            <span>{{ $comment->comment }}</span>
                        {{-- Comment Like --}}
                        @php 
                            $commentLike = $comment->likes->where('user_id',session('login_id'))->count() > 0;
                        @endphp
                        <form action="{{ route('comment_like',$comment->id) }}" method="post">
                            @csrf
                            <button type="submit" class="comment-like-btn">
                            @if($commentLike)
                                <i class="fa-solid fa-thumbs-up"></i>Liked ({{ $comment->likes->count() }})
                            @else 
                                <i class="fa-solid fa-thumbs-up" id="like-solid"></i>Like ({{ $comment->likes->count() }})
                            @endif
                            </button>
                        </form>
                        </div>
                        {{-- Delete button for commentowner --}}
                        <form action="{{ route('comment_delete',$comment->id) }}" method="post" class="delete-comment-form">
                            @csrf
                            <button type="submit" class="delete-comment-btn">X</button>
                            </form>
                        </div>
                    @endforeach
                    {{-- Add Comment --}}
                    <form action="{{ route('post_comment', $post->id) }}" method="post">
                        @csrf
                        <textarea name="comment" class="comment-input" placeholder="Write a comment..." required></textarea>
                        <button type="submit" class="comment-submit">Post</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
