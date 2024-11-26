@extends('layouts.index')

@section('content')
    <div class="flex main-color-gradiant overflow-hidden text-[#8c8c8c]  h-[100vh]">
        <div class="sidebar w-[6rem]"></div>
        <div class="bg-[#1f1f1f] w-full h-[100vh] rounded-[90px] relative">
            <div class=" h-[25rem] w-[25rem] relative flex  justify-center items-center">
                <h1 data-aos-once="false" data-aos-delay="50" data-aos="fade-right" class="text-2xl absolute left-7 top-10 ">Our News Trainers</h1>

                <div  class="flex flex-col gap-2 text-[#717071] absolute left-[10px] bottom-[50px]">
                    <div data-aos-once="false" data-aos-delay="100" data-aos="fade-left" class="h-[60px] w-[20rem] rounded-lg bg-[#2a2a2a] flex justify-center gap-[90px] items-center">
                        <div class="flex gap-2 justify-center items-center">
                            <div class="h-[50px] w-[50px] rounded-lg dash1 "></div>
                            <div>Rayn Break</div>
                        </div>

                        <div class="flex">3 <div class="text-xs">Years Of Exp</div>
                        </div>
                    </div>
                    <div data-aos-once="false" data-aos-delay="130" data-aos="fade-right" class="h-[60px] w-[20rem] rounded-lg bg-[#2a2a2a] flex justify-center gap-[80px] items-center">
                        <div class="flex gap-2 justify-center items-center">
                            <div class="h-[50px] w-[50px] rounded-lg dash2 "></div>
                            <div>James Spider</div>
                        </div>

                        <div class="flex">1 <div class="text-xs">Years Of Exp</div>
                        </div>
                    </div>
                    <div data-aos-once="false" data-aos-delay="150" data-aos="fade-left" class="h-[60px] w-[20rem] rounded-lg bg-[#2a2a2a] flex justify-center gap-[97px] items-center">
                        <div class="flex gap-2 justify-center items-center">
                            <div class="h-[50px] w-[50px] rounded-lg dash3 "></div>
                            <div>Alan Mike</div>
                        </div>

                        <div class="flex">7 <div class="text-xs">Years Of Exp</div>
                        </div>
                    </div>
                    <div data-aos-once="false" data-aos-delay="150" data-aos="fade-right"
                        class="h-[60px] w-[20rem] rounded-lg border-[1px] border-[#2a2a2a]  flex justify-center gap-[100px] items-center">
                        See More
                    </div>

                </div>
            </div>

            <div class=" absolute left-[-25px] bottom-[-150px] h-[35rem]  w-[25rem]">
                <div class="flex justify-center items-center pt-2">
                    <div data-aos-once="false" data-aos-delay="180" data-aos="fade-right" class="border-none bg-transparent w-[70%] mt-5"> Last Transactions</div>
                    <div class="text-[#8c8c8c] outline-none"></div>
                </div>
                <div class="flex justify-center items-center flex-wrap gap-2 mt-2">
                    <div data-aos-once="false" data-aos-delay="200" data-aos="fade-down" class="bg-[#2a2a2a] h-[6rem] w-[8.5rem] rounded-lg relative">
                        <p class="text-xs absolute top-5 left-2 text-[#7b7b7b] text-semibold">Rayan Break</p>
                        <div class="h-[25px] absolute top-4 right-2 w-[25px] rounded-lg dash2"></div>
                        <p class="text-green-500 absolute top-10 left-2 font-semibold">+ $29.00</p>
                        <p class="absolute top-16 text-[#7b7b7b] text-xs left-3 text-semibold">06:41PM</p>
                    </div>
                    <div data-aos-once="false" data-aos-delay="220" data-aos="fade-down" class="bg-[#2a2a2a] h-[6rem] w-[8.5rem] rounded-lg relative">
                        <p class="text-xs absolute top-5 left-2 text-[#7b7b7b] text-semibold">James Spader</p>
                        <div class="h-[25px] absolute top-4 right-2 w-[25px] rounded-lg dash1"></div>
                        <p class="text-red-500 absolute top-10 left-2 font-semibold">- $74.00</p>
                        <p class="absolute top-16 text-[#7b7b7b] text-xs left-3 text-semibold">09:22AM</p>
                    </div>
                    <div data-aos-once="false" data-aos-delay="250" data-aos="fade-right" class="bg-[#2a2a2a] h-[6rem] w-[8.5rem] rounded-lg relative">
                        <p class="text-xs absolute top-5 left-2 text-[#7b7b7b] text-semibold">Alan mike</p>
                        <div class="h-[25px] absolute top-4 right-2 w-[25px] rounded-lg dash3"></div>
                        <p class="text-green-500 absolute top-10 left-2 font-semibold">+ $12.00</p>
                        <p class="absolute top-16 text-[#7b7b7b] text-xs left-3 text-semibold">11:35PM</p>
                    </div>
                    <div data-aos-once="false" data-aos-delay="270" data-aos="fade-up" class="bg-[#2a2a2a] h-[6rem] w-[8.5rem] rounded-lg relative">
                        <p class="text-xs absolute top-5 left-2 text-[#7b7b7b] text-semibold">Logan Ksi</p>
                        <div class="h-[25px] absolute top-4 right-2 w-[25px] rounded-lg dash4"></div>
                        <p class="text-green-500 absolute top-10 left-2 font-semibold">+ $137.00</p>
                        <p class="absolute top-16 text-[#7b7b7b] text-xs left-3 text-semibold">07:41AM</p>
                    </div>
                    <div data-aos-once="false" data-aos-delay="290" data-aos="fade-down" class="bg-[#2a2a2a] h-[6rem] w-[8.5rem] rounded-lg relative">
                        <p class="text-xs absolute top-5 left-2 text-[#7b7b7b] text-semibold">Ariana Ronaldo</p>
                        <div class="h-[25px] absolute top-4 right-2 w-[25px] rounded-lg dash5"></div>
                        <p class="text-green-500 absolute top-10 left-2 font-semibold">+ $24.00</p>
                        <p class="absolute top-16 text-[#7b7b7b] text-xs left-3 text-semibold">09:01PM</p>
                    </div>
                    <div data-aos-once="false" data-aos-delay="300" data-aos="fade-up"
                        class="border-[1px] border-[#2a2a2a] flex-col h-[6rem] w-[8.5rem] rounded-lg flex justify-center items-center relative">
                        <div class="text-[#8c8c8c]"></div>
                        <div class='font-semibold text-[#8c8c8c] text-sm'>View More</div>
                    </div>
                </div>
            </div>
            <div class="h-[100vh] w-[70vw] main-color-gradiant absolute right-0 top-0 rounded-l-[90px] ">
                <div data-aos-once="false" data-aos-delay="350" data-aos="fade-down" class="absolute top-8 left-5 text-[#717071]">
                    <div class="bg-[#2a2a2a] h-[20rem] w-[43rem] rounded-lg relative p-5 overflow-auto">
                        <h1 class="text-2xl absolute left-3 top-2 px-3 bg-[#2a2a2a] flex justify-center items-center py-1 rounded-lg">
                            Our Users:
                        </h1>
                        <table class="min-w-full table-auto text-sm text-left text-gray-600 mt-10">
                            <thead class=" bg-[#088cad] text-white">
                                <tr>
                                    <th class="px-4 py-2">Image</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Role</th>
                                    <th class="px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr class="hover:bg-[#f1f1f1] transition duration-300">
                                        <td class="px-4 py-2">
                                            <img class="h-[40px] w-[40px] rounded-lg object-cover"
                                                src="{{ asset('storage/images/' . $user->image) }}" alt="User Image">
                                        </td>
                                        <td class="px-4 py-2 text-white">{{ $user->name }}</td>
                                        <td class="px-4 py-2 font-semibold">{{ $user->email }}</td>
                                        <td class="px-4 py-2">
                                            <span
                                                class="inline-block py-1 px-3 rounded-lg  
                                                {{ $user->role == 'trainer' ? 'bg-[#088cad] text-white' : 'bg-gray-100 text-black ' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2">
                                            <form action="/admin/delete/{{ $user->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="bg-[#be4a4add] text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-2 text-center text-red-500">No users logged in</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div data-aos-once="false" data-aos-delay="450" data-aos="fade-up" class="bg-[#2a2a2a] text-[#717071] h-[21rem] w-[28rem] absolute bottom-7 left-[20px] rounded-lg p-5">
                    <h1 class="text-2xl font-bold mb-5 text-center text-white">
                        Weekly Earnings: $1,234
                    </h1>
                    <div class="flex items-end justify-around h-[16rem] mt-5 relative">
                        <!-- Monday -->
                        <div class="flex flex-col items-center group relative">
                            <div class="h-[170px] w-8 main-color-gradiant rounded-t-md transition-colors duration-300 group-hover:bg-[#0ac2d1]"></div>
                            <span class="mt-2 text-sm text-white">Mon</span>
                            <!-- Tooltip -->
                            <div class="absolute bottom-[175px] left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded-lg px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                $170
                            </div>
                        </div>
                        <!-- Tuesday -->
                        <div class="flex flex-col items-center group relative">
                            <div class="h-[110px] w-8 main-color-gradiant rounded-t-md transition-colors duration-300 group-hover:bg-[#0ac2d1]"></div>
                            <span class="mt-2 text-sm text-white">Tue</span>
                            <!-- Tooltip -->
                            <div class="absolute bottom-[115px] left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded-lg px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                $110
                            </div>
                        </div>
                        <!-- Wednesday -->
                        <div class="flex flex-col items-center group relative">
                            <div class="h-[80px] w-8 main-color-gradiant rounded-t-md transition-colors duration-300 group-hover:bg-[#0ac2d1]"></div>
                            <span class="mt-2 text-sm text-white">Wed</span>
                            <!-- Tooltip -->
                            <div class="absolute bottom-[85px] left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded-lg px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                $80
                            </div>
                        </div>
                        <!-- Thursday -->
                        <div class="flex flex-col items-center group relative">
                            <div class="h-[60px] w-8 main-color-gradiant rounded-t-md transition-colors duration-300 group-hover:bg-[#0ac2d1]"></div>
                            <span class="mt-2 text-sm text-white">Thu</span>
                            <!-- Tooltip -->
                            <div class="absolute bottom-[65px] left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded-lg px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                $60
                            </div>
                        </div>
                        <!-- Friday -->
                        <div class="flex flex-col items-center group relative">
                            <div class="h-[190px] w-8 main-color-gradiant rounded-t-md transition-colors duration-300 group-hover:bg-[#0ac2d1]"></div>
                            <span class="mt-2 text-sm text-white">Fri</span>
                            <!-- Tooltip -->
                            <div class="absolute bottom-[195px] left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded-lg px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                $190
                            </div>
                        </div>
                        <!-- Saturday -->
                        <div class="flex flex-col items-center group relative">
                            <div class="h-[40px] w-8 main-color-gradiant rounded-t-md transition-colors duration-300 group-hover:bg-[#0ac2d1]"></div>
                            <span class="mt-2 text-sm text-white">Sat</span>
                            <!-- Tooltip -->
                            <div class="absolute bottom-[45px] left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded-lg px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                $40
                            </div>
                        </div>
                        <!-- Sunday -->
                        <div class="flex flex-col items-center group relative">
                            <div class="h-[130px] w-8 main-color-gradiant rounded-t-md transition-colors duration-300 group-hover:bg-[#0ac2d1]"></div>
                            <span class="mt-2 text-sm text-white">Sun</span>
                            <!-- Tooltip -->
                            <div class="absolute bottom-[135px] left-1/2 -translate-x-1/2 bg-black text-white text-xs rounded-lg px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity">
                                $130
                            </div>
                        </div>
                    </div>
                </div>
                <div data-aos-once="false" data-aos-delay="500" data-aos="fade-left" class="bg-[#2a2a2a] text-[#717071] h-[25rem]  w-[21rem] rounded-lg absolute right-2 top-7 p-4">
                    <!-- Title Section -->
                    <h1 class="text-xl font-semibold text-white mb-3 text-center mr-[85px]">
                        Banned Users
                        <!-- Counter Badge -->
                        <span class="bg-[#be4a4add] text-white text-sm py-1 px-3 rounded-lg ml-2">
                            {{ count($deletedUsers) }}
                        </span>
                    </h1>
                    
                    <!-- Table -->
                    <table class="min-w-full table-auto text-sm text-left text-gray-600">
                        <!-- Table Header -->
                        <thead class="bg-[#be4a4add] text-white">
                            <tr>
                                <th class="px-4 py-2">Image</th>
                                <th class="px-4 py-2">Name</th>
                                <th class="px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody>
                            @forelse ($deletedUsers as $user)
                                <tr class="hover:bg-[#f1f1f1] transition duration-300">
                                    <!-- User Image -->
                                    <td class="px-4 py-2">
                                        <img class="h-[40px] w-[40px] rounded-lg object-cover"
                                            src="{{ asset('storage/images/' . $user->image) }}" alt="User Image">
                                    </td>
                                    <!-- User Name -->
                                    <td class="px-4 py-2 text-white">
                                        {{ $user->name }}
                                    </td>
                                    <!-- Restore Button -->
                                    <td class="px-4 py-2">
                                        <form action="{{ route('user.restore', $user->id) }}" method="POST">
                                            @csrf
                                            <button
                                                class="bg-[#58c7af] text-white py-2 px-4 rounded-lg hover:bg-teal-400 transition duration-300">
                                                Restore
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-4 py-2 text-center text-red-500">No users to restore</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div data-aos-once="false" data-aos-delay="600" data-aos="fade-up" class="bg-[#2a2a2a] text-[#717071] h-[16rem] w-[36rem] rounded-lg absolute right-2 bottom-7 p-3">
                    <!-- Title Section -->
                    <h1 class="text-sm font-semibold text-white mb-3 text-center">
                        Trainer Requests
                    </h1>
                
                    <!-- Table Section -->
                    <table class="min-w-full table-auto text-[12px] text-left text-gray-600">
                        <!-- Table Header -->
                        <thead class="bg-[#088cad] text-white">
                            <tr>
                                <th class="px-2 py-2">Image</th>
                                <th class="px-2 py-2">Name</th>
                                <th class="px-2 py-2">Payment</th>
                                <th class="px-2 py-2">Action</th>
                            </tr>
                        </thead>
                        <!-- Table Body -->
                        <tbody>
                            @foreach ($approveTrainerRequests as $request)
                                <tr class="hover:bg-[#f1f1f1] transition duration-300">
                                    <!-- Image -->
                                    <td class="px-2 py-2">
                                        <img class="h-[30px] w-[30px] rounded-lg object-cover" src="{{ asset('storage/images/' . $request->user->image) }}" alt="User Image">
                                    </td>
                                    <!-- Name with clickable icon for details -->
                                    <td class="px-2 py-2 flex items-center space-x-1">
                                        <span class="text-[12px]">{{ $request->user->name }}</span>
                                        <button 
                                            class="bg-gradient-to-r from-[#00e0d4] to-[#078eae] text-white px-1 py-1 rounded-lg hover:shadow-lg transition-all duration-200 text-[10px]"
                                            onclick="toggleDetails({{ $request->user->id }})">
                                            View Details
                                        </button>
                                    </td>
                                    <!-- Payment Status -->
                                    <td class="px-2 py-2 text-xs">
                                        <span class="inline-block py-0.5 px-1 rounded-lg
                                            {{ $request->payment ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                            {{ $request->payment ? 'Payment Received' : 'No Payment' }}
                                        </span>
                                    </td>
                                    <!-- Action (Accept or Remove Role) -->
                                    <td class="px-2 py-2">
                                        <form method="POST" action="/admin/update/{{ $request->user->id }}">
                                            @csrf
                                            @method('PUT')
                                            <button class="bg-[#00e0d4] text-white py-1 px-2 rounded-lg hover:bg-teal-400 transition duration-200 text-[12px]">
                                                {{ $request->user->role == 'client' ? 'Accept Request' : 'Remove Role' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                
                    <!-- Hidden Detail Panel (Slides in from the right) -->
                    <div id="detail-panel" class="absolute right-0 top-0 h-full w-[30%] bg-[#333] text-white p-3 transition-transform transform translate-x-full">
                        <h2 class="text-xs font-bold mb-4">Trainer Request Details</h2>
                        <div id="request-details-content">
                            <!-- Details will be dynamically inserted here -->
                        </div>
                        <button onclick="closeDetails()" class="mt-3 bg-red-500 text-white py-1 px-3 rounded-lg hover:bg-red-600 transition duration-200 text-xs">
                            Close
                        </button>
                    </div>
                </div>
                
                <!-- JS for toggling the slide-in panel -->
                <script>
                    function toggleDetails(userId) {
                        // Get the trainer request details dynamically (for example, use AJAX to fetch)
                        const details = {
                            experience: "5 years in fitness training.",
                            why: "Wants to become a trainer to share knowledge and inspire people.",
                            urself: "Has worked with multiple clients, helped them achieve their fitness goals, and now wants to expand their influence."
                        };
                        
                        // Inject details into the detail panel with smaller font size
                        const detailsContent = `
                            <p class="text-[12px]"><strong>Experience:</strong> ${details.experience}</p>
                            <p class="text-[12px]"><strong>Why They Want to Be a Trainer:</strong> ${details.why}</p>
                            <p class="text-[12px]"><strong>Background:</strong> ${details.urself}</p>
                        `;
                        document.getElementById("request-details-content").innerHTML = detailsContent;
                        
                        // Show the detail panel
                        document.getElementById("detail-panel").style.transform = "translateX(0)";
                    }
                
                    function closeDetails() {
                        // Hide the detail panel
                        document.getElementById("detail-panel").style.transform = "translateX(100%)";
                    }
                </script>
                
                
                

            </div>
        </div>


    </div>
















    {{-- <div class="flex">
        <div class="w-[25%] ">

        </div>
        <div class="py-12 px-4 flex flex-col gap-10 cursor-default w-[70%]">
            <div class="overflow-x-auto bg-white p-8 rounded-xl shadow-xl">
                <h2 class="text-3xl font-semibold text-[#00e0d4] mb-8">User Management</h2>

                <!-- Table -->
                <table class="min-w-full table-auto text-sm text-left text-gray-600">
                    <thead class="bg-[#00e0d4] text-white">
                        <tr>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr class="hover:bg-[#f1f1f1] transition duration-300">
                                <td class="px-4 py-2">
                                    <img class="h-[40px] w-[40px] rounded-lg object-cover"
                                        src="{{ asset('storage/images/' . $user->image) }}" alt="User Image">
                                </td>
                                <td class="px-4 py-2">{{ $user->name }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2">
                                    <span
                                        class="inline-block py-1 px-3 rounded-lg  
                                        {{ $user->role == 'trainer' ? 'bg-purple-500 text-white' : 'bg-gray-100 text-black ' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 flex items-center space-x-2">




                                    <form action="/admin/delete/{{ $user->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-500 text-white py-2 px-4 rounded-lg hover:bg-red-600 transition duration-300">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-red-500">No users logged in</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="overflow-x-auto bg-red-200 p-8 rounded-xl shadow-xl">
                <h2 class="text-3xl font-semibold  mb-8 text-red-500">Banned Users</h2>

                <!-- Table -->
                <table class="min-w-full table-auto text-sm text-left text-gray-600">
                    <thead class="bg-red-500 text-white">
                        <tr>
                            <th class="px-4 py-2">Image</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Banned_time</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($deletedUsers as $user)
                            <tr class="hover:bg-[#f1f1f1] transition duration-300">
                                <td class="px-4 py-2">
                                    <img class="h-[40px] w-[40px] rounded-lg object-cover"
                                        src="{{ asset('storage/images/' . $user->image) }}" alt="User Image">
                                </td>
                                <td class="px-4 py-2">{{ $user->name }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2">
                                    <span
                                        class="inline-block py-1 px-3 rounded-lg text-white 
                                        {{ $user->role == 'admin' ? 'bg-red-500' : 'bg-red-500' }}">
                                        {{ ucfirst($user->deleted_at) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 flex items-center space-x-2">

                                    <form action="{{ route('user.restore', $user->id) }}" method="POST">
                                        @csrf
                                        <button
                                            class="bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-teal-400 transition duration-300">
                                            Restore User
                                        </button>
                                    </form>



                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-4 py-2 text-center text-red-500">No users logged in</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>



            <!-- Table for Trainer Requests -->
            <div class="overflow-x-auto bg-white p-8 rounded-xl shadow-xl">
                <h2 class="text-3xl font-semibold text-[#00e0d4] mb-8">Trainer Requests Pending Approval</h2>


                <table class="min-w-full table-auto text-sm text-left text-gray-600">
                    <thead class="bg-[#00e0d4] text-white">
                        <tr>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Why They Want to Be a Trainer</th>
                            <th class="px-4 py-2">Years of Experience</th>
                            <th class="px-4 py-2">Background</th>
                            <th class="px-4 py-2">Payment</th>
                            <th class="px-4 py-2">Role</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($approveTrainerRequests as $request)
                            <tr class="hover:bg-[#f1f1f1] transition duration-300">
                                <td class="px-4 py-2">{{ $request->user->name }}</td>
                                <td class="px-4 py-2">{{ $request->why }}</td>
                                <td class="px-4 py-2">{{ $request->experience }}</td>
                                <td class="px-4 py-2">{{ $request->urself }}</td>
                                <td class="px-4 py-2">
                                    <span
                                        class="inline-block py-1 px-3 rounded-lg
                                        {{ $request->payment ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }}">
                                        {{ $request->payment ? 'Payment Received' : 'No Payment' }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">
                                    <span
                                        class="inline-block py-1 px-3 rounded-lg
                                        {{ $request->user->role == 'trainer' ? 'bg-purple-500 text-white' : 'bg-gray-100 text-black' }}">
                                        {{ ucfirst($request->user->role) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 flex items-center space-x-2">
                                    <form method="POST" action="/admin/update/{{ $request->user->id }}">
                                        @csrf
                                        @method('PUT')
                                        <button
                                            class="bg-[#00e0d4] text-white py-2 px-4 rounded-lg hover:bg-teal-400 transition duration-300">
                                            {{ $request->user->role == 'client' ? 'Accept Request' : 'Remove Role' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                </table>
            </div>

        </div>


    </div>
    --}}
@endsection
