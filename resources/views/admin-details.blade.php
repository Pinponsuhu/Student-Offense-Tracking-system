@extends('layouts.app')
@section('content')
        <div class="mx-auto md:w-5/6 rounded-md shadow-md mt-16 md:mt-24 bg-white py-4">
            <div class="flex flex-col gap-y-4 mb-3 md:flex-row justify-between items-center md:px-8 mt-4">
            <h1 class="text-2xl font-bold">Admin Details</h1>
            <div class="flex gap-x-3 items-center">
            <span onclick="openEdit()" class="py-2.5 cursor-pointer px-5 bg-green-400 rounded-md text-white font-bold">Edit</span>
            <a href="/admin/delete/{{ $admin->id }}" class="py-2.5 px-4 bg-red-400 rounded-md text-white font-bold">Delete</a>
            <form action="/admin/password/{{ $admin->id }}" method="post">
                @csrf
                <button class="py-2.5 px-6 bg-yellow-400 rounded-md text-white font-bold">Reset Password</button>
            </form>
        </div>
            </div>

        <div>
            <img src="{{ asset('/storage/marshal/' . $admin->profile) }}" class="bloock mx-auto w-60 h-60 rounded-full shadow-md" alt="">
            <form action="/admin/picture/{{ $admin->id }}" enctype="multipart/form-data" class="flex justify-center mt-4" method="POST" >
                @csrf
                <label for="image" class="bg-blue-400 text-white font-bold py-2.5 text-center rounded-md gap-x-4 px-7 mx-auto "><i class="fa fa-image"></i>Change Image</label>
                <input type="file" onchange="this.form.submit()" name="image" id="image" hidden class="hidden">
            </form>
        </div>
        <div class="grid grid-cols-2 md:w-4/6 mx-auto gap-x-1 md:gap-x-4 items-center justify-center">
            <p class="my-2 md:text-lg"><b>Full name: <br class="md:hidden"></b> {{ $admin->full_name }}</p>
            <p class="my-2 md:text-lg"><b>ID Number: <br class="md:hidden"></b> {{ $admin->id_number }}</p>
            <p class="my-2 md:text-lg"><b>Phone Number: <br class="md:hidden"></b> {{ $admin->phone }}</p>
            <p class="my-2 md:text-lg"><b>Email Address: <br class="md:hidden"></b> {{ $admin->email }}</p>
            <p class="my-2 md:text-lg"><b>Date Of Birth: <br class="md:hidden"></b> {{ $admin->d_o_b }}</p>
            <p class="my-2 md:text-lg capitalize"><b>Gender: <br class="md:hidden"></b> {{ $admin->gender }}</p>
        </div>
        </div>
        <div id="edit" class="fixed top-0 hidden w-screen h-screen bg-yellow-900 bg-opacity-80">
            <form action="/admin/update/{{ $admin->id }}" class="md:mt-14 md:grid md:grid-cols-2 md:gap-x-4 md:w-4/6 p-8 mx-auto md:rounded-md bg-white h-full md:h-auto overflow-y-scroll" method="post">
                @csrf
                <div class="flex justify-between md:col-span-2 items-center">
                    <h1 class="text-2xl font-bold">Edit admin Details</h1>
                    <i class="fa fa-times cursor-pointer text-yellow-900 fa-2x" onclick="clsEdit()"></i>
                </div>
                <div class="my-2">
                    <label for="admin_id" class="font-bold block mb-1">Admin ID</label>
                    <input type="text" value="{{ $admin->id_number }}" placeholder="Enter admin ID Number" name="admin_id" id="admin_id" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('admin_id')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="full_name" class="font-bold block mb-1">Fullname</label>
                    <input type="text" value="{{ $admin->full_name }}" placeholder="Enter Fullname" name="full_name" id="full_name" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('full_name')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="phone" class="font-bold block mb-1">Phone Number</label>
                    <input type="text" value="{{ $admin->phone }}" placeholder="Enter Phone Number" name="phone" id="phone" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('phone')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="email" class="font-bold block mb-1">Email Address</label>
                    <input type="email" value="{{ $admin->email }}" placeholder="Enter Email Address" name="email" id="email" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('email')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="date_of_birth" class="font-bold block mb-1">Date of Birth</label>
                    <input type="date" value="{{ $admin->d_o_b }}"  name="date_of_birth" id="date_of_birth" class="shadow-md w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500">
                    @error('date_of_birth')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="my-2">
                    <label for="gender" class="font-bold block mb-1">Gender</label>
                    <select name="gender" class="shadow-md capitalize w-full py-3 px-1.5 bg-white border-l-4 border-yellow-500" id="gender">
                        <option value="{{ $admin->gender }}" selected>{{$admin->gender}}</option>
                        @foreach ($genders as $gender)
                            @if ($gender != $admin->gender)
                                <option value="{{ $gender }}">{{ $gender }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('gender')
                        <p class="text-sm my-1 text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button class="md:col-span-2 w-28 text-center block mt-3 py-3 font-bold bg-yellow-500 text-yellow-50">Submit</button>
            </form>
        </div>
        @if (Session('msg'))
            <div id="msg"  class="py-3 px-4 fixed top-10 right-4 bg-green-400 w-72 md:w-4/6 rounded-md shadow-md">
                <p class="text-lg text-white font-medium text-center">{{ Session('msg') }}</p>
            </div>
        @endif

        <script>
                setTimeout(() => {
                    document.getElementById('msg').classList.add('hidden');
                }, 1500);
            function openEdit(){
                document.getElementById('edit').classList.remove('hidden')
            }
            function clsEdit(){
                document.getElementById('edit').classList.add('hidden')
            }
        </script>
@endsection
