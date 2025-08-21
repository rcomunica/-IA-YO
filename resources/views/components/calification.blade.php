<div {{$attributes->merge(['class' => 'grid grid-rows-4 grid-cols-3 items-center justify-items-center w-full
    min-h-screen'])}}
    class="">
    <div class="col-start-2 row-start-2">
        <h1 class="text-5xl text-center text-[#9658FA] font-extrabold">
            {!! $title !!}
        </h1>
    </div>
    <div class="col-start-2 row-start-3 flex flex-row gap-5 p-5 rounded-xl" x-data="{ califications: [
        {image: 'definitivamenteno', value: 1, name: 'Definitivamente NO me gustó'},
        {image: 'no', value: 2, name: 'NO me gustó'},
        {image: 'meh', value: 3, name: 'Me dió igual'},
        {image: 'agradable', value: 4, name: 'Me siento mejor'},
        {image: 'feliz', value: 5, name: 'Definitivamente me siento mejor'}],
        selected: @entangle(''.$type.'Calification') }">
        <template x-for="calification in califications">
            <div class="">
                <div :id="`tooltip-${calification.image}`" role="tooltip" x-text="calification.name" class=" absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white
                    transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip">
                </div>
                <img :src=" `{{ asset('images/emotions') }}/${calification.image}.svg`"
                    :data-tooltip-target="`tooltip-${calification.image}`" :class="selected === calification.value
                    ? 'border-blue-500 bg-blue-100 scale-125'
                    : 'border-gray-300 bg-white scale-100'"
                    @click="$wire.set('{{$type}}Calification', calification.value); selected = calification.value;"
                    class="scale-100 hover:scale-125 duration-300 ease-out cursor-pointer rounded-full border-2 bg-white"
                    width="100" alt="">
            </div>
        </template>
    </div>

    <div class="row-start-4 col-start-1 col-span-3">
        <x-button>Siguiente</x-button>
    </div>
</div>