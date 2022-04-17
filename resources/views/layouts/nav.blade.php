<nav class="py-4 px-6 bg-white shadow-md fixed top-0 w-full left-0 flex items-center justify-between">
    <h1 class="text-3xl flex gap-x-0.5 items-center font-bold"><img src="{{ asset('img/logo.png') }}" alt="" class="h-8 w-8"> LASU-SOTS</h1>
    <i class="fa fa-bars fa-2x cursor-pointer md:hidden text-yellow-400" onclick="nav()"></i>
    <div id="nav" class="fixed md:relative top-0 p-4 bg-yellow-400 md:bg-white text-white hidden md:flex h-screen left-0 w-72 md:w-auto">
        <h1 class="text-3xl py-3 px-4 md:hidden text-white flex gap-x-0.5 items-center font-bold"><img src="{{ asset('img/logo.png') }}" alt="" class="h-9 w-9"> LASU-SOTS</h1>
        <ul class="w-full mt-4 flex flex-col md:flex-row gap-x-4">
            <li class="w-full py-3.5 text-xl hover:bg-white px-4 hover:text-yellow-400"><a href="" class="font-medium">Home</a></li>
            <li class="w-full py-3.5 text-xl hover:bg-white px-4 hover:text-yellow-400"><a href="" class="font-medium">Upload Offense</a></li>
            <li class="w-full py-3.5 text-xl hover:bg-white px-4 hover:text-yellow-400"><a href="" class="font-medium">Report</a></li>
            <li class="w-full py-3.5 text-xl hover:bg-white px-4 hover:text-yellow-400"><a href="" class="font-medium">Logout</a></li>
        </ul>
    </div>
</nav>
<script>
    function nav(){
        document.getElementById('nav').classList.toggle('hidden');
    }
</script>
