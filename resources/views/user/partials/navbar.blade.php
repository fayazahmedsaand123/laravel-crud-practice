<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{ asset('Fas/userStyle.css') }}">
</head>
<body>
    {{-- Navbar --}}
    <nav class="user-navbar">
        <div class="navbar-left">
            <img src="{{ asset('images/mit.jpeg')}}" alt="MIT logo" class="logo-img">     
        </div>

        @php 
            use App\Models\User;
            $user = session()->has('login_id') ? User::find(session('login_id')) : null;
        @endphp

        <div class="navbar-right">
            <a href="{{ route('user') }}" class="nav-link">Home</a>
            {{-- User Image --}}
            @if($user && $user->image)
                <img src="{{ asset('Register_Image/'.$user->image) }}"
                     class="image-profile" alt="Register Image">
            @else
                <img src="{{ asset('Register_Image/default.png') }}"    
                    alt="Default">
            @endif
                {{-- Select --}}
                <select onchange="if(this.value) window.location.href=this.value;">
                    <option>Select</option>
                    <option value="{{ route('logout') }}">Log Out</option>
                </select>
        </div>
    </nav>
    <div class="post-container">

    <!-- User Post -->
    <div class="post-card">
        <div class="post-header">
            <img src="{{ asset('Register_Image/'.$user->image) }}" class="post-user-img">
            <span class="post-username">{{ $user->name }}</span>
        </div>

        <!-- Post Image -->
        <div class="post-image">
            <img src="{{ asset('images/deaf.jpg') }}" alt="Post Image">
        </div>

        <!-- Like & Comment Buttons -->
        <div class="post-actions">
            <button class="like-btn">👍 Like</button>
            <button class="comment-btn">💬 Comment</button>
        </div>

        <!-- Comment Box -->
        <div class="comment-section">
            <textarea class="comment-input" placeholder="Write a comment..."></textarea>
            <button class="comment-submit">Post</button>
        </div>
    </div>
</div>
</body>
</html>
