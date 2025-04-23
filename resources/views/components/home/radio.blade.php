<form method="GET" action="{{ route('tampilan.all') }}" class="flex flex-col gap-2 ml-2 mt-1">

    <label class="flex items-center gap-2">
        <input type="radio" name="posted" value=""
               onchange="this.form.submit()" {{ request('posted') == '' ? 'checked' : '' }}>
        <span>Semua</span>
    </label>

    <label class="flex items-center gap-2">
        <input type="radio" name="posted" value="today"
               onchange="this.form.submit()" {{ request('posted') == 'today' ? 'checked' : '' }}>
        <span>Hari Ini</span>
    </label>

    <label class="flex items-center gap-2">
        <input type="radio" name="posted" value="week"
               onchange="this.form.submit()" {{ request('posted') == 'week' ? 'checked' : '' }}>
        <span>Minggu Ini</span>
    </label>

    <label class="flex items-center gap-2">
        <input type="radio" name="posted" value="month"
               onchange="this.form.submit()" {{ request('posted') == 'month' ? 'checked' : '' }}>
        <span>Bulan Ini</span>
    </label>

    <label class="flex items-center gap-2">
        <input type="radio" name="posted" value="year"
               onchange="this.form.submit()" {{ request('posted') == 'year' ? 'checked' : '' }}>
        <span>Tahun Ini</span>
    </label>

    @if(request()->has('posted'))
        <a href="{{ route('tampilan.all') }}" class="text-sm text-red-500 underline mt-2">Reset Filter</a>
    @endif

</form>
