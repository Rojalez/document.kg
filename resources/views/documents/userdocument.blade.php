@extends('documents.documents')
@section('header')
<title>{{$document->name}}</title>
@endsection
@section('content')
<div class="container mx-auto sm:px-4">
    <nav aria-label="breadcrumb">
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-100 rounded">
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/"><img src='/img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
            <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light"><a href="/home">Личная страница</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light"><a href="/home#my-documents">Мои документы</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light active" aria-current="page">{{$document->name}}</li>
        </ol>
    </nav>
</div>

<div class="container mx-auto sm:px-4">

    <div class="flex flex-wrap ">

        <div class="border pt-4" id="radioblock" >
            {!!$document->radioblock!!}
        </div>

        <div class="textblock border rounded" >
            <nav class="relative flex flex-wrap items-center content-between py-3 px-4  sticky-top text-black bg-gray-100">


                <button id='download-document' type="button" class="border-0 bg-gray-100 mr-2 fad fa-file-download" title="Скачать"></button>

                <button id='document-v-izbrannoe' type="button" class="border-0 bg-gray-100 mr-2 fad fa-bookmark" title="В избранное"></button>

                <button id='document-save' type="button" class="border-0 bg-gray-100 mr-2 fad fa-save" title="Сохранить как новый"></button>

                <button id='document-resave' type="button" class="border-0 bg-gray-100 mr-2 fad fa-sync-alt" title="Обновить сохраненный документ"></button>

                <input id='change_id' class="py-1 px-2 leading-tight text-xs " type="checkbox"  data-toggle="toggle" data-style="ios" data-on="Вкл." data-off="Правка" data-size="sm">

            </nav>


            <div id="toolbar" class="mb-2 mt-2"></div>

            <div id="ty" data-document-id="{{$document->id}}">
               {!!$document->content!!}
        </div>

    </div>

</div>


</div>













@endsection