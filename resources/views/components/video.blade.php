<div {{$attributes->merge(['class' => 'ccol-span-2 row-span-3 col-start-2 row-start-2 bg-white w-full
    rounded-2xl flex
    p-5'])}}>
    <video id="videoEmotion" controls></video>

    @script
    <script>
        window.initVideo = function() {
            const video = document.querySelector('#videoEmotion');

            video.src = "video/" + $wire.get('emotion') + ".mp4";
            video.load();
            window.musicForum.pause();

            video.addEventListener("ended", function(){
                comp = Alpine.$data(document.getElementById('video-final'));
                console.log("Video terminado");
                window.musicForum.play();
                comp.continueBtn = true;
            });
        }

    </script>
    @endscript
</div>