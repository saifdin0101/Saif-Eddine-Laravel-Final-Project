@extends('layouts.index')

@section('content')
    <div class="py-12 h-[100vh] relative">
        <h1 data-aos-once="false" data-aos-delay="100" data-aos="fade-right" class="text-3xl font-semibold absolute left-[8rem] top-3 main-text">Hey , {{ Auth::user()->name }} !!!</h1>
        <div data-aos-once="false" data-aos-delay="120" data-aos="fade-left" class="absolute top-[70px] left-[8rem]">
            <div class="relative h-[60px] w-[28rem] border-b-2 border-[#0890b1] focus-within:border-[#40f9ff]">
                <input type="text" placeholder="Search here..."
                    class="w-full pr-10 pl-4 py-3 border-none bg-transparent text-gray-800 text-lg placeholder-gray-400 focus:outline-none focus:placeholder-transparent">
                <i class="fa fa-search absolute right-3 top-1/2 -translate-y-1/2 text-[#0890b1] text-xl"></i>
            </div>
        </div>


        <div data-aos-once="false" data-aos-delay="230" data-aos="fade-up" class="max-w-7xl mx-auto sm:px-6 lg:px-8 absolute right-2 top-1">
            @php
                $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                $today = now()->format('l');
            @endphp

            <div
                class="schedule-container bg-[#2a2a2a] text-white p-6 rounded-xl w-[30rem] h-[17rem] mx-auto relative shadow-lg">
                <h1 class="text-center text-2xl font-bold mb-4 text-[#0890b1] uppercase tracking-wide">Weekly Activity</h1>

                <p class="text-center text-sm text-gray-400 mb-6">Track your login streaks and stay consistent!</p>

                <div class="flex justify-between items-end h-[130px] px-4">
                    @foreach ($days as $day)
                        @php
                            $isToday = $day === $today;
                            $height = $isToday ? 120 : rand(10, 10); 
                        @endphp
                        <div class="flex flex-col items-center group">
                            <div class="w-6 {{ $isToday ? 'second-color-gradiant shadow-lg' : 'bg-gray-600' }} rounded-t-md transition-all group-hover:bg-[#067e9e] relative"
                                style="height: {{ $height }}px;">

                                @if ($isToday)
                                    <span
                                        class="absolute -top-8 bg-[#067e9e] text-white text-xs py-1 px-2 rounded-md opacity-0 group-hover:opacity-100 transition duration-300 shadow-lg">
                                        Logged in today!
                                    </span>
                                @endif
                            </div>

                            <span
                                class="mt-2 text-xs {{ $isToday ? 'text-[#0890b1] font-semibold' : 'text-gray-400' }}">{{ $day }}</span>
                        </div>
                    @endforeach
                </div>

                <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2">
                    <p class="text-xs text-gray-400 italic">"Consistency is the key to success!"</p>
                </div>
            </div>
        </div>

        {{-- invite your friend --}}
        <div data-aos-once="false" data-aos-delay="600" data-aos="fade-left" class="w-[16rem] cursor-pointer h-[15rem]  rounded-2xl absolute right-2  bottom-3">
            <div class="h-[90%] absolute top-[-10px] left-5 w-[90%] inv"></div>
            <button
                class="flex items-center justify-center absolute bottom-[-5px]  right-2 w-12 h-12 bg-[#0890b1] hover:bg-[#40f9ff] text-white rounded-full shadow-lg transform hover:rotate-12 hover:scale-110 transition-all duration-300">
                <i class="fa fa-user-plus text-lg"></i>
            </button>


        </div>

        {{-- recomanded sessions --}}
        <div data-aos-once="false" data-aos-delay="300" data-aos="fade-right" class="bg-[#2a2a2a] h-[20rem] w-[35rem] absolute left-[8rem] top-[28vh] rounded-2xl flex">
            <h1 class="text-2xl text-gray-300 absolute font-semibold top-[-50px] left-0">Recomanded Sessions</h1>
            <div class="w-[15%]  flex flex-col gap-8 text-2xl justify-center items-center text-[#067e9e]">
                <div class="w-[60%] h-[3rem] bg-[#73bdd1] flex justify-center items-center rounded-xl"> <i
                        class="fa-solid fa-dumbbell"></i></div>
                <div class="w-[60%] h-[3rem] bg-[#73bdd1] flex justify-center items-center rounded-xl"> <i
                        class="fa-solid fa-stopwatch-20"></i></div>
                <div class="w-[60%] h-[3rem] bg-[#73bdd1] flex justify-center items-center rounded-xl"> <i
                        class="fa-solid fa-heart-pulse"></i></div>
                <div class="w-[60%] h-[3rem] bg-[#73bdd1] flex justify-center items-center rounded-xl"> <i
                        class="fa-solid fa-hockey-puck"></i></div>




            </div>
            <div class="w-[85%] rounded-r-2xl bg-[#2a2a2a] overflow-hidden">
                <table class="w-full table-auto bg-transparent text-gray-700">
                    <tbody>
                        @forelse ($forsessions as $session)
                            <tr class="hover:bg-[#40f9ff]/20">
                                <!-- Session Name -->
                                <td class="py-3 px-4 text-white font-semibold">
                                    {{ $session->name }}
                                    <!-- Created At with Time -->
                                    <div class="text-sm text-gray-400 mt-3"> <!-- Added more space here -->
                                        {{ $session->created_at->format('M d, Y h:i A') }}
                                    </div>
                                </td>

                                <!-- User who made the session -->
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-3">
                                        <!-- User Image -->
                                        <img class="h-[40px] w-[40px] rounded-lg"
                                            src="{{ asset('storage/images/' . $session->user->image) }}" alt="User Image">

                                        <!-- User Name -->
                                        <div class="text-white font-semibold">{{ $session->user->name }}</div>
                                    </div>
                                </td>

                                <!-- Session Price -->
                                <td class="py-3 px-4 text-white font-semibold">{{ $session->pay ? 'Free' : '$12' }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-white py-3">No sessions available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>


            </div>

        </div>
        {{-- recomanded exercices --}}
        <div data-aos-once="false" data-aos-delay="400" data-aos="fade-right" class="flex gap-5 absolute bottom-11 left-[8rem] ">
            <h1 class="text-2xl text-gray-300 absolute font-semibold top-[-67px] left-0">Fitness Goal</h1>
            @forelse ($twoexercices as $exercice)
                <div class="bg-[#2a2a2a] h-[6rem] w-[17rem] relative rounded-2xl">
                    <img class="h-[40px] w-[40px] rounded-lg absolute top-[-20px] left-3"
                        src="{{ asset('storage/images/' . $exercice->image) }}" alt="">
                    <div class="text-white font-semibold absolute top-7 left-5">{{ $exercice->name }}</div>
                    <div class="text-[#0890b1] absolute font-semibold top-7 right-5">{{ $exercice->time }} minutes</div>
                    <div class="text-gray-300 text-sm  absolute top-14 left-5">{{ $exercice->descreption }}</div>
                </div>
            @empty
                <div>no Axercices been added yet</div>
            @endforelse

            {{-- <div class="bg-[#2a2a2a] h-[7rem] w-[17rem] rounded-2xl"></div> --}}
        </div>
        {{-- calories and wight --}}
        <div class="flex gap-5 absolute top-1 right-[37vw]">
            <div data-aos-once="false" data-aos-delay="180" data-aos="fade-up" class="bg-[#73bdd1] w-[7rem] h-[13rem] rounded-2xl relative">
                <div 
                    class="w-[70%] h-[5rem] bg-[#222222] text-[#067e9e] rounded-xl flex justify-center items-center top-5 left-4 absolute  ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-fire " viewBox="0 0 16 16">
                        <path
                            d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                    </svg>
                </div>
                <div class="flex gap-3 absolute top-[7rem] justify-center items-center left-6 flex-col">
                    <div class="text-gray-200 font-semibold">Calories</div>
                    <div class="text-[#067e9e] font-semibold ">{{ $usercalories }}</div>
                </div>
                <i class="bottom-1 absolute left-9 text-gray-200">Gym</i>
            </div>
            <div data-aos-once="false" data-aos-delay="180" data-aos="fade-down" class="bg-[#73bdd1] w-[7rem] h-[13rem] rounded-2xl relative">
                <div
                    class="w-[70%] h-[5rem] bg-[#222222] text-[#067e9e] rounded-xl flex justify-center items-center top-5 left-4 absolute  ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                        class="bi bi-cake-fill" viewBox="0 0 16 16">
                        <path
                            d="m7.399.804.595-.792.598.79A.747.747 0 0 1 8.5 1.806V4H11a2 2 0 0 1 2 2v3h1a2 2 0 0 1 2 2v4a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1v-4a2 2 0 0 1 2-2h1V6a2 2 0 0 1 2-2h2.5V1.813a.747.747 0 0 1-.101-1.01ZM12 6.414a.9.9 0 0 1-.646-.268 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0A.9.9 0 0 1 4 6.414v1c.49 0 .98-.187 1.354-.56a.914.914 0 0 1 1.292 0c.748.747 1.96.747 2.708 0a.914.914 0 0 1 1.292 0c.374.373.864.56 1.354.56zm2.646 5.732a.914.914 0 0 1-1.293 0 1.914 1.914 0 0 0-2.707 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0 1.914 1.914 0 0 0-2.708 0 .914.914 0 0 1-1.292 0L1 11.793v1.34c.737.452 1.715.36 2.354-.28a.914.914 0 0 1 1.292 0c.748.748 1.96.748 2.708 0a.914.914 0 0 1 1.292 0c.748.748 1.96.748 2.707 0a.914.914 0 0 1 1.293 0 1.915 1.915 0 0 0 2.354.28v-1.34z" />
                    </svg>
                </div>
                <div class="flex gap-3 absolute top-[7rem] justify-center items-center left-7 flex-col">
                    <div class="text-gray-200 font-semibold">weight</div>
                    <div class="text-[#067e9e] font-semibold ">{{ $userwight }}</div>
                </div>
                <i class="bottom-1 absolute left-7 text-gray-200">WorkOut</i>
            </div>
        </div>
        {{-- recomanded trainers --}}
        <div  data-aos-once="false" data-aos-delay="350" data-aos="fade-left" class="flex absolute bg-[#2a2a2a] rounded-2xl right-7 top-[38.5vh] gap-5 p-2 ">
            <h1 class="text-2xl text-gray-300 absolute font-semibold top-[-50px] left-0">Popular Trainers</h1>
            @forelse ($treetrainers as $trainer)
                <div class=" rounded-2xl text-white h-[11rem] w-[15rem] relative">
                    <img class="w-full h-full rounded-2xl opacity-70 bg-black"
                        src="{{ asset('storage/images/' . $trainer->image) }}" alt="">
                    <div class="absolute left-5 top-5 text-xl font-semibold text-white">{{ $trainer->name }}</div>
                    <div class="text-xs absolute left-5 top-[4rem] text-gray-200">CheckOut My Session It Will <br> Be Very
                        HelpFull For You </div>
                    <a class=" underline absolute right-3 font-semibold bottom-10"
                        href="trainer/show/{{ $trainer->id }}">Check Profile</a>
                </div>

            @empty
                <div>No Trainers Been Added Yet</div>
            @endforelse

            {{-- <div class="bg-red-500 rounded-2xl h-[13rem] w-[14rem]"></div>
            <div class="bg-red-500 rounded-2xl h-[13rem] w-[14rem]"></div> --}}


        </div>
        {{-- today activity --}}
        <div data-aos-once="false" data-aos-delay="500" data-aos="fade-down" class="bg-[#2a2a2a] h-[13rem] w-[30rem] rounded-2xl absolute bottom-3 right-[20rem] p-4">
            <h1 class="text-2xl text-gray-300 absolute font-semibold top-[-35px] left-0">Today Activity</h1>
            <ul class="space-y-2 h-full">

                <li
                    class="flex items-center gap-3 bg-[#3a3a3a] p-2 rounded-lg transition-transform transform hover:scale-[1.03] hover:bg-[#404040]">
                    <i class="fa-solid fa-dumbbell text-[#067e9e] text-lg"></i>
                    <div class="text-gray-300 text-sm flex-1">
                        <span class="font-semibold">30 Push-ups</span>
                        <p class="text-xs text-gray-400">3 sets, warm-up first</p>
                    </div>

                    <button class="ml-2 p-1 text-[#067e9e] transition-all hover:text-[#0890b1]" onclick="markDone(this)">
                        <i class="fa-solid fa-check-circle text-lg"></i>
                    </button>
                </li>

                <li
                    class="flex items-center gap-3 bg-[#3a3a3a] p-2 rounded-lg transition-transform transform hover:scale-[1.03] hover:bg-[#404040]">
                    <i class="fa-solid fa-running text-[#067e9e] text-lg"></i>
                    <div class="text-gray-300 text-sm flex-1">
                        <span class="font-semibold">15-min Run</span>
                        <p class="text-xs text-gray-400">Treadmill or outdoors</p>
                    </div>

                    <button class="ml-2 p-1 text-[#067e9e] transition-all hover:text-[#0890b1]" onclick="markDone(this)">
                        <i class="fa-solid fa-check-circle text-lg"></i>
                    </button>
                </li>

                <li
                    class="flex items-center gap-3 bg-[#3a3a3a] p-2 rounded-lg transition-transform transform hover:scale-[1.03] hover:bg-[#404040]">
                    <i class="fa-solid fa-bicycle text-[#067e9e] text-lg"></i>
                    <div class="text-gray-300 text-sm flex-1">
                        <span class="font-semibold">5-Mile Cycle</span>
                        <p class="text-xs text-gray-400">Stationary or road bike</p>
                    </div>

                    <button class="ml-2 p-1 text-[#067e9e] transition-all hover:text-[#0890b1]" onclick="markDone(this)">
                        <i class="fa-solid fa-check-circle text-lg"></i>
                    </button>
                </li>
            </ul>
        </div>

        <script>
            function markDone(button) {
                const task = button.closest('li');
                const title = task.querySelector('.font-semibold');
                const icon = button.querySelector('i');


                title.classList.toggle('text-green-500');
                icon.classList.toggle('text-green-500');
            }
        </script>




    </div>
@endsection
