<div class="w-full h-full" x-data="{loading: false}">
    <div class="flex flex-col gap-5">
        <template x-if="$wire.message">
            <div class="flex items-end gap-2.5 bg-white rounded-2xl p-5" x-data="
            {
                texto: $wire.message,
                visible: '',
                i: 0,
                speed: 30, // ms por carácter
                start() {
                    if (this.i < this.texto.length) {
                        loading = false;
                        this.visible += this.texto[this.i++];
                        setTimeout(() => this.start(), this.speed);
                    }else{
                        continueBtn = true;
                    }
                }
            }
        " x-init="start">

                <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?rounded=true&name=IA"
                    alt="Jese image">
                <div
                    class="flex flex-col w-full max-w-4/5 leading-1.5 p-4 border-gray-200 bg-[#9658FA] rounded-t-xl rounded-br-xl">
                    <p class="text-sm font-normal py-2.5 text-white" x-text="visible">Lorem ipsum, dolor sit amet
                    </p>
                </div>
            </div>
        </template>


        <template x-if="!$wire.message">
            <div
                class="col-span-2 row-span-1 col-start-2 row-start-4 w-full rounded-2xl flex justify-center flex-col items-center gap-5">
                <textarea id="prompt-ia" x-show="loading != true"
                    class="block w-3/5 p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                    wire:model.live='prompt'
                    placeholder='Escribe acá como ha sido tu día, ej: "hoy me siento feliz porqué voy a pasar de año y pronto seré un profesional"'
                    rows="4"></textarea>
                <x-button type="button" x-show="loading != true" @click="$wire.connectOpenAi(); loading = true">
                    Enviar
                </x-button>
                <div x-show="loading === true">
                    <img src="{{asset('images/loading.gif')}}" alt=" Cargando...">
                </div>
            </div>

        </template>

    </div>

    <style>
        @keyframes blink {
            50% {
                opacity: 0;
            }
        }
    </style>
</div>