@extends('layouts.index')

@section('content')

    <div class=" h-[100vh] parentDiv flex flex-col ">
        <div class="w-full h-[150px]  flex justify-center items-center">
            <nav id="navbar"
                class=" text-white border-2 border-white   hover:duration-200  h-[65px] w-[70%] rounded-xl flex justify-around items-center">
                <div class="flex gap-10">
                    <a href="#news">News</a>
                    <a href="#contact">Contact</a>
                </div>
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
                <div data-aos-once="false" data-aos-delay="200" data-aos="fade-down"
                    class="flex border-2 border-white justify-center items-center flex-col gap-10 h-[60%] w-[70%]  bgtest rounded-xl ">
                    <div class="flex     awser flex-col gap-5 justify-center items-center font-bold">
                        <p data-aos-once="false" data-aos-delay="300" data-aos="fade-right" class="text-2xl   cursor-default ">Push Your Limits, Challenge Yourself, and Achieve Greatness
                        </p>
                        <p data-aos-once="false" data-aos-delay="400" data-aos="fade-right" class="text-6xl   cursor-default ">Unleash Your Full Potential Today</p>
                        <p data-aos-once="false" data-aos-delay="500" data-aos="fade-right" class="text-3xl   cursor-default ">Train Hard, Stay Strong, Never Quit</p>
                    </div>
                    <div class="flex gap-5">
                        <a href="#plans" class=" font-semibold flex justify-center items-center text-xl btn  w-[14rem] h-[3.5rem] border-black border-2">View Our Plans</a>
                        <a href="#news" class=" font-semibold flex justify-center items-center text-xl btn  w-[14rem] h-[3.5rem] border-black border-2">Check The
                            News</a>
                    </div>
                </div>
                <a href="#news"  data-aos-once="false" data-aos-delay="200" data-aos="fade-down"
                    class="absolute bottom-[1.2rem] cursor-pointer px-[25px] bg-[#00e0d4] hover:duration-200 hover:bg-black hover:text-white rounded-full p-5  text-3xl text-black">
                    <i class="bi bi-chevron-down"></i>
                </a>
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
    <div id="news" class="h-[110vh]  w-full flex justify-center items-center">
        <div class=" flex flex-col gap-5 h-[100vh] w-[80%]">
            <div class="h-[40%]  flex gap-5">
                <div class=" h-full  w-[20rem]">
                    <div data-aos-once="false" data-aos-delay="200" data-aos="fade-up" class=" h-full shadow-[4px_4px_8px_0px_rgba(0,0,0,0.25)]">
                        <div class="h-[40%] w-full  overflow-hidden">

                            <div class="w-full h-full object-cover img1 transition-transform duration-500 hover:scale-110">
                            </div>

                        </div>
                        <div  class="h-[13.5rem] flex justify-center  flex-col gap-10">
                            <div class="ml-10 font-bold text-[#00e0d4] uppercase">our facilities</div>
                            <div class="ml-10 font-bold text-xl text-black uppercase">Modern equipment, spacious studios, personal training, and luxurious amenities.</div>
                        </div>
                    </div>
                </div>
                <div data-aos-once="false" data-aos-delay="500" data-aos="fade-up" class=" h-full w-[40rem] flex shadow-[4px_4px_8px_0px_rgba(0,0,0,0.25)]">
                    <div class="h-full w-[50%]  overflow-hidden">
                        <div class="w-full min-h-full object-cover img2 transition-transform duration-500 hover:scale-110">
                        </div>
                    </div>
                    <div class="flex justify-center w-[50%]  flex-col gap-10">
                        <div class="ml-5 font-bold text-[#00e0d4] uppercase">Boxing</div>
                        <div class="ml-5 uppercase font-bold text-xl text-black">New boxing machines available for intense workouts.</div>
                        <div class="text-sm ml-5 text-[#585b63]">New Boxing Machines Available For Intense, Efficient Workouts. Improve Strength And Endurance With Advanced Equipment.</div>
                    </div>

                </div>
            </div>
            <div class="h-[60%]  flex gap-[2.1rem]  relative ">
                <div data-aos-once="false" data-aos-delay="600" data-aos="fade-up" class="w-[660px]  h-full overflow-hidden">
                    <div class="w-full relative h-full object-cover img3 transition-transform duration-500 hover:scale-110"></div>
                    <div class="absolute bottom-5 left-5 uppercase font-bold text-3xl text-[#ffffff] ">Outdoor areas for training <br> and relaxation</div>
                </div>
                <div data-aos-once="false" data-aos-delay="700" data-aos="fade-up" class=" h-[50%] w-[29.5rem] absolute bottom-0 right-0  flex  shadow-[4px_4px_8px_0px_rgba(0,0,0,0.25)] ">
                    <div class="h-full w-[50%]  flex flex-col gap-3 ">
                        <div class=" font-bold text-[#00e0d4] uppercase pl-5 mt-5">Couch of the week</div>
                        <div class="ml-5  uppercase font-bold text-xl text-black">Inspiring dedication and passion daily</div>
                        <div class="ml-5 text-sm  text-[#585b63]">Meet Our Coach Of The Week, Leading With Expertise, Passion, And Commitment To Fitness.</div>
                    </div>
                    <div class="h-full w-[50%]  overflow-hidden">
                        <div class="w-full h-full object-cover img4 transition-transform duration-500 hover:scale-110">
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
    <div  class="h-[80vh] flex justify-center items-center">
        <div class="w-full relative h-[70%] img5"></div>
        <div class="flex flex-col gap-10 absolute">
            <div data-aos-once="false" data-aos-delay="200" data-aos="fade-left" class="font-thin text-5xl text-white">Join Us Now</div>
            <button data-aos-once="false" data-aos-delay="300" data-aos="fade-right" class="btn">Sign Up</button>
        </div>
    </div>
