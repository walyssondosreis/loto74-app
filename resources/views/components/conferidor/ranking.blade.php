@php
    // var_dump($ranking);
@endphp

<div class="flex-col p-4 text-center border-2 border-black rounded-lg">
    <span class="flex justify-center p-4 mb-4 border-2 border-black rounded-lg">Melhores Apostas</span>

    <div class="flex justify-center w-full ">
        @php
            $contador = 1;
        @endphp
        <div class="flex-col">


            @foreach ($ranking as $idx => $item)
                <span class="flex w-10 p-4 border-2 border-black justify-center">{{ $contador++ }}º</span>
                <span class="flex w-full  p-4 border-2 border-black">(2123) {{ $idx }}</span>
            @endforeach

        </div>

    </div>

</div>
