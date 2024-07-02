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
		});
		calendar.render();
	});

</script>
@endsection