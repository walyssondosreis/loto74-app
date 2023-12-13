<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inov4 DEV</title>

    @vite(['resources/css/app.css'])

</head>

<body class="h-screen bg-black text-white">
    {{-- Container de Topo Navbar --}}
    <div class="flex fixed top-0 bg-white w-full h-20 border-b-2 border-black">
        <div class="flex container-full mx-auto relative w-full">
            {{-- Icone ou logo --}}
            <div class= "flex p-4 text-center text-slate-900 w-3/12">
                <span
                    class="before:block before:absolute before:-inset-1 before:-skew-y-3 before:bg-black relative inline-block">
                    <span class="relative text-5xl justify-center font-jhetegral text-white">Walysson dos Reis</span>
                </span>
            </div>
            {{-- Itens da navbar --}}
            <div class="flex justify-center w-6/12 text-black p-4 items-center">
                <ul class="flex gap-4 text-lg">
                    <>
                        <li
                            class="hover:scale-105 hover:bg-black hover:text-red-300 hover:font-semibold duration-300 px-2 cursor-pointer">
                            inicio</li>
                        <>
                            <li
                                class="hover:scale-105 hover:bg-black hover:text-red-300 hover:font-semibold duration-300 px-2 cursor-pointer">
                                habilidade</li>
                            <>
                                <li
                                    class="hover:scale-105 hover:bg-black hover:text-red-300 hover:font-semibold duration-300 px-2 cursor-pointer">
                                    contato</li>
                </ul>
            </div>
        </div>
    </div>
    {{-- Container da capa --}}
    <div class="flex bg-red-300 h-2/5 container-full mx-auto items-center mt-20">

        <div class="flex-col items-center w-full">
            {{-- Texto grande + Slogan --}}
            <div class="bg-white flex-col border-4 border-l-0 border-black text-black text-center p-8 rounded-r-3xl justify-start lg:w-4/5 xl:w-3/5">
                <div class="flex text-9xl justify-center p-4 font-nexah"> INOV <span class="text-blue-600">4</span> DEV
                </div>
                <div class="flex text-2xl justify-center font-nexal font-semibold"> Inovação & Desenvolvimento</div>


            </div>
            {{-- Botão de Jogar pra baixo --}}
            {{-- <div class="flex justify-center p-4 h-3/5 items-end">
                <span
                    class= "text-red-300 bg-white rounded-full items-center flex p-2 border-4 border-red-200 shadow-sm shadow-white">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </span>
            </div> --}}

        </div>
    </div>
    {{-- <div class="container mx-auto flex justify-center text-center p-4">
        <p class="font-nexal text-2xl italic max-w-4xl">
            "A tecnologia é a chave para a inovação e transformação, capacitando-nos a moldar um futuro melhor" - <span>
                Satya Nadella (CEO, Microsoft) </span>
        </p>
    </div> --}}
    {{-- Container Quem Sou Eu --}}
    <div class="container mx-auto flex-col justify-center p-4">
        <div class="flex justify-center">
            <span class="font-nexal text-4xl p-4 italic">QUEM SOU EU ? </span>
        </div>
        <div class="flex border-2 border-white rounded-md p-4 justify-center w-full">

            <div class="flex min-w-fit p-4 justify-center items-center">
                <img class="w-40 h-40 rounded-full" src="{{ asset('images/pika.jpg') }}" alt="" srcset="">
            </div>
            <div class="flex p-4 text-justify">
                <p>
                Saudações amigos, sou Walysson Pereira dos Reis, desenvolvedor web apaixonado por tecnologia. Ao longo de minha trajetória profissional, cultivei uma mentalidade analítica e resolutiva, capacitando-me a abordar desafios complexos com garra e determinação. Minha habilidade de comunicação eficaz propicia uma colaboração produtiva em equipes multifuncionais, enquanto minha atenção meticulosa aos detalhes garante a entrega de produtos de alta qualidade. Alimento uma curiosidade incessante, sempre buscando aprimorar-me e aplicar as mais recentes tendências e melhores práticas no desenvolvimento web. Além das competências técnicas, cultivo um compromisso sólido com a entrega pontual de projetos e a plena satisfação do cliente. Acredito na importância do equilíbrio entre eficiência e elegância no design de software, assegurando que as soluções que concebo não apenas operem de maneira eficaz, mas também proporcionem uma experiência agradável para o usuário. Minha abordagem proativa e orientada a resultados me confere a capacidade de enfrentar os desafios em constante evolução do cenário tecnológico. Estou preparado para contribuir significativamente para projetos inovadores, transformando concepções em realidade através de minha paixão pelo desenvolvimento web e meu comprometimento com o crescimento profissional contínuo.
                </p>
            </div>
        </div>
    </div>
    {{-- Container da Hagilidades --}}
    <div class="container mx-auto flex-col justify-center ">
        <div class="flex justify-center p-4">
            <span class="font-nexal text-4xl p-4"> <i>
                    <> FULLSTACK <&sol;>
                </i></span>
        </div>
        <div class="flex-col justify-center p-4">
            <div class="flex justify-center">
                {{-- Card  --}}
                <div class="flex-col border-2 border-white border-r-0 p-4 max-w-md">
                    <div class="flex justify-center p-4">
                        <svg class="w-20 stroke-none fill-white" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 -1 100 50">
                            <path
                                d="m7.579 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053" />
                            <path
                                d="m41.093 0 7.314 0-2.067 10.123 6.572 0c3.604 0.071 6.289 0.813 8.056 2.226 1.802 1.413 2.332 4.099 1.59 8.056l-3.551 17.649-7.42 0 3.392-16.854c0.353-1.767 0.247-3.021-0.318-3.763-0.565-0.742-1.784-1.113-3.657-1.113l-5.883-0.053-4.346 21.783-7.314 0 7.632-38.054 0 0" />
                            <path
                                d="m70.412 10.123 14.204 0c4.169 0.035 7.19 1.237 9.063 3.604 1.873 2.367 2.491 5.6 1.855 9.699-0.247 1.873-0.795 3.71-1.643 5.512-0.813 1.802-1.943 3.427-3.392 4.876-1.767 1.837-3.657 3.003-5.671 3.498-2.014 0.495-4.099 0.742-6.254 0.742l-6.36 0-2.014 10.07-7.367 0 7.579-38.001 0 0m6.201 6.042-3.18 15.9c0.212 0.035 0.424 0.053 0.636 0.053 0.247 0 0.495 0 0.742 0 3.392 0.035 6.219-0.3 8.48-1.007 2.261-0.742 3.781-3.321 4.558-7.738 0.636-3.71 0-5.848-1.908-6.413-1.873-0.565-4.222-0.83-7.049-0.795-0.424 0.035-0.83 0.053-1.219 0.053-0.353 0-0.724 0-1.113 0l0.053-0.053" />
                        </svg>
                    </div>
                    <div class="flex text-sm text-justify">
                        <p>
                            O PHP (Hypertext Preprocessor) é uma linguagem de programação de código aberto amplamente
                            utilizada para o desenvolvimento de aplicações web dinâmicas. Conhecido por seu desempenho,
                            permite o desenvolvimento rápido e eficiente de páginas web dinâmicas. Sua vasta base de
                            usuários e comunidade ativa garantem suporte contínuo, enquanto a integração perfeita com
                            bancos de dados facilita a gestão de informações.
                            Além disso, a flexibilidade e escalabilidade do PHP tornam-no ideal para empresas de todos
                            os tamanhos, proporcionando uma presença online eficaz e adaptável às necessidades em
                            constante evolução do mercado. Em resumo, o PHP oferece uma solução confiável e eficiente
                            para impulsionar seu projeto online.
                        </p>
                    </div>
                </div>
                {{-- Card  --}}
                <div class="flex-col border-2 border-white border-r-0 p-4 max-w-md">
                    <div class="flex justify-center p-4">
                        <svg class="w-32 stroke-none fill-white" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 113.02 28.1942764712217">
                            <path
                                d="M4.44 0v23.05h8.34v3.97H0V0h4.44zm24 11.46V9.03h4.22v18h-4.2v-2.44c-.58.9-1.38 1.6-2.42 2.1-1.04.53-2.1.78-3.15.78-1.37 0-2.62-.25-3.75-.75a8.76 8.76 0 0 1-2.92-2.06 9.6 9.6 0 0 1-1.9-3 9.72 9.72 0 0 1-.67-3.64c0-1.26.23-2.47.68-3.6a9.56 9.56 0 0 1 1.9-3.04 8.77 8.77 0 0 1 2.9-2.08c1.14-.5 2.4-.75 3.75-.75 1.05 0 2.1.26 3.14.77 1.04.52 1.84 1.22 2.4 2.12zm-.38 8.77a6.3 6.3 0 0 0 .4-2.2c0-.78-.14-1.5-.4-2.2A5.58 5.58 0 0 0 26.98 14a5.23 5.23 0 0 0-1.68-1.22 5.16 5.16 0 0 0-2.18-.47c-.8 0-1.52.17-2.16.48A5.3 5.3 0 0 0 19.3 14a5.3 5.3 0 0 0-1.06 1.83 6.56 6.56 0 0 0-.37 2.2c0 .77.12 1.5.37 2.2.24.7.6 1.3 1.06 1.8a5.28 5.28 0 0 0 1.66 1.25c.64.3 1.36.46 2.16.46s1.53-.15 2.18-.46a5.22 5.22 0 0 0 1.68-1.24 5.58 5.58 0 0 0 1.08-1.8zm7.92 6.8v-18H47.4v4.14h-7.22v13.85h-4.2zm26.67-15.57V9.03h4.2v18h-4.2v-2.44c-.56.9-1.37 1.6-2.4 2.1-1.05.53-2.1.78-3.16.78-1.37 0-2.62-.25-3.75-.75a8.76 8.76 0 0 1-2.92-2.06 9.6 9.6 0 0 1-1.9-3 9.72 9.72 0 0 1-.66-3.64c0-1.26.22-2.47.67-3.6a9.56 9.56 0 0 1 1.9-3.04 8.77 8.77 0 0 1 2.9-2.08c1.14-.5 2.4-.75 3.75-.75 1.05 0 2.1.26 3.14.77 1.04.52 1.85 1.22 2.4 2.12zm-.38 8.77a6.3 6.3 0 0 0 .38-2.2c0-.78-.13-1.5-.38-2.2A5.58 5.58 0 0 0 61.2 14a5.23 5.23 0 0 0-1.7-1.22c-.65-.3-1.38-.47-2.17-.47-.8 0-1.52.17-2.17.48A5.3 5.3 0 0 0 53.5 14a5.3 5.3 0 0 0-1.06 1.83 6.56 6.56 0 0 0-.36 2.2c0 .77.12 1.5.36 2.2.25.7.6 1.3 1.06 1.8a5.28 5.28 0 0 0 1.66 1.25c.65.3 1.37.46 2.17.46.8 0 1.52-.15 2.18-.46a5.22 5.22 0 0 0 1.7-1.24 5.58 5.58 0 0 0 1.07-1.8zm21.46-11.2H88l-6.9 18h-5.3l-6.9-18h4.25l5.3 13.78 5.28-13.77zm13.44-.46c5.73 0 9.64 5.08 8.9 11.02H92.1c0 1.54 1.58 4.54 5.3 4.54 3.2 0 5.35-2.8 5.35-2.8l2.84 2.2c-2.55 2.7-4.63 3.95-7.9 3.95-5.82 0-9.76-3.7-9.76-9.47 0-5.23 4.08-9.46 9.23-9.46zm-5.05 7.9h10.1c-.04-.35-.6-4.56-5.08-4.56-4.5 0-4.98 4.22-5.02 4.56zM108.82 27V0h4.2v27.02h-4.2z" />
                        </svg>
                    </div>
                    <div class="flex text-sm text-justify">
                        <p>
                            Laravel é um framework de desenvolvimento web em PHP que simplifica e agiliza a criação de
                            aplicativos web robustos e escaláveis.
                            A principal vantagem de utilizar o Laravel para o desenvolvimento do seu site reside na
                            eficiência e na produtividade que o framework proporciona. Com uma sintaxe elegante, Laravel
                            simplifica tarefas comuns, acelerando o processo de desenvolvimento. Além disso, o Laravel
                            inclui recursos como o Eloquent, que facilita a interação com o banco de dados, e o Blade,
                            um poderoso mecanismo de template.A robustez do Laravel, combinada com a sua comunidade
                            ativa, resulta em manutenção mais fácil e escalabilidade para o seu site. Seja para projetos
                            pequenos ou grandes, o Laravel oferece uma base sólida, promovendo um desenvolvimento rápido
                            e eficiente, o que se traduz em benefícios tanto a curto quanto a longo prazo.

                        </p>
                    </div>
                </div>
                {{-- Card  --}}
                <div class="flex-col border-2 border-white p-4 max-w-md">
                    <div class="flex justify-center p-4">
                        <svg class="w-10 fill-white stroke-black" viewBox="0 0 256 221"
                            xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin meet">
                            <path d="M204.8 0H256L128 220.8 0 0h97.92L128 51.2 157.44 0h47.36z" />
                            <path d="M0 0l128 220.8L256 0h-51.2L128 132.48 50.56 0H0z" />
                            <path d="M50.56 0L128 133.12 204.8 0h-47.36L128 51.2 97.92 0H50.56z" />
                        </svg>
                    </div>
                    <div class="flex text-sm text-justify">
                        <p>
                            O PHP (Hypertext Preprocessor) é uma linguagem de programação de código aberto amplamente
                            utilizada para o desenvolvimento de aplicações web dinâmicas. Conhecido por seu desempenho,
                            permite o desenvolvimento rápido e eficiente de páginas web dinâmicas. Sua vasta base de
                            usuários e comunidade ativa garantem suporte contínuo, enquanto a integração perfeita com
                            bancos de dados facilita a gestão de informações.
                            Além disso, a flexibilidade e escalabilidade do PHP tornam-no ideal para empresas de todos
                            os tamanhos, proporcionando uma presença online eficaz e adaptável às necessidades em
                            constante evolução do mercado. Em resumo, o PHP oferece uma solução confiável e eficiente
                            para impulsionar seu projeto online.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Container Formulario de contate-me --}}
    <div class="container flex justify-center p-4">
        <div class="flex max-w-lg">
            <span class="font-nexal text-4xl p-4" >Tem uma pergunta ou proposta, ou quer apenas dizer olá? Vá em frente!</span>
        </div>
        <div class="flex">
            Formulario aqui
        </div>
    </div>
    @vite(['resources/js/app.js'])

</body>

</html>

{{--
Sitem Inspiração: https://tamalsen.dev/
O site terá o seguinte esquema:

ok > Navbar
ok > Sessão de capa
ok > Sessão My Expertise(Habilidades)

> Sessão de Disponivel para freelance e contato
> Sessão de indicações e comentários


--}}
