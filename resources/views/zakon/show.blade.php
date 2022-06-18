@extends('zakon.zakon')
@section('header')
<title>{{$zakon->name}}</title>
<style>
.highlight {
    background-color: yellow;
}

.find_selected {
    background-color: #98c9ff;
}
  
  .btn-group.special {
  display: flex;
}
  
  .special .btn {
  flex: 1
}
  
  #find_msg {
  position: absolute;
  bottom: 6px;
  left: 80%;
  opacity: .5;
}

</style>


<script  src="{{ asset('js/find5.js') }}" defer></script>
<script  src="{{ asset('js/popper.min.js') }}" defer></script>
@endsection

@section('content')
<div class="container mx-auto sm:px-4">
    <nav aria-label="breadcrumb">
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-100 mt-20 rounded">
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/"><img src='/img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
            <li class="inline-block px-2 py-2 text-gray-700 font-light text-sm"><a href="/zakon">База данных НПА</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 active text-sm font-light" aria-current="page">{{$zakon->id}}</li>
        </ol>
    </nav>
</div>
<div class="container mx-auto sm:px-4 p-6">
    <div class="relative flex items-stretch w-full mb-3">
        <input id='input-search-on-show' type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="Поиск" aria-label="Search"
            aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-400 text-white hover:bg-blue-500" type="button" id="button-search-on-show">Найти</button>
        </div>
    </div>
    <div id='search-on-show-result' class="border rounded mb-3 p-2" style='display:none'>
    </div>
    <div class="npa">
       
            <div class='tools-npa'>
                <div class='flex flex-wrap w-full relative align-middle'>                   
                        <button class='flex-auto text-center rounded-l  bg-blue-500 text-white hover:bg-blue-600 py-3 px-4 leading-tight text-xl'  title="Избранные НПА" id='npa-izbrannoe'><i class="fad fa-bookmark" ></i></button>                
                  		<button class='flex-auto text-center            bg-blue-500 text-white hover:bg-blue-600 py-3 px-4 leading-tight text-xl' title="Добавить в избранные" id='npa-v-izbrannoe'><i class="fad fa-file-plus" ></i></button>        
                        <button class='flex-auto text-center            bg-blue-500 text-white hover:bg-blue-600 py-3 px-4 leading-tight text-xl' title="Удалить из избранных" id='npa-iz-izbrannogo'><i class="fad fa-file-minus" ></i></button>             
                        <button class='flex-auto text-center            bg-gray-600 text-white hover:bg-gray-700 py-3 px-4 leading-tight text-xl'  title="Скачать (данный инструмент в разработке)" data-class='v-razrabotke'><i class="fad fa-file-download"></i></button>
                        <button class='flex-auto text-center            bg-gray-600 text-white hover:bg-gray-700 py-3 px-4 leading-tight text-xl'  title="Распечатать (данный инструмент в разработке)" data-class='v-razrabotke'><i class="fad fa-print"></i></button>       
                        <button class='flex-auto text-center            bg-gray-600 text-white hover:bg-gray-700 py-3 px-4 leading-tight text-xl'  title="Данный инструмент в разработке" data-class='v-razrabotke'><i class="fad fa-file-word"></i></button>                  
                        <button class='flex-auto text-center            bg-gray-600 text-white hover:bg-gray-700 py-3 px-4 leading-tight text-xl'  title="Увеличить шрифт (данный инструмент в разработке)" data-class='v-razrabotke'><i class="fad fa-comment-alt-plus"></i></button>                
                        <button class='flex-auto text-center rounded-r  bg-gray-600 text-white hover:bg-gray-700 py-3 px-4 leading-tight text-xl '  title="Уменьшить шрифт (данный инструмент в разработке)" data-class='v-razrabotke'><i class="fad fa-comment-alt-minus"></i></button>                   
                </div>
              
              	<div id="findwindow">
              
   				</div>           
            </div>


   
        <div class='content-npa  rounded' id="content">
            <ul class="flex flex-wrap list-none pl-0 mb-0 " id="myTabInShow" role="tablist">
                <li class="border px-6 border-b-0 rounded-t-md bg-blue-400 text-white">
                    <a class="inline-block py-2 px-4 no-underline active" id="npa-{{$zakon->id}}-tab" data-npa-id="{{$zakon->id}}"
                        data-toggle="tab" href="#npa-{{$zakon->id}}" role="tab" aria-controls="npa-{{$zakon->id}}"
                        aria-selected="true">{{$zakon->id}}</a>
                </li>
            </ul>
            <div class="tab-content border" id="myTabContentInShow">
                <div class="tab-pane px-6 active" id="npa-{{$zakon->id}}" role="tabpanel"
                    aria-labelledby="npa-{{$zakon->id}}-tab">{!!$zakon->content!!}</div>
            </div>
        </div>
    </div>

</div>




@endsection