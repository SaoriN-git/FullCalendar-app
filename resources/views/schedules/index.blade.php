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
      });
      calendar.render();
    });
  </script>
@endsection
