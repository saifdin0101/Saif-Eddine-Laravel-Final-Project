@extends('layouts.index')

@section('content')
<!-- Include the necessary CDN links for Font Awesome and Tailwind CSS -->
<head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Tailwind CSS -->
   
</head>

<div class="min-h-screen img7 flex items-center justify-center  p-6">
    <form enctype="multipart/form-data" method="POST" action="{{ route('register') }}" 
          class="w-full  max-w-md gg2 text-white rounded-2xl gg p-8">
        @csrf

        <!-- WorkOut-Now Title -->
        <div class="text-3xl font-semibold text-center  mb-6">
            <div class="spacee text-2xl gg3">WorkOut-Now</div>
        </div>

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Name')" class="text-[#00e0d4]" />
            <x-text-input id="name" class="block mt-1 w-full border-[#00e0d4] bg-transparent text-white rounded-lg shadow-sm focus:ring-[#00e0d4] focus:border-[#00e0d4]" 
                          type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-[#00e0d4]" />
            <x-text-input id="email" class="block mt-1 w-full border-[#00e0d4] bg-transparent text-white rounded-lg shadow-sm focus:ring-[#00e0d4] focus:border-[#00e0d4]" 
                          type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <input name="role" value="client" type="hidden">

        <!-- Custom File Upload with Image Preview -->
        <div class="mb-6">
            <x-input-label for="image" :value="__('Profile Picture')" class="text-[#00e0d4]" />
            <div class="relative mt-1 group">
                <!-- File Input -->
                <input id="image" name="image" type="file" class="hidden" required onchange="previewImage(event)" />
                <!-- File Input Area (Appears when clicking on label or image) -->
                <div class="w-full h-36 flex items-center justify-center border-2 border-dashed border-[#00e0d4] rounded-lg cursor-pointer relative overflow-hidden">
                    <img id="preview" class="absolute w-full h-full object-cover hidden" />
                    <div class="flex flex-col items-center justify-center">
                        <!-- Upload Icon (Font Awesome) -->
                        <i class="fas fa-upload text-4xl text-[#00e0d4] group-hover:text-teal-500 transition duration-300 mb-2"></i>
                        <p class="text-[#00e0d4] text-sm">Click to upload or drag & drop</p>
                    </div>
                </div>
                <!-- Label for clickable area -->
                <label for="image" class="absolute inset-0 cursor-pointer"></label>
            </div>
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" class="text-[#00e0d4]" />
            <x-text-input id="password" class="block mt-1 w-full border-[#00e0d4] bg-transparent text-white rounded-lg shadow-sm focus:ring-[#00e0d4] focus:border-[#00e0d4]" 
                          type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-[#00e0d4]" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-[#00e0d4] bg-transparent text-white rounded-lg shadow-sm focus:ring-[#00e0d4] focus:border-[#00e0d4]" 
                          type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit Button -->
        <div class="mb-4">
            <x-primary-button class="w-full bg-gradient-to-r from-[#00e0d4] to-[#008b8b] text-white py-2 px-4 rounded-lg hover:bg-gradient-to-r hover:from-[#00e0d4] hover:to-[#00e0d4]">
                {{ __('Register') }}
            </x-primary-button>
        </div>

        <!-- Already Registered -->
        <div class="mt-4 text-center">
            <a class="underline text-sm text-[#00e0d4] hover:text-teal-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>
        </div>
    </form>
</div>

<script>
    // Image preview functionality
    function previewImage(event) {
        const preview = document.getElementById('preview');
        const file = event.target.files[0];
        
        if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                preview.src = e.target.result; // Set the src of the image to the file content
                preview.classList.remove('hidden'); // Show the preview image
            }

            reader.readAsDataURL(file); // Read the file as a data URL (base64)
        }
    }
</script>

@endsection
