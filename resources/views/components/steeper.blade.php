@props([
'title',
])

<div class="grid grid-rows-4 grid-cols-3 items-center justify-items-center w-full h-screen">
    <div class="col-span-3 col-start-1 row-start-2">
        <h1 class="text-6xl text-center text-[#9658FA] font-extrabold">
            {!! $title !!}
    </div>
    <div class="col-start-2 row-start-3">
        <x-button>
            Vamos <span class="material-symbols-outlined">arrow_forward</span>
        </x-button>
    </div>
</div>
