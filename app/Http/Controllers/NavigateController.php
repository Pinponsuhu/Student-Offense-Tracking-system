<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentOffense;
use App\Models\StudentOffenseFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NavigateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        if(auth()->user()->is_admin == true){
            return redirect('/dashboard');
        }
        return view('profile');
    }

    public function report(){
        if(auth()->user()->is_admin == false){
            abort(404);
        }
        return view('report');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }

    public function see_student(){
        return view('student');
    }

    public function all_admin(){
        if(auth()->user()->is_admin == false){
            abort(404);
        }
        $admins = User::where('is_admin',true)->get();
        return view('all-admin',['admins'=>$admins]);
    }

    public function add_admin(Request $request){
        $request->validate([
            'profile' => 'required|mimes:png,jpg,jpeg',
            'admin_id' => 'required|unique:users,id_number',
            'full_name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone|numeric|digits:11',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'password' => 'required|confirmed',
        ]);

        $student = new User;
        $dest = 'public/marshal';
        $path = $request->file('profile')->store($dest);
        $student->id_number = $request->admin_id;
        $student->full_name = $request->full_name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->d_o_b = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->is_admin = true;
        $student->password = Hash::make($request->password);
        $student->profile = str_replace('public/marshal/','',$path);
        $student->save();

        return redirect('/all/admin');
    }

    public function file_offense(){
        return view('file-offense');
    }
    public function dashboard(){
        if(auth()->user()->is_admin == false){
            abort(404);
        }
        $marshal = User::where('is_admin',false)->count();
        $student = Student::count();
        return view('dashboard',['marshal'=> $marshal,'student' => $student]);
    }

    public function all_student(){
        if(auth()->user()->is_admin == false){
            abort(404);
        }
        $students = Student::get();
        return view('all-student',['students' => $students]);
    }

    public function all_marshal(){
        if(auth()->user()->is_admin == false){
            abort(404);
        }
        $marshal = User::where('is_admin',false)->get();
        return view('all-marshal',['marshals' => $marshal]);
    }

    public function add_marshal(Request $request){
        $request->validate([
            'profile' => 'required|mimes:png,jpg,jpeg',
            'marshal_id' => 'required|unique:users,id_number',
            'full_name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone|numeric|digits:11',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'password' => 'required|confirmed',
        ]);

        $student = new User;
        $dest = 'public/marshal';
        $path = $request->file('profile')->store($dest);
        $student->id_number = $request->marshal_id;
        $student->full_name = $request->full_name;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->d_o_b = $request->date_of_birth;
        $student->gender = $request->gender;
        $student->is_admin = false;
        $student->password = Hash::make($request->password);
        $student->profile = str_replace('public/marshal/','',$path);
        $student->save();

        return redirect('/all/marshal');
    }

    public function generate_report(Request $request){
        $request->validate([
            'from' => 'required|date',
            'to' => 'required|date'
        ]);

        $offenses = StudentOffense::whereBetween('created_at',[$request->from,$request->to])->orWhereBetween('created_at',[$request->to,$request->from])->get();

        return view('repors',['offenses' => $offenses]);

    }
    public function store_student(Request $request){
        $request->validate([
            'profile_picture' => 'required|mimes:png,jpg,jpeg',
            'matric_no' => 'required|unique:students,matric_number',
            'full_name' => 'required',
            'email' => 'required|unique:students,email',
            'phone' => 'required|unique:students,phone|numeric|digits:11',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'faculty' => 'required',
            'department' => 'required',
        ]);

  $student = new Student;
  $dest = 'public/students';
  $path = $request->file('profile_picture')->store($dest);
  $student->matric_number = $request->matric_no;
  $student->full_name = $request->full_name;
  $student->phone = $request->phone;
  $student->email = $request->email;
  $student->date_of_birth = $request->date_of_birth;
  $student->gender = $request->gender;
  $student->faculty = $request->faculty;
  $student->department = $request->department;
  $student->profile_picture = str_replace('public/students/','',$path);
  $student->save();

  return redirect('/all/students');
        // dd($request->all());
    }

    public function search_student(Request $request){
        $student = Student::where('matric_number',$request->matric_no)->first();

        return view('file-offense',['student' => $student]);
    }

    public function add_offense(Request $request){
        $request->validate([
            'remark' => 'required',
            'files' => 'required',
            'files.*' => 'required|mimes:png,jpg,jpeg,mp4,mp3,mkv,pdf,gif'
        ]);
        // dd($request->all());
        $offense = new StudentOffense;
        $offense->remark = $request->remark;
        $offense->student_id = $request->student_id;
        $offense->reported_by = auth()->user()->full_name;
        $offense->save();

        $files = $request->file('files');
        foreach($files as $file){
            $offenseFile = new StudentOffenseFile;
        $dest = 'public/offense';
            $path = $file->store($dest);
            $offenseFile->offense_id = $offense->id;
            $offenseFile->file_name = str_replace('public/offense/','',$path);
            $offenseFile->save();
        }
        return back();
    }

    public function marshal_details($id){
        $genders = array("male","female");
        $marshal = User::where('is_admin',false)->where('id',$id)->first();
        if($marshal == null){
            abort(404);
        }
        return view('marshal-details',['marshal' => $marshal,'genders' => $genders]);
    }

    public function admin_details($id){
        $genders = array("male","female");
        $admin = User::where('is_admin',true)->where('id',$id)->first();
        if($admin == null){
            abort(404);
        }
        return view('admin-details',['admin' => $admin,'genders' => $genders]);
    }

    public function student_details($id){
        $genders = array("male","female");
        $student = Student::where('id',$id)->first();
        if($student == null){
            abort(404);
        }
        return view('student-details',['student' => $student,'genders' => $genders]);
    }

    public function update_student(Request $request){
        $request->validate([
            'matric_number' => 'required',
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric|digits:11',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'faculty' => 'required',
            'department' => 'required',
        ]);
        $student = Student::find($request->id);

        $student->matric_number = $request->matric_number;
  $student->full_name = $request->full_name;
  $student->phone = $request->phone;
  $student->email = $request->email;
  $student->date_of_birth = $request->date_of_birth;
  $student->gender = $request->gender;
  $student->faculty = $request->faculty;
  $student->department = $request->department;

  $student->save();

  return back();
    }

    public function change_marshall_picture(Request $request){
        $request->validate([
            'image' => 'required|mimes:jpg,png,jpeg'
        ]);
        $dest = 'public/marshal';
        $path = $request->file('image')->store($dest);
        $marshal = User::find($request->id);
        $marshal->profile =  str_replace('public/marshal/','',$path);
        $marshal->save();

        return back();
    }

    public function update_marshal(Request $request){
        $request->validate([
            'marshal_id' => 'required',
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric|digits:11',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
        ]);
        $marshal = User::find($request->id);
        $marshal->id_number = $request->marshal_id;
        $marshal->full_name = $request->full_name;
        $marshal->phone = $request->phone;
        $marshal->email = $request->email;
        $marshal->d_o_b = $request->date_of_birth;
        $marshal->gender = $request->gender;
        $marshal->save();

        return back();
    }
    public function update_admin(Request $request){
        $request->validate([
            'admin_id' => 'required',
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric|digits:11',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
        ]);
        $marshal = User::find($request->id);
        $marshal->id_number = $request->admin_id;
        $marshal->full_name = $request->full_name;
        $marshal->phone = $request->phone;
        $marshal->email = $request->email;
        $marshal->d_o_b = $request->date_of_birth;
        $marshal->gender = $request->gender;
        $marshal->save();

        return back();
    }

    public function delete_marshal($id){
        $marshal = User::find($id);
        $marshal->delete();
        return redirect('/all/marshal');
    }

    public function delete_admin($id){
        $marshal = User::find($id);
        $marshal->delete();
        return redirect('/all/admin');
    }
    public function delete_student($id){
        $marshal = Student::find($id);
        $marshal->delete();
        return redirect('/all/students');
    }

    public function marshal_password($id){
            $marshal = User::find($id);
            $marshal->password = Hash::make('password_marshal');
            $marshal->save();

            return back()->with('msg','New Password is "password_marshal"');
    }
    public function admin_password($id){
            $marshal = User::find($id);
            $marshal->password = Hash::make('password_admin');
            $marshal->save();

            return back()->with('msg','New Password is "password_admin"');
    }

    public function search_student_all(Request $request){
        $request->validate([
            'search' => 'required'
        ]);

        $students = Student::where('matric_number',$request->search)->orWhere('phone',$request->search)->orWhere('email',$request->search)->orWhere('phone',$request->search)->get();
        $count = Student::where('matric_number',$request->search)->orWhere('phone',$request->search)->orWhere('email',$request->search)->orWhere('phone',$request->search)->count();
        return view('all-student-search',['students'=> $students, 'search'=>$request->search,'count'=>$count]);
    }
    public function search_marshal_all(Request $request){
        $request->validate([
            'search' => 'required'
        ]);

        $marshals = User::where('id_number',$request->search)->orWhere('phone',$request->search)->orWhere('email',$request->search)->orWhere('phone',$request->search)->get();
        $marshals_c = User::where('id_number',$request->search)->orWhere('phone',$request->search)->orWhere('email',$request->search)->orWhere('phone',$request->search)->count();
        return view('all-marshal-search',['marshals'=> $marshals,'count'=>$marshals_c, 'search'=>$request->search]);
    }
}
