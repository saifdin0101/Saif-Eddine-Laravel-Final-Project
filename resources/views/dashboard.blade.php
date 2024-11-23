@extends('layouts.index')

@section('content')
    <div class="py-12 h-[100vh] relative">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 absolute right-2 top-3">

            @php
                $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                $today = now()->format('l');
            @endphp

            <div
                class="schedule-container bg-[#2a2a2a] text-white p-6 rounded-xl w-[30rem] h-[18rem] mx-auto relative shadow-lg">

                <h1 class="text-center text-2xl font-bold mb-4 text-[#0890b1] uppercase tracking-wide">Weekly Activity</h1>

                <p class="text-center text-sm text-gray-400 mb-6">Track your login streaks and stay consistent!</p>


                <div class="flex justify-between items-end h-[130px] px-4">
                    @foreach ($days as $day)
                        @php
                            $isToday = $day === $today;
                            $height = $day === 'Sunday' ? 0 : ($isToday ? rand(80, 120) : rand(10, 11));
                        @endphp
                        <div class="flex flex-col items-center group">

                            <div class="w-6 {{ $day === 'Sunday' ? 'bg-gray-600' : 'second-color-gradiant' }} rounded-t-md transition-all group-hover:bg-[#067e9e] relative"
                                style="height: {{ $height }}px;">

                                @if ($isToday && $day !== 'Sunday')
                                    <span
                                        class="absolute -top-8 bg-[#067e9e] text-white text-xs py-1 px-2 rounded-md opacity-0 group-hover:opacity-100 transition duration-300 shadow-lg">
                                        Logged in today!
                                    </span>
                                @endif
                            </div>

                            <span
                                class="mt-2 text-xs {{ $isToday && $day !== 'Sunday' ? 'text-[#0890b1] font-semibold' : 'text-gray-400' }}">{{ $day }}</span>
                        </div>
                    @endforeach
                </div>


                <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2">
                    <p class="text-xs text-gray-400 italic">"Consistency is the key to success!"</p>
                </div>
            </div>
        </div>
        {{-- invite your friend --}}
        <div class="w-[18rem] h-[15rem] bg-[#2a2a2a] rounded-2xl absolute right-2 bottom-3"></div>

        {{-- recomanded sessions --}}
        <div class="bg-[#2a2a2a] h-[20rem] w-[35rem] absolute left-[6rem] top-[30vh] rounded-2xl flex">
            <div class="w-[15%] bg-red-500"></div>
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
                                        <img class="h-[40px] w-[40px] rounded-lg" src="{{ asset('storage/images/' . $session->user->image) }}" alt="User Image">
                                        
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
        <div class="flex gap-5 absolute bottom-3 left-[6rem]">
            @forelse ($twoexercices as $exercice)
            <div class="bg-[#2a2a2a] h-[6rem] w-[17rem] relative rounded-2xl">
                <img class="h-[40px] w-[40px] rounded-lg absolute top-[-20px] left-3" src="{{ asset('storage/images/'. $exercice->image) }}" alt="">
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
        <div class="flex gap-5 absolute top-3 right-[37vw]">
            <div class="bg-[#2a2a2a] w-[7rem] h-[18rem] rounded-2xl"></div>
            <div class="bg-[#2a2a2a] w-[7rem] h-[18rem] rounded-2xl"></div>
        </div>
        {{-- recomanded trainers --}}
        <div class="flex absolute bg-[#2a2a2a] rounded-2xl right-3 top-[42.5vh] gap-5 p-2 ">
            @forelse ($treetrainers as $trainer)
                <div class=" rounded-2xl text-white h-[13rem] w-[14rem] relative">
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

    </div>
@endsection
