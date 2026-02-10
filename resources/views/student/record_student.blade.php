@extends('student.layouts.app')

{{-- Title --}}
@section('title','Record Student')

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
            <h1>Student Management</h1>
        </div>
        {{-- Navbar Right --}}
        <div class="navbar-right">
            {{-- Search --}}
            <div class="search">
                <form action="{{ route('record_student') }}" method="get">
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                </form>
            </div>
            {{-- User Image --}}
            @if($user && $user->image)
                <img src="{{ asset('Register_Image/'.$user->image) }}" 
                     class="image-profile" alt="Register">
            @else
                <img src="{{ asset('Register_Image/default.png') }}" 
                     alt="Default" class="image-profile">
            @endif
            {{-- Select --}}
            <select id="logoutSelect">
                <option value="">Select</option>
                {{-- Logout --}}
                <option value="logout">Log Out</option>
            </select>
        </div>
    </div>
    {{-- Form Logout --}}
    <form id="logout-form" action="{{ route('logout') }}" method="GET">@csrf</form>
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

{{-- Main Content Section --}}
@section('content')
    <div class="main-center"> 
        {{-- Flesh message --}}
        @if(session('success'))
            <div class="success-login">{{ session('success') }}</div>
        @elseif(session('fail'))
            <div class="fail-login">{{ session('fail') }}</div>
        @endif
        {{-- Student Table --}}
        <table>
            <thead>
                <tr>
                    {{-- <th>ID</th> --}}
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($student_record as $student)
                    <tr>
                        {{-- <td>{{ $student->id }}</td> --}}
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->email }}</td>
                        <td>
                            <img src="{{ asset('Student_Image/'.$student->image) }}" alt="Student Image">
                        </td>
                        <td>
                            <a href="{{ route('view_student',$student->id) }}" class="btn-view">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('update_student',$student->id) }}" class="btn-update">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('delete_student',$student->id) }}"
                                class="btn-delete" data-id="{{ $student->id }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center text-danger">No records found</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{-- Pagination --}}
        <div class="mt-3 pagination-left">{{ $student_record->links('pagination::bootstrap-5') }}</div>
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
            $('.btn-delete').click(function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                if(!confirm('Are you sure you want to delete this student?')) {
                    return false;
                }
                
                $.ajax({
                    url:'/delete_student/' + id,
                    type:'get',
                    dataType:'json',
                    success:function(response) {
                        if(response.status === 'success') {
                            alert(response.message); // success
                            location.reload();
                        }
                        else {
                            alert(response.message); // fail delete
                        }
                    },
                    error:function(xhr) {
                        alert('Error deleting student');
                    }
                });
            });
            // ================================ Logout ================================= //
            document.getElementById('logoutSelect').addEventListener('change',function() {
                if (this.value === 'logout') {
                    document.getElementById('logout-form').submit();
                }   
            });
            // ====================== Student Dropdown Arrow ============================ //
            document.querySelectorAll('.select-wrapper').forEach(wrapper => {
                const SelectDropdown = wrapper.querySelector('.SelectDropdown');
                SelectDropdown.addEventListener('focus', () => {
                    wrapper.classList.add('select-open');
                });
                SelectDropdown.addEventListener('blur', () => {
                    wrapper.classList.remove('select-open');
                });
                SelectDropdown.addEventListener('change',function() {
                    if(this.value) {
                        window.location.href = this.value;
                    }
                });
            });
        });
    </script>
@endsection
