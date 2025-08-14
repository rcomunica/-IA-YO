<button {{ $attributes->merge(['class' => 'flex justify-center items-center text-center w-100 h-15 text-white
    bg-[#6157FA]
    rounded-xl cursor-pointer font-semibold'])}}
    @click="paso++">{{$slot}}</button>