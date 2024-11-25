@extends('layouts.index')

@section('content')
    <div>
        <div class="100vw flex">
            <div class="absolute text-4xl top-10 right-[24%] gradient-background text-center font-bold flex justify-center items-center"> Transform your fitness journey with <br> dynamic sessions</div>
            <!-- Sidebar space -->
            <div class="w-[20%]"></div>

            <!-- Main Content Area -->
            <div class="w-full mt-[10rem] relative border-[7px] border-[#00aba3] pb-5   rounded-[40px] mr-5 px-5">
                @if (Auth::user()->role == 'trainer')
                    <div class="absolute right-10 top-[-25px]">
                        <button onclick="openModal('modelConfirm2')"
                            class="relative animate-float px-10 py-3 search-bar hover:bg-[#40f9ff] hover:duration-500 hover:text-black font-semibold text-white rounded-full transition-transform hover:scale-110 shadow-lg">
                            Create Session
                            <div class="absolute text-xs top-[-10px] bg-[#1e1e1e] text-[#40f9ff] left-5">Create Session!
                            </div>
                        </button>
                    </div>
                @endif

                <div class="mt-14 py-5 flex  overflow-y-scroll  h-[55rem]   items-center flex-wrap gap-5">
                    @forelse ($sessions as $session)
                        <div
                            class="h-[25rem] ml-10 tilt-card shadow-lg hover:shadow-[#40f9ff]/50 w-[31.5rem] overflow-hidden rounded-3xl relative group transition-all duration-500 hover:shadow-2xl">
                            <img class="h-full w-full hover:scale-105 transition-transform duration-700 rounded-2xl"
                                src="{{ asset('storage/images/' . $session->image) }}" alt="">


                            <!-- Profile and Session Check -->
                            <div class="flex gap-5 absolute top-5 left-5">
                                <div class="h-[50px] w-[50px] rounded-full border-2 border-white">
                                    <img class="h-full w-full rounded-full"
                                        src="{{ asset('storage/images/' . $session->user->image) }}" alt="">
                                </div>
                                <div
                                    class="relative   z-10 p-4 backdrop-blur-md rounded-full shadow-lg text-white font-thin transition-transform group-hover:translate-x-2">
                                    {{ $session->user->name }}
                                </div>
                            </div>

                            <!-- Date Time Section -->
                            <div
                                class="h-[14rem] w-[13rem] absolute top-2 right-3 rounded-xl flex justify-center items-center flex-col gap-5 bg-white/30 backdrop-blur-lg shadow-lg group-hover:shadow-[#40f9ff]/50 transition-shadow">
                                <div class="text-xs  text-gray-50">Date Time Of This Session</div>
                                <div class="img6  text-white relative rounded-lg img6 h-[4rem] w-[12rem]">
                                    <div class="absolute bottom-2 right-2">
                                        <div class="text-xs font-semibold ">Starting at:</div>
                                        <div class="text-sm font-semibold">{{ $session->start_time }}</div>
                                    </div>
                                </div>
                                <div class="img6 text-white relative rounded-lg img6 h-[4rem] w-[12rem]">
                                    <div class="absolute bottom-2 right-2">
                                        <div class="text-xs font-semibold">Ending at:</div>
                                        <div class="text-sm font-semibold">{{ $session->end_time }}</div>
                                    </div>
                                </div>
                            </div>
                            @if (Auth::user()->id == $session->user_id)
                                <div class="text-2xl flex gap-4 absolute bottom-2 right-6">
                                    <div>
                                        <form class="text-red-500" method="post"
                                            action="{{ route('session.destroy', $session->id) }}">
                                            @method('DELETE')
                                            @csrf

                                            <button><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </div>
                                    <div>


                                        <a class="text-green-500" href="{{ route('session.edit', $session->id) }}"> <i
                                                class="fa-solid fa-pen-to-square"></i></a>

                                    </div>
                                </div>
                            @endif

                            <!-- Session Info -->
                            <div class="flex flex-col gap-10 absolute bottom-10 left-5">
                                <h1 class="text-3xl font-bold text-white">{{ $session->name }}</h1>
                                @if ($session->user_id == Auth::user()->id)
                                    <a class="flex text-sm justify-center items-center hover:scale-105 transition-transform h-[40px] w-[210px] hover:bg-black duration-200 rounded-full gap-5 hover:text-[#40f9ff] bg-white/30 backdrop-blur-md text-white shadow-md"
                                        href="{{ route('session.show', $session->id) }}">
                                        Check Out Ur Exercises
                                        <div class="bg-white rounded-full px-1 text-black flex justify-center items-center">
                                            <i class="bi bi-chevron-right text-[#40f9ff] text-xl pb-[5px] px-1"></i>
                                        </div>
                                    </a>
                                @else
                                    @if (!$session->premium || $session->pay)
                                        @if (Auth::user()->exerciceSesins->contains($session->id))
                                            <a class="flex text-sm justify-center items-center hover:scale-105 transition-transform h-[40px] w-[220px] hover:bg-black duration-200 rounded-full gap-5 hover:text-[#40f9ff] bg-white/30 backdrop-blur-md text-white shadow-md"
                                                href="{{ route('session.show', $session->id) }}">
                                                Check Out Our Exercises
                                                <div
                                                    class="bg-white rounded-full px-1 text-black flex justify-center items-center">
                                                    <i class="bi bi-chevron-right text-[#40f9ff] text-xl pb-[5px] px-1"></i>
                                                </div>
                                            </a>
                                        @else
                                            <form action="{{ route('session.join', $session->id) }}" method="POST">
                                                @csrf
                                                <button
                                                    class="flex text-sm hover:bg-black duration-200 justify-center items-center hover:scale-105 transition-transform h-[40px] w-[150px] rounded-full gap-7 hover:text-[#40f9ff] bg-white/30 backdrop-blur-md text-white shadow-md">
                                                    Join Us Now
                                                    <div
                                                        class="bg-white rounded-full px-1 text-black flex justify-center items-center">
                                                        <i
                                                            class="bi bi-chevron-right text-[#40f9ff] text-xl pb-[5px] px-1"></i>
                                                    </div>
                                                </button>
                                            </form>
                                        @endif
                                    @else
                                        @if (in_array($session->id, $payedSessions))
                                            <a class="flex text-sm justify-center items-center hover:scale-105 transition-transform h-[40px] w-[220px] hover:bg-black duration-200 rounded-full gap-5 hover:text-[#40f9ff] bg-white/30 backdrop-blur-md text-white shadow-md"
                                                href="{{ route('session.show', $session->id) }}">
                                                Check Out Our Exercises
                                                <div
                                                    class="bg-white rounded-full px-1 text-black flex justify-center items-center">
                                                    <i class="bi bi-chevron-right text-[#40f9ff] text-xl pb-[5px] px-1"></i>
                                                </div>
                                            </a>
                                        @else
                                            <form method="post" action="{{ route('session.checkout') }}">
                                                @csrf
                                                <input name="sesin_id" value="{{ $session->id }}" type="hidden">
                                                <input name="user_id" value="{{ Auth::user()->id }}" type="hidden">
                                                <button
                                                    class="bg-[#00e0d4] text-white py-3 px-6 rounded-full hover:bg-teal-400 transition duration-300">
                                                    Buy The Session
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                @endif


                            </div>
                        </div>
                    @empty
                        <div class="text-white text-center">No Sessions Have Been Added Yet! Be the First to Create One.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center  items-center ml-[10rem] relative mt-[3rem] ">
        <h1
            class="text-center   absolute left-[15rem] w-[20rem] rounded-full top-[-20px] text-4xl font-semibold  h-[50px] text-[#40f9ff] mb-6 bg-[#1e1e1e]">
            Session Calendar</h1>




        <div id="calendar"
            class="h-[50rem] border-[#00aba3] shadow-[#40f9ff] transition-all duration-500  border-4   sm:w-3/4 p-8 rounded-lg shadow-lg bg-[#ffffff] ml-8">

            <div class="border-b-2 border-gray-300 mb-4   "></div>
            <div id="calendar-wrapper" class="p-6 rounded-lg shadow-md bg-white max-h-[70vh] overflow-y-auto">
                <!-- Calendar will render here -->
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modelConfirm2" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
        <div class="relative top-40 mx-auto rounded-md max-w-md">
            <div class="flex justify-end p-2">
                <button onclick="closeModal('modelConfirm2')" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form method="post" action="{{ route('session.store') }}" enctype="multipart/form-data"
                class="bg-gradient-to-r from-[#00e0d4] to-[#004f5f] p-8 rounded-2xl shadow-lg max-w-xl mx-auto space-y-8">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="image" class="block text-white font-medium mb-2">Session Image</label>
                        <div class="file-upload-container">
                            <input id="image" name="image" type="file" class="hidden" accept="image/*">
                            <label for="image"
                                class="file-upload-button w-full p-3 rounded-lg border border-gray-300 cursor-pointer bg-white text-gray-900">
                                <div class="flex items-center justify-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" class="w-5 h-5 text-[#00e0d4]">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16M5 12l7-7 7 7" />
                                    </svg>
                                    <span class="text-[#00e0d4]">Upload Image</span>
                                </div>
                            </label>
                            <div id="file-name" class="text-[#00e0d4] mt-2 text-center hidden">No file chosen</div>
                        </div>
                    </div>

                    <div>
                        <label for="name" class="block text-white font-medium mb-2">Name</label>
                        <input id="name" name="name" type="text"
                            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#00e0d4] bg-white text-gray-900"
                            placeholder="Enter session name" required>
                    </div>

                    <div>
                        <label for="start" class="block text-white font-medium mb-2">Start Date</label>
                        <input id="start" name="start_time" type="datetime-local"
                            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#00e0d4] bg-white text-gray-900">
                    </div>

                    <div>
                        <label for="end" class="block text-white font-medium mb-2">End Date</label>
                        <input id="end" name="end_time" type="datetime-local"
                            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#00e0d4] bg-white text-gray-900">
                    </div>

                    <div>
                        <label for="premium" class="block text-white font-medium mb-2">Make It Premium</label>
                        <input id="premium" name="premium" type="checkbox"
                            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#00e0d4] bg-white text-gray-900">
                    </div>

                    <input name="user_id" value="{{ Auth::user()->id }}" type="hidden">

                    <div>
                        <button id="submitEvent" type="submit"
                            class="w-full py-3 px-4 rounded-lg text-white font-semibold bg-[#004f5f] hover:bg-[#00e0d4] transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none">
                            Create Session
                        </button>
                    </div>
                </div>
            </form>



            <script>
                function updateFileName() {
                    const fileInput = document.getElementById('image');
                    const fileName = document.getElementById('file-name');

                    if (fileInput.files.length > 0) {
                        fileName.textContent = fileInput.files[0].name;
                        fileName.classList.remove('hidden');
                    } else {
                        fileName.textContent = 'No file chosen';
                        fileName.classList.add('hidden');
                    }
                }
            </script>



        </div>
    </div>

    <script>
        window.openModal = function(modalId) {
            document.getElementById(modalId).style.display = 'block';
            document.body.classList.add('overflow-y-hidden');
        };

        window.closeModal = function(modalId) {
            document.getElementById(modalId).style.display = 'none';
            document.body.classList.remove('overflow-y-hidden');
        };
    </script>
@endsection
