@extends('computer.layouts.app')

{{-- Title --}}
@section('title','Update Computer')
    
{{-- Navbar Section --}}
@section('navbar')
    @php
        use App\Models\User;
        $user = session()->has('login_id') ? User::find(session('login_id')) : null;
    @endphp
    {{-- Navbar --}}
    <div class="navbar">
        {{-- Navbar Left --}}
        <div class="navbar-left">
            <img src="{{ asset('images/mit.jpeg')}}" alt="MIT logo" class="logo-img">
        </div>
        {{-- Navbar Center --}}
        <div class="navbar-center">
            <h1>Computer Management</h1>
        </div>
        {{-- Navbar Right --}}
        <div class="navbar-right">
            {{-- User Image --}}
            @if($user && $user->image)
                <img src="{{ asset('Register_Image/'.$user->image) }}"
                    class="image-profile" alt="Register Image">
            @else
                <img src="{{ asset('Register_Image/default.png') }}"
                    alt="Default">
            @endif
            {{-- Select --}}
            <select id="logoutSelect">
                <option>Select</option>
                {{-- Logout --}}
                <option value="logout">Log Out</option>
            </select>
        </div>
    </div> 
    {{-- Form Logout --}}
    <form id="logout-form" action="{{ route('logout') }}" method="get">@csrf</form>
@endsection

