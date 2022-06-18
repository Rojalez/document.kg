<!DOCTYPE html>
<html lang="ru">

<head>
    <title>Document - конструктор документов</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="yandex-verification" content="04892a4f605becee" />
    <meta name="google-site-verification" content="2SLR5FvPbpLJDka1dqgQtfqFXCBN7RshuOccBFhA25g" />
    <link href="{{ url('sitemap.xml') }}" rel='alternate' title='Sitemap' type='application/rss+xml'/>
    @yield('header')
    <!-- Scripts -->
   <script src="{{ asset('js/jquery.mousewheel.min.js') }}" defer></script>
   <script src="{{ asset('js/jquery.mCustomScrollbar.min.js') }}" defer></script>
    {{-- <script src="{{ asset('js/bootstrap.min.js') }}" defer></script> --}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/22.0.0/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- UIkit JS -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/tailwind.css')}}" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.18/dist/css/uikit.min.css" /> --}}
    <!-- Styles -->
    <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic"
        rel="stylesheet" type="text/css">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">

    <!-- Custom CSS -->
<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(69807571, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/69807571" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>

<body>
    @include('main.menu')
        <section class="bg-gray-800 max-w-screen-2xl mx-auto w-full relative text-white max-h-xl py-16 md:py-36"> 
            <img data-aos="zoom-out-up" data-aos-once="true" src="img/bg-masthead.jpg" class="absolute  h-full inset-0 object-center object-cover w-full"/>
            <div class="container mx-auto px-4 py-48 relative"> 
                <div class="flex flex-wrap -mx-4  justify-end"> 
                    <div data-aos="zoom-out-up" data-aos-once="true" class="px-4 w-full md:w-10/12 lg:w-7/12 "> 
                        <h4 class="mb-2 text-2xl font-black text-right transition duration-300 ease-in-out uppercase hover:text-blue-500 cursor-default">DOCUMENT.KG</h4> 
                        <p class="mb-6 text-xl text-right">Успешное технологическое решение
                            для создания юридических документов</p> 
                        <a href="documents" class="float-right bg-blue-500  hover:bg-blue-600 font-black inline-block leading-relaxed px-6 py-3 uppercase rounded-full text-gray-50 transition duration-500">Составить документ</a> 
                    </div>                     
                </div>                 
            </div>             
        </section>
        <!-- Предложение -->
                <section class="bg-gray-50 max-w-screen-2xl mx-auto w-full px-4 text-gray-500"> 
                    <div class="flex flex-wrap -mx-4 items-center text-center xl:text-left">                  
                        <div class="px-4 w-full">
                            <div class="flex flex-wrap -mx-4  text-center">
                                <div data-aos="fade-right"  data-aos-once="true" class="w-full md:w-4/12">
                                    <a href="/forum" class="bg-gray-600 block  h-full px-10 py-16 relative text-white xl:py-40"> <img  src="https://cdn.pixabay.com/photo/2016/02/05/16/19/offices-1181385_1280.jpg" class="absolute h-full inset-0 object-center object-cover opacity-25 w-full z-0"/><div class="relative">
                                        {{-- <img src="img/forum.svg" class="w-12 h-12 inline-block" alt=""> --}}
                                            <h5 class="font-bold mb-2 text-xl">
                                   Правовой форум</h5>
                                            <p class="text-sm">Нуждающиеся в юридической помощи, могут получить ответы на свои вопросы.</p>
                                        </div> 
                                    </a>
                                </div>
                                <div data-aos="fade-up" data-aos-once="true" class="w-full md:w-4/12">
                                    <a href="/zakon" class="bg-gray-600 block duration-300  h-full px-10 py-16 relative text-white xl:py-40"> <img src="https://cdn.pixabay.com/photo/2018/07/06/10/07/large-3520096_1280.jpg" class="absolute h-full inset-0 object-center object-cover opacity-25 w-full z-0"/><div class="relative">
                                        {{-- <img src="img/npa.svg" class="w-12 h-12 inline-block" alt=""> --}}
                                            <h5 class="font-bold mb-2 text-xl">
                                    База НПА</h5>
                                            <p class="text-sm">
                                                База данных нормативно-правовых актов с точной фильтрацией и удобными инструментами.</p>
                                        </div> 
                                    </a>
                                </div>
                                <div data-aos="fade-left" data-aos-once="true" class="w-full md:w-4/12">
                                    <a href="/documents" class="bg-gray-600 block duration-300  h-full px-10 py-16 relative text-white xl:py-40"> <img src="https://cdn.pixabay.com/photo/2014/08/26/19/20/document-428331_1280.jpg" class="absolute h-full inset-0 object-center object-cover opacity-25 w-full z-0"/><div class="relative">
                                            {{-- <img src="img/doc.svg" class="w-12 h-12 inline-block" alt=""> --}}
                                            <h5 class="font-bold mb-2 text-xl">
                                    Конструктор документов </h5>
                                            <p class=" text-sm">С помощью нашего конструктора вы существенно экономите время на создание документов.</p>
                                        </div> 
                                    </a>
                                </div>
                            </div>
                        </div>                 
                    </div>             
                </section>
        <!-- Популярные шаблоны -->
        <section class="px-4 text-gray-500">    
                <div class="flex lg:flex-row flex-col content-start h-full -mx-4 items-start justify-center"> 
                    <div data-aos="fade-right" data-aos-once="true"
                     class="p-2 w-full h-full lg:w-4/12">                        
                            <div class="bg-white border px-10 py-12 rounded-lg shadow-md min-h-full"> 
                                <ul class="font-light mb-10 space-y-6 text-lg"> 
                                    @foreach ($top_dogovors as $dogovor)
                                    <li class="text-sm truncate"><a href="{{'/documents/dogovory/'.$dogovor->category->slug.'/'.$dogovor->slug}}">{{$dogovor->name}}</a></li>  
                                    @endforeach                   
                                </ul>                         
                                <a href="documents/dogovory" class="bg-white border-2 border-gray-800 duration-150 ease-linear hover:bg-blue-500 hover:border-blue-500 hover:text-white inline-block px-8 py-2 rounded-full text-center text-gray-800 text-lg transition-all w-full">Договоры</a> 
                            </div>                              
                    </div>             
                    <div data-aos="fade-up" data-aos-once="true"
                     class="p-2 w-full h-full  lg:w-4/12"> 
                            <div class="bg-white border px-10 py-12 rounded-lg shadow-md"> 
                                <ul class="font-light mb-10 space-y-6 text-lg"> 
                                    @foreach ($top_pril_dogovors as $dog_pril)
                                    <li class="text-sm truncate"><a href="{{'/documents/dog-pril/'.$dog_pril->category->slug.'/'.$dog_pril->slug}}">{{$dog_pril->name}}</a></li>                             
                                    @endforeach                            
                                </ul>                         
                                <a href="documents/dog-pril" class="bg-white border-2 border-gray-800 duration-150 ease-linear hover:bg-blue-500 hover:border-blue-500 hover:text-white inline-block px-8 py-2 rounded-full text-center text-gray-800 text-lg transition-all w-full">Приложения</a> 
                            </div>                     
                    </div>             
                    <div data-aos="fade-left" data-aos-once="true"
                     class="p-2 w-full h-full lg:w-4/12"> 
                            <div class="bg-white border px-10 py-12 rounded-lg shadow-md"> 
                                <ul class="font-light mb-10 space-y-6 text-lg"> 
                                    @foreach ($doverennost as $doverennost)
                                    <li class="text-sm truncate"><a href="{{'/documents/zayavleniya/'.$doverennost->category->slug.'/'.$doverennost->slug}}">{{$doverennost->name}}</a></li> 
                                    @endforeach                         
                                </ul>                         
                                <a href="documents/zayavleniya" class="bg-white border-2 border-gray-800 duration-150 ease-linear hover:bg-blue-500 hover:border-blue-500 hover:text-white inline-block px-8 py-2 rounded-full text-center text-gray-800 text-lg transition-all w-full">Доверенности</a> 
                            </div>                     
                    </div>             
                </div>         
        </section>
    @yield('content')
    @include('main.footer')

    <script>
        AOS.init();
        AOS.init({disable: 'mobile'});
      </script>
</body>

</html>