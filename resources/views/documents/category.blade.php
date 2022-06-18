@extends('documents.documents')
@section('header')
<title>{{$category->name}}</title>
@endsection
@section('content')

<div class="container w-full mx-auto mt-20">

    <nav>
        <ol class="flex flex-wrap list-reset py-3 px-4  my-4 bg-gray-100 rounded-md">
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/"><img src='/img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
            <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light"><a href="/documents/">Документы</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light active" aria-current="page">{{$category->name}}</li>
        </ol>
    </nav>                      
	@include('main.side-banner-mob')
    <div class="flex flex-col lg:flex-row pb-4">
        <div class="flex space-y-2 flex-wrap content-start h-full w-full items-start justify-start"> 
            <div class="lg:px-1 px-0 w-full h-full"> 
                <div class="bg-gray-200 py-2 rounded-t-lg px-10"><h4 class="text-gray-700 font-light">{{$category->name}}</h4>  </div>                     
                    <div class="bg-white border px-10 py-6 rounded-b-lg shadow-md min-h-full"> 
                        <ul class="font-light mb-4 space-y-6 text-lg"> 
                            @foreach ($subcategories as $subcategory)
                            <li class="text-sm truncate hover:text-blue-400 transition duration-300 easy-in-out	"><a href="{{asset('documents/'.$category->slug.'/'.$subcategory->slug)}}"><i class="fad fa-folder-open text-gray-800 mr-2"></i>{{$subcategory->name}}</a>
                            </li>  
                            @endforeach
                        </ul>                         
                    </div>                              
                </div> 
            </div> 
       @include('main.side-banner-desktop-1')
        </div> 

</div>



@endsection