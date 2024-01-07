<div class="flex justify-center items-center">
    @if (session()->has('success'))
        <div class="bg-teal-100 border border-teal-400 text-teal-700 px-4 py-3 rounded relative" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            {{ session('error') }}
        </div>
    @endif
</div>
