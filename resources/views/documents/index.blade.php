@extends('documents.documents')
@section('header')
<title>Образцы документов, договоров, заявлений.</title>
@endsection
@section('content')
<div class="container mx-auto mt-20">

    <nav>
        <ol class="flex flex-wrap list-reset py-3 px-4  my-4 bg-gray-100 rounded-md">
            <li class="inline-block px-2 py-2 text-gray-700 "><a href="/"><img src='/img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
            <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light active" aria-current="page">Документы</li>
        </ol>
    </nav>
  
	@include('main.side-banner-mob')
<div class="flex flex-col lg:flex-row pb-4">
	<div class="flex space-y-2 flex-wrap content-start h-full w-full items-start justify-start"> 
		<div class="lg:px-1 px-0 w-full h-full">                        
				<div class="bg-white border px-10 py-12 rounded-lg shadow-md min-h-full"> 
					<ul class="font-light mb-10 space-y-6 text-lg"> 
						@foreach ($top_dogovors as $dogovor)
						<li class="text-sm truncate hover:text-blue-400 transition duration-300 easy-in-out	"><a href="{{'/documents/dogovory/'.$dogovor->category->slug.'/'.$dogovor->slug}}" ><i class="fad fa-file-alt text-gray-800 mr-2"></i>{{$dogovor->name}}</a>
						</li>  
					    @endforeach             
					</ul>                         
					<a href="documents/dogovory" class="bg-white w-6/12 border-2 border-gray-800 duration-300 ease-linear hover:bg-blue-400 hover:border-blue-400 hover:text-white px-8 py-2 rounded-full text-center text-gray-800 text-lg transition-all ">Открыть все</a> 
				</div>                              
		</div> 
		<div class="lg:px-1 px-0 w-full h-full">                        
			<div class="bg-white border px-10 py-12 rounded-lg shadow-md min-h-full"> 
				<ul class="font-light mb-10 space-y-6 text-lg"> 
					@foreach ($top_pril_dogovors as $dog_pril)
					<li class="text-sm truncate hover:text-blue-400 transition duration-300 easy-in-out	"><a href="{{'/documents/dog-pril/'.$dog_pril->category->slug.'/'.$dog_pril->slug}}"><i class="fad fa-file-alt text-gray-800 mr-2"></i>{{$dog_pril->name}}</a>
					</li>  
					@endforeach             
				</ul>                         
				<a href="documents/dog-pril" class="bg-white w-6/12 border-2 border-gray-800 duration-300 ease-linear hover:bg-blue-400 hover:border-blue-400 hover:text-white px-8 py-2 rounded-full text-center text-gray-800 text-lg transition-all ">Открыть все</a> 
			</div>                              
		</div> 
		<div class="lg:px-1 px-0 w-full h-full">                        
			<div class="bg-white border px-10 py-12 rounded-lg shadow-md min-h-full"> 
				<ul class="font-light mb-10 space-y-6 text-lg"> 
					@foreach ($top_zayavleniy as $zayavleniya)
					<li class="text-sm truncate hover:text-blue-400 transition duration-300 easy-in-out	"><a href="{{'/documents/zayavleniya/'.$zayavleniya->category->slug.'/'.$zayavleniya->slug}}"><i class="fad fa-file-alt text-gray-800 mr-2"></i>{{$dogovor->name}}</a>
					</li>  
					@endforeach             
				</ul>                         
				<a href="documents/zayavleniya" class="bg-white border-2 border-gray-800 duration-300 ease-linear hover:bg-blue-400 hover:border-blue-400 hover:text-white w-6/12 px-8 py-2 rounded-full text-center text-gray-800 text-lg transition-all">Открыть все</a> 
			</div>                              
		</div>
		<div class="lg:px-1 px-0 w-full h-full">                        
			<div class="bg-white border px-10 py-12 rounded-lg shadow-md min-h-full"> 
				<ul class="font-light mb-10 space-y-6 text-lg"> 
					@foreach ($top_pril_zayavleniy as $zay_pril)
					<li class="text-sm truncate hover:text-blue-400 transition duration-300 easy-in-out	"><a href="{{'/documents/zay-pril/'.$zay_pril->category->slug.'/'.$zay_pril->slug}}"><i class="fad fa-file-alt text-gray-800  mr-2"></i>{{$zay_pril->name}}</a>
					</li>  
					@endforeach             
				</ul>                         
				<a href="/documents/zay-pril" class="bg-white border-2 border-gray-800 duration-300 ease-linear hover:bg-blue-400 hover:border-blue-400 hover:text-white w-6/12 px-8 py-2 rounded-full text-center text-gray-800 text-lg transition-all ">Открыть все</a> 
			</div>                              
		</div>
		<div class="lg:px-1 px-0 w-full h-full">                        
			<div class="bg-white border px-10 py-12 rounded-lg shadow-md min-h-full"> 
				<ul class="font-light mb-10 space-y-6 text-lg"> 
					@foreach ($doverennost as $dov)
					<li class="text-sm truncate hover:text-blue-400 transition duration-300 easy-in-out	"><a href="{{'/documents/doverennost/'.$dov->category->slug.'/'.$dov->slug}}"><i class="fad fa-file-alt text-gray-800 mr-2"></i>{{$dov->name}}</a>
					</li>  
					@endforeach             
				</ul>                         
				<a href="/documents/doverennost" class="bg-white border-2 border-gray-800 duration-300 ease-linear hover:bg-blue-400 hover:border-blue-400 hover:text-white w-6/12 px-8 py-2 rounded-full text-center text-gray-800 text-lg transition-all ">Открыть все</a> 
			</div>                              
		</div>
	</div>    
	@include('main.side-banner-desktop-1')                          
	
</div>   

{{-- @include('main.side-banner-mob') --}}
		<!--Документы  -->
		

	<!-- конец документов -->
	



</div>





@endsection