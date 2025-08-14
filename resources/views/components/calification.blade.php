<div {{$attributes->merge(['class' => 'grid grid-rows-4 grid-cols-3 items-center justify-items-center w-full
    min-h-screen'])}}
    class="">
    <div class="col-start-2 row-start-2">
        <h1 class="text-5xl text-center text-[#9658FA] font-extrabold">
            {!! $title !!}
        </h1>
    </div>
    <div class="col-start-2 row-start-3 flex flex-row gap-5  p-5 rounded-xl">
        <div class="">
            <div id="tooltip-defno" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip">
                Empeoré
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <img src="{{asset('images/emotions/definitivamenteno.svg')}}" data-tooltip-target="tooltip-defno"
                class="scale-100 hover:scale-125 duration-300 ease-out cursor-pointer rounded-full border-2 bg-white"
                width="100" alt="">
        </div>
        <div class="">
            <div id="tooltip-no" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip">
                Me siento un poco mal
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
            <img src="{{asset('images/emotions/no.svg')}}" data-tooltip-target="tooltip-no"
                class="scale-100 hover:scale-125 duration-300 ease-out cursor-pointer rounded-full border-2 bg-white"
                width="100" alt="">
        </div>
        <div class="">

            <div id="tooltip-meh" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip">
                Me dió igual
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <img src="{{asset('images/emotions/meh.svg')}}" data-tooltip-target="tooltip-meh"
                class="scale-100 hover:scale-125 duration-300 ease-out cursor-pointer rounded-full border-2 bg-white"
                width="100" alt="">
        </div>
        <div class="">

            <div id="tooltip-bien" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip">
                Me siento un poco mejor
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <img src="{{asset('images/emotions/agradable.svg')}}" data-tooltip-target="tooltip-bien"
                class="scale-100 hover:scale-125 duration-300 ease-out cursor-pointer rounded-full border-2 bg-white"
                width="100" alt="">
        </div>
        <div class="">
            <div id="tooltip-muybien" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip">
                Me ayudó mucho
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <img src="{{asset('images/emotions/feliz.svg')}}" data-tooltip-target="tooltip-muybien"
                class="scale-100 hover:scale-125 duration-300 ease-out cursor-pointer rounded-full border-2 bg-white"
                width="100" alt="">
        </div>
    </div>
    <div class="row-start-4 col-start-1 col-span-3">
        <x-button>Siguiente</x-button>
    </div>
</div>