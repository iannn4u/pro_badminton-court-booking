<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-[100vh] text-gray-900 font-semibold">
    <div class="bg-gray-100 h-[100%] max-w-[2040px] grid place-items-center mx-auto">
        <form class="bg-gray-50 w-[30%] h-min shadow-lg rounded-lg p-3 px-10" method="post" action="/login">
        @csrf
            <h1 class="text-3xl font-bold text-center my-5">Login</h3>
            <div class="mb-5">
                <label for="username" class="block mb-1">Username </label>
                <input type="text" name="username" id="username" class="font-normal w-full text-md rounded-md border-gray-900 focus:ring-gray-900 focus:ring-2 border  focus:border-none h-[75%]" autofocus>
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-1">Password </label>
                <input type="password" name="password" id="password" class="font-normal w-full text-md rounded-md border-gray-900 focus:ring-gray-900 focus:ring-2 border  focus:border-none h-[75%]" autofocus>
            </div>
            <button class="bg-gray-900 rounded-md text-gray-100 w-full py-2 mb-5 mt-3">Login</button>
        </form>
    </div>
</body>

</html>
