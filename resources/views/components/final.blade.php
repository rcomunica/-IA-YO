<div {{ $attributes->merge(['class' => 'grid grid-cols-4 w-full text-[#9658FA]
    min-h-screen']) }}>

    <div class="col-span-2">
        <h1 class="text-7xl p-12  font-black">Hola <br> {{$this->name}}!</h1>
    </div>
    <div class="col-span-2 flex text-right justify-end">
        <h2 class="text-5xl p-12 font-extrabold items-end">Resultados de tu <br> experiencia</h2>
    </div>
    <div class="col-span-4 flex justify-between px-12">
        <div class="flex flex-row col-span-2 w-full">
            <div class="flex flex-row items-end gap-5 w-full">
                <div class="">
                    @livewire(\App\Filament\Widgets\EmotionRegisterChart::class)
                </div>
            </div>
        </div>
        <div class="flex flex-col text-right">
            <div class="">
                <h3 class="text-4xl font-semibold">Tu sentimiento: <span class="font-bold">{{$this->emotion
                        ?? null}}</span>
                </h3>
            </div>
            <div class="">
                <h3 class="text-4xl font-semibold">Prefieres afrontarlo con: <span
                        class="font-bold">{{$this->bestSelection['posicion'] ?? ' '}}</span></h3>

            </div>
            <div class="">
                <h3 class="text-4xl font-semibold">Casi no te gustó la opinión de: <span
                        class="font-bold">{{$this->poorSelection['posicion'] ?? ' '}}</span>
                </h3>
            </div>
        </div>
    </div>
    <div class="px-12 col-span-4 flex justify-between mt-12">
        <div class="flex flex-row">
            <div class="flex flex-row items-end gap-5">
                <div class="w-2/5">
                    @livewire(\App\Filament\Widgets\EmotionsPorcentPie::class)
                </div>
                <div class="font-semibold w-1/5 text-xl">
                    <p>Tu emoción corresponde al <span class="font-bold">{{$this->forumPorcent}}%</span>
                        del foro OEISTA</p>
                </div>
            </div>
        </div>
        <div class="col-start-3 row-start-1 flex justify-end">
            <div class="text-right w-4/5 flex gap-5 flex-col items-end">
                <h3 class="font-semibold mb-5">¿Quieres recibir este informe más detallado a tu correo?</h3>
                <div class="w-full flex items-end flex-col">
                    <label class="text-sm" for="emailInput">Ingresa tu correo</label>
                    <input id="emailInput" name="emailInput" wire:model.live='email' class="block p-4 w-4/5
                text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50
                focus:ring-blue-500 focus:border-blue-500" type="email" placeholder="pepito@email.com">
                </div>
                <button wire:click='generarPdf' class="flex justify-center items-center text-center w-3/5 py-5
                    text-white
                    bg-[#6157FA]
                    rounded-xl cursor-pointer font-semibold hover:bg-[#9658FA]">Enviar</button>
            </div>
        </div>
    </div>
    <div class="px-12 col-span-4 row-span-2 grid grid-cols-3">


    </div>
</div>