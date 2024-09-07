<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit schedule') }}
          </h2>
    </x-slot>

<a class="text-blue-500 font-bold" href="{{ route('schedules.show', $schedule) }}">戻る</a>
<div>
    <form method="POST" action="{{ route('schedules.update', $schedule) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="subject">件名</label>
            <input type="text" name="subject" id="subject" placeholder="件名は…？" value="{{ $schedule -> subject }}">
            @error('subject')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="start_date">開始</label>
            <input type="date" name="start_date" id="start_date" placeholder="click" value="{{ substr(($schedule -> start_date),0,10) }}">
            @error('stasrt_date')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror            
            <input type="time" name="start_time" id="start_time" placeholder="click" value="{{ $schedule -> start_time }}">
            @error('stasrt_time')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror            
            <label for="allday_flag">終日</label>
            <input type="checkbox" name="allday_flag" id="allday_flag" {{ ($schedule -> allday_flag)? 'checked' : '' }}>
        </div>
        <div>
            <label for="end_date">終了</label>
            <input type="date" name="end_date" id="end_date" value="{{ substr(($schedule -> start_date),0,10) }}">
            <input type="time" name="end_time" id="end_time" placeholder="click" value="{{ $schedule -> end_time }}">
            @error('end_time')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror        
        </div>
        <div>
            <label for="note">メモ</label>
            <textarea name="note" id="note" cols="30" rows="10" placeholder="メモを追加">{{ $schedule -> note }}</textarea>
        </div>
        <div>
            <button class="text-blue-500 font-bold" type="submit">更新</button>
        </div>

    </form>
</div>
</x-app-layout>
