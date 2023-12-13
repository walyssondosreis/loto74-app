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
    <div class="container mx-auto flex-col justify-center p-4 ">
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
    <div class="container mx-auto flex justify-center p-4">
        <div class="flex max-w-lg order-2 w-1/2 p-4">
            <span class="font-nexal text-4xl p-4" >Tem alguma pergunta ou proposta, ou quer apenas dizer olá? Vá em frente! :) Respoderei assim que possível</span>
        </div>
        <div class="flex-col justify-center p-4 border-2 border-white rounded-md order-1 w-1/2">
            <div class="flex-col text-black p-2 justify-center">
                <label class="flex text-white p-1 " for="nome_input">Nome</label>
                <input class="flex text-black p-2 rounded-md border-2 border-gray-300 w-full" type="text" id="nome_input">
            </div>
            <div class="flex-col text-black p-2 justify-center">
                <label class="flex text-white p-1" for="email_input">Email</label>
                <input class="flex text-black p-2 rounded-md border-2 border-gray-300 w-full" type="email" id="email_input">
            </div>
            <div class="flex-col text-black p-2 justify-center">
                <label class="flex text-white p-1" for="mensagem_input">Mensagem</label>
                <textarea class="flex text-black p-2 rounded-md border-2 border-gray-300 w-full" name="" id="mensagem_input" cols="" rows="5"></textarea>
            </div>
        </div>
    </div>
    {{-- Redes sociais --}}
    <div class="container mx-auto flex justify-center p-4">
        <div class="flex">
            <span class="font-nexal text-4xl p-4" >Gostou do meu perfil? <br>Me siga nas redes sociais! </span>
        </div>
        <div class="flex justify-center gap-2 items-center p-4">
            {{-- GitHub --}}
            <span class="w-10">
                <svg class="fill-white" viewBox="0 0 256 249" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin meet"><g><path d="M127.505 0C57.095 0 0 57.085 0 127.505c0 56.336 36.534 104.13 87.196 120.99 6.372 1.18 8.712-2.766 8.712-6.134 0-3.04-.119-13.085-.173-23.739-35.473 7.713-42.958-15.044-42.958-15.044-5.8-14.738-14.157-18.656-14.157-18.656-11.568-7.914.872-7.752.872-7.752 12.804.9 19.546 13.14 19.546 13.14 11.372 19.493 29.828 13.857 37.104 10.6 1.144-8.242 4.449-13.866 8.095-17.05-28.32-3.225-58.092-14.158-58.092-63.014 0-13.92 4.981-25.295 13.138-34.224-1.324-3.212-5.688-16.18 1.235-33.743 0 0 10.707-3.427 35.073 13.07 10.17-2.826 21.078-4.242 31.914-4.29 10.836.048 21.752 1.464 31.942 4.29 24.337-16.497 35.029-13.07 35.029-13.07 6.94 17.563 2.574 30.531 1.25 33.743 8.175 8.929 13.122 20.303 13.122 34.224 0 48.972-29.828 59.756-58.22 62.912 4.573 3.957 8.648 11.717 8.648 23.612 0 17.06-.148 30.791-.148 34.991 0 3.393 2.295 7.369 8.759 6.117 50.634-16.879 87.122-64.656 87.122-120.973C255.009 57.085 197.922 0 127.505 0"/><path d="M47.755 181.634c-.28.633-1.278.823-2.185.389-.925-.416-1.445-1.28-1.145-1.916.275-.652 1.273-.834 2.196-.396.927.415 1.455 1.287 1.134 1.923M54.027 187.23c-.608.564-1.797.302-2.604-.589-.834-.889-.99-2.077-.373-2.65.627-.563 1.78-.3 2.616.59.834.899.996 2.08.36 2.65M58.33 194.39c-.782.543-2.06.034-2.849-1.1-.781-1.133-.781-2.493.017-3.038.792-.545 2.05-.055 2.85 1.07.78 1.153.78 2.513-.019 3.069M65.606 202.683c-.699.77-2.187.564-3.277-.488-1.114-1.028-1.425-2.487-.724-3.258.707-.772 2.204-.555 3.302.488 1.107 1.026 1.445 2.496.7 3.258M75.01 205.483c-.307.998-1.741 1.452-3.185 1.028-1.442-.437-2.386-1.607-2.095-2.616.3-1.005 1.74-1.478 3.195-1.024 1.44.435 2.386 1.596 2.086 2.612M85.714 206.67c.036 1.052-1.189 1.924-2.705 1.943-1.525.033-2.758-.818-2.774-1.852 0-1.062 1.197-1.926 2.721-1.951 1.516-.03 2.758.815 2.758 1.86M96.228 206.267c.182 1.026-.872 2.08-2.377 2.36-1.48.27-2.85-.363-3.039-1.38-.184-1.052.89-2.105 2.367-2.378 1.508-.262 2.857.355 3.049 1.398"/></g></svg>
            </span>
            {{-- LinkedIN --}}
            <span class="w-10">
                <svg viewBox="0 5 2490 2490.0000000000005" xmlns="http://www.w3.org/2000/svg"><path d="M185.2 313.1H2252V2291H185.2z" fill="#000"/><path d="M0 183.4C0 84.9 82.4 5 184 5h2122c101.6 0 184 79.9 184 178.4v2133.3c0 98.5-82.4 178.3-184 178.3H184c-101.6 0-184-79.8-184-178.3z" fill="#fff"/><path d="M756.7 2088.8v-1121H384.1v1121zm-186.2-1274c129.9 0 210.8-86.1 210.8-193.7-2.4-110-80.9-193.7-208.3-193.7-127.5 0-210.8 83.7-210.8 193.7 0 107.6 80.8 193.7 205.9 193.7zm392.4 1274h372.6v-626c0-33.5 2.4-67 12.3-90.9 26.9-67 88.2-136.3 191.2-136.3 134.8 0 188.7 102.8 188.7 253.5v599.6h372.6V1446c0-344.3-183.8-504.5-428.9-504.5-201 0-289.2 112.3-338.3 188.8h2.5V967.8H962.9c4.9 105.2 0 1121 0 1121z" fill="#000"/></svg>
            </span>
            {{-- Instagram --}}
            <span class="w-10 fill-white">
                <svg clip-rule="evenodd" fill-rule="evenodd" image-rendering="optimizeQuality" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" viewBox="0 0 10000 9951" xmlns="http://www.w3.org/2000/svg"><path d="M1210 0h7580c666 0 1210 545 1210 1210v7531c0 666-545 1210-1210 1210H1210C544 9951 0 9406 0 8741V1210C0 544 545 0 1210 0zm-130 4097h999c-104 303-161 627-161 965 0 1667 1380 3018 3082 3018s3082-1351 3082-3018c0-337-57-662-161-965h999v4190c0 297-243 539-539 539H1578c-274 0-498-224-498-498zM7274 986h1161c262 0 477 215 477 477v1079c0 262-215 477-477 477H7274c-262 0-477-215-477-477V1463c0-262 215-477 477-477zM5003 2936c1105 0 2001 878 2001 1960s-896 1960-2001 1960-2001-878-2001-1960 896-1960 2001-1960z"/></svg>
            </span>
            {{-- Twitter --}}
            <span class="w-10">
                <svg fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M0 0h512v512H0z" fill="#fff"/><path clip-rule="evenodd" d="M192.034 98H83l129.275 170.757L91.27 412h55.908l91.521-108.34 81.267 107.343H429L295.968 235.284l.236.303L410.746 99.994h-55.908l-85.062 100.694zm-48.849 29.905h33.944l191.686 253.193h-33.944z" fill="#000" fill-rule="evenodd"/></svg>
            </span>
            {{-- Telegram --}}
            <span class="w-10">
                <svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 500"><path d="M250 500c138.071 0 250-111.929 250-250S388.071 0 250 0 0 111.929 0 250s111.929 250 250 250z" fill="#fff"/><path d="M104.047 247.832s125-51.3 168.352-69.364c16.619-7.225 72.977-30.347 72.977-30.347s26.012-10.115 23.844 14.451c-.723 10.116-6.503 45.52-12.283 83.815-8.671 54.191-18.064 113.439-18.064 113.439s-1.445 16.619-13.728 19.509-32.515-10.115-36.127-13.006c-2.891-2.167-54.191-34.682-72.977-50.578-5.058-4.335-10.838-13.005.722-23.121 26.012-23.844 57.081-53.468 75.867-72.254 8.671-8.671 17.341-28.902-18.786-4.336-51.3 35.405-101.878 68.642-101.878 68.642s-11.561 7.225-33.237.722c-21.677-6.502-46.966-15.173-46.966-15.173s-17.34-10.838 12.284-22.399z" fill="#000"/></svg>
            </span>
            {{-- Whatsapp --}}
            <span class="w-10 fill-white">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 737.509 740.824"><path fill-rule="evenodd" clip-rule="evenodd" d="M630.056 107.658C560.727 38.271 468.525.039 370.294 0 167.891 0 3.16 164.668 3.079 367.072c-.027 64.699 16.883 127.855 49.016 183.523L0 740.824l194.666-51.047c53.634 29.244 114.022 44.656 175.481 44.682h.151c202.382 0 367.128-164.689 367.21-367.094.039-98.088-38.121-190.32-107.452-259.707m-259.758 564.8h-.125c-54.766-.021-108.483-14.729-155.343-42.529l-11.146-6.613-115.516 30.293 30.834-112.592-7.258-11.543c-30.552-48.58-46.689-104.729-46.665-162.379C65.146 198.865 202.065 62 370.419 62c81.521.031 158.154 31.81 215.779 89.482s89.342 134.332 89.311 215.859c-.07 168.242-136.987 305.117-305.211 305.117m167.415-228.514c-9.176-4.591-54.286-26.782-62.697-29.843-8.41-3.061-14.526-4.591-20.644 4.592-6.116 9.182-23.7 29.843-29.054 35.964-5.351 6.122-10.703 6.888-19.879 2.296-9.175-4.591-38.739-14.276-73.786-45.526-27.275-24.32-45.691-54.36-51.043-63.542-5.352-9.183-.569-14.148 4.024-18.72 4.127-4.11 9.175-10.713 13.763-16.07 4.587-5.356 6.116-9.182 9.174-15.303 3.059-6.122 1.53-11.479-.764-16.07-2.294-4.591-20.643-49.739-28.29-68.104-7.447-17.886-15.012-15.466-20.644-15.746-5.346-.266-11.469-.323-17.585-.323-6.117 0-16.057 2.296-24.468 11.478-8.41 9.183-32.112 31.374-32.112 76.521s32.877 88.763 37.465 94.885c4.587 6.122 64.699 98.771 156.741 138.502 21.891 9.45 38.982 15.093 52.307 19.323 21.981 6.979 41.983 5.994 57.793 3.633 17.628-2.633 54.285-22.19 61.932-43.616 7.646-21.426 7.646-39.791 5.352-43.617-2.293-3.826-8.41-6.122-17.585-10.714"/></svg>
            </span>
        </div>
    </div>
    {{-- Footer --}}
    <div class="container mx-auto flex justify-center p-4 pt-10 pb-10 border-t-2 mt-10">
        <p>&copy; {{ date('Y') }} INOV4DEV. Todos os direitos reservados.</p>
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
