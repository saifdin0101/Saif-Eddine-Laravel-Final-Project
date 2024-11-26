@extends('layouts.index')

@section('content')
    <div class="">
        <div class="flex w-[100vw]">
            <div class=" w-[15%] "></div>
            <div class="w-full">
                <div class="flex justify-center items-center h-[11rem]   ">
                    <h1 class="gradient-background font-bold text-5xl">
                        Power Up Your Workouts With <br> Greatest Trainers
                    </h1>
                </div>
                <div class="flex justify-center items-center ">
                    <div
                        class=" border-[#0890b0] border-2 shaddow w-[94%] rounded-xl flex justify-center items-center flex-col gap-5">

                        <div class="flex justify-center items-center  mt-5  gap-10  ">

                            <input type="text" placeholder="Search..." id="searchInput"
                                class="search-bar p-3 outline-none  font-lg text-white text-lg placeholder-gray-400 rounded-full w-[40rem]  transition-all duration-300 ease-in-out">
                            @if (Auth::user()->role == 'client' || Auth::user()->role == 'admin')
                                <button id="searchButton"
                                    class="px-10 py-3 search-bar hover:bg-[#40f9ff] hover:duration-500 hover:text-black font-semibold text-white rounded-full">
                                    Search
                                </button>
                                <button onclick="openModal('modelConfirm')"
                                    class="relative px-10 py-3 search-bar hover:bg-[#40f9ff] hover:duration-500 hover:text-black font-semibold text-white rounded-full">
                                    {{ Auth::user()->approve ? 'Complete Your Payment' : 'Apply to Become a Trainer' }}
                                    <div class="absolute text-xs top-[-10px] bg-[#1e1e1e] text-[#0890b1] left-5">Take the
                                        next step in your fitness journey!</div>
                                </button>
                            @else
                                <button disabled
                                    class="relative px-10 py-3 search-bar bg-gray-500  font-semibold text-white rounded-full">
                                    Welcome, Trainer {{ Auth::user()->name }}
                                    <div class="absolute text-xs top-[-10px] bg-[#1e1e1e] text-[#0890b1] left-5">You have
                                        full access as a trainer !</div>
                                </button>
                            @endif
                        </div>
                        <div class=" w-full">
                            <div class=" w-full h-[600px] flex justify-center items-center">

                                <div id="trainerContainer"
                                    class="h-[90%] w-[90%] flex justify-center items-center flex-wrap gap-5 overflow-y-scroll">
                                    @foreach ($trainers as $trainer)
                                        <div class="card trainer-card" data-name="{{ strtolower($trainer->name) }}">
                                            <button class="mail">
                                                <svg class="lucide lucide-mail" stroke-linejoin="round"
                                                    stroke-linecap="round" stroke-width="2" stroke="currentColor"
                                                    fill="none" viewBox="0 0 24 24" height="24" width="24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect rx="2" y="4" x="2" height="16" width="20"></rect>
                                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                                                </svg>
                                            </button>
                                            <div class="profile-pic"><img
                                                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                                                    src="{{ asset('storage/images/' . $trainer->image) }}"
                                                    alt="{{ $trainer->name }}"></div>
                                            <div class="bottom">
                                                <div class="content">
                                                    <span class="name">{{ $trainer->name }}</span>
                                                    <span class="about-me">Check My Profile To Know More About Me 
                                                    </span>
                                                </div>
                                                <div class="bottom-bottom">
                                                    <div class="social-links-container">
                                                        <svg viewBox="0 0 16 15.999" height="15.999" width="16"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <path transform="translate(6 598)"
                                                                d="M6-582H-2a4,4,0,0,1-4-4v-8a4,4,0,0,1,4-4H6a4,4,0,0,1,4,4v8A4,4,0,0,1,6-582ZM2-594a4,4,0,0,0-4,4,4,4,0,0,0,4,4,4,4,0,0,0,4-4A4.005,4.005,0,0,0,2-594Zm4.5-2a1,1,0,0,0-1,1,1,1,0,0,0,1,1,1,1,0,0,0,1-1A1,1,0,0,0,6.5-596ZM2-587.5A2.5,2.5,0,0,1-.5-590,2.5,2.5,0,0,1,2-592.5,2.5,2.5,0,0,1,4.5-590,2.5,2.5,0,0,1,2-587.5Z"
                                                                data-name="Subtraction 4" id="Subtraction_4"></path>
                                                        </svg>
                                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M389.2 48h70.6L305.6 224.2 487 464H345L233.7 318.6 106.5 464H35.8L200.7 275.5 26.8 48H172.4L272.9 180.9 389.2 48zM364.4 421.8h39.1L151.1 88h-42L364.4 421.8z">
                                                            </path>
                                                        </svg>

                                                        <svg viewBox="0 0 496 512" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3.3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5.3-6.2 2.3zm44.2-1.7c-2.9.7-4.9 2.6-4.6 4.9.3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3.7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3.3 2.9 2.3 3.9 1.6 1 3.6.7 4.3-.7.7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3.7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3.7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z">
                                                            </path>
                                                        </svg>
                                                    </div>
                                                    <button class="button"><a class="h-full w-full" href="trainer/show/{{ $trainer->id }}">Check  Profile</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                
                                <!-- Modal Content -->
                                <div id="modelConfirm"
                                    class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
                                    <!-- Modal content remains unchanged -->
                                </div>

                                <script type="text/javascript">
                                    // Existing modal and page switching functions remain unchanged

                                    // Search functionality
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const searchInput = document.getElementById('searchInput');
                                        const searchButton = document.getElementById('searchButton');
                                        const trainerCards = document.querySelectorAll('.trainer-card');

                                        function filterTrainers() {
                                            const searchTerm = searchInput.value.toLowerCase().trim();
                                            trainerCards.forEach(card => {
                                                const trainerName = card.getAttribute('data-name');
                                                if (trainerName.includes(searchTerm)) {
                                                    card.style.display = 'block';
                                                } else {
                                                    card.style.display = 'none';
                                                }
                                            });
                                        }

                                        searchButton.addEventListener('click', filterTrainers);
                                        searchInput.addEventListener('keyup', function(event) {
                                            if (event.key === 'Enter') {
                                                filterTrainers();
                                            }
                                        });
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection