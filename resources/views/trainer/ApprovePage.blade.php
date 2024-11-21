@extends('layouts.index')
@section('content')
<div class="ml-[10rem] p-6  min-h-screen text-white">
    <h1 class="text-2xl font-semibold text-center mb-6">Approve Your Gym Sessions</h1>
    
    <div class="mb-8 ml-[10rem]">
        <h2 class="text-2xl font-semibold mb-4 spacee">Pending Approvals</h2>
        <table class="min-w-full bg-gray-900 rounded-lg shadow-md overflow-hidden">
            <thead>
                <tr class="gg2 text-white">
                    <th class="p-2 text-left text-sm">Session Image</th>
                    <th class="p-2 text-left text-sm">Session Name</th>
                    <th class="p-2 text-left text-sm">Start Time</th>
                    <th class="p-2 text-left text-sm">End Time</th>
                    <th class="p-2 text-left text-sm">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TrainerSessions as $approve)
                    <tr class="hover:bg-gray-700 transition duration-200 ease-in-out ">
                        <td class="p-2">
                            <img class="h-16 w-16 object-cover" src="{{ asset('storage/images/' . $approve->image) }}" alt="Session Image">
                        </td>
                        <td class="p-2 text-sm">{{ $approve->name }}</td>
                        <td class="p-2 text-sm">{{ $approve->start_time }}</td>
                        <td class="p-2 text-sm">{{ $approve->end_time }}</td>
                        <td class="p-2">
                            <form method="POST" action="/ApprovePage/update/{{ $approve->id }}">
                                @method('put')
                                @csrf
                                <button class="bg-cyan-500 text-white py-1 px-3 rounded-lg hover:bg-cyan-600 transition duration-300 text-sm w-full">
                                    Publish
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @forelse ($TrainerSessions as $approve)
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-300 text-sm">All your sessions have been approved!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="ml-[10rem]">
        <h2 class="text-2xl font-semibold mb-4 spacee">Published Sessions</h2>
        <table class="min-w-full bg-gray-900 rounded-lg shadow-md overflow-hidden">
            <thead>
                <tr class="gg2 text-white">
                    <th class="p-2 text-left text-sm">Session Image</th>
                    <th class="p-2 text-left text-sm">Session Name</th>
                    <th class="p-2 text-left text-sm">Start Time</th>
                    <th class="p-2 text-left text-sm">End Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($PublishedSessions as $published)
                    <tr class="hover:bg-gray-700 transition duration-200 ease-in-out">
                        <td class="p-2">
                            <img class="h-16 w-16 object-cover" src="{{ asset('storage/images/' . $published->image) }}" alt="Session Image">
                        </td>
                        <td class="p-2 text-sm">{{ $published->name }}</td>
                        <td class="p-2 text-sm">{{ $published->start_time }}</td>
                        <td class="p-2 text-sm">{{ $published->end_time }}</td>
                    </tr>
                @endforeach

                @forelse ($PublishedSessions as $published)
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-300 text-sm">No sessions published yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
