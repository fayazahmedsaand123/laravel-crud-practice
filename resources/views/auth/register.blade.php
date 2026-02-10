@extends('auth.layouts.app')

{{-- Title --}}
@section('title','Register Form')

{{-- Main Content Section --}}
@section('content')
    <div class="login-container">
        <h1>Sign Up</h1>
        <form action="{{ route('register_input') }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Name field --}}
            <div class="auth-form">
                <label class="form-label">First Name </label>
                <div class="input-wrapper @error('name') error @enderror">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter name">
                    @error('name')
                        <div class="error-icon">!</div>
                    @enderror
                </div>
            </div>
            {{-- Last name field --}}            
            <div class="auth-form">
                <label class="form-label">Last Name </label>
                <div class="input-wrapper @error('last_name') error @enderror"> 
                    <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Enter last name">
                    @error('last_name')
                        <div class="error-icon">!</div>
                    @enderror
                </div>
            </div>  
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
            {{-- Password confirm field --}}
            <div class="auth-form password-wrapper">
                <label class="form-label">Password Confirmation </label>
                <input type="password" name="password_confirmation" placeholder="Enter confirm password">
                <i class="fa-solid fa-eye toggle-password" onclick="togglePassword('password_confirmation',this)"></i>
                <div class="error">@error('password_confirmed') {{ $message }} @enderror</div>
            </div>
            {{-- Select --}}
            <div class="auth-form">
                <label class="form-label">Admin & User</label>
                <select name="role" class="select-foregin">
                    <option class="select" value="">Admin & User</option>
                    <option value="user">Admin</option>
                    <option value="admin">User</option>
                </select>
            </div>
            {{-- Image field --}}
            <div class="auth-form">
                <label class="form-label">Upload image </label>
                <input type="file" name="image">
            </div>
            {{-- Button Submit --}}
            <div class="auth-form">
                <input type="submit" value="Sign Up">
            </div>
            <a href="{{ route('login') }}">Already Registered? Login</a>
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
        // ===================== Eye Password ====================== //
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