@extends('layouts.index')



@section('content')
    <div>
        <div class="100vw flex">
            <div class="w-[30%] "></div>
            <div class="w-full text-blue-50 relative mt-[10rem]">
                <div class="absolute right-10">
                    <button onclick="openModal('modelConfirm3')"
                        class="relative animate-float px-10 py-3 search-bar hover:bg-[#40f9ff] hover:duration-500 hover:text-black font-semibold text-white rounded-full transition-transform hover:scale-110 shadow-lg">
                        Create Session
                        <div class="absolute text-xs top-[-10px] bg-[#1e1e1e] text-[#40f9ff] left-5">Create Exercice!</div>
                    </button>
                </div>
                <div class=" flex justify-center items-center mt-[5rem] flex-wrap gap-5 ">
                    @forelse ($exercices as $exercice)
                        <div
                            class="exercise-card bg-[#004f5f] text-white rounded-lg shadow-2xl overflow-hidden transform transition duration-300 ease-in-out hover:scale-105 hover:shadow-3xl">
                            <!-- Image -->
                            <div class="relative">
                                <img src="{{ asset('storage/images/' . $exercice->image) }}" alt="Exercise Image"
                                    class="w-[400px] h-56 object-cover rounded-t-lg">

                                <!-- Gradient Overlay -->
                                <div
                                    class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black opacity-40 rounded-t-lg">
                                </div>
                            </div>
                            @if ($exercice->premium)
                                <div
                                    class="absolute top-4 right-4 bg-[#00e0d4] text-[#004f5f] py-1 px-4 rounded-full text-xs font-semibold shadow-lg">
                                    Premium
                                </div>
                            @endif
                            <!-- Content -->
                            <div class="p-6 space-y-4 relative">
                                <!-- Exercise Name -->
                                <div class="text-xl font-bold">{{ $exercice->name }}</div>
                                @if (Auth::user()->favoriteExercises->contains($exercice->id))
                               
                                    <form method="POST" class="absolute top-6 right-5" action="{{ route('exercice.dettach') }}">
                                        @csrf
                                        <input name="exercise_id" value="{{ $exercice->id }}" type="hidden">
                                       
                                        
                                            <div class="relative flex justify-center items-center">
                                                <svg  viewBox="0 0 24 24" class="w-6 absolute h-6 fill-current text-[#00e0d4] ">
                                                    <path 
                                                        d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                                    </path>
                                                </svg>
                                                <button class="absolute h-[20px] w-[20px] z-30 "></button>
                                            </div>
                                       
                                    </form>
                                @else
                                    <form class="absolute top-2 right-2" method="POST"
                                        action="{{ route('exercice.favorite') }}">
                                        @csrf
                                        <input name="user_id" value="{{ Auth::user()->id }}" type="hidden">
                                        <input type="hidden" name="exercice_id" value="{{ $exercice->id }}">

                                        <input type="checkbox" id="star{{ $loop->iteration }}" class="favorite-checkbox"
                                            onchange="this.form.submit()"
                                            {{ Auth::user()->favoriteExercises->contains($exercice->id) ? 'checked' : '' }}>

                                        <label for="star{{ $loop->iteration }}" class="favorite-label">
                                            <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current ">
                                                <path
                                                    d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z">
                                                </path>
                                            </svg>
                                        </label>
                                    </form>
                                @endif

                                <!-- Description -->
                                <div class="text-sm text-gray-300 h-20 overflow-hidden">
                                    {{ $exercice->descreption }}
                                </div>

                                <!-- Time and Location -->
                                <div class="flex justify-between items-center text-sm text-gray-200">
                                    <div class="flex items-center justify-center  space-x-2">
                                        <i class="bi bi-stopwatch-fill text-[#00e0d4] pb-1"></i>
                                        <span>{{ $exercice->time }}</span>
                                    </div>
                                    <div class="flex items-center space-x-2 pb-1">
                                        <i class="bi bi-geo-alt-fill text-[#00e0d4]"></i>
                                        <span>{{ $exercice->location }}</span>
                                    </div>
                                </div>
                                <form class="absolute right-0 bottom-0 bg-[#00e0d4] rounded-tl-full pl-3 py-2 hover:bg-[#0c3331] duration-200 cursor-pointer" action="">
                                    <button>Mark Exercice Done</button>
                                </form>

                                <!-- Calories -->
                                <div class="text-lg font-semibold flex items-center space-x-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
                                        <path
                                            d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16m0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15" />
                                    </svg>
                                    <span class="text-[#00e0d4]">{{ $exercice->calories }} Calories</span>
                                </div>

                                <!-- Premium Badge -->

                            </div>
                        </div>


                    @empty
                        <div class="text-red-500">No exercices Been Added Yet !!!</div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>












    <div id="modelConfirm3" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4">
        <div class="relative top-40 mx-auto rounded-md max-w-md">
            <div class="flex justify-end p-2">
                <button onclick="closeModal('modelConfirm3')" type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form method="post" action="{{ route('exercice.store') }}" enctype="multipart/form-data"
                class="bg-gradient-to-r from-[#00e0d4] to-[#004f5f] p-10 rounded-2xl shadow-xl max-w-lg mx-auto space-y-8">
                @csrf

                <div class="space-y-4">
                    <div>
                        <label for="image" class="block text-white font-medium mb-2">Exercise Image</label>
                        <input name="image" type="file"
                            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#00e0d4] bg-white text-gray-900 transition duration-300">
                    </div>


                    <div>
                        <label for="name" class="block text-white font-medium mb-2">Exercise Name</label>
                        <input name="name" type="text"
                            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#00e0d4] bg-white text-gray-900 transition duration-300"
                            placeholder="Enter exercise name" required>
                    </div>


                    <div>
                        <label for="calories" class="block text-white font-medium mb-2">Calories Burned</label>
                        <input name="calories" type="text"
                            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#00e0d4] bg-white text-gray-900 transition duration-300"
                            placeholder="Enter calories burned" required>
                    </div>


                    <div>
                        <label for="description" class="block text-white font-medium mb-2">Description</label>
                        <textarea name="descreption" rows="4"
                            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#00e0d4] bg-white text-gray-900 transition duration-300"
                            placeholder="Describe the exercise" required></textarea>
                    </div>


                    <div>
                        <label for="time" class="block text-white font-medium mb-2">Exercise Time</label>
                        <input name="time" type="time"
                            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#00e0d4] bg-white text-gray-900 transition duration-300"
                            required>
                    </div>

                    <input name="sesin_id" value="{{ $session->id }}" type="hidden">
                    <div>
                        <label for="location" class="block text-white font-medium mb-2">Exercise Location</label>
                        <select name="location"
                            class="w-full p-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-[#00e0d4] bg-white text-gray-900 transition duration-300"
                            required>
                            <option selected disabled value="">Select Exercise Location</option>
                            <option value="gym_room_1">Gym room 1</option>
                            <option value="gym_room_2">Gym room 2</option>
                            <option value="gym_room_3">Gym room 3</option>
                            <option value="gym_room_4">Gym room 4</option>
                            <option value="gym_room_5">Gym room 5</option>
                            <option value="gym_room_6">Gym room 6</option>
                            <option value="gym_room_7">Gym room 7</option>
                            <option value="outdoor">Outdoor</option>
                            <option value="trip">Trip</option>
                            <option value="home">Home</option>
                        </select>
                    </div>


                    <div class="flex items-center space-x-2">
                        <input name="premium" type="checkbox" id="premium"
                            class="w-5 h-5 text-[#00e0d4] focus:ring-[#00e0d4]">
                        <label for="premium" class="text-white font-medium">Make this a Premium Exercise</label>
                    </div>


                    <div>
                        <button type="submit"
                            class="w-full py-3 px-4 rounded-lg text-white font-semibold bg-[#004f5f] hover:bg-[#00e0d4] transition duration-300 ease-in-out transform hover:scale-105 focus:outline-none">
                            Create Exercise
                        </button>
                    </div>
                </div>
            </form>

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
