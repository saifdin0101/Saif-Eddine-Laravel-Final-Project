@extends('layouts.index')

@section('content')
    <div class="flex justify-center items-center mt-20">
        <div class="bg-gradient-to-r from-[#00e0d4] to-[#004f5f] p-8 rounded-2xl shadow-lg w-full max-w-3xl">
            <h2 class="text-2xl font-bold text-white text-center mb-6">Update Session</h2>
            
            <form method="POST" action="{{ route('session.update', $session->id) }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Session Image -->
                <div>
                    <label for="image" class="block text-white font-medium mb-2">Session Image</label>
                    <div class="relative group">
                        <label for="image"
                            class="flex items-center justify-center bg-[#004f5f] hover:bg-[#00e0d4] text-white p-3 rounded-lg cursor-pointer transition duration-300">
                            <i class="fa-solid fa-upload mr-2"></i>
                            <span>Choose File</span>
                        </label>
                        <input id="image" name="image" type="file" accept="image/*" class="hidden">
                    </div>
                    @if ($session->image)
                        <div class="mt-4 flex justify-center">
                            <img src="{{ asset('storage/images/' . $session->image) }}" alt="Session Image"
                                class="h-[15rem] w-[40rem] rounded-md object-cover border-2 border-white shadow-lg">
                        </div>
                    @endif
                </div>

                <!-- Session Name -->
                <div>
                    <label for="name" class="block text-white font-medium mb-2">Name</label>
                    <input id="name" name="name" type="text" value="{{ $session->name }}"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#00e0d4]"
                        required>
                </div>

                <!-- Start Date -->
                <div>
                    <label for="start_time" class="block text-white font-medium mb-2">Start Date</label>
                    <input id="start_time" name="start_time" type="datetime-local" value="{{ $session->start_time }}"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#00e0d4]"
                        required>
                </div>

                <!-- End Date -->
                <div>
                    <label for="end_time" class="block text-white font-medium mb-2">End Date</label>
                    <input id="end_time" name="end_time" type="datetime-local" value="{{ $session->end_time }}"
                        class="w-full p-3 rounded-lg border border-gray-300 bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-[#00e0d4]"
                        required>
                </div>

                <!-- Premium Checkbox -->
                <div>
                    <label for="premium" class="block text-white font-medium mb-2">Premium</label>
                    <input id="premium" name="premium" type="checkbox" {{ $session->premium ? 'checked' : '' }}
                        class="rounded border-gray-300 text-[#00e0d4] focus:ring-[#00e0d4]">
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('session.index') }}"
                        class="px-6 py-3 bg-gray-700 text-white rounded-lg shadow-md hover:bg-gray-800">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-[#004f5f] text-white rounded-lg shadow-md hover:bg-[#00e0d4] transition duration-300">
                        Update Session
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
