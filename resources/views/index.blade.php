<div x-data="{ paso: 2 }">

    @env('local')
    <span>vista: <strong x-text="paso"></strong></span>
    @endenv



    <x-home x-show="paso === 0" />
    <x-input title="¿Como te llamas?" x-show="paso === 1" wire:model.live="name"
        description="Te pedimos esta información para poder tener una mejor interaccion contigo durante el desarrollo de la actividad ^^" />

    <x-action x-show="paso === 2" title="¿Cómo estás {{ $name ?? '' }}?" type="chat" description="¡Exprésate! siéntete libre de interactuar...<br>
         explica como ha sido tu día, como va el foro, etc, etc, etc." />

    <x-steeper x-show="paso === 3" title="¡Primero que todo! <br> Empecemos con la IA" />

    <template x-if="paso === 4">
        <x-calification title="¿Cómo te sientes frente a la respuesta de la IA?" />
    </template>

    <x-steeper x-show="paso === 5" title="Escuchemos algo de música" />

    <x-action x-show="paso === 6" title="Reproduce esto y escucha" type="youtube"
        description="Según las recomendaciones y nuestro análisis..." />

    <template x-if="paso === 7">
        <x-calification title="¿Cómo te sientes frente a la respuesta de la música?" />
    </template>
    <x-steeper x-show="paso === 8" title="Un profesional quiere dejarte un mensaje" />

    <x-action title="Escucha y siéntete mejor" x-show="paso === 9" description="Abre tu corazón y escucha..."
        type="video" />

    <template x-if="paso === 10">
        <x-calification title="Consideras que la profesional logró ayudarte?" />
    </template>


</div>