<div id="plans" class="h-[10rem]"></div>
    <div   class="flex flex-wrap justify-center gap-8 p-10 bg-gradient-to-br  max-h-[60rem]">

        <div data-aos-once="false" data-aos-delay="200" data-aos="fade-down"
            class="relative group h-[30rem] bg-white rounded-xl shadow-2xl w-[25rem] overflow-hidden transform transition hover:scale-105">
            <div
                class="absolute inset-0 bg-gradient-to-br from-[#00e0d4] via-transparent to-[#00b3a3] opacity-0 group-hover:opacity-100 transition duration-700">
            </div>
            <div  class="relative p-8">
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


        <div data-aos-once="false" data-aos-delay="400" data-aos="fade-down"
            class="relative group bg-white rounded-xl shadow-2xl w-[25rem] max-w-md overflow-hidden transform transition hover:scale-105">
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


        <div data-aos-once="false" data-aos-delay="600" data-aos="fade-down"
            class="relative group bg-white rounded-xl shadow-2xl w-[25rem] max-w-md overflow-hidden transform transition hover:scale-105">
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
                <input data-aos-once="false" data-aos-delay="200" data-aos="fade-right" placeholder="Type Your Email" class="h-[3.5rem] rounded-lg border-2 border-[#00e0d4] w-[30rem] pl-5"
                    type="text">
                <input data-aos-once="false" data-aos-delay="400" data-aos="fade-left" placeholder="Type Your Subject Title"
                    class="h-[3.5rem] rounded-lg border-2 border-[#00e0d4] w-[30rem] pl-5" type="text">
            </div>
            <textarea data-aos-once="false" data-aos-delay="600" data-aos="fade-up" placeholder="Subject..." class="border-[#00e0d4] pl-5 border-2 rounded-lg" name="" id=""
                cols="128" rows="10"></textarea>
                <button data-aos-once="false" data-aos-delay="700" data-aos="zoom-in" class=" buttonn">Send </button>
        </div>
      

    </div>
    <footer class="w-full bg-black h-[12rem] flex flex-col">
        <div class="w-full h-[40%] flex justify-around items-center text-white">
            <a data-aos-once="false" data-aos-delay="600" data-aos="zoom-in"  class="spacee gradiant text-2xl text-white" href="/">WorkOut-Now</a>
            <div class="flex gap-5">
                <div data-aos-once="false" data-aos-delay="200" data-aos="fade-up" class="p-1 px-2 flex justify-center items-center text-3xl rounded-full text-[#00e0d4]"><i class="bi bi-facebook"></i></div>
                <div data-aos-once="false" data-aos-delay="400" data-aos="fade-up"  class="p-1 px-2 flex justify-center items-center text-3xl rounded-full text-[#00e0d4]"><i class="bi bi-instagram"></i></div>
                <div data-aos-once="false" data-aos-delay="600" data-aos="fade-up"  class="p-1 px-2 flex justify-center items-center text-3xl rounded-full text-[#00e0d4]"><i class="bi bi-twitter"></i></div>
                <div data-aos-once="false" data-aos-delay="800" data-aos="fade-up" class="p-1 px-2 flex justify-center items-center text-3xl rounded-full text-[#00e0d4]"><i class="bi bi-youtube"></i></div>
            </div>

        </div>
        <div  class="w-full h-[100px]  flex justify-center text-[#00e0d4] items-center">CopyRight&copy; 2024 Made By
            Saif-Eddine </div>



    @endsection
