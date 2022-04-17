@extends('layouts.nav')
@section('content')
        <div class="mx-auto md:w-5/6 rounded-md shadow-md">
        <div class="flex justify-between items-center md:col-span-2 px-4">
            <h1 class="text-2xl font-bold mb-3">Student Details</h1>
            <span onclick="showRep()" class="cursor-pointer py-3 px-6 text-white bg-blue-400 font-bold rounded-md">Add new</span>
        </div>
        <div class="md:flex px-28 mt-4 justify-center items-center">
            <img src="{{ asset('img/56388358.jpg') }}" class="block h-48 md:h-72 w-48 md:w-72 mx-auto md:mx-auto rounded-full shadow-md" alt="">
        <div class="grid grid-cols-2 md:block gap-x-4 md:gap-x-0 px-8 md:items-center mt-4">
            <div class="py-1.5">
                <h1 class="text-gray-400 font-bold ">Fullname</h1>
                <p class="text-xl font-medium">Pinponsuhu Joseph</p>
            </div>
            <div class="py-1.5">
                <h1 class="text-gray-400 font-bold ">Matric Number</h1>
                <p class="text-xl font-medium">123456789</p>
            </div>
            <div class="py-1.5">
                <h1 class="text-gray-400 font-bold ">Faculty</h1>
                <p class="text-xl font-medium">Science</p>
            </div>
            <div class="py-1.5">
                <h1 class="text-gray-400 font-bold ">Department</h1>
                <p class="text-xl font-medium">Computer Science</p>
            </div>
        </div>
        </div>
        <div class="mt-3">
            <h1 class="text-2xl font-bold mb-3 ml-4">Past Offenses</h1>
            <div class="py-2.5 bg-white px-4">
                <h1 class="mb-2 text-lg font-bold">Caught Smoking on campus</h1>
                <div class="flex gap-x-3 items-center">
                    <a href="#" target="blank" class="px-6 py-2.5 rounded-md text-white font-bold bg-blue-500">View</a>
                    <a href="#" download="true" class="px-6 py-2.5 rounded-md text-white font-bold bg-green-500">Download</a>
                </div>
            </div>
        </div>
        </div>
    </main>
    <div id="report" class="fixed hidden w-screen h-screen top-0 left-0 bg-yellow-900 bg-opacity-70">
        <div class="flex justify-end mt-8 mr-10">
            <i class="fa fa-times fa-2x text-white cursor-pointer" onclick="clsRep()"></i>
        </div>
        <form action="" class="w-80 md:w-96 bg-white mt-5 rounded-md mx-auto p-8" method="post">
            @csrf
            <h1 class="text-xl font-bold">File Report</h1>
            <div class="my-3">
                <label for="email" class="font-bold block mb-1">Remark</label>
                <textarea cols="30" style="resize: none" rows="3" placeholder="Enter offense remark here" name="remark" class="block outline-none py-3 px-2 resize-none w-full bg-white shadow-md rounded-md" id=""></textarea>
                <label for="email" class="font-bold block mt-3 mb-1">Files</label>
                <input type="file" name="files[]" multiple class="block w-full py-3 px-3 bg-white rounded-md shadow-md" id="">
                <button class="bg-yellow-400 font-bold text-white rounded-md shadow-md py-3 mt-4 text-center w-32 block">Submit</button>
            </div>
        </form>
    </div>
<script>
    function showRep(){
        document.getElementById('report').classList.remove('hidden');
    }
    function clsRep(){
        document.getElementById('report').classList.add('hidden');
    }
</script>
@endsection
