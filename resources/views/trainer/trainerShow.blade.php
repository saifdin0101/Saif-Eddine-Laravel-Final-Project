@extends('layouts.index')

@section('content')
<div class="min-h-screen ml-[5rem]  py-12">
    <div class="container mx-auto px-4">
        <div class="bg-white shadow-2xl rounded-3xl overflow-hidden transform hover:scale-[1.02] transition-all duration-300">
            <!-- Trainer Header -->
            <div class="bg-gradient-to-r from-[#0890b1] to-[#06637d] p-8 sm:p-12">
                <div class="flex flex-col sm:flex-row items-center">
                    <div class="relative mb-6 sm:mb-0 sm:mr-8">
                        <div class="w-40 h-40 rounded-full border-4 border-white shadow-lg overflow-hidden">
                            <img class="w-full h-full object-cover transform hover:scale-110 transition-all duration-300" 
                                 src="{{ asset('storage/images/' . $trainer->image) }}" 
                                 alt="{{ $trainer->name }}">
                        </div>
                        <div class="absolute bottom-2 right-2 bg-green-500 rounded-full p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                    <div class="text-center sm:text-left">
                        <h1 class="text-4xl font-bold text-white mb-2">{{ $trainer->name }}</h1>
                        <p class="text-xl text-[#b3e0ff] mb-2">{{ $trainer->role }}</p>
                        <p class="text-[#b3e0ff]">{{ $trainer->email }}</p>
                    </div>
                </div>
            </div>

            <!-- Trainer Info -->
            <div class="p-8" x-data="{ tab: 'about' }">
                <nav class="flex space-x-4 mb-8">
                    <button @click="tab = 'about'" :class="{ 'text-[#0890b1] border-b-2 border-[#0890b1]': tab === 'about' }" class="text-lg font-semibold pb-2 focus:outline-none transition-all duration-300">About</button>
                    <button @click="tab = 'sessions'" :class="{ 'text-[#0890b1] border-b-2 border-[#0890b1]': tab === 'sessions' }" class="text-lg font-semibold pb-2 focus:outline-none transition-all duration-300">Sessions</button>
                    <button @click="tab = 'testimonials'" :class="{ 'text-[#0890b1] border-b-2 border-[#0890b1]': tab === 'testimonials' }" class="text-lg font-semibold pb-2 focus:outline-none transition-all duration-300">Testimonials</button>
                </nav>

                <div x-show="tab === 'about'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100">
                    <p class="text-gray-600 mb-6">
                        As a passionate fitness trainer, I'm dedicated to helping my clients achieve their health and wellness goals. With a personalized approach to training, I ensure that each session is tailored to your specific needs and abilities.
                    </p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                            <h3 class="text-xl font-semibold text-[#0890b1] mb-4">Specializations</h3>
                            <ul class="space-y-2">
                                @foreach(['Strength Training', 'Weight Loss', 'Functional Fitness', 'Nutrition Coaching'] as $specialization)
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#0890b1] mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $specialization }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="bg-gray-50 p-6 rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300">
                            <h3 class="text-xl font-semibold text-[#0890b1] mb-4">Certifications</h3>
                            <ul class="space-y-2">
                                @foreach(['Certified Personal Trainer (CPT)', 'Nutrition Specialist', 'First Aid and CPR'] as $certification)
                                    <li class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#0890b1] mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm9.707 5.707a1 1 0 00-1.414-1.414L9 12.586l-1.293-1.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                        {{ $certification }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div x-show="tab === 'sessions'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100">
                    <h2 class="text-2xl font-semibold text-[#0890b1] mb-6">Upcoming Sessions</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @php
                            $fakeSessions = [
                                ['name' => 'HIIT Workout', 'date' => '2023-06-15 10:00:00', 'duration' => 60],
                                ['name' => 'Strength Training', 'date' => '2023-06-17 14:00:00', 'duration' => 90],
                                ['name' => 'Yoga for Flexibility', 'date' => '2023-06-20 09:00:00', 'duration' => 75],
                            ];
                        @endphp
                        @foreach($fakeSessions as $session)
                            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                <div class="p-6">
                                    <h3 class="text-lg font-semibold text-[#0890b1] mb-2">{{ $session['name'] }}</h3>
                                    <div class="flex justify-between text-sm text-gray-500 mb-4">
                                        <span>{{ \Carbon\Carbon::parse($session['date'])->format('M d, Y H:i') }}</span>
                                        <span>{{ $session['duration'] }} min</span>
                                    </div>
                                    <a href="#" 
                                    class="inline-block w-full text-center bg-[#0890b1] text-white px-4 py-2 rounded-lg hover:bg-[#06637d] transition-colors duration-300">
                                        Book Session
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-show="tab === 'testimonials'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100">
                    <h2 class="text-2xl font-semibold text-[#0890b1] mb-6">Client Testimonials</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        @php
                            $fakeTestimonials = [
                                ['name' => 'John Doe', 'comment' => 'Working with this trainer has been transformative. Ive seen significant improvements in my strength and overall fitness.'],
                                ['name' => 'Jane Smith', 'comment' => 'The personalized workout plans and nutrition advice have helped me achieve my weight loss goals. Highly recommended!'],
                            ];
                        @endphp
                        @foreach($fakeTestimonials as $testimonial)
                            <div class="bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-300 p-6">
                                <p class="text-gray-600 mb-4">"{{ $testimonial['comment'] }}"</p>
                                <p class="text-[#0890b1] font-semibold">- {{ $testimonial['name'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-gray-50 p-8">
                <h2 class="text-2xl font-semibold text-[#0890b1] mb-6">Contact {{ $trainer->name }}</h2>
                <form action="" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                        <input type="text" name="name" id="name" required 
                               class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#0890b1] focus:ring focus:ring-[#0890b1] focus:ring-opacity-50 transition-all duration-300">
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                        <input type="email" name="email" id="email" required 
                               class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#0890b1] focus:ring focus:ring-[#0890b1] focus:ring-opacity-50 transition-all duration-300">
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea name="message" id="message" rows="4" required 
                                  class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-[#0890b1] focus:ring focus:ring-[#0890b1] focus:ring-opacity-50 transition-all duration-300"></textarea>
                    </div>
                    <div>
                        <button type="submit" 
                                class="w-full bg-[#0890b1] text-white px-6 py-3 rounded-lg hover:bg-[#06637d] focus:outline-none focus:ring-2 focus:ring-[#0890b1] focus:ring-opacity-50 transition-all duration-300 transform hover:-translate-y-1">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
@endsection