<div x-data="{ continueBtn: false }" {{$attributes->merge(['class' => 'grid grid-rows-3 grid-cols-2 items-center
    justify-items-center w-full
    min-h-screen p-5'])}}>
    <div class="flex flex-col items-center justify-center gap-5 w-full col-start-1 row-start-1 col-span-4">
        <h1 class="text-4xl  text-center text-[#9658FA] font-extrabold">
            {!! $title !!}
        </h1>
        @isset($description)
        <div class="w-3/5">
            <p class="text-center text-[#9658FA] font-semibold">
                {!! $description !!}
            </p>
        </div>
        @endisset
    </div>
    <div class="col-span-2 row-span-2 col-start-1 row-start-2 w-full h-full flex flex-col gap-5 justify-center
        items-center">
        @switch($type)

        @case('chat')
        <div class="w-3/5">
            <x-chat />
        </div>
        @break

        @case('youtube')
        <div class="w-3/5">
            <x-youtube-embed link="https://www.youtube.com/embed/qHDJSRlNhVs?si=IbXLFiCW3NEFm6ym" />
        </div>
        @break

        @case('video')
        <x-video source="fondo" />
        @break

        @default
        <div class="">
            Debe ingresar un type de action (chat o video)
        </div>
        @endswitch


        <div class="row-start-5 col-start-2 col-span-2">
            <x-button x-show="continueBtn === true">Siguiente</x-button>
        </div>
    </div>
</div>