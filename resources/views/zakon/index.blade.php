@extends('zakon.zakon')
@section('header')
<title>База данных нормативных правовых актов</title>
@endsection

@section('content')


<div class="container mx-auto mt-20">
    <nav>
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-100 rounded">
            <li class="inline-block px-2 py-2 text-gray-700 "><a href="/"><img src='img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
            <li class="inline-block px-2 py-2 text-gray-700 active font-light text-sm" aria-current="page">База данных НПА</li>
        </ol>
    </nav>
@include('main.side-banner-mob')
<div class="flex flex-col lg:space-x-2 space-x-0 lg:flex-row pb-4">
        <div class="relative flex shadow-lg flex-col rounded-b-lg bg-gray-100 text-center">
            <h5 class="py-3 px-6 mb-0 bg-blue-400 font-black  rounded-t-lg text-gray-100">База данных НПА</h5>
            <div class="flex-auto p-6">
                <div class="relative bg-white shadow-lg p-4 items-stretch w-full rounded-lg my-4 flex flex-wrap">
                    <form action='/zakon' method='get' id='smartSearch' class='w-3/4'>
                        <input name='smartSearch' type="text" class="appearance-none py-1 px-2 border mb-1 text-base leading-normal bg-white text-gray-800  rounded w-full" placeholder="Поиск"
                            aria-label="Search" aria-describedby="button-addon2"
                            >
                    </form>
                    <div class="input-group-append w-1/4">
                        <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-400 text-white hover:bg-blue-500 w-full transition duration-300 ease-in-out" type="submit" form='smartSearch'>Найти</button>
                    </div>
                </div>
               
                <form method='get' action='/zakon' id='filterNpa'>
                    <div class="bg-white shadow-lg p-4 rounded-lg space-y-4">
                        <h1 class="text-gray-600 mb-2 mt-1 font-bold">Расширенный фильтр</h1>
                    <div class='relative flex  w-full' > 
                     <div class="w-3/4">
                         <select name='vid[]' class=" appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" 
                            title="Вид документа">
                            @foreach ($npacategory as $category)
                            <option title='{{$category->name}}' data-toggle="tooltip" data-placement="top" value='{{$category->id}}'>{{$category->name}}</option>
                            @endforeach
                        </select>
                     </div>
                        <div class="w-1/4">
                            <button class=" align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-400 text-white hover:bg-blue-500 w-full transition duration-300 ease-in-out" type="button" id="button-search-on-show">ОК</button>
                        </div>
                    </div>
                   
                    
                   
                    <div class='relative flex items-stretch w-full'> 
                        <div class="w-3/4">
                            <select name='organ[]' class="appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" 
                            title="Орган:">
                            @foreach ($organy as $organ)
                            <option value='{{$organ->id}}'>{{$organ->name}}</option>
                            @endforeach
                        </select>
                        </div>
                        
                        <div class="input-group-append w-1/4">
                            <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-400 text-white hover:bg-blue-500 w-full transition duration-300 ease-in-out" type="button" id="button-search-on-show">ОК</button>
                        </div>
                    </div>
                

                   
                    <div class="mb-4">
                        <input id="name" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border rounded" placeholder="По названию документа" type="text"
                            name="name">
                    </div>
                </div>

                    <div class=" bg-white shadow-lg p-4 rounded-lg my-4">
                       
                        <div class="space-y-4">
                            <h1 class="text-gray-600 mt-1 mb-2 font-bold">Дата принятия документа</h1>
                            <label for="date" class="text-sm">Точная дата:</label>
                            <input name='date' class="block text-sm appearance-none w-full py-1 px-2 mb-1 leading-normal bg-white text-gray-800 border border-gray-200 rounded" type="date" id='date'
                                >
                           
                            <label for="dateFrom" class="text-sm">В промежутке не ранее:</label>
                            <input name='dateFrom' class="block appearance-none w-full py-1 px-2 mb-1 text-sm leading-normal bg-white text-gray-800 border border-gray-200 rounded" type="date" id='dateFrom'
                                >
                           
                            <label for="dateTo" class="text-sm">Не позднее:</label>
                            <input name='dateTo' class="block appearance-none w-full py-1 px-2 mb-1 text-sm leading-normal bg-white text-gray-800 border border-gray-200 rounded" type="date" id='dateTo'
                                >
                        </div>
                    </div>
                   
                @csrf
                </form>
                <button type="submit" form='filterNpa' class="align-middle text-center select-none  border w-1/3 font-normal whitespace-no-wrap rounded py-3 px-3 leading-normal no-underline bg-blue-400 text-white hover:bg-blue-500 mx-auto transition duration-300 ease-in-out">Поиск</button>
            </div>
            <div class="relative flex flex-col rounded-lg break-words bg-white mx-6 my-4">
                <div class="flex-auto p-6">
                    @foreach ($npa as $one_npa)
                    <a href="{{asset('zakon/'.$one_npa->id)}}">
                    <div class="px-2 py-2 my-4 border rounded hover:bg-gray-50">
                        {{$one_npa->name}}
                    </div>
                    </a>
                    @endforeach
                </div>
                @if ($links)
                <p class="text-left">{{ $npa->appends(request()->query())->links() }}</p>
                @endif
            </div>
        </div>
    @include('main.side-banner-desktop-1')
</div>
</div>
@endsection