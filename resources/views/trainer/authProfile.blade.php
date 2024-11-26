@extends('layouts.index')

@section('content')
    <div class="min-h-screen bg-transparent py-12 px-6">

        <div class="max-w-7xl mx-auto flex space-x-8">

            <!-- Sidebar Area (Empty, as per your request) -->
            <div class="w-64 bg-transparent"></div>

            <!-- Main Content Area -->
            <div class="flex-1 bg-gradient-to-r from-black via-gray-900 to-gray-800 p-8 rounded-xl shadow-2xl border-t-4 border-teal-400 space-y-12">

                <!-- User Information Section -->
                <div class="space-y-12">
                    <div>
                        <h1 class="text-4xl font-extrabold text-white mb-6 animate__animated animate__bounceInDown">User
                            Information</h1>
                            <div
                            class="bg-black text-white rounded-lg shadow-xl overflow-hidden transform transition-transform duration-300 hover:scale-105 hover:shadow-2xl">
                            <!-- User Image Section -->
                            <div class="relative">
                                <img 
                                    class="w-full h-32 object-cover"
                                    src="{{ asset('storage/images/' . Auth::user()->image) }}" 
                                    alt="User Background">
                                <div class="absolute bottom-0 left-4 transform translate-y-1/2">
                                    <img
                                        class="h-20 w-20 rounded-full border-4 border-white"
                                        src="{{ asset('storage/images/' . Auth::user()->image) }}" 
                                        alt="User Profile">
                                </div>
                            </div>
                        
                            <!-- User Information -->
                            <div class="p-6 pt-8">
                                <div class="text-center space-y-2">
                                    <h2 class="text-2xl font-bold">{{ Auth::user()->name }}</h2>
                                    <p class="text-gray-400 text-sm">{{ Auth::user()->email }}</p>
                                    <p class="text-sm italic">{{ Auth::user()->role }}</p>
                                </div>
                                <hr class="my-4 border-gray-700">
                                <!-- Body Information -->
                                <div class="grid grid-cols-2 gap-4">
                                    @foreach ($bodyInformations as $info)
                                        <div class="flex flex-col items-center bg-gray-800 p-3 rounded-lg shadow-md">
                                            <div class="text-sm text-cyan-400 font-semibold">Height</div>
                                            <div class="text-lg font-bold">{{ $info->height }} cm</div>
                                        </div>
                                        <div class="flex flex-col items-center bg-gray-800 p-3 rounded-lg shadow-md">
                                            <div class="text-sm text-teal-400 font-semibold">Weight</div>
                                            <div class="text-lg font-bold">{{ $info->weight }} kg</div>
                                        </div>
                                        <div class="flex flex-col items-center bg-gray-800 p-3 rounded-lg shadow-md">
                                            <div class="text-sm text-purple-400 font-semibold">Body Type</div>
                                            <div class="text-lg font-bold">{{ $info->bodytype }}</div>
                                        </div>
                                        <div class="flex flex-col items-center bg-gray-800 p-3 rounded-lg shadow-md">
                                            <div class="text-sm text-pink-400 font-semibold">Calories</div>
                                            <div class="text-lg font-bold">{{ $info->calories }} kcal</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- Footer -->
                            <div class="bg-gray-900 p-4 text-center">
                                <a href="{{ route('profile.edit') }}"
                                    class="bg-cyan-500 hover:bg-cyan-600 flex justify-center items-center text-white px-6 py-2 rounded-lg font-semibold transition-all duration-300">
                                    Update Info
                                </a>
                            </div>
                        </div>
                        


                    </div>

                    <!-- Joined Sessions Section -->
                    <div>
                        <h1 class="text-4xl font-extrabold text-white mb-6 animate__animated animate__bounceInUp">Joined
                            Sessions</h1>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse ($joinedSessions as $session)
                                <div class="session-card bg-cover bg-center p-6 rounded-lg shadow-lg transform transition-all duration-500 hover:scale-105 hover:rotate-3"
                                    style="background-image: url('{{ asset('storage/images/' . $session->image) }}');">
                                    <div class="overlay bg-black opacity-70 rounded-lg p-4 space-y-4">
                                        <h3 class="text-2xl font-bold text-white">{{ $session->name }}</h3>
                                        <p class="text-sm text-gray-100"><strong>Start:</strong> {{ $session->start_time }}
                                        </p>
                                        <p class="text-sm text-gray-100"><strong>End:</strong> {{ $session->end_time }}</p>
                                        <p class="text-sm text-gray-100"><strong>Premium:</strong>
                                            {{ $session->premium ? 'Yes' : 'No' }}</p>
                                        <a href="#" class="text-pink-400 hover:underline block mt-2">Check it out</a>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 text-center col-span-full">You haven't joined any sessions yet.</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Completed Exercises Section -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold mb-6 text-cyan-400">Completed Exercises</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse ($doneExercises as $exercise)
                                <div
                                    class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-all duration-300 hover:shadow-cyan-400/30 hover:-translate-y-1">
                                    <img src="{{ asset('storage/images/' . $exercise->image) }}"
                                        alt="{{ $exercise->name }}" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h3 class="text-xl font-semibold mb-2">{{ $exercise->name }}</h3>
                                        <p class="text-gray-400 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-2"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
                                            </svg>
                                            {{ $exercise->time }} minutes
                                        </p>
                                        <p class="text-gray-400 mb-1">
                                            <span class="font-semibold">Calories:</span> {{ $exercise->calories }} kcal
                                        </p>
                                        <p class="text-gray-400 mb-1">
                                            <span class="font-semibold">Location:</span> {{ $exercise->location }}
                                        </p>
                                        <p class="text-gray-400">
                                            <span class="font-semibold">Premium:</span>
                                            {{ $exercise->premium ? 'Yes' : 'No' }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-400 col-span-full text-center">You haven't completed any exercises yet.
                                </p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Favorite Exercises Section -->
                    <div>
                        <h2 class="text-3xl font-bold mb-6 text-cyan-400">Favorite Exercises</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @forelse ($favoriteExercises as $exercise)
                                <div
                                    class="bg-gray-800 rounded-lg overflow-hidden shadow-lg transition-all duration-300 hover:shadow-cyan-400/30 hover:-translate-y-1 relative">
                                    <div
                                        class="absolute top-0 right-0  text-teal-400 font-bold px-4 py-2 rounded-bl-lg z-10">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-1"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                        Favorite
                                    </div>
                                    <img src="{{ asset('storage/images/' . $exercise->image) }}"
                                        alt="{{ $exercise->name }}" class="w-full h-48 object-cover">
                                    <div class="p-4 border-t-4 border-cyan-500">
                                        <h3 class="text-xl font-semibold mb-2 text-cyan-400">{{ $exercise->name }}</h3>
                                        <p class="text-gray-300 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-2"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            {{ $exercise->time }} minutes
                                        </p>
                                        <p class="text-gray-300 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-2"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 18.657A8 8 0 016.343 7.343S7 9 9 10c0-2 .5-5 2.986-7C14 5 16.09 5.777 17.656 7.343A7.975 7.975 0 0120 13a7.975 7.975 0 01-2.343 5.657z" />
                                            </svg>
                                            {{ $exercise->calories }} kcal
                                        </p>
                                        <p class="text-gray-300 mb-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-2"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            {{ $exercise->location }}
                                        </p>
                                        <p class="text-gray-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="inline-block w-4 h-4 mr-2"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                            </svg>
                                            {{ $exercise->premium ? 'Premium' : 'Standard' }}
                                        </p>
                                    </div>
                                    <div class="bg-gray-700 p-4">
                                        <a href=""
                                            class="block w-full text-center bg-cyan-500 hover:bg-cyan-600 text-white font-bold py-2 px-4 rounded transition duration-300">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-400 col-span-full text-center">You haven't marked any exercises as
                                    favorite yet.</p>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