{{-- Sidebar Section --}}
@section('sidebar')
    <aside class="sidebar">
        <ul>
            {{-- Student menu dropdown in sidebar --}}
            <li class="sidebar-select">
                <div class="select-wrapper">
                    {{-- Select --}}
                    <select class="SelectDropdown">
                        {{-- Select Student --}}
                        <option value="{{ route('record_student') }}" selected disabled>🏫 Select Student</option>
                        {{-- Manager Student Page --}}
                        <option value="{{ route('record_student') }}"
                        {{ request()->routeIs('record_student') ? 'selected' : '' }}>🏫 Manager Student</option>
                        {{-- Add Student Page --}}
                        <option value="{{ route('student') }}"
                        {{ request()->routeIs('student') ? 'selected' : '' }}>➕ Add Student</option>
                    </select>
                </div>
            </li>
            {{-- Teacher menu dropdown in sidebar --}}
            <li class="sidebar-select">
                <div class="select-wrapper">
                    {{-- Select --}}
                    <select class="SelectDropdown">
                        {{-- Select Teacher --}}
                        <option value="{{ route('record_teacher') }}" selected disabled>👨‍🏫 Select Teacher</option>
                        {{-- Manager Teacher Page --}}
                        <option value="{{ route('record_teacher') }}"
                        {{ request()->routeIs('record_teacher') ? 'selected' : '' }}>👨‍🏫 Manager Teacher</option>
                        {{-- Add Teacher Page --}}
                        <option value="{{ route('teacher') }}"
                        {{ request()->routeIs('teacher') ? 'selected' : '' }}>➕ Add Teacher</option>
                    </select>
                </div>
            </li>
            {{-- Subject menu dropdown in sidebar --}}
            <li class="sidebar-select">
                <div class="select-wrapper">
                    {{-- Select --}}
                    <select class="SelectDropdown">
                        {{-- Select Subject --}}
                        <option value="{{ route('record_subject') }}" selected disabled>📖 Select Subject</option>
                        {{-- Manager Subject Page --}}
                        <option value="{{ route('record_subject') }}"
                        {{ request()->routeIs('record_subject') ? 'selected' : '' }}>📖 Manager Subject</option>
                        {{-- Add Subject Page --}}
                        <option value="{{ route('subject') }}"
                        {{ request()->routeIs('subject') ? 'selected' : '' }}>➕ Add Subject</option>
                    </select>
                </div>
            </li>
            {{-- Country menu dropdown in sidebar --}}
            <li class="sidebar-select">
                <div class="select-wrapper">
                    {{-- Select --}}
                    <select class="SelectDropdown">
                        {{-- Select Country --}}
                        <option value="{{ route('record_country') }}" selected disabled>🌍 Select Country</option>
                        {{-- Manager Country Page --}}
                        <option value="{{ route('record_country') }}"
                        {{ request()->routeIs('record_country') ? 'selected' : '' }}>🌍 Manager Country</option>
                        {{-- Add Country Page --}}
                        <option value="{{ route('country_add') }}"
                        {{ request()->routeIs('country_add') ? 'selected' : '' }}>➕ Add Country</option>
                    </select>
                </div>
            </li>
            {{-- Computer menu dropdown in sidebar --}}
            <li class="sidebar-select">
                <div class="select-wrapper">
                    {{-- Select --}}
                    <select class="SelectDropdown">
                        {{-- Select Computer --}}
                        <option value="{{ route('record_computer') }}" selected disabled>💻 Select Computer</option>
                        {{-- Manager Computer Page --}}
                        <option value="{{ route('record_computer') }}"
                        {{ request()->routeIs('record_computer') ? 'selected' : '' }}>💻 Manager Computer</option>
                        {{-- Add Computer Page --}}
                        <option value="{{ route('computer') }}"
                        {{ request()->routeIs('computer') ? 'selected' : '' }}>➕ Add Computer</option>
                    </select>
                </div>
            </li>
            {{-- MCQ's menu dropdown in sidebar --}}
            <li class="sidebar-select">
                <div class="select-wrapper">
                    {{-- Select --}}
                    <select class="SelectDropdown">
                        {{-- Select Question --}}
                        <option value="{{ route('quiz') }}" selected disabled>❓Select Question</option>
                        {{-- Manager MCQ's --}}
                        <option value="{{ route('quiz') }}"
                        {{ request()->routeIs('quiz') ? 'selected' : '' }}>📋 Manager MCQ's</option>
                        {{-- Add Question --}}
                        <option value="{{ route('mcqs') }}"
                        {{ request()->routeIs('mcqs') ? 'selected' : '' }}>➕ Add Question</option>
                        {{-- Table Question --}}
                        <option value="{{ route('record_quiz') }}"
                        {{ request()->routeIs('record_quiz') ? 'selected' : '' }}>🗂️ Table Question</option>
                    </select>
                </div>
            </li>
            {{-- Calculator menu dropdown in sidebar --}}
            <li class="sidebar-select">
                <div class="select-wrapper">
                    {{-- Select --}}
                    <select class="SelectDropdown">
                        {{-- Select Calculator --}}
                        <option value="{{ route('calculator') }}" selected disabled>📟 Select Calculator</option>
                        {{-- Manager Calculator --}}
                        <option value="{{ route('calculator') }}"
                        {{ request()->routeIs('calculator') ? 'selected' : '' }}>📟 Manager Calculator</option>
                        {{-- History Calculator --}}
                        <option value="{{ route('history_calculator') }}"
                        {{ request()->routeIs('history_calculator') ? 'selected' : '' }}>📜 History Calculator</option>
                    </select>
                </div>
            </li>
            {{-- Calendar menu dropdown in sidebar --}}
            <li class="sidebar-select">
                <div class="select-wrapper">
                    {{-- Select --}}
                    <select class="SelectDropdown">
                        {{-- Select Calendar --}}
                        <option value="{{ route('calendar') }}" selected disabled>📅 Select Calendar</option>
                        {{-- Manager Calendar --}}
                        <option value="{{ route('calendar') }}"
                        {{ request()->routeIs('calendar') ? 'selected' : '' }}>📅 Manager Calendar</option>
                    </select>
                </div>
            </li>
            {{-- Alphabet men dropdown in sidebar --}}
            <li class="sidebar-select">
                <div class="select-wrapper">
                    {{-- Select --}}
                    <select class="SelectDropdown">
                        {{-- Select Alphabet --}}
                        <option value="{{ route('record_alphabet') }}" selected disabled>🔠 Select Alphabet</option>
                        {{-- Manager Alphabet --}}
                        <option value="{{ route('record_alphabet') }}"
                        {{ request()->routeIs('record_alphabet') ? 'selected' : '' }} >🔠 Manager Alphabet</option>
                        {{-- Add Alphabet Page --}}
                        <option value="{{ route('alphabets') }}"
                        {{ request()->routeIs('alphabets') ? 'selected' : '' }}>➕ Add Alphabet</option>
                    </select>
                </div>
            </li>
        </ul>
    </aside>
@endsection

{{-- Main Content --}}
@section('content')
    {{-- Back to computer list --}}
    <div style="margin-top:90px; margin-left:260px;">
        <a href="{{ url()->previous() }}" class="btn btn-secondary mt-3">
            <i class="fa fa-arrow-circle-left me-2" aria-hidden="true"></i>Back
        </a>
    </div>
    <div class="main-center">
        <h1><i class="fa fa-pencil-square me-2" aria-hidden="true"></i>Update Computer</h1>
        <form action="{{ route('update_computer_post',$update_computer->id) }}" id="ajax_update" method="post" enctype="multipart/form-data">
            @csrf
            {{-- Name field --}}
            <div class="form-group">
                <label class="form-label">Computer Name</label>
                <div class="input-wrapper">
                    <input type="text" name="computer_name" value="{{ $update_computer->computer_name }}" placeholder="Enter computer">
                    <div class="error-icon">!</div>
                </div>
            </div>
            {{-- Price field --}}
            <div class="form-group">
                <label class="form-label">Price Number</label>
                <div class="input-wrapper">
                    <input type="text" name="price" value="{{ $update_computer->price }}" placeholder="Enter price number">
                    <div class="error-icon">!</div>
                </div>
            </div>
            {{-- Description field --}}
            <div class="form-group">
                <label class="form-label">Description</label>
                <div class="input-wrapper">
                    <input type="text" name="description" value="{{ $update_computer->description }}" placeholder="Enter description">
                    <div class="error-icon">!</div>
                </div>
            </div>
            {{-- Dropdown Student --}}
            <div class="form-group">
                <label class="form-label">Select Students</label>
                <select name="student_id" class="select-foregin">
                    <option>Select Students</option>
                    @foreach($students as $student)
                        <option value="{{ $student->id }}" {{ $update_computer->student_id == $student->id ? 'selected' : '' }}>{{ $student->id }}</option>
                    @endforeach
                </select>
                <div class="error error-student_id"></div>
            </div>
            {{-- Dropdown Teacher --}}
            <div class="form-group">
                <label class="form-label">Select Teachers</label>
                <select name="teacher_id" class="select-foregin">
                    <option>Select Teachers</option>
                    @foreach($teachers as $teacher)
                        <option value="{{ $teacher->id }}" {{ $update_computer->teacher_id == $teacher->id ? 'selected' : '' }}>{{ $teacher->id }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Dropdown Subject --}}
            <div class="form-group">
                <label class="form-label">Select Subjects</label>
                <select name="subject_id" class="select-foregin">
                    <option>Select Subjects</option>
                    @foreach($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $update_computer->subject_id == $subject->id ? 'selected' : '' }}>{{ $subject->id }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Dropdown Country --}}
            <div class="form-group">
                <label class="form-label">Select Countries</label>
                <select name="country_id" class="select-foregin">
                    <option>Select Countries</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ $update_computer->country_id == $country->id ? 'selected' : '' }}>{{ $country->id }}</option>
                    @endforeach
                </select>
            </div>
            {{-- Image picture --}}
            <div class="form-group">
                <img id="imagePreview" src="{{$update_computer->image ? asset('/Computer_Image/'.$update_computer->image) :
                    asset('/Computer_Image/default.png') }}" alt="Computer Image">
            </div>
            {{-- Image field --}}
            <div class="form-group">
                <label class="form-label">Upload image</label>
                <input type="file" name="image" accept="image/*" onchange="previewImage(event)">
            </div>
            {{-- Submit button --}}
            <div class="form-group">
                <input type="submit" value="Continue">
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

