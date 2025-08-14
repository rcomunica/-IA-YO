<div {{$attributes->merge(['class' => 'col-span-2 row-span-3 col-start-2 row-start-2 bg-white w-full rounded-2xl flex
    p-5'])}}>
    <video src="{{asset('video/'. $source .'.mp4')}}" controls></video>
</div>