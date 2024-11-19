<!DOCTYPE html>
<html lang="en">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton+SC&display=swap" rel="stylesheet">
<!-- Option 1: Include in HTML -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <title>Document</title>

</head>

<body class="bg-[#1e1e1e] overflow-x-hidden">
    @auth

        @if (!in_array(Route::currentRouteName(), ['login', 'register', 'welcome', 'body.index']))
            <div class="fixed">
                <nav
                    class="w-[20rem] absolute   flex justify-center items-center flex-col rounded-lg h-[100vh] bg-gradient-to-b from-black to-[#00e0d4] text-white shadow-lg">
                    @if (Auth::user()->role == 'admin')
                        <img class="h-[70px] w-[70px] border-white border-2 absolute top-10 mb-5 rounded-full object-cover"
                            src="{{ Auth::user()->image }}" alt="">
                    @else
                        <img class="h-[70px] w-[70px] border-white border-2 object-cover absolute top-10 mb-5 rounded-full"
                            src="{{ asset('storage/images/' . Auth::user()->image) }}" alt="">
                    @endif
                    <div class="h-[5rem] w-full"></div>
                    <a class="w-full focus:bg-[] h-[5rem] smooths  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center"
                        href="/dashboard">Home</a>
                    @if (Auth::user()->role == 'admin')
                        <a class="w-full  h-[5rem] smooths  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center"
                            href="/admin">Admin Section</a>
                    @endif
                    <a class="w-full  h-[5rem] smooths  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center"
                        href="/trainer">Trainers</a>
                    <a class="w-full focus:bg-[] h-[5rem] smooths  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center"
                        href="/session">Sessions</a>
                    <a class="w-full focus:bg-[] h-[5rem] smooths  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center"
                        href="/calendar">Calendar</a>

                    <a class="w-full  h-[5rem] smooths  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center"
                        href="{{ route('profile.edit') }}">Setting</a>

                    <form class="w-full " method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a class="w-full  smooths h-[5rem]  hover:bg-[#1e1e1e] custom-rounded flex justify-center items-center cursor-pointer"
                            :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                </nav>
            </div>
        @endif




    @endauth
    {{-- @include('layouts.partials.sidebar') --}}
    @yield('content')


    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 1000,
                easing: 'ease',
                once: true,
            });
        });
    </script>
</body>

</html>
