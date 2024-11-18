@extends('layouts.index')

@section('content')
    <div class="">
        <div class="flex w-[100vw]">
            <div class=" w-[30%] "></div>
            <div class="w-full">
                <div class="flex justify-center items-center h-[11rem]  ">
                    <h1 class="gradient-background font-bold text-5xl">
                        Power Up Your Workouts With <br> Greatest Trainers
                    </h1>

                </div>
                <div class="flex justify-center items-center">
                    <div
                        class=" border-2 border-white shaddow w-[90%] rounded-xl flex justify-center items-center flex-col gap-5">

                        <div class="flex justify-center items-center  mt-5  gap-10  ">

                            <input type="text" placeholder="Search..."
                                class="search-bar p-3 outline-none  font-lg text-white text-lg placeholder-gray-400 rounded-full w-[40rem]  transition-all duration-300 ease-in-out">
                            @if (Auth::user()->role == 'client' || Auth::user()->role == 'admin')
                                <button
                                    class="px-10 py-3 search-bar hover:bg-[#40f9ff] hover:duration-500 hover:text-black font-semibold text-white rounded-full">
                                    Search
                                </button>
                                <button onclick="openModal('modelConfirm')"
                                    class="relative px-10 py-3 search-bar hover:bg-[#40f9ff] hover:duration-500 hover:text-black font-semibold text-white rounded-full">
                                    {{ Auth::user()->approve ? 'Complete Your Payment' : 'Apply to Become a Trainer' }}
                                    <div class="absolute text-xs top-[-10px] bg-[#1e1e1e] text-[#40f9ff] left-5">Take the
                                        next step in your fitness journey!</div>
                                </button>
                            @else
                                <button disabled
                                    class="relative px-10 py-3 search-bar bg-gray-500  font-semibold text-white rounded-full">
                                    Welcome, Trainer {{ Auth::user()->name }}
                                    <div class="absolute text-xs top-[-10px] bg-[#1e1e1e] text-[#40f9ff] left-5">You have
                                        full access as a trainer !</div>
                                </button>
                            @endif








                        </div>
                        <div class=" w-full">
                            <div class=" w-full h-[600px] flex justify-center items-center">

                                <div
                                    class="h-[90%] w-[90%] flex justify-center items-center flex-wrap gap-5 overflow-y-scroll">
                                    @forelse ($trainers as $trainer)
                                        <div
                                            class="relative h-[16rem] cartshadow w-[14rem] bg-white rounded-xl shadow-lg overflow-hidden group">


                                            <div
                                                class="absolute inset-0 bg-gradient-to-br from-[#40f9ff] via-white to-[#f8f9fa] opacity-10 group-hover:opacity-20 transition-opacity duration-500">
                                            </div>


                                            <div class="absolute top-0 w-full h-1 bg-[#40f9ff]"></div>


                                            <div
                                                class="relative w-[6rem] h-[6rem] mx-auto mt-4 rounded-full overflow-hidden border-4 border-[#40f9ff] shadow-md">
                                                <img class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                                    src="{{ asset('storage/images/' . $trainer->image) }}"
                                                    alt="{{ $trainer->name }}">
                                            </div>


                                            <div class="mt-2 text-center">
                                                <h2 class="text-base font-bold text-gray-800">{{ $trainer->name }}</h2>
                                                <p class="text-xs text-gray-500">Certified Trainer</p>
                                            </div>


                                            <button
                                                class="absolute bottom-0 w-full bg-[#40f9ff] text-white py-2 text-center font-semibold transform translate-y-full group-hover:translate-y-0 transition-transform duration-500 ease-in-out">
                                                View Profile
                                            </button>


                                            <div
                                                class="absolute bottom-3 right-3 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                                                <svg class="w-4 h-4 text-[#40f9ff] group-hover:translate-x-1 transition-transform duration-300"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                                <svg class="w-4 h-4 text-[#40f9ff] group-hover:translate-x-2 transition-transform duration-400"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                                <svg class="w-4 h-4 text-[#40f9ff] group-hover:translate-x-3 transition-transform duration-500"
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M9 5l7 7-7 7" />
                                                </svg>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No trainers available.</p>
                                    @endforelse
                                </div>
                                {{-- model --}}
                                <!-- Modal Content -->
                                <div id="modelConfirm"
                                    class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
                                    <div class="relative top-40 mx-auto rounded-md max-w-md">

                                        <div class="flex justify-end p-2">
                                            <button onclick="closeModal('modelConfirm')" type="button"
                                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        @if (!Auth::user()->approve == false)
                                            <div class="p-6 pt-0 text-center">

                                                <!-- Page 2 (Hidden) -->
                                                <div id="page-2">
                                                    <div
                                                        class="bg-gradient-to-r from-[#00e0d4] to-[#004f5f] p-8 rounded-2xl shadow-lg max-w-xl mx-auto space-y-8 flex flex-col gap-10">
                                                        <h2 class="text-3xl font-bold text-white text-center">Payment Page
                                                        </h2>


                                                        <form method="post" action="{{ route('trainer.checkout') }}">
                                                            @csrf
                                                            <button
                                                                class="bg-[#00e0d4] text-white py-3 px-6 rounded-full hover:bg-teal-400 transition duration-300">
                                                                Proceed to Checkout
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>
                                        @else
                                            <!-- Page 1 -->
                                            <form method="post" action="{{ route('trainer.store') }}"
                                                class="bg-gradient-to-r from-[#00e0d4] to-[#004f5f] p-8 rounded-2xl shadow-lg max-w-xl mx-auto space-y-8">
                                                @csrf
                                                <h2 class="text-3xl font-bold text-white text-center">Apply to be a Trainer
                                                </h2>
                                                <!-- Why you want to be a trainer -->
                                                <div class="flex flex-col">
                                                    <label for="why" class="text-lg font-medium text-white">Why do
                                                        you
                                                        want to be a trainer?</label>
                                                    <input type="text" name="why" id="why"
                                                        placeholder="Enter your motivation..." required
                                                        class="p-4 mt-2 border-2 border-[#00ddd1] rounded-lg bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0" />
                                                </div>

                                                <!-- Years of experience -->
                                                <div class="flex flex-col">
                                                    <label for="experience" class="text-lg font-medium text-white">How
                                                        many
                                                        years of experience do you have?</label>
                                                    <input type="text" name="experience" id="experience"
                                                        placeholder="e.g., 3 years" required
                                                        class="p-4 mt-2 border-2 border-[#00ddd1] rounded-lg bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0" />
                                                </div>

                                                <!-- About yourself -->
                                                <div class="flex flex-col">
                                                    <label for="urself" class="text-lg font-medium text-white">Tell us
                                                        about yourself:</label>
                                                    <textarea name="urself" id="urself" placeholder="A little about your background..." required
                                                        class="p-4 mt-2 border-2 border-[#00ddd1] rounded-lg bg-white text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0"></textarea>
                                                </div>

                                                <!-- Hidden User ID -->
                                                <input name="user_id" value="{{ Auth::user()->id }}" type="hidden" />

                                                <!-- Submit Button -->
                                                <button type="submit"
                                                    class="w-full bg-[#00ddd1] text-white py-2 px-6 rounded-md hover:bg-[#00c0b2] focus:ring-4 focus:ring-[#00ddd1] transition-all duration-300 ease-in-out text-lg font-semibold">
                                                    Submit Application
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </div>

                                <script type="text/javascript">
                                    window.openModal = function(modalId) {
                                        document.getElementById(modalId).style.display = 'block'
                                        document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
                                    }

                                    window.closeModal = function(modalId) {
                                        document.getElementById(modalId).style.display = 'none'
                                        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                                    }

                                    // Function to switch between page 1 and page 2
                                    function showPage2() {
                                        document.getElementById('page-2').classList.remove('hidden');
                                        document.getElementById('page-1').classList.add('hidden');
                                    }

                                    // Close all modals when press ESC
                                    document.onkeydown = function(event) {
                                        event = event || window.event;
                                        if (event.keyCode === 27) {
                                            document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                                            let modals = document.getElementsByClassName('modal');
                                            Array.prototype.slice.call(modals).forEach(i => {
                                                i.style.display = 'none'
                                            })
                                        }
                                    };
                                </script>









                            </div>





                        </div>

                    </div>
                </div>
            </div>



        </div>
    </div>
    
@endsection
