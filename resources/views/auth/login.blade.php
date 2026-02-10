@extends('auth.layouts.app')

{{-- Title --}}
@section('title','Login Form')

{{-- Main Content Section --}}
@section('content')    
    <div class="login-container">
        <img src="{{ asset('images/facebook.png') }}">
        <form action="{{ route('Login_Route') }}" method="post">
            @csrf
            {{-- Flesh message --}}
            @if(session('success'))
                <div class="success-login">{{ session('success') }}</div>
            @elseif(session('fail'))
                <div class="fail-login">{{ session('fail') }}</div>
            @endif
            {{-- Email field --}}
            <div class="auth-form">
                <label class="form-label">Email </label>
                <div class="input-wrapper @error('email') error @enderror">
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter email">
                    @error('email')
                        <div class="error-icon">!</div>
                    @enderror
                </div>
            </div>
            {{-- Password field --}}
            <div class="auth-form password-wrapper">
                <label class="form-label">Password </label>    
                <input type="password" name="password" placeholder="Enter password">
                <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('password',this)"></i>
                <div class="error">@error('password') {{ $message }} @enderror</div>
            </div>
            {{-- Button Submit --}}
            <div class="auth-form">
                <input type="submit" value="Log in">
            </div>
            {{-- Forget Password --}}
            <a href="{{ route('forget_password') }}" class="forget_password">Forget Password?</a> 
            {{-- Register Form --}}
            <div class="register-bottom">
                <a href="{{ route('register') }}" class="fb-create-account">Create New Account</a>
            </div>
        </form>
    </div>
@endsection

{{-- Footer Section --}}
@section('footer')
    <footer class="site-footer">
        <div class="footer-wrapper">
            {{-- Footer top: Contact info and links --}}
            <div class="footer-top">
                {{-- Contact Info --}}
                <div class="footer-column">
                    <h4>Contact Us</h4>
                    {{-- Phone Number --}}
                    <p><i class="fas fa-phone-alt"></i>{{config('app.phone', '+92 3001234567')}}</p>
                    {{-- Email --}}
                    <p><i class="fas fa-envelope"></i>{{config('app.email', 'Fayazahmed@gmail.com')}}</p>
                </div>
                {{-- Quick Links --}}
                <div class="footer-column">
                    <h4>Quick Links</h4>
                    <ul>
                        {{-- Login --}}
                        <li>
                            <a href="{{ route('login')}}">Login</a>
                        </li>
                        {{-- Register --}}
                        <li>
                            <a href="{{ route('register')}}">Register</a>
                        </li>
                    </ul>
                </div>
                {{-- Social Media --}}
                <div class="footer-column">
                    <h4>Follow Us</h4>
                    {{-- Facebook --}}
                    <a href="https://www.facebook.com" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    {{-- Twitter --}}
                    <a href="https://twitter.com" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    {{-- Instagram --}}
                    <a href="https://www.instagram.com" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
            {{-- Footer bottom: copyright --}}
            <div class="footer-bottom">
                <p>Made with <i class="fas fa-heart text-danger"></i> by Fayaz Ahmed</p>
                <p>&copy; {{date('Y')}} MIT Solution Software. All rights reserved</p>
            </div>
        </div>
    </footer>
@endsection

{{-- JavaScript --}}
@section('scripts')
    <script>
        // ================== Eye Password ====================== //
        function togglePassword(field,icon) {
            const input = document.querySelector(`input[name="${field}"]`);
            if(input.type === "password") {
                input.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
            }
            else {
                input.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
            }
        }
    </script>
@endsection