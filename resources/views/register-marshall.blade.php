@extends('layouts.app')
@section('content')
    <main class="bg-white py-4 h-screen overflow-y-scroll">
        <h1 class="text-2xl capitalize font-bold mb-3 mt-20 ml-5">Add new marshal</h1>
        <form action="w-80 mx-auto md:w-10/12 px-8 rounded-md shadow-md md:grid md:grid-cols-2 md:gap-x-6" class="" method="post">
            @csrf
            <div class="my-3">
                <label class="font-bold block mb-1">Profile Picture</label>
                <input type="file"  name="email" class="block outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
            </div>
            <div class="my-3">
                <label class="font-bold block mb-1">Staff ID</label>
                <input type="text" placeholder="Enter Staff ID" name="staff_id" class="block outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
            </div>
            <div class="my-3">
                <label class="font-bold block mb-1">Fullname</label>
                <input type="text" placeholder="Enter Fullname" name="full_name" class="block outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
            </div>
            <div class="my-3">
                <label class="font-bold block mb-1">Phone Number</label>
                <input type="text" placeholder="Enter Phone Number" name="phone" class="block outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
            </div>
            <div class="my-3">
                <label class="font-bold block mb-1">Date of Birth</label>
                <input type="date" name="date_of_birth" class="block outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
            </div>
            <div class="my-3">
                <label class="font-bold block mb-1">Preferred Password</label>
                <input type="password" placeholder="Enter Password" name="password" class="block outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
            </div>
            <div class="my-3">
                <label class="font-bold block mb-1">Confirm Password</label>
                <input type="password" placeholder="Repeat Password" name="password_confirmation" class="block outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
            </div>
        </form>
    </main>
@endsection
