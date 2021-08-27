@if (session()->has('success'))
    <div x-data="{show: true}"
            x-init="setTimeout(()=> show = false, 4000)"
        {{-- we could also make use of transitions --}}
            x-show="show"
            class="fixed bg-blue-500 text-sm text-white py-2 px-4 bottom-3 right-3 rounded-xl">
        <p class="">{{ session('success')}}</p>
    </div>
@endif
