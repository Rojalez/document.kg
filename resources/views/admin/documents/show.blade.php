@extends('documents.documents')
@section('header')
<title>{{$document->name}}</title>

<script src="{{ asset('js/admin-panel.js') }}" defer></script>
<link href="{{ asset('css/admin-panel.css') }}" rel="stylesheet">
<style> 
 .sticky-stop, #banner-top {
   display:none;
  }
  
</style>
@endsection
@section('content')
<div class="container mx-auto mt-20">
    <nav aria-label="breadcrumb">
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 font-light text-sm bg-gray-200 rounded">
            <li class="inline-block px-2 py-2 text-gray-700 "><a href="/">Главная</a></li>
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/documents/">Документы</a></li>
            <li class="inline-block px-2 py-2 text-gray-700"><a href="{{asset('documents/'.$category->slug)}}">{{$category->name}}</a></li>
            <li class="inline-block px-2 py-2 text-gray-700"><a href="{{asset('documents/'.$category->slug.'/'.$subcategory->slug)}}">{{$subcategory->name}}</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 active" aria-current="page">{{$document->name}}</li>
        </ol>
    </nav>
</div>
<button id="open" class="bottom-0 inline-block align-middle text-center select-none font-normal focus:outline-none  rounded-full py-2 px-4 bg-blue-500 duration-300 ease-linear text-white hover:bg-blue-600"">Панель</button>
<div class="container mx-auto sm:px-4 flex flex-wrap  justify-center mb-1 mt-2" id='hidden'>

    <div class="admin-panel-menu w-3/5 border rounded">
        <div class="relative align-middle flex flex-wrap  mt-1 break" role="group" aria-label="Basic example" id='buttons'>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-green-500 text-white hover:bg-green-600 py-1 px-2 leading-tight text-xs  w-1/4" id='blok-radio'>Блок кнопок радио</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-green-500 text-white hover:bg-green-600 py-1 px-2 leading-tight text-xs  w-1/4" id='blok-checkbox'>Блок кнопок чекбокс</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-green-500 text-white hover:bg-green-600 py-1 px-2 leading-tight text-xs  w-1/4" id='checkbox'>Кнопка чекбокс</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-green-500 text-white hover:bg-green-600 py-1 px-2 leading-tight text-xs  w-1/4 rounded-r" id='radio'>Кнопка радио</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/5 rounded-l mt-1" id='p'>Абзац</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/5 mt-1" id='h4'>h4</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/4 mt-1" id='nn'>nn</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/5 mt-1" id='h3'>h3</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/5 mt-1" id='h2'>h2</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/5 mt-1" id='span-placeholder'>ph</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/5 mt-1" id='span-number'>number</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/5 mt-1" id='span-chudo'>Чудо</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/5 mt-1" id='div'>div</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/5 mt-1" id='span'>span</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/5 mt-1" id='raven'>raven</button>
            <button type="button" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded  no-underline bg-gray-600 text-white hover:bg-gray-700 py-1 px-2 leading-tight text-xs  bloki-teksta w-1/5 mt-1" id='auto-ph'>auto-ph</button>

        </div>

    </div>

    <div class="admin-panel-menu w-2/5 border rounded" id='forma-zapolneniya'>
    </div>

</div>


<div class="container mx-auto sm:px-4 pt-2" style="margin-bottom: 330px; min-width:100% !important;" >
    <div class="flex flex-wrap ">
        <div class="border pt-4" id="radioblock" style='height:1000px !important;'>
            {!!$document->radioblock!!}
        </div>

        <div class="textblock border pt-4 rounded "style='height:1000px !important;'>
            <nav class="relative flex flex-wrap items-center content-between py-3 px-4   text-black bg-gray-100">

                <button id='admin-document-save' type="button" class="border-0 bg-gray-100 mr-2 fad fa-save"
                    title="Сохранить"></button>

                <input id='change_id' class="py-1 px-2 leading-tight text-xs " type="checkbox" data-toggle="toggle" data-style="ios"
                    data-on="Вкл." data-off="Правка" data-size="sm">

            </nav>
            <div id="toolbar"></div>
            <br>
            <div id="ty" data-document-id='{{$document->id}}'>
                {!!$document->content!!}
            </div>
        </div>
    </div>


</div>













@endsection