{{-- Ajax JavaScript --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#ajax_update').on('submit',function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                var update_computer = $(this).attr('action');
                
                $.ajax({
                    url:update_computer,
                    type:'post',
                    data:formData,
                    processData:false,
                    contentType:false,
                    dataType:'json',
                    success:function(response) {
                        if(response.status === 'success') {
                            alert(response.message); // success
                            window.location.href = response.redirect_to;
                        }
                        else {
                            alert(response.message); // Name already exists
                        }
                    },
                    error:function(xhr) {
                        if(xhr.status === 422) {
                            var errors = xhr.responseJSON.errors;
                            $('.error').text('');
                            $('.error-icon').hide();
                            $.each(errors,function(field,messages) {
                                $(`.error-${field}`).text(messages[0]);
                                $(`input[name="${field}"]`).siblings('.error-icon').show();
                            });
                        }
                    }
                });
            });
            // ============================ Logout =============================== //
            document.getElementById('logoutSelect').addEventListener('change',function() {
                if(this.value === 'logout');
                    document.getElementById('logout-form').submit();
            });
            // =========================== Computer Dropdown Arrow ============================== //
            document.querySelectorAll('.select-wrapper').forEach(wrapper => {
                const SelectDropdown = wrapper.querySelector('.SelectDropdown');
                SelectDropdown.addEventListener('focus',() => {
                    wrapper.classList.add('select-open');
                });
                SelectDropdown.addEventListener('blur',() => {
                    wrapper.classList.remove('select-open');
                });
                SelectDropdown.addEventListener('change',function() {
                    if(this.value) {
                        window.location.href = this.value;
                    }
                });
            });
        });
        // =========================== Image Upload JS ================================== //
        function previewImage(event) {
            const imagePreview = document.getElementById('imagePreview');
            const file = event.target.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection