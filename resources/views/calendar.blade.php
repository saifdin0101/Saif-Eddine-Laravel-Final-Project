@extends('layouts.index')

@section('content')
    <div class="flex text-white">
        <div class="w-64 p-6 text-white"></div>

        <div class="flex-1 h-screen p-8">
            <h1 class="text-5xl font-semibold text-cyan-600 text-center mb-8 spacee">Personal Reservations</h1>

            <form method="post" action="{{ route('calendar.store') }}" class="mt-6 bg-gray-800 p-6 rounded-lg shadow-md max-w-lg mx-auto mb-6">
                @csrf
                <h2 class="text-2xl font-semibold text-gray-200 mb-6 text-center">Create Event</h2>
                
                <div class="space-y-4">
                    <div>
                        <label for="start" class="block text-lg font-medium text-gray-200">Start Time</label>
                        <input name="start" id="start" type="datetime-local" class="w-full p-3 border border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-gray-800" required>
                    </div>
                
                    <div>
                        <label for="end" class="block text-lg font-medium text-gray-200">End Time</label>
                        <input name="end" id="end" type="datetime-local" class="w-full p-3 border border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-cyan-500 text-gray-800" required>
                    </div>
                
                    <button id="submitEvent" class="w-full bg-cyan-600 text-white py-3 rounded-md hover:bg-cyan-700 focus:outline-none focus:ring-2 focus:ring-cyan-500">
                        Submit
                    </button>
                </div>
            </form>

            <div id="secondcalendar" class="h-[50rem] border-4 border-[#33d0e6] bg-white text-black rounded-lg shadow-lg p-4"></div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            let response = await axios.get("/calendar/create")
            let events = response.data.events
            let nowDate = new Date()

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
                initialView: "timeGridWeek",
                slotMinTime: "09:00:00",
                slotMaxTime: "19:00:00",
                nowIndicator: true,
                selectable: true,
                selectMirror: true,
                selectOverlap: false,
                weekends: true,
                events: events,
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
                },
                eventContent: function(info) {
                    var image = info.event.extendedProps.imageUrl;
                    var title = info.event.title;
                    return {
                        html: `<div class="fc-event-title text-white">
                                    <img src="${image}" alt="User Image" style="width: 50px; height: 50px; border-radius: 50%; position: absolute; bottom: 10px; right: 10px;" />
                                    ${title}
                                </div>`
                    };
                },
                eventDidMount: function(info) {
                    info.el.style.color = '#ffffff';
                }
            });

            calendar.render();
        })
    </script>

    <style>
        .fc-header-toolbar {
           
            border-radius: 15px;
            padding: 5px;
            margin-bottom: 15px;
        }

        .fc-header-toolbar .fc-button {
            background-color: #0e7490;
            color: white;
            border-radius: 25px;
            padding: 8px 15px;
            margin: 0 5px;
            font-weight: bold;
        }

        .fc-header-toolbar .fc-button:hover {
            background-color: #33d0e6;
        }

        .fc-header-toolbar .fc-button.fc-state-active {
            background-color: #0e7490;
            color: white;
        }

        /* Day of the week header */
        .fc-col-header-cell {
            background-color: #0e7490;
            color: white;
            text-align: center;
            font-weight: bold;
            padding: 20px;  /* Increased height by adding more padding */
            margin: 0 5px;
        }

        /* Remove border-radius from day header */
        .fc-col-header-cell {
            border-radius: 0;
        }

        .fc-col-header-cell.fc-day-header {
            background-color: #0e7490;
            font-weight: bold;
        }

        /* Spacing between day headers */
        .fc-col-header-cell {
            margin-right: 10px;
        }

        /* Add rounded corners and cyan color to day cells */
        .fc-daygrid-day {
            border-radius: 10px;
            border: 1px solid #0e7490;
        }

        .fc-daygrid-day-top {
            background-color: #0e7490;
            border-radius: 10px;
            padding: 5px;
            color: white;
        }

        /* Highlight the active day with a cyan background */
        .fc-daygrid-day.fc-day-today {
            background-color: #33d0e6;
        }
    </style>
@endsection
