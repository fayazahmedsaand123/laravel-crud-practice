@extends('alphabet.layouts.app')

@section('title','Alphabet')

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
            <h1>Alphabet Management</h1>
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
    <div class="container d-flex justify-content-center mt-5 p-5">
        <div class="card shadow-lg p-3 w-100" style="max-width: 500px;">
            <div class="card-body">
                <h4 class="text-center mb-3">➕ Add Alphabet</h4>
                <form action="{{ route('alphabet_store') }}" id="Add_Alphabet" method="POST">
                    @csrf
                    {{-- Input Field --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Word of Alphabet</label>
                        <div class="input-wrapper">
                            <input type="text" class="form-control" name="letter" placeholder="Example: Apple, Cat, Dog...">
                            <div class="error-icon">!</div>
                        </div>
                    </div>
                    {{-- Emoji Select --}}
                    <div class="mb-3">
                        <label class="form-label fw-bold">Select Emoji</label>
                        <select class="form-select" name="emoji">
                            <option value="">Select Emoji</option>

                            {{-- A --}}
                            <option value="🍎">A: Apple 🍎</option>
                            <option value="🐜">A: Ant 🐜</option>
                            <option value="🦵">A: Ankle 🦵</option>

                            {{-- B --}}
                            <option value="🍌">Banana 🍌</option>
                            <option value="📖">B: Book 📖</option>
                            <option value="🛶">B: Boat 🛶</option>
                            <option value="👢">B: Boot 👢</option>
                            <option value="🐻">B: Bear 🐻</option>
                            <option value="🎈">B: Balloon 🎈</option>
                            <option value="🥖">B: Bread 🥖</option>
                            <option value="🦋">B: Butterfly 🦋</option>
                            <option value="🍺">B: Beer 🍺</option>
                                
                            {{-- C --}}
                            <option value="🐱">C: Cat 🐱</option>
                            <option value="🐫">C: Camel 🐫</option>
                            <option value="🌶️">C: Chili 🌶️</option>
                            <option value="🍪">C: Cookie 🍪</option>
                            <option value="☕">C: Coffee ☕</option>

                            {{-- D --}}
                            <option value="🐶">D: Dog 🐶</option>
                            <option value="🍩">D: Donut 🍩</option>
                            <option value="🎯">D: Dart 🎯</option>
                            <option value="🚗">D: Drive 🚗</option>

                            {{-- E --}}
                            <option value="🐘">E: Elephant 🐘</option>
                            <option value="🥚">E: Egg 🥚</option>
                            <option value="📧">E: Envelope 📧</option>
                            <option value="🦅">E: Eagle 🦅</option>

                            {{-- F --}}
                            <option value="🐟">F: Fish 🐟</option>
                            <option value="🍓">F: Fig 🍓</option>
                            <option value="🎏">F: Flag 🎏</option>
                            <option value="🌸">F: Flower 🌸</option>

                            {{-- G --}}
                            <option value="🐐">G: Goat 🐐</option>
                            <option value="🍇">G: Grapes 🍇</option>
                            <option value="🦒">G: Giraffe 🦒</option>
                            <option value="🎸">G: Guitar 🎸</option>

                            {{-- H --}}
                            <option value="🐴">H: Horse 🐴</option>
                            <option value="🏠">H: House 🏠</option>
                            <option value="🍯">H: Honey 🍯</option>
                            <option value="🎩">H: Hat 🎩</option>

                            {{-- I --}}
                            <option value="🍦">I: Ice cream 🍦</option>
                            <option value="🍦">I: Igloo 🧊</option>
                            <option value="🍦">I: Ink 🖋️</option>

                            {{-- J --}}
                            <option value="🐒">J: Jaguar 🐒</option>
                            <option value="🕹️">J: Joystick 🕹️</option>
                            <option value="👖">J: Jeans 👖</option>
                            <option value="🍏">J: Jam 🍏</option>

                            {{-- K --}}
                            <option value="🐸">K: Kangaroo 🐸</option>
                            <option value="🥝">K: Kiwi 🥝</option>
                            <option value="🔪">K: Knife 🔪</option>
                            <option value="🪁">K: Kite 🪁</option>

                            {{-- L --}}
                            <option value="🦁">L: Lion 🦁</option>
                            <option value="🍋">L: Lemon 🍋</option>
                            <option value="🛴">L: Lorry 🛴</option>
                            <option value="🦎">L: Lizard 🦎</option>

                            {{-- M --}}
                            <option value="🐵">M: Monkey 🐵</option>
                            <option value="🍈">M: Melon 🍈</option>
                            <option value="🎵">M: Music 🎵</option>
                            <option value="🦣">M: Mammoth 🦣</option>

                            {{-- N --}}
                            <option value="🐍">N: Snake 🐍</option>
                            <option value="🎶">N: Note 🎶</option>
                            <option value="🛶">N: Net 🛶</option>
                            <option value="🌙">N: Night 🌙</option>

                            {{-- O --}}
                            <option value="🐙">O: Octopus 🐙</option>
                            <option value="🥚">O: Omelette 🥚</option>
                            <option value="🧅">O: Onion 🧅</option>
                            <option value="🦦">O: Otter 🦦</option>

                            {{-- P --}}
                            <option value="🐼">P: Panda 🐼</option>
                            <option value="🍍">P: Pineapple 🍍</option>
                            <option value="🥞">P: Pancake 🥞</option>
                            <option value="🖌️">P: Paint 🖌️</option>

                            {{-- Q --}}
                            <option value="🐤">Q: Quail 🐤</option>
                            <option value="👑">Q: Queen 👑</option>
                            <option value="🧞‍♂️">Q: Quest 🧞‍♂️</option>
                            <option value="❓">Q: Question ❓</option>

                            {{-- R --}}
                            <option value="🐰">R: Rabbit 🐰</option>
                            <option value="🌈">R: Rainbow 🌈</option>
                            <option value="🚗">R: Road 🚗</option>
                            <option value="🥀">R: Rose 🥀</option>

                            {{-- S --}}
                            <option value="🦈">S: Shark 🦈</option>
                            <option value="🌟">S: Star 🌟</option>
                            <option value="🥪">S: Sandwich 🥪</option>
                            <option value="🐍">S: Snake 🐍</option>

                            {{-- T --}}
                            <option value="🐯">T: Tiger 🐯</option>
                            <option value="🌴">T: Tree 🌴</option>
                            <option value="🛶">T: Tent 🛶</option>
                            <option value="🎩">T: Top hat 🎩</option>
                            <option value="🐢">T: Turtle 🐢</option>

                            {{-- U --}}
                            <option value="☂️">U: Umbrella ☂️</option>
                            <option value="🦄">U: Unicorn 🦄</option>

                            {{-- V --}}
                            <option value="🌋">V: Volcano 🌋</option>
                            <option value="🎻">V: Violin 🎻</option>
                            <option value="🥗">V: Veggies 🥗</option>

                            {{-- W --}}
                            <option value="🍉">W: Watermelon 🍉</option>
                            <option value="🌊">W: Water 🌊</option>
                            <option value="🚶">W: Walk 🚶</option>

                            {{-- X --}}
                            <option value="❌">X: X-mark ❌</option>
                            <option value="⚡">X: X-ray ⚡</option>

                            {{-- Y --}}
                            <option value="🥭">Y: Yam 🥭</option>
                            <option value="🛳️">Y: Yacht 🛳️</option>
                            <option value="💛">Y: Yellow 💛</option>

                            {{-- Z --}}
                            <option value="🦓">Z: Zebra 🦓</option>
                            <option value="⚡">Z: Zigzag ⚡</option>
                            <option value="🥒">Z: Zucchini 🥒</option>
                        </select>
                        <div class="error error-emoji"></div>
                    </div>
                    {{-- Submit Button --}}
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Add Alphabet</button>
                    </div>
                </form>
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
        // ============================= Add Form ================================ //
        $(document).ready(function() {
            $('#Add_Alphabet').on('submit',function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url:"{{ route('alphabet_store') }}",
                    type:'post',
                    data:formData,
                    processData:false,
                    contentType:false,
                    dataType:'json',
                    success:function(response) {
                        if(response.status === 'success') {
                            alert(response.message);
                            window.location.href = response.redirect_to; // Success
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
        });
        // ============================= Logout ================================== //
        document.getElementById('logoutSelect').addEventListener('change',function() {
            if(this.value === 'logout') {
                document.getElementById('logout-form').submit();
            }
        });
        // ==================== View MCQ'S Quiz Dropdown Arrow ===================== //
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