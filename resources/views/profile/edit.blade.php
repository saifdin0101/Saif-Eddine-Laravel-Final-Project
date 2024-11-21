@extends('layouts.index')
@section('content')
<x-slot name="header">
    <div class="flex items-center justify-between py-4 px-6 bg-gradient-to-r from-cyan-500 to-blue-500 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-white">
            {{ __('Profile') }}
        </h2>
        <button class="bg-white text-cyan-600 px-4 py-2 rounded-md shadow hover:bg-gray-100 transition duration-200">
            Edit Profile
        </button>
    </div>
</x-slot>

<div class="py-12 min-h-screen gg2">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Update Profile Information -->
        <div
            class="p-6 bg-gradient-to-r from-white to-gray-100 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300 group">
            <h3 class="text-lg text-cyan-400 font-semibold mb-4 group-hover:text-cyan-600 transition duration-300">
                Update Profile Information
            </h3>
            <div class="border-t-2 border-cyan-500 pt-4">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <!-- Update Password -->
        <div
            class="p-6 bg-gradient-to-r from-white to-gray-100 rounded-lg shadow-md hover:shadow-xl transform hover:-translate-y-2 transition duration-300 group">
            <h3 class="text-lg font-semibold text-cyan-400 mb-4 group-hover:text-cyan-600 transition duration-300">
                Update Password
            </h3>
            <div class="border-t-2 border-cyan-500 pt-4">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <!-- Delete Account -->
        <div
            class="col-span-1 md:col-span-2 p-6 bg-gradient-to-r from-red-100 to-red-200 rounded-lg shadow-md hover:shadow-xl transform hover:scale-105 transition duration-300 group">
            <h3 class="text-lg font-semibold text-red-700 mb-4 group-hover:text-red-900 transition duration-300">
                Delete Account
            </h3>
            <div class="border-t-2 border-red-500 pt-4">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
</div>

@endsection
