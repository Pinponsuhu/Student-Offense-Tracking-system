@extends('layouts.app')
@section('content')
    <main class="mt-32 px-10 md:px-24 justify-center md:flex items-center md:gap-x-28">
        <img src="{{ asset('img/56388358.jpg') }}" class="block h-48 md:h-72 w-48 md:w-72 mx-auto md:mx-0 rounded-full shadow-md" alt="">
        <div class="bg-white md:grid md:grid-cols-2 md:items-center md:gap-x-4 md:bg-yellow-50 p-4 mt-3 shadow-md md:shadow-none rounded-md md:rounded-none">
            <h1 class="font-bold md:col-span-2 text-2xl mb-2">Profile Details</h1>
            <div class="py-1.5 border-b-2 border-b-0 border-gray-100">
                <h1 class="text-gray-400 font-bold ">Fullname</h1>
                <p class="text-xl font-medium">{{ auth()->user()->full_name }}</p>
            </div>
            <div class="py-1.5 border-b-2 border-b-0 border-gray-100">
                <h1 class="text-gray-400 font-bold ">ID Number</h1>
                <p class="text-xl font-medium">{{ auth()->user()->id_number }}</p>
            </div>
            <div class="py-1.5 border-b-2 border-b-0 border-gray-100">
                <h1 class="text-gray-400 font-bold ">Gender</h1>
                <p class="text-xl font-medium">{{ auth()->user()->gender }}</p>
            </div>
            <div class="py-1.5 border-b-2 border-b-0 border-gray-100">
                <h1 class="text-gray-400 font-bold ">Date of Birth</h1>
                <p class="text-xl font-medium">{{ auth()->user()->d_o_b }}</p>
            </div>
            <div class="py-1.5 border-b-2 border-b-0 border-gray-100">
                <h1 class="text-gray-400 font-bold ">Phone Number</h1>
                <p class="text-xl font-medium">{{ auth()->user()->phone }}</p>
            </div>
            <div class="py-1.5 border-b-2 border-b-0 border-gray-100">
                <h1 class="text-gray-400 font-bold ">Email Address</h1>
                <p class="text-xl font-medium">{{ auth()->user()->email }}</p>
            </div>
        </div>
    </main>
@endsection
