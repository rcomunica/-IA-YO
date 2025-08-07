<div class="grid grid-rows-6 grid-cols-4 items-center justify-items-center w-full h-screen">
    <div class="flex flex-col items-center justify-center gap-5 col-start-1 row-start-1 col-span-4 mt-28">
        <h1 class="text-5xl  text-center text-[#9658FA] font-extrabold">
            {!! $title !!}
        </h1>
        @isset($description)
        <div class="w-3/5">
            <p class="text-center text-[#9658FA] text-xl font-semibold">
                {!! $description !!}
            </p>
        </div>
        @endisset
    </div>
    @switch($type)

    @case('chat')
    <x-chat />
    @break

    @case('youtube')
    <x-youtube-embed link="https://www.youtube.com/embed/qHDJSRlNhVs?si=IbXLFiCW3NEFm6ym" />
    @break

    @case('video')
    {{-- --}}
    @break

    @default
    <div class="">
        Debe ingresar un type de action (chat o video)
    </div>
    @endswitch
</div>