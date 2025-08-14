<div {{$attributes->merge(['class' => 'grid grid-rows-4 grid-cols-2 items-center justify-items-center w-full
    h-screen'])}}>
    <div class="flex flex-col items-center justify-center gap-5 col-start-1 row-start-1 col-span-2">
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
    <div x-data="{ nameInput: '' }" class=" col-span-2 row-span-2 col-start-1 row-start-2 w-full h-full flex flex-col gap-5 justify-center
        items-center">
        <div class="w-3/5">
            <div class="relative bg-white w-full rounded-2xl flex justify-center items-center flex-col">
                <input type="text" id="nameInput" x-model="nameInput" class=" block w-2/5
                p-4
                text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600
                dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Pepito" required />
            </div>
        </div>
        <x-button x-show="nameInput.length > 1" @click="$wire.set('name', nameInput); paso++">Siguiente</x-button>
    </div>
</div>