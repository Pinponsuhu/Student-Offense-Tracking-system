@extends('layouts.app')
@section('content')
    <main class="w-full h-full mt-20">
        <div class="px-2 md:px-5 mt-4 ">
            <div class="bg-white py-8 md:px-5 lg:px-10 px-3" >
                <div class="flex justify-between items-center">
                    <h1 class="text-xl md:text-2xl font-bold">Dashboard</h1>
                    <div class="flex items-center gap-x-4">
                        <a href="/all/marshal" class="bg-green-400 text-white font-bold py-2.5 rounded-md px-6">All Marshal</a>
                        <a href="/all/admin" class="bg-pink-400 text-white font-bold py-2.5 rounded-md px-6">All Admins</a>
                        <a href="/all/students" class="bg-yellow-400 text-white font-bold py-2.5 rounded-md px-6">All Students</a>
                    </div>
                </div>
                <div class="flex flex-col items-center mt-6 justify-start md:flex-row gap-x-4 gap-y-4 w-full ">
                    <div class="bg-emerald-400 text-white rounded-md w-80 bg-opacity-95 py-8 px-4">
                        <div class="flex justify-center bg-white text-emerald-500 items-center h-12 w-12 rounded-full">
                            <i class="fa fa-users text-2xl"></i>
                        </div>
                        <h1 class="text-xl font-bold mt-0.5">Total Marshals</h1>
                        <h1 class="text-3xl font-bold">{{ $marshal }}</h1>
                    </div>
                    <div class="bg-rose-400 text-white rounded-md w-80 bg-opacity-95 py-8 px-4">
                        <div class="flex justify-center bg-white text-rose-600 items-center h-12 w-12 rounded-full">
                            <i class="fa fa-users text-2xl"></i>
                        </div>
                        <h1 class="text-xl font-bold mt-0.5">Total Students</h1>
                        <h1 class="text-3xl font-bold">{{ $student }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
