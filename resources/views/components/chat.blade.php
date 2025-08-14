<div class="w-full h-full">
    <div class="flex flex-col gap-5">

        {{-- <div class="flex items-end gap-2.5 bg-white rounded-2xl p-5" x-data="{
        texto: `consectetur adipisicing elit. Ipsam, quas blanditiis. Recusandae illo molestias excepturi ducimus! Laudantium
quibusdam assumenda repellat quas voluptatem illum provident ab, ipsa officiis dolor est natus!
Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio nobis cupiditate reiciendis. Non
perferendis id enim quaerat adipisci quia ipsa labore et alias doloremque rerum tenetur quibusdam, pariatur
molestiae nam! Obcaecati fuga odit quos fugiat, nam dolores enim dignissimos recusandae molestias?
Quam, doloribus! Soluta, consequuntur optio voluptas a, ipsam, dolore consectetur facilis ea veritatis rem
corrupti? Labore dolores dolorum cum? Lorem ipsum, dolor sit amet consectetur adipisicing elit.
Ipsam, quas blanditiis. Recusandae illo molestias excepturi ducimus! Laudantium quibusdam assumenda
repellat quas voluptatem illum provident ab, ipsa officiis dolor est natus! Lorem ipsum dolor sit amet,
consectetur adipisicing elit. Optio nobis cupiditate reiciendis. Non perferendis id enim quaerat
adipisci quia ipsa labore et alias doloremque rerum tenetur quibusdam, pariatur molestiae
nam! Obcaecati fuga odit quos fugiat, nam dolores enim dignissimos recusandae molestias?
Quam, doloribus! Soluta, consequuntur optio voluptas a, ipsam, dolore consectetur facilis ea veritatis rem
corrupti? Labore dolores dolorum cum?`,
        visible: '',
        i: 0,
        speed: 30, // ms por carácter
        start() {
            if (this.i < this.texto.length) {
                this.visible += this.texto[this.i++];
                setTimeout(() => this.start(), this.speed);
            }else{
                continueBtn = true;
            }
        }
    }" x-init="start">
            <img class="w-8 h-8 rounded-full" src="https://ui-avatars.com/api/?rounded=true&name=IA" alt="Jese image">
            <div
                class="flex flex-col w-full max-w-4/5 leading-1.5 p-4 border-gray-200 bg-[#9658FA] rounded-t-xl rounded-br-xl">
                <p class="text-sm font-normal py-2.5 text-white" x-text="visible">Lorem ipsum, dolor sit amet
                </p>
            </div>
        </div> --}}

        <div class="relative col-span-2 row-span-1 col-start-2 row-start-4 bg-white w-full rounded-2xl flex">
            <input type="search" id="prompt-ia" wire:model.lazy='prompt'
                class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Escribe tu respuesta..." required />
            <button type="button" wire:click='responsePromt' class="absolute inset-y-0 end-0 flex items-center pe-3">
                <svg xmlns="http://www.w3.org/2000/svg" class="" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#C9ABFA">
                    <path
                        d="M120-160v-640l760 320-760 320Zm80-120 474-200-474-200v140l240 60-240 60v140Zm0 0v-400 400Z" />
                </svg>
            </button>
        </div>
    </div>

    <style>
        @keyframes blink {
            50% {
                opacity: 0;
            }
        }
    </style>
</div>