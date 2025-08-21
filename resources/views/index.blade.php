<div x-data="{ paso: 0, transicion: {
    'x-transition:enter': 'transition transform ease-out duration-500',
    'x-transition:enter-start': 'translate-x-full opacity-0',
    'x-transition:enter-end': 'translate-x-0 opacity-100',
    'x-transition:leave': 'transition transform ease-in duration-500',
    'x-transition:leave-start': 'translate-x-0 opacity-100',
    'x-transition:leave-end': '-translate-x-full opacity-0'
    }
    }" id="home">
    <div id="particles-js" class="absolute top-0 left-0 w-full h-full -z-10"></div>
    @env('local')
    <span>vista: <strong x-text="paso"></strong></span>
    <span>IA CALIFICATION: <strong>{{ $iaCalification ?? 0 }}</strong></span>
    <span>MUSIC CALIFICATION: <strong>{{ $musicCalification ?? 0 }}</strong></span>
    <span>PROFESIONAL CALIFICATION: <strong>{{ $profesionalCalification ?? 0 }}</strong></span>
    @endenv

    {{-- FALTA CREAR LOAD--}}

    <x-home x-show="paso === 0" x-bind="transicion" />
    <x-input title="¿Como te llamas?" x-bind="transicion" x-show="paso === 1" wire:model.live="name"
        description="Te pedimos esta información para poder tener una mejor interaccion contigo durante el desarrollo de la actividad ^^" />

    <x-steeper x-show="paso === 2" x-bind="transicion" title="¡Primero que todo! <br> Empecemos con la IA" />
    <x-action x-show="paso === 3" x-bind="transicion" title="¿Cómo estás {{ $name ?? '' }}?" type="chat" description="¡Exprésate! siéntete libre de interactuar...<br>
         explica como ha sido tu día, como va el foro, etc, etc, etc." />


    <template x-if="paso === 4" x-bind="transicion">
        <x-calification title="¿Cómo te sientes frente a la respuesta de la IA?" type="ia" />
    </template>

    <x-steeper x-show="paso === 5" title="Escuchemos algo de música" x-bind="transicion" />

    <x-action id="youtube-link" x-show="paso === 6" x-bind="transicion" x-effect="if (paso === 6) initPlayer()"
        idSong="{{$videoId}}" title="Reproduce esto y escucha" type="youtube"
        description="Según las recomendaciones y nuestro análisis..." />


    <template x-if="paso === 7" x-bind="transicion">
        <x-calification title="¿Cómo te sientes frente a la respuesta de la música?" type="music" />
    </template>
    <x-steeper x-show="paso === 8" x-bind="transicion" title="Un profesional quiere dejarte un mensaje" />

    <x-action title="Escucha y siéntete mejor" x-bind="transicion" x-show="paso === 9"
        description="Abre tu corazón y escucha..." type="video" />

    <template x-if="paso === 10" x-bind="transicion">
        <x-calification title="Consideras que la profesional logró ayudarte?" type="profesional" />
    </template>

</div>