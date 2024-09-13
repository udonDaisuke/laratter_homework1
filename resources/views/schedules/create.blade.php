<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create new schedule') }}
          </h2>
    </x-slot>

<div>
    <form method="POST" action="{{ route('schedules.store') }}">
        @csrf
        <div>
            <label for="subject">件名</label>
            <input type="text" name="subject" id="subject" placeholder="件名は…？">
            @error('subject')
            <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="start_date">開始日</label>
            <input type="date" name="start_date" id="start_date" placeholder="click">
            <input type="time" name="start_time" id="start_time" placeholder="click">
            
            <label for="allday_flag">終日</label>
            <input type="checkbox" name="allday_flag" id="allday_flag">
            @error('start_date')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
            @error('start_time')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="end_date">終了日</label>
            <input type="date" name="end_date" id="end_date">
            <input type="time" name="end_time" id="end_time" placeholder="click">
            @error('end_date')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
            @error('end_time')
                <span class="text-red-500 text-xs italic">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label for="note">メモ</label>
            <textarea name="note" id="note" cols="30" rows="10" placeholder="メモを追加"></textarea>
        </div>
        <div>
            <button class="bg-slate-800 text-white font-bold" type="submit">作成</button>
        </div>

    </form>
</div>
</x-app-layout>
