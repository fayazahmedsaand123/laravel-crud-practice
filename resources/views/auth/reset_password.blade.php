@extends('auth.layouts.app')

{{-- Title --}}
@section('title','Reset Password')

{{-- Main Content Section --}}
@section('content')
    <div class="login-container">
        <h1>Reset Password</h1>
        <form action="{{ route('reset_password_post', $user->id) }}" method="post">
            @csrf
            {{-- Password field --}}
            <div class="auth-form password-wrapper">
                <label class="form-label">Password</label>
                <input type="password" name="password" placeholder="New password">
                <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('password',this)"></i>
                <div class="error">@error('password') {{ $message }} @enderror</div>
            </div>
            {{-- Password confirm field --}}
            <div class="auth-form password-wrapper">
                <label class="form-label">Password Confirm</label>
                <input type="password" name="password_confirmation" placeholder="Confirm password">
                <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('password_confirmation',this)"></i>
            </div>
            {{-- Button Submit --}}
            <div class="auth-form">
                <input type="submit" value="Update Password">
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
        // ============== Eye Password ======================== //
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
