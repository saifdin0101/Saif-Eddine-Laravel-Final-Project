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
            <div x-data="{ expanded: false }" @mouseenter="expanded = true" @mouseleave="expanded = false"
                :class="{ 'w-64': expanded, 'w-20': !expanded }"
                class="fixed left-0 top-0 z-40 flex h-screen flex-col bg-gradient-to-b from-black to-cyan-600 text-white transition-all duration-700 ease-in-out">

                <div class="relative h-40 w-full">
                    <div class="absolute top-4 left-1/2 transform -translate-x-1/2 flex flex-col items-center">
                        <div class="relative w-16 h-16">
                            @if (Auth::user()->role == 'admin')
                                <img class="w-full h-full rounded-full object-cover border-2 border-white"
                                    src="{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}">
                                <span
                                    class="absolute bottom-0 right-0 h-4 w-4 rounded-full bg-green-400 border-2 border-white"></span>
                                <a class="absolute  h-[7rem] w-[5rem]" href="/auth/profilee/{{ Auth::user()->id }}"></a>
                            @else
                                <img class="w-full h-full rounded-full object-cover border-2 border-white"
                                    src="{{ asset('storage/images/' . Auth::user()->image) }}"
                                    alt="{{ Auth::user()->name }}">
                                <a class="absolute  h-[7rem] w-[5rem] top-0"
                                    href="/auth/profilee/{{ Auth::user()->id }}"></a>
                            @endif
                        </div>
                        <div x-show="expanded" x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                            class="mt-2 text-center">
                            <h2 class="text-sm font-semibold">{{ Auth::user()->name }}</h2>
                            <p class="text-xs text-gray-300">{{ Auth::user()->email }}</p>
                        </div>
                    </div>

                </div>

                <nav class="flex-1 space-y-4 p-2 overflow-y-auto overflow-x-hidden relative">
                    <a href="/dashboard"
                        class="flex items-center rounded-lg px-3 py-3 text-base font-medium hover:bg-gray-500 h-[50px]  justify-center   transition-colors duration-200"
                        :class="{ 'justify-center': !expanded }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 flex-shrink-0 absolute left-5 top-[1rem] "
                            :class="{ 'mr-3': expanded }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span x-show="expanded" x-transition:enter="transition ease-out duration-300 delay-150"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="whitespace-nowrap absolute left-[5rem] top-[1rem]">Home</span>
                    </a>



                    <a href="/trainer"
                        class="flex items-center rounded-lg px-3 py-3 text-base font-medium hover:bg-gray-500 h-[50px]  justify-center   transition-colors duration-200"
                        :class="{ 'justify-center': !expanded }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 flex-shrink-0  absolute left-5 top-[5rem]"
                            :class="{ 'mr-3': expanded }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span x-show="expanded" x-transition:enter="transition ease-out duration-300 delay-150"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="whitespace-nowrap absolute left-[5rem] top-[5rem]">Trainers</span>
                    </a>

                    <a href="/session"
                        class="flex items-center rounded-lg px-3 py-3 text-base font-medium hover:bg-gray-500 h-[50px]  justify-center   transition-colors duration-200"
                        :class="{ 'justify-center': !expanded }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 flex-shrink-0 absolute left-5 top-[9rem]"
                            :class="{ 'mr-3': expanded }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span x-show="expanded" x-transition:enter="transition ease-out duration-300 delay-150"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="whitespace-nowrap absolute left-[5rem] top-[9rem]">Sessions</span>
                    </a>

                    <a href="/calendar"
                        class="flex items-center rounded-lg px-3 py-3 text-base font-medium hover:bg-gray-500 h-[50px]  justify-center   transition-colors duration-200"
                        :class="{ 'justify-center': !expanded }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 flex-shrink-0 absolute left-5 top-[13rem]"
                            :class="{ 'mr-3': expanded }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span x-show="expanded" x-transition:enter="transition ease-out duration-300 delay-150"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="whitespace-nowrap absolute left-[5rem] top-[13rem]">Calendar</span>
                    </a>

                    <a href="{{ route('profile.edit') }}"
                        class="flex items-center rounded-lg px-3 py-3 text-base font-medium hover:bg-gray-500 h-[50px]  justify-center   transition-colors duration-200"
                        :class="{ 'justify-center': !expanded }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 flex-shrink-0 absolute left-5 top-[17rem] "
                            :class="{ 'mr-3': expanded }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span x-show="expanded" x-transition:enter="transition ease-out duration-300 delay-150"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0"
                            class="whitespace-nowrap absolute left-[5rem] top-[17rem]">Settings</span>
                    </a>
                </nav>

                <div class="p-4 space-y-4">
                    @if (Auth::user()->role == 'admin')
                        <a href="/admin"
                            class="flex items-center rounded-lg px-3  text-base font-medium    justify-center   transition-colors duration-200"
                            :class="{ 'justify-center': !expanded } ">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 flex-shrink-0 absolute bottom-[5rem] left-5"
                                :class="{ 'mr-3': expanded }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                            <span x-show="expanded" x-transition:enter="transition ease-out duration-300 delay-150"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="whitespace-nowrap absolute bottom-[5rem] left-[5rem]  ">Admin Section</span>
                        </a>
                        
                            
                    
                        
                    
                            
                    @endif
                    @if (Auth::user()->role =='trainer')
                    <a href="/ApprovePage"
                        class="flex items-center rounded-lg px-3 py-3 text-base font-medium  h-[50px] justify-center transition-colors duration-200"
                        :class="{ 'justify-center': !expanded }">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 flex-shrink-0 absolute bottom-[5rem] left-5" 
                            :class="{ 'mr-3': expanded }" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" 
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M9 12l2 2l4-4" /> 
                            <circle cx="12" cy="12" r="10" /> 
                        </svg>
                        <span x-show="expanded" x-transition:enter="transition ease-out duration-300 delay-150"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="whitespace-nowrap absolute bottom-[5rem] left-[5rem]">UnPublished Sessions</span>
                    </a>
                        
                    @endif
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="w-full flex items-center rounded-lg px-3 py-3 text-base font-medium hover:bg-gray-500 h-[50px]  justify-center   transition-colors duration-200"
                            :class="{ 'justify-center': !expanded }">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 flex-shrink-0  absolute bottom-6 left-5"
                                :class="{ 'mr-3': expanded }" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                            </svg>
                            <span x-show="expanded" x-transition:enter="transition ease-out duration-300 delay-150"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-200"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                class="whitespace-nowrap absolute bottom-6 left-[5rem]">{{ __('Log Out') }}</span>
                        </button>
                    </form>
                </div>
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
