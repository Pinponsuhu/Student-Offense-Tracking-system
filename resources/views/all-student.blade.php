@extends('layouts.app')
@section('content')
    <main class="w-full mt-24">
    <div class="px-8 flex justify-between items-center my-4">
        <h1 class="font-bold ml-6 text-2xl text-gray-600">All Students</h1>
        <span onclick="addstudent()" class="cursor-pointer bg-yellow-500 text-white font-bold py-2.5 px-5 rounded-sm">Add Student</span>
    </div>
    {{-- <div>
        <form action="" method="get">
            @csrf
            <input type="search" name="search" class="w-7/12 px-2 rounded-sm block mx-auto placeholder-white py-3 bg-yellow-500 text-white" placeholder="Search by Name or Student ID" id="">
        </form> --}}
    </div>
    <div class="w-full overflow-x-scroll px-10 mt-4">
        <table class="w-full">
            <thead>
                <tr>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-100 text-md text-gray-800">Full name</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-200 text-md text-gray-800">Matric Number</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-100 text-md text-gray-800">Email Address</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-200 text-md text-gray-800">Phone Number</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-100 text-md text-gray-800">Faculty</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-200 text-md text-gray-800">Department</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-100 text-md text-gray-800">Date of Birth</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-100 text-md text-gray-800">{{ $student->full_name }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-200 text-md text-gray-800">{{ $student->matric_number }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-100 text-md text-gray-800">{{ $student->email }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-200 text-md text-gray-800">{{ $student->phone }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-100 text-md text-gray-800">{{ $student->faculty }}
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-200 text-md text-gray-800">{{ $student->department }}
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-100 text-md text-gray-800">{{ $student->date_of_birth }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-yellow-200 text-md text-gray-800"><a href="/student/details/{{ $student->id }}" class="py-2 px-5 bg-yellow-500 font-bold text-white">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </main>
    <div id="student-form" class="fixed top-0 left-0 bg-gray-800 hidden bg-opacity-80 w-screen h-screen">
        <div class="flex px-7 justify-end my-3">
            <i onclick="clsAddStudent()" class="cursor-pointer fa fa-times block text-right fa-2x text-white"></i>

        </div>
            <form action="/add/students" enctype="multipart/form-data" class="w-7/12 mx-auto grid grid-cols-2 h-full overflow-y-scroll gap-x-7 bg-white py-10 px-10 rounded-md" method="post">
                @csrf
                <div class="my-2">
                    <label for="profile_picture" class="font-bold block mb-1">Passport</label>
                    <input type="file" name="profile_picture" id="profile_picture" class="w-full py-3 px-1.5 shadow-md bg-white border-l-4 border-yellow-500">
                    @error('profile_picture')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="student_id" class="font-bold block mb-1">Matric Number</label>
                    <input type="text" value="{{ old('matric_no') }}" placeholder="Enter Matric Number" name="matric_no" id="matric_no" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('matric_no')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="full_name" class="font-bold block mb-1">Fullname</label>
                    <input type="text" value="{{ old('full_name') }}" placeholder="Enter Fullname" name="full_name" id="full_name" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('full_name')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="phone" class="font-bold block mb-1">Phone Number</label>
                    <input type="text" value="{{ old('phone') }}" placeholder="Enter Phone Number" name="phone" id="phone" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('phone')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="email" class="font-bold block mb-1">Email Address</label>
                    <input type="email" value="{{ old('email') }}" placeholder="Enter Email Address" name="email" id="email" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('email')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="date_of_birth" class="font-bold block mb-1">Date of Birth</label>
                    <input type="date" value="{{ old('date_of_birth') }}"  name="date_of_birth" id="date_of_birth" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('date_of_birth')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="gender" class="font-bold block mb-1">Gender</label>
                    <select name="gender" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500" id="gender">
                        <option value="" disabled selected>-- Select Gender --</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                    @error('gender')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="faculty" class="font-bold block mb-1">Faculty</label>
                    <input type="text" value="{{ old('faculty') }}" placeholder="Enter Faculty" name="faculty" id="faculty" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('faculty')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="department" class="font-bold block mb-1">Department</label>
                    <input type="text" value="{{ old('department') }}" placeholder="Enter Department" name="department" id="department" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('department')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button class="col-span-2 mb-16 w-28 text-center block mt-3 py-3 font-bold bg-yellow-500 text-yellow-50">Submit</button>
            </form>

    </div>

    <script>
        function addstudent(){
            document.getElementById('student-form').classList.remove('hidden');
        }
        function clsAddStudent(){
            document.getElementById('student-form').classList.add('hidden');
        }
    </script>
@endsection
