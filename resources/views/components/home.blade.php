<div {{ $attributes->merge(['class' => 'grid grid-rows-4 grid-cols-3 items-center justify-items-center w-full
    h-screen']) }}>
    <div class="col-start-2 row-start-2">
        <h1 class="text-5xl text-center text-[#9658FA] font-extrabold">¡Descubre cómo y con quien te sientes más comodo!
        </h1>
    </div>
    <div class="col-start-2 row-start-3">
        <button class='flex justify-center items-center text-center w-100 h-15 text-white
            bg-[#6157FA]
            rounded-xl cursor-pointer font-semibold hover:bg-[#9658FA]' id="startForo">⭐ Empecemos ⭐</button>
    </div>
    <div class="col-start-2 row-start-4">
        <p class="text-center text-[#9658FA]">
            <b>¡Recuerda!</b>
            <br>
            Se sincero durante todo el tiempo para obtener un reporte más preciso, respetamos tú
            privacidad y <b>NO</b> almacenaremos ninguna informacion personal suministrada
        </p>
    </div>

    <script>
        var btn = document.getElementById('startForo');
        btn.addEventListener("click", () => {
            particlesJS.load('particles-js', '/particlesjs-config.json', function() {
                console.log('Particles.js cargado');
            });

            if (!window.musicForum) {
                window.musicForum = new Audio('{{ asset('0818.mp3') }}');
                window.musicForum.volume = 0.2;
            }

            // Verificar si ya está sonando antes de darle play
            if (window.musicForum.paused || window.musicForum.ended) {
                window.musicForum.play();
            }
            document.documentElement.requestFullscreen();

            setTimeout(() => {
                let comp = Alpine.$data(document.getElementById('home'));
                comp.paso = 1;
            }, 1000);

        })



    </script>

</div>