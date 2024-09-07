<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Schedule details') }}
          </h2>
    </x-slot>

<a class="text-blue-500 font-bold" href="{{ route('schedules.index', $schedule) }}">一覧に戻る</a>
<div>
    <div>
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
        <div>
            <p >メモ</p>
            <p >{{ $schedule -> note }}</p>
        </div>

        @if (auth()->id() == $schedule->user_id)
            <div>
                <a class="text-blue-500 font-bold" href="{{ route('schedules.edit', $schedule) }}" >
                    <button>予定を変更</button>
                </a>
                <form action="{{ route('schedules.destroy', $schedule) }} " method="POST" onsubmit="return confirm('本当に予定をキャンセルしますか？');">
                    @csrf
                    @method('DELETE')
                    <button  class="text-red-500 font-bold" type="submit">予定をキャンセル</button>
                </form>
            </div>
        @endif
    </div>
</div>
</x-app-layout>