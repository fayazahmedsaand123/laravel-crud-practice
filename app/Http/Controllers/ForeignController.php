<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use App\Models\Country;
use App\Models\Teacher;
use App\Models\Computer;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Mcq;
use App\Models\Calculator;
use App\Models\Alphabet;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ForeignController extends Controller {
    // ================== Student Form ==================== //
    public function studentInput() {
        return view('student.student_form');
    }
    public function student_form(Request $request) {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'email|required'
        ]);
        if(Student::where('email',$request->email)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email already exists'
            ]);
        }
        $student = new Student();
        $student->name = $request->name;
        $student->last_name = $request->last_name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Student_Image'),$imageName);
            $student->image = $imageName;
        }
        $student->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Student added successfully',
            'redirect_to' => route('record_student')
        ]);
    }
    // ================== Table Show & Search & Pagination Student ======================== //
    public function Student_Search(Request $request) {
        $search = $request->input('search');
        $student_record = Student::where('name','like',"%{$search}%")
                                ->orWhere('last_name','like',"%{$search}%")
                                ->orWhere('phone','like',"%{$search}%")
                                ->orWhere('email','like',"%{$search}%")->paginate('4');
        return view('student.record_student',compact('student_record'));
    }
    // =================== View Student ================================== //
    public function View_Student($id) {
        $view_student = Student::find($id);
        return view('student.view_student',compact('view_student'));
    }
    // =================== Update Student Form =========================== //
    public function Update_Student($id) {
        $update_student = Student::find($id);
        return view('student.update_student',compact('update_student'));
    }
    public function Update_StudentPost(Request $request,$id) {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'email' => 'required|email'
        ]);
        if (Student::where('email', $request->email)->where('id', '!=', $id)->exists()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Email already exists'
            ]);
        }
        $Update_Student = Student::find($id);
        $Update_Student->name = $request->name;
        $Update_Student->last_name = $request->last_name;
        $Update_Student->phone = $request->phone;
        $Update_Student->email = $request->email;
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Student_Image'),$imageName);
            $Update_Student->image = $imageName;
        }
        $Update_Student->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Student updated successfully',
            'redirect_to' => route('record_student')
        ]);
    }
    // ====================== Delete Student ============================== //
    public function Delete_Student($id) {
        $student = Student::find($id);
        if(!$student) {
            return response()->json([
                'status' => 'error',
                'message' => 'Student not found'
            ],404);
        }
        $student->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Student deleted successfully'
            ]);
    }
    // ======================= Teacher Form =========================== //
    public function teacherInput() {
        $students = Student::all();
        return view('teacher.teacher_form',compact('students'));
    }
    public function teacher_form(Request $request) {   
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'subject' => 'required',
            'department' => 'required',
            'nationally' => 'required',
            'student_id' => 'required'
        ]);
        if(Teacher::where('name',$request->name)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Name already exists'
            ]);
        }
        $teacher = new Teacher();
        $teacher->name = $request->name;
        $teacher->gender = $request->gender;
        $teacher->subject = $request->subject;
        $teacher->department = $request->department;
        $teacher->nationally = $request->nationally;
        $teacher->student_id = $request->student_id;
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Teacher_Image'),$imageName);
            $teacher->image = $imageName;
        }
        $teacher->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Teacher added successfully',
            'redirect_to' => route('record_teacher')
        ]);
    }
    // ==================== Table Show & Search & Pagination Teacher ======================== //
    public function Teacher_Search(Request $request) {
        $search = $request->input('search');
        $record_teacher = Teacher::where('name','like',"%{$search}%")
                                ->orWhere('gender','like',"%{$search}%")
                                ->orWhere('subject','like',"%{$search}%")
                                ->orWhere('department','like',"%{$search}")
                                ->orWhere('nationally','like',"%{$search}%")
                                ->orWhere('student_id','like',"%{$search}%")->paginate('4');
        return view('teacher.record_teacher',compact('record_teacher'));
    }
    // ========================== View Teacher ============================ //
    public function View_Teacher($id) {
        $view_teacher = Teacher::find($id);
        return view('teacher.view_teacher',compact('view_teacher'));
    }
    // ====================== Update Teacher Form ========================= //
    public function Update_Teacher($id) {
        $update_teacher = Teacher::find($id);
        $students = Student::all();
        return view('teacher.update_teacher',compact('update_teacher','students'));
    }
    public function Update_Teacher_Post(Request $request,$id) {
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'subject' => 'required',
            'department' => 'required',
            'nationally' => 'required',
            'student_id' => 'required'
        ]);
        if(Teacher::where('name',$request->name)->where('id','!=',$id)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Name already exists'
            ]);
        }
        $Update_Teacher = Teacher::find($id);
        $Update_Teacher->name = $request->name;
        $Update_Teacher->gender = $request->gender;
        $Update_Teacher->subject = $request->subject;
        $Update_Teacher->department = $request->department;
        $Update_Teacher->nationally = $request->nationally;
        $Update_Teacher->student_id = $request->student_id;
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Teacher_Image'),$imageName);
            $Update_Teacher->image = $imageName;
        }
        $Update_Teacher->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Teacher updated successfully',
            'redirect_to' => route('record_teacher')
        ]);
    }
    // ======================== Delete Teacher ========================= //
    public function Delete_Teacher($id) {
        $teacher = Teacher::find($id);
        if(!$teacher) {
            return response()->json([
                'status' => 'error',
                'message' => 'Teacher not found'
            ],404);
        }
        $teacher->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Teacher deleted successfully'
        ]);
    }
    // ====================== Subject Form =========================== //
    public function Subject_Form() {
        $students = Student::all(); 
        $teachers = Teacher::all();
        return view('subject.subject_form',compact('teachers','students'));
    }
    public function Subject_Add(Request $request) {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'religious' => 'required',
            'phone' => 'required',
            'student_id' => 'required',
            'teacher_id' => 'required'
        ]);
        if(Subject::where('name',$request->name)->exists())  {
            return response()->json([
                'status' => 'error',
                'message' => 'Name already exists'
            ]);
        }
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->age = $request->age;
        $subject->religious = $request->religious;
        $subject->phone = $request->phone;
        $subject->student_id = $request->student_id;
        $subject->teacher_id = $request->teacher_id;
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Subject_Image'),$imageName);
            $subject->image = $imageName;
        }
        $subject->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Subject added successfully',
            'redirect_to' => route('record_subject')
        ]);
    }
    // =================== Table Show & Search & Pagination Subject =================== //
    public function Subject_Search(Request $request) {
        $search = $request->input('search');
        $record_subject = Subject::where('name','like',"%{$search}%")
                                ->orWhere('age','like',"%{$search}%")
                                ->orWhere('religious','like',"%{$search}%")
                                ->orWhere('phone','like',"%{$search}%")
                                ->orWhere('teacher_id','like',"%{$search}%")->paginate('4');
        return view('subject.record_subject',compact('record_subject'));
    }
    // ==================== View Subject =============================== //
    public function View_Subject($id) {
        $view_subject = Subject::find($id);
        return view('subject.view_subject',compact('view_subject'));
    }
    // =================== Update Subject Form ========================= //
    public function Update_Subject($id) {
        $update_subject = Subject::find($id);
        $students = Student::all();
        $teachers = Teacher::all();
        return view('subject.update_subject',compact('update_subject','teachers','students'));
    }
    public function Update_Subject_Post(Request $request,$id) {
        $request->validate([
            'name' => 'required',
            'age' => 'required',
            'religious' => 'required',
            'phone' => 'required',
            'student_id' => 'required',
            'teacher_id' => 'required'
        ]);
        if(Subject::where('name',$request->name)->where('id','!=',$id)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Name already exists'
            ]);
        }
        $Update_Subject = Subject::find($id);
        $Update_Subject->name = $request->name;
        $Update_Subject->age = $request->age;
        $Update_Subject->religious = $request->religious;
        $Update_Subject->phone = $request->phone;
        $Update_Subject->student_id = $request->student_id;
        $Update_Subject->teacher_id = $request->teacher_id;
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Subject_Image'),$imageName);
            $Update_Subject->image = $imageName;
        }
        $Update_Subject->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Subject updated successfully',
            'redirect_to' => route('record_subject')
        ]);
    }
    // ====================== Delete Subject =========================== //
    public function Delete_Subject($id) {
        $subject = Subject::find($id);
        if(!$subject) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error deleting exists'
            ],404);
        }
        $subject->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Subject deleted successfully'
        ]);
    }
    // ======================== Country Form ============================== //
    public function Country_Form() {
        $students = Student::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('country.country_form',compact('subjects','teachers','students'));
    }
    public function Country_Add(Request $request) {
        $request->validate([
            'country_name' => 'required',   
            'capital_name' => 'required',
            'gender_name' => 'required',
            'color_name' => 'required',
            'student_id' => 'required',
            'teacher_id' => 'required',
            'subject_id' => 'required'
        ]);
        if(Country::where('country_name',$request->country_name)->exists()) {
            return response()->json([
                'status' => 'error',    
                'message' => 'Country Name already exists'
            ]);
        }
        $country = new Country();       
        $country->country_name = $request->country_name;
        $country->capital_name = $request->capital_name;
        $country->gender_name = $request->gender_name;
        $country->color_name = $request->color_name;
        $country->student_id = $request->student_id;
        $country->teacher_id = $request->teacher_id;
        $country->subject_id = $request->subject_id;
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Country_Image'),$imageName);
            $country->image = $imageName;
        }
        $country->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Country added successfully',
            'redirect_to' => route('record_country')
        ]);
    }
    // ====================== Table Show & Search & Pagination Country ====================== //
    public function Country_Search(Request $request) {
        $search = $request->input('search');
        $record_country = Country::where('country_name','like',"%{$search}%")
                                ->orWhere('capital_name','like',"%{$search}%")
                                ->orWhere('gender_name','like',"%{$search}%")
                                ->orWhere('color_name','like',"%{$search}%")
                                ->orWhere('subject_id','like',"%{$search}%")
                                ->paginate('4');
        return view('country.record_country',compact('record_country'));
    }
    // ========================= View Country =================================== //
    public function View_Country($id) {
        $view_country = Country::find($id);
        return view('country.view_country',compact('view_country'));
    }
    // ========================= Update Country Form ============================== //
    public function Update_Country($id) {
        $update_country = Country::find($id);
        $students = Student::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('country.update_country',compact('update_country','students','teachers','subjects'));
    }
    public function Update_Country_Post(Request $request,$id) {
        $request->validate([
            'country_name' => 'required',
            'capital_name' => 'required',
            'gender_name' => 'required',
            'color_name' => 'required',
            'student_id' => 'required',
            'teacher_id' => 'required',
            'subject_id' => 'required'
        ]);
        if(Country::where('country_name',$request->country_name)->where('id','!=',$id)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Name already exists'
            ]);
        }
        $Update_Country = Country::find($id);
        $Update_Country->country_name = $request->country_name;
        $Update_Country->capital_name = $request->capital_name;
        $Update_Country->gender_name = $request->gender_name;
        $Update_Country->color_name = $request->color_name;
        $Update_Country->student_id = $request->student_id;
        $Update_Country->teacher_id = $request->teacher_id;
        $Update_Country->subject_id = $request->subject_id;
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Country_Image'),$imageName);
            $Update_Country->image = $imageName;
        }
        $Update_Country->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Country updated successfully',
            'redirect_to' => route('record_country')
        ]);
    }
    // ======================= Delete Country =========================== //
    public function Delete_Country($id) {
        $country = Country::find($id);
        if(!$country) {
            return response()->json([
                'status' => 'error',
                'message' => 'Country deleting exists'
            ], 404);
        }
        $country->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Country deleted successfully'
        ]);
    }
    // =========================== Computer Form ========================= //
    public function Computer() {
        $students = Student::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $countries = Country::all();
        return view('computer.computer_form',compact('students','teachers','subjects','countries'));
    }
    public function Computer_Add(Request $request) {
        $request->validate([
            'computer_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'student_id' => 'required',
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'country_id' => 'required'
        ]);
        if(Computer::where('computer_name',$request->computer_name)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Name already exists'
            ]);
        }
        $computer = new Computer();
        $computer->computer_name = $request->computer_name;
        $computer->price = $request->price;
        $computer->description = $request->description;
        $computer->student_id = $request->student_id;
        $computer->teacher_id = $request->teacher_id;
        $computer->subject_id = $request->subject_id;
        $computer->country_id = $request->country_id;
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Computer_Image'),$imageName);
            $computer->image = $imageName;
        }
        $computer->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Computer added successfully',
            'redirect_to' => route('record_computer')
        ]);
    }
    // ======================= Table Show & Search & Pagination Computer ======================= //
    public function Computer_Search(Request $request) {
        $search = $request->input('search');
        $computers = Computer::where('computer_name','like',"%{$search}%")
                            ->orWhere('price','like',"%{$search}%")
                            ->orWhere('description','like',"%{$search}%")
                            ->orWhere('student_id','like',"%{$search}%")
                            ->orWhere('teacher_id','like',"%{$search}%")
                            ->orWhere('subject_id','like',"%{$search}%")
                            ->orWhere('country_id','like'."%{$search}%")->paginate('4');
        return view('computer.record_computer',compact('computers'));
    } 
    // ============================ View Computer =================================== //
    public function View_Computer($id) {
        $view_computer = Computer::find($id);
        return view('computer.view_computer',compact('view_computer'));
    }
    // ============================ Update Computer Form ========================== //
    public function Update_Computer($id) {
        $students = Student::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        $countries = Country::all();
        $update_computer = Computer::find($id);
        return view('computer.update_computer',compact('update_computer','students','teachers','subjects','countries'));
    }
    public function Update_Computer_Post(Request $request,$id) {
        $request->validate([
            'computer_name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'student_id' => 'required',
            'teacher_id' => 'required',
            'subject_id' => 'required',
            'country_id' => 'required'
        ]);
        if(Computer::where('computer_name',$request->computer_name)->where('id','!=',$id)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Name already exists'
            ]);
        }
        $update_computer_post = Computer::find($id);
        $update_computer_post->computer_name = $request->computer_name;
        $update_computer_post->price = $request->price;
        $update_computer_post->description = $request->description;
        $update_computer_post->student_id = $request->student_id;
        $update_computer_post->teacher_id = $request->teacher_id;
        $update_computer_post->subject_id = $request->subject_id;
        $update_computer_post->country_id = $request->country_id;
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Computer_Image'),$imageName);
            $update_computer_post->image = $imageName;
        }
        $update_computer_post->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Computer updated successfully',
            'redirect_to' => route('record_computer')
        ]);
    }
    // ========================== Delete Computer ============================= //
    public function Delete_Computer($id) {
        $deleteComputer = Computer::find($id);
        if(!$deleteComputer) {
            return response()->json([
                'status' => 'error',
                'message' => 'Computer not found'
            ],404);
        }
        $deleteComputer->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Computer deleted successfully'
        ]);
    }
    // ========================= Question Form ======================= //
    public function Question() {
        return view('Question_Answer.question');
    }
    public function Add_Question(Request $request) {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);
        if(SimpleQuestion::where('answer',$request->answer)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Name already exists'
            ]);
        } 
        $question_simple = new SimpleQuestion();
        $question_simple->user_id = session('login_id');
        $question_simple->question = $request->question;
        $question_simple->answer = $request->answer;
        $question_simple->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Question added successfully',
            'redirect_to' => route('record_question')
        ]);
    }
    // ======================== Table Show & Search & Pagination Question ============================= //
    public function Question_Search(Request $request) {
        $search = $request->input('search');
        $questions = SimpleQuestion::where('question','like',"%{$search}%")
                                    ->orWhere('answer','like',"%{$search}%")->paginate('6');
        return view('Question_Answer.record_question',compact('questions'));
    }
    // ============================= Update Question Form ========================= //
    public function Update_Question($id) {
       $update_question = SimpleQuestion::find($id);
       return view('Question_Answer.update_question',compact('update_question'));
    }
    public function Update_Question_Post(Request $request,$id) {
        $request->validate([
            'question' => 'required',
            'answer' => 'required'
        ]);
        $update_question_post = SimpleQuestion::find($id);
        $update_question_post->question = $request->question;
        $update_question_post->answer = $request->answer;
        $update_question_post->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Question updated successfully',
            'redirect_to' => route('record_question')
        ]);
    }
    // ============================ Delete Question ============================= //
    public function Delete_Question($id) {
        $deleteQuestion = SimpleQuestion::find($id);
        if(!$deleteQuestion) {
            return response()->json([
                'status' => 'error',
                'message' => 'Question not found'
            ],404);
        }
        $deleteQuestion->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Question deleted successfully'
        ]);
    }
    // ============================= Quiz MCQ'S ======================================= //
    public function MCQ() {
        return view('Quiz.create');
    }
    // ============================ Store New Quiz MCQ'S =============================== //
    public function store(Request $request) {
        $request->validate([
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'correct_option' => 'required'
        ]);
        if(Mcq::where('question',$request->question)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Name already exists'
            ]);
        }
        $mcq_quiz = new Mcq();
        $mcq_quiz->question = $request->question;
        $mcq_quiz->option1 = $request->option1;
        $mcq_quiz->option2 = $request->option2;
        $mcq_quiz->option3 = $request->option3;
        $mcq_quiz->option4 = $request->option4;
        $mcq_quiz->correct_option = $request->correct_option;
        $mcq_quiz->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Quiz added successfully',
            'redirect_to' => route('record_quiz')
        ]);
    }
    // ============================== Quiz MCQ'S =================================== //
    public function Quiz() {
        $mcqs = Mcq::all();
        return view('Quiz.quiz',compact('mcqs'));
    }
    // =========================== Table & Search & Pagination Quiz MCQ'S ==================================== //
    public function Search_Quiz(Request $request) {
        $search = $request->input('search');
        $questions = Mcq::where('option1','like',"%{$search}%")
                        ->orWhere('option2','like',"%{$search}%")
                        ->orWhere('option3','like',"%{$search}%")
                        ->orWhere('option4','like',"%{$search}%")->paginate('6');
        return view('Quiz.record_quiz',compact('questions'));
    }
    // =========================== View Quiz MCQ'S ============================ //
    public function View_Quiz($id) {
        $view_quiz = Mcq::find($id);
        return view('Quiz.view_quiz',compact('view_quiz'));
    }
    // ========================== Update Quiz MCQ'S =========================== //
    public function Update_Quiz($id) {
        $update_quiz = Mcq::find($id);
        return view('Quiz.update_quiz',compact('update_quiz'));
    }
    public function Update_Quiz_Post(Request $request,$id) {
        $request->validate([
            'question' => 'required',
            'option1' => 'required',
            'option2' => 'required',
            'option3' => 'required',
            'option4' => 'required',
            'correct_option' => 'required'
        ]);
        if(Mcq::where('question',$request->question)->where('id','!=',$id)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Name already exists'
            ]);
        }
        $update_quiz_post = Mcq::find($id);
        $update_quiz_post->question = $request->question;
        $update_quiz_post->option1 = $request->option1;
        $update_quiz_post->option2 = $request->option2;
        $update_quiz_post->option3 = $request->option3;
        $update_quiz_post->option4 = $request->option4;
        $update_quiz_post->correct_option = $request->correct_option;
        $update_quiz_post->save();
        return response()->json([
            'status' => 'success',
            'message' => 'Quiz updated successfully',
            'redirect_to' => route('record_quiz')
        ]);
    }
    // ========================== Delete Quiz MCQ'S =========================== //
    public function Delete_Quiz($id) {
        $DeleteQuiz = Mcq::findOrFail($id);
        if(!$DeleteQuiz) {
            $DeleteQuiz->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Quiz deleted successfully'
            ]);
        }
        else {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete not found'
            ]);
        }
    }
    // ============================ Calculator ================================== //
    public function Calculator() {
        return view('calculator.calculator');
    }
    public function Calculator_Post(Request $request) {
        $request->validate([
            'expression' => 'required',
            'result' => 'required'
        ]);
        Calculator::create([
            'expression' => $request->expression,
            'result' => $request->result
        ]);
        return back();
    }
    // ============================ Show History ================================ //
    public function History_Calculator() {
        $history = Calculator::latest()->take(10)->get();
        return view('calculator.history_calc',compact('history'));
    }
    // ============================ Calendar ===================================== //
    public function Calendar() {
        return view('calendar.calendar');
    }
    // ============================ Alphabet =================================== //
    public function index() {
        $alphabets = Alphabet::orderBy('letter', 'asc')->get();
        return view('alphabet.alphabet', compact('alphabets'));
    }
    public function Store_Alphabet(Request $request) {
        $request->validate([
            'letter' => 'required|string|max:50',
            'emoji'  => 'required|string', // emoji input
        ]);
        if(Alphabet::where('letter',$request->letter)->exists()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Name already exists'
            ]);
        }
        Alphabet::create([
            'letter' => ucfirst($request->letter), // full word, capitalize first letter
            'emoji'  => $request->emoji,
            'color'  => $request->color,
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Added successfully',
            'redirect_to' => route('record_alphabet')
        ]);
    }
    // ============================= Record Alphabet ================================= //
    public function Record_Alphabet() {
        $alphabets = Alphabet::orderBy('letter', 'asc')->get();
        return view('alphabet.record_alphabet',compact('alphabets'));
    }
    // ============================= Delete Alphabet ================================= //
    public function Delete_Alphabet($id) {
        $DeleteAlphabet = Alphabet::findOrFail($id);
        if($DeleteAlphabet) {
            $DeleteAlphabet->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Alphabet deleted successfully'
            ]);
        }
        else {
            return response()->json([
                'status' => 'error',
                'message' => 'Delete not found'
            ]);
        }
    }
    // ============================ Register Form ================================ //
    public function Register() {
        return view('auth.register');
    }
    public function Register_Input(Request $request) {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:12|confirmed'
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Register_Image'),$imageName);
            $user->image = $imageName;
        }
        $user->save();
        return redirect()->route('login');
    }
    // =========================== Login Form ============================== //
    public function LoginInput() {
        return view('auth.login');
    }
    public function Login_Input(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user) {
            if(Hash::check($request->password,$user->password)) {
                $request->session()->put('login_id',$user->id);
            //    return redirect()->route('record_student');
                if($user->role === 'admin') {
                    return redirect()->route('record_student');
                }
                else {
                    return redirect()->route('post');
                }
            }
            else {
                return back()->with('fail','Password not matched');
            }
        }
        else {
            return back()->with('fail','This email is not registered');
        }
    }
    // ========================= Logout ================================= //
    public function Logout(Request $request) {
        $request->session()->forget('login_id');
        return redirect()->route('login');
    }
    // ========================== Forget Password Form ==================== //
    public function Forget_Password() {
        return view('auth.forget_password');
    }
    public function Forget_Password_Post(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);
        $user = User::where('email',$request->email)->first();
        $token = Str::random(60);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => now(),
        ]);
        return redirect()->route('reset_password',$user->id);
    }
    // ======================= Reset Password Form ========================= //
    public function Reset_Password($id) {
        $user = User::find($id);
        return view('auth.reset_password',compact('user'));
    }
    public function Reset_Password_Post(Request $request,$id) {
        $request->validate([
            'password' => 'required|min:5|max:12|confirmed'
        ]);
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login')->with('success','Password reset successfully!');
    }
    // =========================== User ============================= //
    public function User() {
        return view('user.partials.navbar');
    }
    // ======================= Post Form ============================ //
    public function Post() {
        $posts = Post::with('user','comments.user','likes')->latest()->get();
        $postUser = User::find(session('login_id'));
        return view('user.partials.post.post',compact('posts','postUser'));
    }
    public function Post_Add(Request $request) {
        $post = new Post();
        $post->user_id = session('login_id');
        if($request->hasfile('image')) {
            $image = $request->file('image');
            $imageName = time().".".$image->getClientOriginalExtension();
            $image->move(public_path('Post_Image'),$imageName);
            $post->image = $imageName;
        }
        $post->description = $request->description;
        $post->save();
        return back();
    }
    // ========================== Post Delete ================================ //
    public function Post_Delete($id) {
        $post = Post::find($id);
        if(!$post) {
            return back()->with('fail','Post not found');
        }    
        elseif($post->image && file_exists(public_path('/Post_Image/'.$post->image))) {
            unlink(public_path('/Post_Image/'.$post->image));
        }
        $post->delete();
        return back()->with('success','Post deleted successfully');
    }
    // ========================= Post Like ================================== //
    public function Post_like($id) {
        $post = Post::findOrFail($id);
        $userId = session('login_id'); // get logged-in user
        if (!$userId) {
            return back()->with('fail', 'You must be logged in to like a post.');
        }
        // Check if the user already liked this post
        $existingLike = $post->likes()->where('user_id', $userId)->first();
        if ($existingLike) {
            // User already liked -> unlike
            $existingLike->delete();
        } 
        else {
            // Add a new like
            $post->likes()->create([
                'user_id' => $userId
            ]);
        }
        return back();
    }
    // ====================== Post Comment ========================= //
    public function Post_Comment(Request $request,$id) {
        $request->validate([
        'comment' => 'required|string|max:500',
    ]);
    Comment::create([
        'post_id' => $id,
        'user_id' => session('login_id'),
        'comment' => $request->comment,
    ]);
        return back();
    }   
    // ======================== Comment Delete ======================== //
    public function Comment_Delete($id) {
        $comment = Comment::find($id);
        if($comment) {
            $comment->delete();
            return back()->with('success','Comment deleted successfully');
        }
        else {
            return back()->with('fail','Comment not found');  
        }  
    }
    // ========================= Comment Like =========================== //
    public function Comment_Like($id) {
        $userId = session('login_id');
        $like = CommentLike::where('comment_id',$id)
                            ->where('user_id',$userId)
                            ->first();
        if($like) {
            $like->delete();
        }
        else {
            CommentLike::create([
                'comment_id' => $id,
                'user_id' => $userId
            ]);
        }
        return back();
    }
    // ========================= Profile =========================== //
    public function Profile($id) {
        $userID = $id ? User::find($id) : User::find(session('login_id'));
        if (!$userID) {
            abort(404);
        }
        return view('profile.profile', compact('userID'));
    }
}
