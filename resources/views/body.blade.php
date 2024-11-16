@extends('layouts.index')

@section('content')

    
<div class=" py-12 px-4 mt-[50px]">

    <form  action="{{ route('body.store') }}" method="post" class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow-xl">
        @csrf
        <h2 class="text-3xl font-semibold text-gray-800 mb-8">Set Your Profile Information</h2>
        <div class="mb-8">
            <label for="height" class="block text-sm font-medium text-gray-700">Height (cm)</label>
            <input type="range" id="height"  name="height" min="140" max="210" value="170"
                class="w-full h-2 bg-[#00e0d4] rounded-lg appearance-none cursor-pointer mt-2">
            <div class="flex justify-between text-sm mt-2">
                <span class="text-gray-600">140 cm</span>
                <span class="text-gray-600">210 cm</span>
            </div>
            <div class="text-2xl font-bold mt-2 text-center" id="height-display">170 cm</div>
        </div>


        <div class="mb-8">
            <label for="weight" class="block text-sm font-medium text-gray-700">Weight (kg)</label>
            <input type="range" id="weight" name="weight" min="40" max="200" value="70"
                class="w-full h-2 bg-[#00e0d4] rounded-lg appearance-none cursor-pointer mt-2">
            <div class="flex justify-between text-sm mt-2">
                <span class="text-gray-600">40 kg</span>
                <span class="text-gray-600">200 kg</span>
            </div>
            <div class="text-2xl font-bold mt-2 text-center" id="weight-display">70 kg</div>
        </div>

        <input name="user_id" value="{{ Auth::user()->id }}" type="hidden">
        <div class="mb-8">
            <label for="body-type" class="block text-sm font-medium text-gray-700">Body Type</label>
            <select  name="bodytype"
                class="w-full py-2 px-4 mt-2 border border-gray-300 rounded-lg bg-white text-gray-700 focus:outline-none focus:ring-2 focus:ring-[#00e0d4] transition duration-300">
                <option value="slim">Slim</option>
                <option value="average">Average</option>
                <option value="athletic">Athletic</option>
                <option value="muscular">Muscular</option>
                <option value="heavy">Heavy</option>
            </select>
        </div>

        <div class="text-center">
            <button
                class="bg-[#00e0d4] text-white py-3 px-8 rounded-full hover:bg-teal-400 transition duration-300 transform hover:scale-105">
                Save Profile
            </button>
        </div>
    </form>

    <script>
        const heightSlider = document.getElementById('height');
        const heightDisplay = document.getElementById('height-display');

        const weightSlider = document.getElementById('weight');
        const weightDisplay = document.getElementById('weight-display');


        heightSlider.addEventListener('input', function() {
            heightDisplay.textContent = `${heightSlider.value} cm`;
        });


        weightSlider.addEventListener('input', function() {
            weightDisplay.textContent = `${weightSlider.value} kg`;
        });
    </script>
</div>
    
@endsection