import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


import axios from 'axios';
window.axios = axios;


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


    var myCalendar = document.getElementById('calendar');


    var calendar = new FullCalendar.Calendar(myCalendar, {

        headerToolbar: {
            left: 'dayGridMonth,timeGridWeek,timeGridDay',
            center: 'title',
            right: 'listMonth,listWeek,listDay'
        },


        views: {
            listDay: { // Customize the name for listDay
                buttonText: 'Day Session',

            },
            listWeek: { // Customize the name for listWeek
                buttonText: 'Week Session'
            },
            listMonth: { // Customize the name for listMonth
                buttonText: 'Month Session'
            },
            timeGridWeek: {
                buttonText: 'Week', // Customize the button text
            },
            timeGridDay: {
                buttonText: "Day",
            },
            dayGridMonth: {
                buttonText: "Month",
            },

        },


        initialView: "timeGridWeek", // initial view  =   l view li kayban  mni kan7ol l  calendar
        slotMinTime: "09:00:00", // min  time  appear in the calendar
        slotMaxTime: "19:00:00", // max  time  appear in the calendar
        nowIndicator: true, 
        selectable: false, 
        selectMirror: true,
        selectOverlap: true, 
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
                
            }else{     
                start.value = info.startStr.slice(0, info.startStr.length - 6)
                end.value = info.endStr.slice(0, info.endStr.length - 6)   
            }

            submitEvent.click()
        }



    });

    calendar.render();
})