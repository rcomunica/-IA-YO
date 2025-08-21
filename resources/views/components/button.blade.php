<button {{ $attributes->merge(['class' => 'flex justify-center items-center text-center w-100 h-15 text-white
    bg-[#6157FA]
    rounded-xl cursor-pointer font-semibold hover:bg-[#9658FA]'])}}
    @click="paso++">{{$slot}}</button>