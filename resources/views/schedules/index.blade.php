@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">スケジュール</div>

          <div class="card-body">
            <div id="calendar"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <style>
    .fc-col-header-cell-cushion,
    .fc-daygrid-day-number {
      color: #333;
      text-decoration: none;
    }

    .fc-col-header-cell.fc-day-sat {
      background-color: #9ecef5;
    }

    .fc-col-header-cell.fc-day-sun {
      background-color: #f4d0df;
    }
  </style>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.14/index.global.min.js'></script>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const events = @json($events);
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: events,
        locale: 'ja',
        height: '500px',
        firstDay: 1, // 0:日曜～6：土曜日
        headerToolbar: {
          left: "dayGridMonth, timeGridWeek, timeGridDay, listWeek",
          center: "title",
          right: "today prev,next"
        },
        buttonText: {
          today: '今日',
          month: '月',
          week: '週',
          day: '日',
          list: 'リスト',
        },
        noEventsContent: 'スケジュールはありません',
        fixedWeekCount: false, // 6週目を表示する場合は'true'に設定
        showNonCurrentDates: false, // 当月以外はグレー表示
        // initialDate: '2023-04-01', // 初期表示する年月を指定する
        eventMouseEnter(info) {
          $(info.el).popover({
            title: info.event.title,
            content: info.event.extendedProps.description,
            trigger: 'hover',
            placement: 'top',
            container: 'body',
            html: true
          });
        },
      });
      calendar.render();
    });
  </script>
@endsection
