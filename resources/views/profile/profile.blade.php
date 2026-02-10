@extends('profile.layouts.app')

{{-- Title --}}
@section('title','Profile')
    
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
            {{-- Home --}}
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
            <select id="logoutSelect">
                <option value="{{ route('post') }}"
                {{ request()->routeIs('post') ? 'selected' : '' }}>Home</option>
                <option value="{{ route('profile', session('login_id')) }}"
                {{ request()->routeIs('profile') ? 'selected' : '' }}>Profile</option>
                <option value="logout">Log Out</option>
            </select>
        </div>
    </nav>
    {{-- Form Logout --}}
    <form id="logout-form" action="{{ route('logout') }}" method="get">@csrf</form>
@endsection

{{-- Main Content Section --}}
@section('content')
    {{-- Profile Container --}}
    <div class="profile-container">
        <h2><i class="fa-solid fa-user"></i> My Profile</h2>
        {{--  Profile Image  --}}
        <img src="{{ $userID->image ? asset('Register_Image/'.$userID->image) : asset('Register_Image/default.png') }}" 
            class="profile-image" alt="{{ $userID->name }}">
        {{--  Name  --}}
        <div class="info-box">
            <i class="fa-solid fa-user"></i>
            <span class="info-text"><strong>Name:</strong> {{ $userID->name }}</span>
        </div>
        {{--  Email --}}
        <div class="info-box">
            <i class="fa-solid fa-envelope"></i>
            <span class="info-text"><strong>Email:</strong> {{ $userID->email }}</span>
        </div>
        {{--  Back  --}}
        <a href="{{ route('post') }}" class="back-btn">
            <i class="fa-solid fa-arrow-left"></i> Back to Home
        </a>
    </div>
@endsection

{{-- JavaScript --}}
@section('scripts')
    <script>
        // ========================= Logout ================================ //
        document.getElementById('logoutSelect').addEventListener('change',function() {
            if(this.value === 'logout') {
                document.getElementById('logout-form').submit();
            }       
        });
        logoutSelect.addEventListener('change',function() {
            if(this.value) {
                window.location.href = this.value;
            }
        });
    </script>
@endsection
