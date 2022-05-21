@extends('layouts.app')
@section('content')
    <main class="w-full mt-24">
    <div class="px-8 flex justify-between items-center mt-4">
        <h1 class="font-bold ml-6 text-2xl text-gray-600">Search results for "{{ $search }}"</h1>
    </div>
    <form method="GET" action="/search/marshal" class="mx-auto flex my-4 justify-center">
        @csrf
        <input type="text" name="search" value="{{ $search }}" class="w-3/6 py-3 bg-white text-green-400 shadow-md rounded-tl-md rounded-bl px-3 placeholder-green-400" placeholder="Search ID number, Email or Phone Number" id="">
        <button class="py-3 bg-green-400 text-white px-5 rounded-tr-md rounded-br-md shadow-md hover:bg-green-500">Search</button>
    </form>
    </div>
            @if ($count > 0)    
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
            @else
                <div>
                    <h1 class="italic uppercase text-2xl text-center">No result found</h1>
                </div>
            @endif
    </main>
    

    <script>
     
    </script>
@endsection
