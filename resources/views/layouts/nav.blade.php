<nav class="py-4 px-6 bg-white shadow-md fixed top-0 w-screen left-0 flex items-center justify-between">
    <h1 class="text-3xl flex gap-x-0.5 items-center font-bold"><img src="{{ asset('img/logo.png') }}" alt="" class="h-8 w-8"> LASU-SOTS</h1>
    <i class="fa fa-bars fa-2x cursor-pointer md:hidden text-yellow-400" onclick="nav()"></i>
    <div id="nav" class="fixed top-0 p-4 bg-yellow-400  text-white md:text-yellow-500 hidden md:hidden h-screen  left-0 w-72 ">
        <h1 class="text-3xl py-3 px-4 md:hidden text-white flex gap-x-0.5 items-center font-bold"><img src="{{ asset('img/logo.png') }}" alt="" class="h-9 w-9"> LASU-SOTS</h1>
        <ul class="w-full text-sm justify-end md:justify-start mt-4 md:mt-0 flex flex-col md:flex-row gap-x-6">
            @if (auth()->user()->is_admin == false)
            <li class="py-3.5 md:py-0 text-xl md:text-md hover:bg-white px-4 md:px-0 hover:text-yellow-400"><a href="/" class="font-medium">Home</a></li>
            @endif
            @if (auth()->user()->is_admin == true)
            <li class="py-3.5 md:py-0 text-xl md:text-md hover:bg-white px-4 md:px-0 hover:text-yellow-400"><a href="/dashboard" class="font-medium">Dashboard</a></li>
            @endif
            <li class="py-3.5 md:py-0 text-xl md:text-md hover:bg-white px-4 md:px-0 hover:text-yellow-400"><a href="/see/student" class="font-medium">Upload Offense</a></li>
             @if (auth()->user()->is_admin == true)
            <li class="py-3.5 md:py-0 text-xl md:text-md hover:bg-white px-4 md:px-0 hover:text-yellow-400"><a href="/report" class="font-medium">Report</a></li>
            @endif
            <li class="py-3.5 md:py-0 text-xl md:text-md  px-4 md:px-0 "><form action="/logout" method="post">
                @csrf
                <button class="py-2.5 bg-white text-yellow-400 text-md block w-28 text-center rounded-md">Logout</button>
            </form></li>
        </ul>
    </div>
    <ul class="text-sm justify-end items-center md:mt-0 hidden md:flex gap-x-6">
        @if (auth()->user()->is_admin == false)
            <li class="py-3.5 text-yellow-400 md:py-0 text-xl md:text-md hover:bg-white px-4 md:px-0 hover:text-yellow-400"><a href="/" class="font-medium">Home</a></li>
            @endif
            @if (auth()->user()->is_admin == true)
            <li class="py-3.5 text-yellow-400 md:py-0 text-xl md:text-md hover:bg-white px-4 md:px-0 hover:text-yellow-400"><a href="/dashboard" class="font-medium">Dashboard</a></li>
            @endif
        <li class="text-lg px-3 text-yellow-400"><a href="/see/student" class="font-medium">Upload Offense</a></li>
        @if (auth()->user()->is_admin == true)
        <li class="text-lg px-3 text-yellow-400"><a href="/report" class="font-medium">Report</a></li>
        @endif
        <li class="text-lg px-3 text-yellow-400"><form action="/logout" method="post">
            @csrf
            <button class="py-2.5 bg-yellow-400 text-white block w-28 text-center rounded-md">Logout</button>
        </form></li>
    </ul>
</nav>
<script>
    function nav(){
        document.getElementById('nav').classList.toggle('hidden');
    }
</script>
