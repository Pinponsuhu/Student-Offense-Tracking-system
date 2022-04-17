@extends('layouts.app')
@section('content')
        <h1 class="text-2xl font-bold ml-6">File Student Offense</h1>
        <form action="" class="w-80 md:w-96 mx-auto" class="mt-4">
            @csrf
            <div class="my-3">
                <label for="email" class="font-bold block mb-1">Matric Number</label>
                <input type="text" placeholder="Enter Matric Number here" name="matric_number" class="block outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
            </div>
            <button class="bg-yellow-400 font-bold text-white rounded-md shadow-md py-3 text-center w-32 block">Search</button>
        </form>
    </main>
</body>
@endsection
