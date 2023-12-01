@php
    // var_dump($ranking);
@endphp

<div class="flex-col p-4 text-center border-2 border-black rounded-lg">
    <span class="flex justify-center p-4 m-4 border-2 border-black rounded-lg">Melhores Apostas</span>

    <div class="flex justify-center w-full ">
        @php
            $contador = 1;
        @endphp
        <div class="flex-col">


            @foreach ($ranking as $idx => $item)
            <div class="flex m-2">
                <span class="flex w-10 p-4 border-2 border-black justify-center border-r-0">{{ $contador++ }}º</span>
                <span class="flex w-full  p-4 border-2 border-black">{{ $idx }}</span>
                <span class="flex w-10 border-2 p-4 border-black justify-center border-l-0 text-xs">{{ $item }} pts</span>
            </div>
            @endforeach

        </div>

    </div>

</div>
