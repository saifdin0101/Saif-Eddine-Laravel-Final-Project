@extends('layouts.index')

@section('content')
    <div class="flex">
        <!-- Sidebar Area (16rem width) -->
        <div class="w-64  text-white p-4">
        </div>

        <!-- Main Content (Calendar Area) -->
        <div class="flex-1 h-screen p-8">
            <!-- Heading for Calendar -->
            <h1 class="text-3xl font-semibold text-cyan-600 text-center mb-8">Personal Reservations</h1>
            
            <!-- Form for Creating Events -->
            <form method="post" action="{{ route('calendar.store') }}" class="mt-6 bg-white p-6 rounded-lg shadow-md max-w-lg mx-auto mb-6">
                @csrf
                <h2 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Create Event</h2>
                
                <div class="space-y-4">
                    <div>
                        <label for="start" class="block text-lg font-medium text-gray-700">Start Time</label>
                        <input name="start" id="start" type="datetime-local" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500" required>
                    </div>
                
                    <div>
                        <label for="end" class="block text-lg font-medium text-gray-700">End Time</label>
                        <input name="end" id="end" type="datetime-local" class="w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500" required>
                    </div>
                
                    <button id="submitEvent" class="w-full bg-cyan-600 text-white py-3 rounded-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        Submit
                    </button>
                </div>
            </form>

            <!-- Calendar -->
            <div id="secondcalendar" class="h-[50rem] bg-white rounded-lg shadow-lg p-4">
                <!-- FullCalendar will render here -->
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            // Fetch events from the server
            let response = await axios.get("/calendar/create")
            let events = response.data.events

            // Get the current time
            let nowDate = new Date()

            // Filter out events that have already passed (based on the start time)
            events = events.filter(event => new Date(event.start) > nowDate);

            let day = nowDate.getDate()
            let month = nowDate.getMonth() + 1
            let hours = nowDate.getHours()
            let minutes = nowDate.getMinutes()
            let minTimeAllowed =
                `${nowDate.getFullYear()}-${month < 10 ? "0"+month : month}-${day < 10 ? "0"+day : day}T${hours < 10 ? "0"+hours : hours}:${minutes < 10 ? "0"+minutes : minutes}:00`
            start.min = minTimeAllowed;

            var myCalendar = document.getElementById('secondcalendar');

            var calendar = new FullCalendar.Calendar(myCalendar, {
                headerToolbar: {
                    left: 'dayGridMonth,timeGridWeek,timeGridDay',
                    center: 'title',
                },
                initialView: "timeGridWeek",  // Set default view
                slotMinTime: "09:00:00",
                slotMaxTime: "19:00:00",
                nowIndicator: true,
                selectable: true,
                selectMirror: true,
                selectOverlap: false,
                weekends: true,
                events: events,  // Use the filtered events (only future ones)
                selectAllow: (info) => {
                    return info.start >= nowDate;
                },
                select: (info) => {
                    if (info.end.getDate() - info.start.getDate() > 0 && !info.allDay ) {
                        return
                    }

                    console.log(info);
                    if (info.allDay) {
                        start.value = info.startStr+" 09:00:00"
                        end.value = info.startStr+" 19:00:00"   
                    } else {     
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
