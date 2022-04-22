@extends('layouts.app')
@section('content')
    <main class="bg-white py-8 h-screen overflow-y-scroll">
        <h1 class="text-2xl font-bold mb-3 mt-20 ml-5">Generate Report</h1>
        <form action="/generate/report" class="w-80 mx-auto md:w-96 mt-5" method="get">
            @csrf
            <div class="my-3">
                <label for="email" class="font-bold block mb-1">From</label>
                <input type="date" name="from" class="block border-l-4 border-yellow-400 outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
            </div>
            <div class="my-3">
                <label for="email" class="font-bold block mb-1">To</label>
                <input type="date" name="to" class="block border-l-4 border-yellow-400 outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
            </div>
            <button class="bg-yellow-400 font-bold text-white rounded-md shadow-md py-3 text-center w-32 block">Generate <i class="fa fa-cog animate-spin"></i></button>
        </form>
    </main>

</body>

@endsection
