<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('My Schedule') }}
      </h2>
    </x-slot>

<div>
    @foreach ($schedules as $schedule)
        <div>
            <p >件名</p>
            <p >{{ $schedule -> subject }}</p>
        </div>
        <div>
            <p >開始日</p>
            <p >{{ ($schedule -> start_date) }}</p>
            @if ( $schedule -> allday_flag == 1 )
                <p >* 終日</p>        
            @else
                <p >{{ ($schedule -> start_time) }}</p>
                <p > ~ </p>
                <p >終了日</p>
                <p >{{ $schedule -> end_date }}</p>
                <p >{{ ($schedule -> end_time) }}</p>

            @endif
        </div>

        <p>title</p>
        <p>-----------------------------------</p>
        <a href="{{ route('schedules.show', $schedule) }}" class="text-blue-500 font-bold" >>> For details</a>
        <p>-----------------------------------</p>
        <p>===================================</p>

        @endforeach
</div>

</x-app-layout>
