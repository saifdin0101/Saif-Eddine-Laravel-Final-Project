@extends('layouts.index')

@section('content')
    <div class="flex">
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
                                    <img class="h-[40px] w-[40px] rounded-full object-cover"
                                        src="{{ asset('storage/images/' . $user->image) }}" alt="User Image">
                                </td>
                                <td class="px-4 py-2">{{ $user->name }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2">
                                    <span
                                        class="inline-block py-1 px-3 rounded-full  
                                        {{ $user->role == 'trainer' ? 'bg-purple-500 text-white' : 'bg-gray-100 text-black ' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 flex items-center space-x-2">




                                    <form action="/admin/delete/{{ $user->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="bg-red-500 text-white py-2 px-4 rounded-full hover:bg-red-600 transition duration-300">
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
                                    <img class="h-[40px] w-[40px] rounded-full object-cover"
                                        src="{{ asset('storage/images/' . $user->image) }}" alt="User Image">
                                </td>
                                <td class="px-4 py-2">{{ $user->name }}</td>
                                <td class="px-4 py-2">{{ $user->email }}</td>
                                <td class="px-4 py-2">
                                    <span
                                        class="inline-block py-1 px-3 rounded-full text-white 
                                        {{ $user->role == 'admin' ? 'bg-red-500' : 'bg-red-500' }}">
                                        {{ ucfirst($user->deleted_at) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 flex items-center space-x-2">

                                    <form action="{{ route('user.restore', $user->id) }}" method="POST">
                                        @csrf
                                        <button
                                            class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-teal-400 transition duration-300">
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
                                        class="inline-block py-1 px-3 rounded-full
                                            {{ $request->user->role == 'trainer' ? 'bg-purple-500 text-white' : 'bg-gray-100 text-black' }}">
                                        {{ ucfirst($request->user->role) }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 flex items-center space-x-2">
                                    <form method="POST" action="/admin/accept-trainer/{{ $request->id }}">
                                        @csrf
                                        <button
                                            class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-teal-400 transition duration-300">
                                            Accept Request
                                        </button>
                                    </form>

                                    <form method="POST" action="/admin/update/{{ $user->id }}">
                                        @csrf
                                        @method('PUT')
                                        <button
                                            class="bg-[#00e0d4] text-white py-2 px-4 rounded-full hover:bg-teal-400 transition duration-300">
                                            {{ $user->role == 'client' ? ' Give Role' : 'Remove Role' }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>


    </div>
    </div>
@endsection
