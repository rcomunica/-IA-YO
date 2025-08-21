<div id="player" {{$attributes->merge(['class' => 'col-span-2 row-span-3 col-start-2 row-start-2 bg-white w-full
    rounded-2xl flex
    p-5'])}} x-cloak>


    @script
    <script>
        let playerApi = null;
        let playerReady = false;

    function loadYouTubeAPI(callback) {
        if (!document.getElementById('youtube-iframe-api')) {
            let tag = document.createElement('script');
            tag.id = 'youtube-iframe-api';
            tag.src = "https://www.youtube.com/iframe_api";
            let firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
            console.log("API de YouTube insertada ✅");
        }
        if (callback) callback();
    }

    window.initPlayer = function() {
        loadYouTubeAPI(() => {

            window.onYouTubeIframeAPIReady = function () {

                console.log("YouTube API lista 🚀");

                playerApi = new YT.Player('player', {
                    height: '500',
                    videoId: $wire.get('videoId'),
                    events: {
                        'onReady': (event) => {
                            playerReady = true;
                            console.log("YouTube player listo 🎬");
                        },
                        'onStateChange': (event) => {
                            if (event.data === YT.PlayerState.ENDED) {
                                console.log("Video terminado ✅");
                                let comp = Alpine.$data(document.getElementById('youtube-link'));
                                comp.continueBtn = true;
                            }
                        }
                    }
                });

            };

        });
    }


    </script>
    @endscript
</div>


{{-- @script
<script>
    let player = null;
    let youtubeReady = false;
    console.log('{{$videoId}}');


    if (!document.getElementById('youtube-iframe-api')) {
            let tag = document.createElement('script');
            tag.id = 'youtube-iframe-api';
            tag.src = "https://www.youtube.com/iframe_api";
            let firstScriptTag = document.getElementsByTagName('script')[0];
            firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
    }

    // 👇 función GLOBAL para que YouTube la pueda encontrar
    window.onYouTubeIframeAPIReady = function() {

        console.log("player now work");

        player = new YT.Player('player', {
            height: '500',
            width: '100%',
            videoId: '{{$this>-videoId}}',
            playerVars: {
                'playsinline': 1
            },
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });

        console.log("YouTube API lista ✅");

    }

    // Función para inicializar/reemplazar el player con un video nuevo
    function initYouTubePlayer(videoId) {


        if (window.player && window.player.destroy) {
            window.player.destroy();
        }


    }





    // Livewire: recibe el ID dinámico
    Livewire.on('register-created', (videoId) => {
        console.log("Evento register-created recibido con videoId:", videoId[0]);
        initYouTubePlayer(videoId[0]);

    });
</script>
@endscript --}}