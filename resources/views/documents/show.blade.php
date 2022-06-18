@extends('documents.documents')
@section('header')
<title>{{$document->name}}</title>
@endsection
@section('content')


<div class="container mx-auto mt-20 ">
    <nav aria-label="breadcrumb">
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-100 rounded">
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/"><img src='/img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
            <li class="inline-block text-sm px-2 py-2 text-gray-700 font-light"><a href="/documents/">Документы</a></li>
            <li class="inline-block text-sm px-2 py-2 text-gray-700 font-light"><a href="{{asset('documents/'.$category->slug)}}">{{$category->name}}</a></li>
            <li class="inline-block text-sm px-2 py-2 text-gray-700 font-light"><a
                    href="{{asset('documents/'.$category->slug.'/'.$subcategory->slug)}}">{{$subcategory->name}}</a>
            </li>
            <li class="inline-block text-sm px-2 py-2 text-gray-700 active font-light" aria-current="page">{{$document->name}}</li>
        </ol>
    </nav>
</div>
<div class="container mx-auto">
    <nav class="grid md:grid-cols-4 grid-cols-3 font-sans rounded-t-lg text-white bg-gray-100">
        <div><button type="button" id='download-document' class="rounded-tl-lg bg-blue-500 hover:bg-blue-600 duration-300 ease-linear border-r py-2 px-3 w-full "><i class="fa fa-download md:hidden block" aria-hidden="true"></i> <p class="md:block hidden">Скачать</p></button></div>
        <div><button type="button" id='document-v-izbrannoe' class="bg-blue-500 hover:bg-blue-600 duration-300 ease-linear border-r py-2 px-3 w-full"><i class="fa fa-star md:hidden block" aria-hidden="true"></i> <p class="md:block hidden">В избранное</p></button></div>
        <div><button type="button" id='document-save' class="bg-blue-500 hover:bg-blue-600 duration-300 ease-linear md:rounded-tr-none rounded-tr-lg  py-2 border-r px-3 w-full"><i class="fas fa-save md:hidden block" aria-hidden="true"></i> <p class="md:block hidden ">Сохранить</p></button></div>
        <div class="md:block hidden  bg-blue-500 hover:bg-blue-600 duration-300 ease-linear text-center rounded-tr-lg"><span class="w-full"><input type="checkbox" id='change_id'><label class="bg-transparent py-2 px-3 font-sans" for="change_id ">Правка</label></span></div>  
    </nav>
    <div class="flex flex-row">
        <div class="border w-full rounded-b-lg mr-1 font-sans" id="radioblock" >
            
            <div class="flex lg:hidden px-2 -mb-2">
                <button id='prev-zagolovoc' class="w-full rounded-tl focus:outline-none text-2xl fal fa-angle-left text-white float-left border-0 bg-blue-500"></button>
                <button id="toggle" class="w-full align-middle text-center  focus:outline-none rounded-none py-1 px-3 leading-normal bg-blue-500 text-white">Вопросы</button>
                <button id='next-zagolovoc' class="w-full rounded-tr text-2xl  focus:outline-none fal fa-angle-right text-white  float-right border-0 bg-blue-500"></button>
            </div>
            
            <div class="px-2 mb-2 rounded-none">
                {!!$document->radioblock!!}
            </div>
        </div>
        <div class="textblock  w-full px-8 lg:w-9/12 border rounded-b-lg">
            <div id="toolbar" class="mb-2 mt-2"></div>
            <div id="ty" class="px-2" data-document-id="{{$document->id}}">
                {!!$document->content!!}
            </div>
        </div>
    </div>
</div>

@endsection