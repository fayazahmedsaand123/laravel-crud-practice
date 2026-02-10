@extends('Quiz.layouts.app')

{{-- Title --}}
@section('title','MCQ Test')
    
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
            <h1>Quiz Management</h1>
        </div>
        {{-- Navbar Right --}}
        <div class="navbar-right">
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

{{-- Main Content Section --}}
@section('content')
    <div class="container mt-5 pt-5">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-header bg-primary text-white text-center py-4 rounded-top-4">
                <h4 class="mb-0 fw-bold">MCQ Quiz</h4>
            </div>
            <div class="card-body p-4">
                <div id="quiz-box">
                    <div id="quiz"></div>
                    <div class="text-left mt-3">
                        <button id="nextBtn" onclick="nextQuestion()" class="btn btn-primary btn-lg px-4 rounded-3">
                            <i class="fa fa-arrow-right me-2" aria-hidden="true"></i>Next</button>
                    </div>
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

{{-- Ajax JavasScript --}}
@section('scripts')
    <script>
        $(document).ready(function() {
            // ================= Logout ========================= //
            document.getElementById('logoutSelect').addEventListener('change',function() {
                if(this.value === 'logout') {
                    document.getElementById('logout-form').submit();
                }
            });
            // =================== MCQ's Dropdown Arrow ==================== //
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
        // ==================== Radio MCQ'S ============================ //
        const questions = @json($mcqs);
        var index = 0;
        var score = 0;

        function loadQuestion() {
            const q = questions[index];
            const quiz = document.getElementById("quiz");

            quiz.innerHTML = `<h5 class="mb-3 fw-bold text-start">Q${index + 1}: ${q.question}</h5>` +
                [q.option1, q.option2, q.option3, q.option4].map((opt, i) =>
                    `<label class="d-block p-1 mb-1 rounded text-start">
                        <input type="radio" name="option" value="${i + 1}" class="me-2">${opt}</label>`).join('');
        }
        function nextQuestion() {
            const selected = document.querySelector('input[name="option"]:checked');
            const q = questions[index];

            if(selected && parseInt(selected.value) === q.correct_option) {
                score++;
            }
            index++; 
            if(index < questions.length) {
                loadQuestion();   
            }
            else {
                showResult();
            }
        }
        function showResult() {
            const total = questions.length;
            const correct = score;
            const wrong = total - correct;
            const obtainMarks = correct;
            const percentage = ((correct / total ) * 100).toFixed(2);

            var grade;
            if(percentage >= 100) {
                grade = "A+";
            }
            else if(percentage >= 90) {
                grade = "A";
            }
            else if(percentage >= 80) {
                grade = "B";
            }
            else if(percentage >= 70) {
                grade = "C";
            }
            else if(percentage >= 60) {
                grade = "D";
            }
            else {
                grade = "Fail";
            }

            document.getElementById("quiz-box").innerHTML =
            `<h3>Result</h3>
            <p>Total Questions: ${total}</p>
            <p>Correct Answers: ${correct}</p>
            <p>Wrong Answers: ${wrong}</p>
            <p>Obtain Marks: ${obtainMarks} / ${total}</p>
            <p>Score: ${correct} / ${total}</p>
            <p>Percentage: ${percentage}%</p>
            <p>Grade: ${grade}</p>
            <h4 class="text-success fw-bold mt-3">🎉 Congratulations! 🎉</h4>`;
        }
        loadQuestion();

        // ==================== MCQ'S JavaScript ========================== //
    /*    const questions = @json($mcqs);
        var index = 0;
        var score = 0;

        function loadQuestion() {
            const q = questions[index];
            const quiz = document.getElementById("quiz");
            quiz.innerHTML = `<p>Q${index+1}: ${q.question}</p>` +
                [q.option1, q.option2, q.option3, q.option4].map((opt,i) =>
                    `<button onclick="checkAnswer(${i+1}, this)">${opt}</button>`).join('');

                document.getElementById("nextBtn").style.display = "none";
                document.getElementById("submitBtn").style.display = "none";
        }
        function checkAnswer(selected,btn) {
            const q = questions[index];
            if(selected === q.correct_option) {
                score++;
                btn.style.backgroundColor = "green";
            } else {
                btn.style.backgroundColor = "red";
                // highlight correct answer
                const buttons = btn.parentElement.querySelectorAll('button');
                buttons[q.correct_option-1].style.backgroundColor = "green";
            }
            // Disable all buttons 
            const buttons = btn.parentElement.querySelectorAll('button');
            buttons.forEach(b => b.disabled = true);

            // Show next or submit
            if(index < questions.length - 1) {
                document.getElementById("nextBtn").style.display = "block";
            }
            else {
                document.getElementById("submitBtn").style.display = "block";
            }
        }
        function nextQuestion() {
            index++;
            loadQuestion();
        }
        function showResult() {
            document.getElementById("quiz-box").innerHTML = `<h3>Your Score: ${score} / ${questions.length}</h3>`;
        }
        loadQuestion();    */
    </script>
@endsection
