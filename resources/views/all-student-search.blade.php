@extends('layouts.app')
@section('content')
    <main class="w-full mt-24">
    <div class="px-8 flex justify-between items-center my-4">
        <h1 class="font-bold ml-6 text-2xl text-gray-600">Search Results for "{{ $search }}"</h1>
    </div>
    <form method="GET" class="mx-auto flex my-4 justify-center"  action="/search/student">
        @csrf
        <input type="text" name="search" value="{{ $search }}" class="w-3/6 py-3 bg-white text-yellow-400 shadow-md rounded-tl-md rounded-bl px-3 placeholder-yellow-400" placeholder="Search ID number, Email or Phone Number" id="">
        <button class="py-3 bg-yellow-400 text-white px-5 rounded-tr-md rounded-br-md shadow-md hover:bg-yellow-500">Search</button>
    </form>
    </div>
        @if ($count > 0)
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
        @else
        <div>
            <h1 class="italic uppercase text-2xl text-center">No result found</h1>
        </div>
        @endif
    </div>
    </main>

    @if (Session('msg'))
    <div id="msg" onclick="hideMsg()" class="fixed top-4 right-4 w-80 md:w-4/6 px-4 py-2 bg-green-400">
        <p class="text-sm font-bold">{{ Session('msg') }}</p>
    </div>
@endif
    <script>
        function hideMsg(){
            document.getElementById('msg').classList.add('hidden');
        }
    </script>
@endsection
