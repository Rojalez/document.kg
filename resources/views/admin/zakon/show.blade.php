@extends('zakon.zakon')
@section('header')
<script src="{{ asset('js/admin-panel.js') }}" defer></script>
@endsection

@section('content')
<div class="container mx-auto sm:px-4 no-margin">
    <nav aria-label="breadcrumb">
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-200 rounded">
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/">Главная</a></li>
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/zakon">База данных НПА</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 active" aria-current="page">{{$zakon->id}}</li>
        </ol>
    </nav>
</div>
<div class="container mx-auto sm:px-4">
   <div class="relative flex items-stretch w-full mb-3">
    <input id='input-search-on-show' type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="Поиск" aria-label="Search" aria-describedby="button-addon2">
    <div class="input-group-append">
      <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" type="button" id="button-search-on-show">Найти</button>
    </div>
  </div>
  <div id='search-on-show-result' class="border rounded mb-3 p-2" style='display:none'>
  </div>

  <div class="npa">
    <div class='tools-npa sticky-top flex flex-wrap  flex justify-between'>
      <a href="#!"><div class='tool-icons' ><i class="fad fa-file-download" id='save-npa'></i></div></a>
    </div>


    <div class='content-npa border rounded'>
      <ul class="flex flex-wrap list-none pl-0 mb-0 border border-t-0 border-r-0 border-l-0 border-b-1 border-gray-200" id="myTabInShow" role="tablist">
      <li class="">
      <a class="inline-block py-2 px-4 no-underline active" id="npa-{{$zakon->id}}-tab" data-npa-id="{{$zakon->id}}" data-toggle="tab" href="#npa-{{$zakon->id}}" role="tab" aria-controls="npa-{{$zakon->id}}" aria-selected="true">{{$zakon->id}}</a>
      </li>
      </ul>
      <div class="tab-content" id="myTabContentInShow">
          <div class="tab-pane opacity-0 opacity-100 block active" id="npa-{{$zakon->id}}" role="tabpanel" aria-labelledby="npa-{{$zakon->id}}-tab">{!!$zakon->content!!}</div>
      </div>
    </div>
  </div>

</div>


@endsection