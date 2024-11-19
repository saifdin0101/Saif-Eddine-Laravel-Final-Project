@extends('layouts.index')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">

    <!-- Sidebar -->
    <div class="w-1/4">
        <!-- Your Sidebar is untouched and already called in your layout -->
    </div>

    <!-- Calendar Section -->
    <div id="calendar" class="w-full sm:w-3/4 p-8 rounded-lg shadow-lg ml-8">
        <h1 class="text-center text-3xl font-semibold text-gray-800 mb-6">Event Calendar</h1>

        <div class="border-b-2 border-gray-300 mb-4"></div>

        <div id="calendar-wrapper" class="bg-[#d1f5ff] p-6 rounded-lg shadow-md max-h-[70vh] overflow-y-auto">
            <!-- Calendar will render here -->
        </div>

        <!-- Event Form -->
        <form method="post" action="{{ route('calendar.store') }}" class="hidden">
            @csrf
            <div class="flex flex-col sm:flex-row sm:space-x-4">
                <div class="flex-1">
                    <label for="start" class="block text-gray-700 font-medium">Start Time</label>
                    <input name="start" id="start" type="datetime-local" class="mt-2 p-2 w-full rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent">
                </div>
                <div class="flex-1">
                    <label for="end" class="block text-gray-700 font-medium">End Time</label>
                    <input name="end" id="end" type="datetime-local" class="mt-2 p-2 w-full rounded border border-gray-300 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent">
                </div>
            </div>

            <button type="submit" id="submitEvent" class="mt-6 w-full py-2 bg-cyan-500 text-white rounded-lg hover:bg-cyan-600 focus:outline-none focus:ring-2 focus:ring-cyan-300">
                Submit Event
            </button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', async function() {
    let response = await axios.get("/calendar/create")
    let events = response.data.events

    let nowDate = new Date()
    let day = nowDate.getDate()
    let month = nowDate.getMonth() + 1
    let hours = nowDate.getHours()
    let minutes = nowDate.getMinutes()
    let minTimeAllowed =
        `${nowDate.getFullYear()}-${month < 10 ? "0"+month : month}-${day < 10 ? "0"+day : day}T${hours < 10 ? "0"+hours : hours}:${minutes < 10 ? "0"+minutes : minutes}:00`
    start.min = minTimeAllowed;

    var myCalendar = document.getElementById('calendar-wrapper');
    var calendar = new FullCalendar.Calendar(myCalendar, {
        headerToolbar: {
            left: 'dayGridMonth,timeGridWeek,timeGridDay',
            center: 'title',
            right: 'listMonth,listWeek,listDay'
        },
        initialView: "timeGridWeek",
        events: events,
        selectable: true,
        selectAllow: (info) => {
            return info.start >= nowDate;
        },
        select: (info) => {
            if (info.end.getDate() - info.start.getDate() > 0 && !info.allDay ) {
                return
            }

            if (info.allDay) {
                start.value = info.startStr+" 09:00:00"
                end.value = info.startStr+" 19:00:00"   
            }else{     
                start.value = info.startStr.slice(0, info.startStr.length - 6)
                end.value = info.endStr.slice(0, info.endStr.length - 6)   
            }

            submitEvent.click()
        }
    });

    calendar.render();
})
</script>
@endsection
