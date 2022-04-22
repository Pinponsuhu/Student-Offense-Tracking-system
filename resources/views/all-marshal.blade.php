@extends('layouts.app')
@section('content')
    <main class="w-full mt-24">
    <div class="px-8 flex justify-between items-center my-4">
        <h1 class="font-bold ml-6 text-2xl text-gray-600">All marshals</h1>
        <span onclick="addmarshal()" class="cursor-pointer bg-green-500 text-white font-bold py-2.5 px-5 rounded-sm">Add marshal</span>
    </div>
    {{-- <div>
        <form action="" method="get">
            @csrf
            <input type="search" name="search" class="w-7/12 px-2 rounded-sm block mx-auto placeholder-white py-3 bg-yellow-500 text-white" placeholder="Search by Name or marshal ID" id="">
        </form> --}}
    </div>
    <div class="w-full overflow-x-scroll px-10 mt-4">
        <table class="w-full">
            <thead>
                <tr>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-100 text-md text-gray-800">Full name</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-200 text-md text-gray-800">ID Number</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-100 text-md text-gray-800">Email Address</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-200 text-md text-gray-800">Phone Number</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-100 text-md text-gray-800">Gender</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-200 text-md text-gray-800">Date of Birth</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($marshals as $marshal)
                <tr>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-100 text-md text-gray-800">{{ $marshal->full_name }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-200 text-md text-gray-800">{{ $marshal->id_number }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-100 text-md text-gray-800">{{ $marshal->email }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-200 text-md text-gray-800">{{ $marshal->phone }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-100 text-md text-gray-800">{{ $marshal->gender }}
                    <td class="py-3 uppercase font-bold pl-3 bg-green-100 text-md text-gray-800">{{ $marshal->d_o_b }}</td>
                    <td class="py-3 uppercase font-bold pl-3 bg-green-200 text-md text-gray-800"><a href="/marshal/details/{{ $marshal->id }}" class="py-2 px-5 bg-green-500 font-bold text-white">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </main>
    <div id="marshal-form" class="fixed top-0 left-0 bg-gray-800 hidden bg-opacity-80 w-screen h-screen">
        <div class="flex px-7 justify-end my-3">
            <i onclick="clsAddmarshal()" class="cursor-pointer fa fa-times block text-right fa-2x text-white"></i>

        </div>
            <form action="/add/marshal" enctype="multipart/form-data" class="w-7/12 mx-auto grid grid-cols-2 h-full overflow-y-scroll gap-x-7 bg-white py-10 px-10 rounded-md" method="post">
                @csrf
                <div class="my-2">
                    <label for="profile_picture" class="font-bold block mb-1">Passport</label>
                    <input type="file" name="profile" id="profile" class="w-full py-3 px-1.5 shadow-md bg-white border-l-4 border-yellow-500">
                    @error('profile')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="marshal_id" class="font-bold block mb-1">Marshal ID</label>
                    <input type="text" value="{{ old('marshal_id') }}" placeholder="Enter Marshal ID Number" name="marshal_id" id="marshal_id" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('marshal_id')
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
                    <label for="faculty" class="font-bold block mb-1">Password</label>
                    <input type="password" value="{{ old('password') }}" placeholder="Enter Password" name="password" id="password" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('password')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="department" class="font-bold block mb-1">Confirm Password</label>
                    <input type="password" placeholder="Repeat Password" name="password_confirmation" id="department" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('password_confirmation')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button class="col-span-2 mb-16 w-28 text-center block mt-3 py-3 font-bold bg-yellow-500 text-yellow-50">Submit</button>
            </form>

    </div>

    <script>
        function addmarshal(){
            document.getElementById('marshal-form').classList.remove('hidden');
        }
        function clsAddmarshal(){
            document.getElementById('marshal-form').classList.add('hidden');
        }
    </script>
@endsection
