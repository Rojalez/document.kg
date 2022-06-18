<!-- bunner -->
@include("main.main-banner")
<!-- bunnerend -->
<!-- menu -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

<style>
    html {
        -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    }
    body {
        font-family: 'Source Sans Pro';
    }
</style>
    <nav class="w-full bg-black bg-opacity-60 fixed z-50 top-0 shadow-lg" style="-webkit-backdrop-filter: saturate(180%) blur(20px); backdrop-filter: saturate(180%) blur(20px);">
        <div class="container px-6 py-1 mx-auto">
            <div x-data="{ open: false }"  class="md:flex md:items-center md:justify-between">
                <div class="flex bg-opacity-70 items-center justify-between relative">
                    <div class="text-xl font-semibold text-gray-700">
                        <a class="text-xl font-bold text-gray-800 dark:text-white md:text-2xl hover:text-gray-700 dark:hover:text-gray-300" href="/"><img src="/img/nav-logo.png" alt="logo" style='width:150px; height:50px;'></a>
                    </div>
                    <div class="flex md:hidden top-3 right-7 ">
                        <button @click="open = true" type="button" class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400 " aria-label="toggle menu">
                            <svg viewBox="0 0 24 24" class="w-8 h-8 fill-current">
                                <path fill-rule="evenodd" d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div  class="flex-1 md:flex md:items-center md:justify-between relative">
                    <div class="md:flex hidden flex-col -mx-4 md:flex-row md:items-center md:mx-8">
                        <a href="{{asset('documents')}}" class="px-2 py-1 mx-2 mt-2 text-sm font-light text-gray-100 transition-colors duration-300 transform rounded-full md:mt-0">Документы</a>
                        <a href="{{asset('zakon')}}" class="px-2 py-1 mx-2 mt-2 text-sm font-light text-gray-100 transition-colors duration-300 transform rounded-full md:mt-0">НПА</a>
                        <a href="{{asset('forum')}}" class="px-2 py-1 mx-2 mt-2 text-sm font-light text-gray-100 transition-colors duration-300 transform rounded-full md:mt-0">Форум</a>
                        <a href="{{asset('lawyers')}}" class="px-2 py-1 mx-2 mt-2 text-sm font-light text-gray-100 transition-colors duration-300 transform rounded-full md:mt-0">Юристы</a>
                    </div>
                    <div x-data="{ open: false }" >
                        <div @click="open = true" class="hidden md:block">
                            @auth
                            <img class="rounded-full cursor-pointer hover:scale-150 transform transition duration-300 ease-in-out" style='height:30px;width:30px;'data-toggle="tooltip" data-placement="top" data-original-title="{{ Auth::user()->name }}"  src="{{asset('storage/uploads/'.Auth::user()->avatar) }}">
                            @else
                            <i class='fad fa-user-circle text-2xl text-blue-500 hover:text-blue-600 cursor-pointer' aria-hidden="true"></i>
                            @endauth
                        </div>
                        <div x-show="open" @click.away="open = false">
                            <div class="absolute right-0 z-20 w-48 py-2 mt-2 bg-white border rounded-md shadow-xl dark:bg-gray-800">
                                @auth 
                                <a href="{{ url('/home') }}" class="block px-4 focus:outline-none py-2 text-sm text-gray-700 capitalize transition-colors duration-200 hover:bg-blue-500 transform dark:text-gray-300 hover:text-white dark:hover:text-white">
                                    Кабинет
                                </a>
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 transform hover:bg-blue-500 dark:text-gray-300 hover:text-white dark:hover:text-white">
                                    Выйти
                                </a>
                                @else
                                @if (Route::has('register'))
                                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 hover:bg-blue-500 transform dark:text-gray-300 hover:text-white dark:hover:text-white">
                                    Войти
                                </a>
                                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 hover:bg-blue-500 transform dark:text-gray-300 hover:text-white dark:hover:text-white">
                                    Регистрация
                                </a>
                                @endif
                                @endauth  
                            </div>
                        </div>
                    </div>
                    

                    <div x-show="open"
                    @click.away="open = false" class="flex md:hidden flex-col -mx-2 md:flex-row  md:items-center md:mx-8">
                    @auth 
                    <a href="{{ url('/home') }}" class="block px-4 py-2 text-sm text-gray-100 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                        Кабинет
                    </a>
                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-100 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                        Выйти
                    </a>
                    @else
                    @if (Route::has('register'))
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-100 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                        Войти
                    </a>
                    <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-100 capitalize transition-colors duration-300 transform dark:text-gray-300 hover:bg-blue-500 hover:text-white dark:hover:text-white">
                        Регистрация
                    </a>
                    
                    @endif
                    @endauth  
                        <a href="{{asset('documents')}}" class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-100 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-100">Документы</a>
                        <a href="{{asset('zakon')}}" class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-100 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-100">НПА</a>
                        <a href="{{asset('forum')}}" class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-100 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-100">Форум</a>
                        <a href="{{asset('lawyers')}}" class="px-2 py-1 mx-2 mt-2 text-sm font-medium text-gray-100 transition-colors duration-200 transform rounded-md md:mt-0 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">Юристы</a>
                    </div>
                   
                  
                 
            </div>
        </div>
    </div>
    </nav>
    
