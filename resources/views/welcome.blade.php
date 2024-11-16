@extends('layouts.index')

@section('content')

    <div class=" h-[100vh] parentDiv flex flex-col ">
        <div class="w-full h-[150px]  flex justify-center items-center">
            <nav id="navbar"
                class=" text-white border-2 border-white   hover:duration-200  h-[65px] w-[70%] rounded-xl flex justify-around items-center">
                <a href="">News</a>
                <a class="spacee gradiant text-2xl text-white" href="/">WorkOut-Now</a>

                <div>
                    @if (Route::has('login'))
                        <div class="flex gap-[3rem]">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="">
                                    Log in
                                </a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="">
                                        Join Us
                                    </a>
                                @endif
                            </div>
                        @endauth
                    @endif
                </div>
            </nav>

        </div>
        <main class="">
            <div class=" relative flex-col   h-[80vh] flex justify-center items-center">
                <div
                    class="flex border-2 border-white justify-center items-center flex-col gap-10 h-[60%] w-[70%]  bgtest rounded-xl ">
                    <div class="flex     awser flex-col gap-5 justify-center items-center font-bold">
                        <p class="text-2xl   cursor-default ">Push Your Limits, Challenge Yourself, and Achieve Greatness
                        </p>
                        <p class="text-6xl   cursor-default ">Unleash Your Full Potential Today</p>
                        <p class="text-3xl   cursor-default ">Train Hard, Stay Strong, Never Quit</p>
                    </div>
                    <div class="flex gap-5">
                        <button class=" font-semibold text-xl btn  w-[14rem] h-[3.5rem] border-black border-2">Read
                            More</button>
                        <button class=" font-semibold text-xl btn  w-[14rem] h-[3.5rem] border-black border-2">Check The
                            News</button>
                    </div>
                </div>
                <div
                    class="absolute bottom-[1.2rem] cursor-pointer px-[25px] bg-[#00e0d4] hover:duration-200 hover:bg-black hover:text-white rounded-full p-5  text-3xl text-black">
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>



        </main>



        <script>
            window.addEventListener('load', function() {
                setTimeout(function() {
                    const navbar = document.getElementById('navbar');
                    navbar.style.opacity = 1;
                    navbar.style.animation =
                        'fadeIn 0.5s ease-out, expandFromCenter 0.5s ease-out 0.1s forwards, revealHeight 0.3s ease-in 0.6s forwards';
                }, 1000);
            });
            window.addEventListener('scroll', function() {
                const navbar = document.getElementById('navbar');

                if (window.scrollY > 100) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        </script>
    </div>
    <div class="h-[110vh]  w-full flex justify-center items-center">
        <div class="bg-red-500 flex flex-col gap-5 h-[100vh] w-[80%]">
            <div class="h-[40%] bg-green-900 flex gap-5">
                <div class="bg-black h-full  w-[20rem]">
                    <div class=" h-full">
                        <div class="h-[40%] w-full bg-blue-300"></div>
                        <div>

                        </div>
                    </div>
                </div>
                <div class="bg-yellow-200 h-full w-[40rem] flex">
                    <div class="h-full w-[50%] bg-blue-500"></div>
                    <div></div>

                </div>
            </div>
            <div class="h-[60%] bg-green-100 flex gap-[2.1rem]  relative">
                <div class="w-[660px] bg-yellow-600 h-full"></div>
                <div class="bg-yellow-200 h-[50%] w-[29.5rem] absolute bottom-0 right-0  flex  ">
                    <div class="h-full w-[50%] bg-blue-500"></div>
                    <div class="h-full w-[50%] bg-green-300"></div>

                </div>
            </div>
        </div>


    </div>
    <div class="h-[80vh] flex justify-center items-center">
        <div class="w-full relative h-[70%] bg-red-500"></div>
        <div class="flex flex-col gap-10 absolute">
            <div class="font-thin text-5xl">Join Us Now</div>
            <button class="btn">Sign Up</button>
        </div>
    </div>

    <div class="flex flex-wrap justify-center gap-8 p-10 bg-gradient-to-br  max-h-[60rem]">

        <div
            class="relative group h-[30rem] bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform transition hover:scale-105">
            <div
                class="absolute inset-0 bg-gradient-to-br from-[#00e0d4] via-transparent to-[#00b3a3] opacity-0 group-hover:opacity-100 transition duration-700">
            </div>
            <div class="relative p-8">
                <h3 class="text-3xl font-extrabold text-[#00e0d4] group-hover:text-white transition duration-300">Basic Plan
                </h3>
                <p class="text-gray-600 text-lg mb-6 group-hover:text-gray-200">$20 - $30 / month</p>
                <ul class="text-left text-gray-700 space-y-3 group-hover:text-black">
                    <li>✔️ Access during off-peak hours</li>
                    <li>✔️ 2 group classes per week</li>
                    <li>✔️ 1 trainer consultation per month</li>
                    <li>✔️ Locker access</li>
                    <li class="opacity-0">✔️ 1 trainer consultation per month</li>
                    <li class="opacity-0">✔️ Locker access</li>
                </ul>
            </div>
            <div class="border-t-2 border-gray-200 group-hover:border-white p-4">
                <button class="buttonn">

                    Sign Up
                </button>
            </div>
        </div>


        <div
            class="relative group bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform transition hover:scale-105">
            <div
                class="absolute inset-0 bg-gradient-to-br from-[#00e0d4] via-transparent to-[#00b3a3] opacity-0 group-hover:opacity-100 transition duration-700">
            </div>
            <div class="relative p-8">
                <h3 class="text-3xl font-extrabold text-[#00e0d4] group-hover:text-white transition duration-300">Standard
                    Plan</h3>
                <p class="text-gray-600 text-lg mb-6 group-hover:text-gray-200">$40 - $60 / month</p>
                <ul class="text-left text-gray-700 space-y-3 group-hover:text-black">
                    <li>✔️ Unlimited access during all hours</li>
                    <li>✔️ All group fitness classes</li>
                    <li>✔️ 1 personal training session per month</li>
                    <li>✔️ Sauna/steam room access</li>
                    <li>✔️ Nutrition advice</li>
                    <li class="opacity-0">✔️ Nutrition advice</li>
                </ul>
            </div>
            <div class="border-t-2 border-gray-200 group-hover:border-white p-4">
                <button class="buttonn">

                    Sign Up
                </button>
            </div>
        </div>


        <div
            class="relative group bg-white rounded-xl shadow-2xl w-full max-w-md overflow-hidden transform transition hover:scale-105">
            <div
                class="absolute inset-0 bg-gradient-to-br from-[#00e0d4] via-transparent to-[#00b3a3] opacity-0 group-hover:opacity-100 transition duration-700">
            </div>
            <div class="relative p-8">
                <h3 class="text-3xl font-extrabold text-[#00e0d4] group-hover:text-white transition duration-300">Premium
                    Plan</h3>
                <p class="text-gray-600 text-lg mb-6 group-hover:text-gray-200">$80 - $120 / month</p>
                <ul class="text-left text-gray-700 space-y-3 group-hover:text-black">
                    <li>✔️ 24/7 gym access</li>
                    <li>✔️ Priority class booking</li>
                    <li>✔️ 4 personal training sessions per month</li>
                    <li>✔️ Pool, spa & recovery room access</li>
                    <li>✔️ Custom meal planning</li>
                    <li>✔️ Exclusive member perks</li>
                </ul>
            </div>
            <div class="border-t-2 border-gray-200 group-hover:border-white p-4">
                <button class="buttonn">

                    Sign Up
                </button>
            </div>
        </div>
    </div>





    <div class="w-full h-[60vh]  flex justify-center items-center flex-col gap-10">
        <h1 class="text-4xl text-[#00e0d4]">Contact & Help</h1>
        <div class="flex  justify-center items-center flex-col gap-5 w-full h-[80%] ">
            <div class="flex gap-5">
                <input placeholder="Type Your Email" class="h-[3.5rem] rounded-lg border-2 border-[#00e0d4] w-[30rem] pl-5"
                    type="text">
                <input placeholder="Type Your Subject Title"
                    class="h-[3.5rem] rounded-lg border-2 border-[#00e0d4] w-[30rem] pl-5" type="text">
            </div>
            <textarea placeholder="Subject..." class="border-[#00e0d4] pl-5 border-2 rounded-lg" name="" id=""
                cols="128" rows="10"></textarea>
        </div>

    </div>
    <footer class="w-full bg-black h-[12rem] flex flex-col">
        <div class="w-full h-[40%] flex justify-around items-center text-white">
            <a class="spacee gradiant text-2xl text-white" href="/">WorkOut-Now</a>
            <div class="flex gap-5">
                <div class="p-5 rounded-full bg-[#00e0d4]"></div>
                <div class="p-5 rounded-full bg-[#00e0d4]"></div>
                <div class="p-5 rounded-full bg-[#00e0d4]"></div>
                <div class="p-5 rounded-full bg-[#00e0d4]"></div>
            </div>

        </div>
        <div class="w-full h-[100px]  flex justify-center text-[#00e0d4] items-center">CopyRight&copy; 2024 Made By
            Saif-Eddine </div>



    @endsection
