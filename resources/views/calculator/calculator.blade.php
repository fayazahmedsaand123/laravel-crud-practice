@extends('calculator.layouts.app')

{{-- Title --}}
@section('title','Calculator')

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
            <h1>Calculator Management</h1>
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
    <form id="logout-form" action="{{ route('logout') }}">@csrf</form>
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
    <div class="container mt-5 p-5 d-flex justify-content-center">
        <div class="card shadow-lg" style="width: 400px; height: 340px;">
            <div class="card-body">
                {{-- Display --}}
                <input type="text" id="display" class="form-control mb-3 text-end fs-4" disabled>
                {{-- Buttons --}}
                <div class="row g-2">
                    <div class="col-3"><button class="btn btn-danger w-100" onclick="press('C')">C</button></div>
                    <div class="col-3"><button class="btn btn-warning w-100" onclick="press('/')">/</button></div>
                    <div class="col-3"><button class="btn btn-warning w-100" onclick="press('*')">X</button></div>
                    <div class="col-3"><button class="btn btn-secondary w-100" onclick="del()">DEL</button></div>

                    <div class="col-3"><button class="btn btn-light w-100" onclick="press('7')">7</button></div>
                    <div class="col-3"><button class="btn btn-light w-100" onclick="press('8')">8</button></div>
                    <div class="col-3"><button class="btn btn-light w-100" onclick="press('9')">9</button></div>
                    <div class="col-3"><button class="btn btn-warning w-100" onclick="press('-')">-</button></div>

                    <div class="col-3"><button class="btn btn-light w-100" onclick="press('4')">4</button></div>
                    <div class="col-3"><button class="btn btn-light w-100" onclick="press('5')">5</button></div>
                    <div class="col-3"><button class="btn btn-light w-100" onclick="press('6')">6</button></div>
                    <div class="col-3"><button class="btn btn-warning w-100" onclick="press('+')">+</button></div>

                    <div class="col-3"><button class="btn btn-light w-100" onclick="press('1')">1</button></div>
                    <div class="col-3"><button class="btn btn-light w-100" onclick="press('2')">2</button></div>
                    <div class="col-3"><button class="btn btn-light w-100" onclick="press('3')">3</button></div>
                    <div class="col-3"><button class="btn btn-success w-100" onclick="equal()">=</button></div>

                    <div class="col-3"><button class="btn btn-info w-100" onclick="press('%')">%</button></div>
                    <div class="col-3"><button class="btn btn-light w-100" onclick="press('0')">0</button></div>
                    <div class="col-3"><button class="btn btn-light w-100" onclick="press('.')">.</button></div>
                    <div class="col-3"><button class="btn btn-warning w-100" onclick="press('/')">/</button></div>
                </div>
            </div>
        </div>
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
        // ========================= Display ========================== //
        var display = document.getElementById("display");
        function press(val) {
            if (val === 'C') {
                display.value = "";
            } else if(val === '%') {
                display.value += '/100';
            } else {
                display.value += val === 'X' ? '*' : val;
            }
        }
        // ============================= Delete =============================== //
        function del() {
            display.value = display.value.slice(0, -1);
        }
        // =========================== History =============================== //
        async function saveHistory(expression,result) {
            await fetch("{{ route('calculator.save') }}", {
                method: "POST",
                headers: {"Content-Type": "application/json","X-CSRF-TOKEN": "{{ csrf_token() }}"},
                body: JSON.stringify({ expression, result })
            });
        }
        // =========================== Equal =========================== //
        function equal() {
            try {
                var exp = display.value;
                display.value = eval(display.value);
                saveHistory(exp, display.value);
            } catch {
                display.value = "Error";
            }
        }
        // ========================== Logout ============================ //
        document.getElementById('logoutSelect').addEventListener('change',function() {
            if(this.value === 'logout') {
                document.getElementById('logout-form').submit();
            }
        });
        // ========================= Calculator Dropdown Arrow ====================== //
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
    </script>
@endsection
