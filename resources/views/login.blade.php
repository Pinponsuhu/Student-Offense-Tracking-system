<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
<script src="{{ asset('js/all.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<style>
    body{
        font-family: 'Ubuntu', sans-serif;
    }
</style>
</head>
<body class="bg-yellow-50">
        <main class="px-14 md:px-8 py-7 w-full md:mt-6 md:bg-white md:shadow-md md:rounded-md mx-auto md:w-96">
            <div>
                <img src="{{ asset('img/logo.png') }}" class="w-20 h-20 block  mb-4" alt="">
                <h1 class="text-3xl font-bold">Login</h1>
                <p class="-mt-1 text-gray-400">Please sign in to continue</p>

                <form action="" class="mt-3" method="post">
                    @csrf
                    <div class="my-3">
                        <label for="email" class="font-bold block mb-1">Email</label>
                        <input type="email" placeholder="Enter Email address here" name="email" class="block outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
                    </div>
                    <div class="my-3">
                        <label for="email" class="font-bold block mb-1">Password</label>
                        <input type="password" placeholder="Enter Password here" name="password" class="block outline-none py-3 px-2 w-full bg-white shadow-md rounded-md" id="">
                    </div>
                    <div class="flex items-center mb-3 gap-x-2">
                        <input type="checkbox" name="remember_me" id="" class="block">
                        <label for="remember_me" class="block">Remember me</label>
                    </div>
                    <button class="bg-yellow-400 font-bold text-white rounded-md shadow-md py-3 text-center w-32 block">Login</button>
                </form>
            </div>
        </main>
</body>
</html>
