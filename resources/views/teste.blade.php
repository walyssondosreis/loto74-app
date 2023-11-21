<x-header></x-header>

{{-- AlpineJS: Uma mensagem simples --}}
<h1 x-data="{ message: 'I love Alpine' }" x-text="message"></h1>

{{-- AlpineJS: Um contador simples --}}
<div x-data="{ count: 0, outrocount: 200 }">
    <button x-on:mouseenter="count++">Increment</button>

    <span x-text="count"></span>
    <span x-text="outrocount-count"></span>
</div>

{{-- AlpineJS: Um dropdown simples --}}
<div x-data="{ open: false}">
    <button x-on:click="open=!open"
        class="bg-yellow-300 border-2 border-black p-2 rounded-lg hover:bg-yellow-400 hover:font-bold">TOGGLE</button>

    <div x-show="open" x-on:click.outside="open=false" class="hidden bg-red-300 w-60 p-4 m-2" :class="{ 'hidden': ! open }">
        Meu contenido dropdown...
    </div>
</div>

{{-- AlpineJS: Uma busca simples --}}
<div class="p-4" x-data="{
    search: '',
    items: ['cavalo', 'manco', 'tacaca'],
    get filtroItems() {
        return this.items.filter(
            i => i.startsWith(this.search)
        )
    }
}">
    <input x-model="search" type="text" class="border-2 border-black" name="" id=""
        placeholder="Buscando...">
    <ul class="bg-purple-300">
        <template x-for="item in filtroItems" :key="item">
            <li x-text="item"></li>
        </template>
    </ul>

</div>

@vite(['resources/js/app.js'])
