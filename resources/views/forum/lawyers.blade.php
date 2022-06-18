@extends('forum.forum')
@section('header')
<title>Юристы</title>
@endsection

@section('content')
<div class="container mx-auto mt-20">
  <nav aria-label="breadcrumb">
    <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-100 rounded-md">
      <li class="inline-block px-2 py-2 text-gray-700"><a href="/"><img src='/img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
      <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light"><a href="/forum">Форум</a></li>
      <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light active" aria-current="page">Юристы форума</li>
    </ol>
  </nav>


@include('forum.create-question')       
@include('main.side-banner-mob') 
  <div class="rounded-md bg-blue-100 py-4 my-4 flex flex-wrap ">
    <div class='md:w-full pr-4 pl-4'>
    <p class="text-gray-700 font-light text-sm"><i class="fal fa-info-circle mr-1"></i>Присоединяйтесь к обсуждениям. Будьте вежливы и следуйте правилам форума. <a href="/forum/rules">Узнать больше о правилах форума > </a></p>
    </div>
    
     <div class='md:w-full pr-4 pl-4'>
    <p class="text-gray-700 font-light text-sm"><i class="fal fa-info-circle mr-1"></i>Если вы являетесь юристом, то зарегистрируйтесь на сайте в качестве юриста.</p>
	</div>
  </div>


<!-- forum questions -->
<div class="container mx-auto">
  <h2 class='text-xl pt-4'>Юристы</h2>
  <div class="flex flex-col  lg:flex-row mt-4 ">
    <div class="w-full lg:px-2 px-0">
      @foreach ($lawyers as $lawyer) 

      <div class="flex flex-wrap bg-gray-50 shadow-lg my-2 rounded-md">
        <div class="md:w-1/3 mb-3">
          <div class="relative flex flex-col break-words">
            <div class="flex-auto p-6">
              <div class="flex flex-col justify-center items-center text-center">

                <img src="{{asset('storage/uploads/'.$lawyer->avatar)}}" alt="Admin" class="rounded max-w-full h-auto" >
                <div class="mt-3">
                  <a href="{{asset('user/'.$lawyer->id)}}"><h4>{{$lawyer->name}}</h4></a>
                </div>
                <small class="text-gray-500 text-xs align-bottom">{{$lawyer->created_at->format('d.m.Y')}}</small>
              </div>

            </div>
          </div>
        </div>
        <div class="md:w-2/3 w-full">
          <div class="relative flex flex-col">
            <div class="flex-auto p-6 space-y-4">
              <div class="flex flex-wrap ">
                <div class="sm:w-1/4">
                  <h6 class="mb-0 text-sm text-gray-700 font-light">Эл/Почта</h6>
                </div>
                <div class="sm:w-3/4 text-sm  text-gray-600">
                  {{$lawyer->email}}
                </div>
              </div>
              <hr>
              <div class="flex flex-wrap ">
                <div class="sm:w-1/4">
                  <h6 class="mb-0 text-sm text-gray-700 font-light">Номер</h6>
                </div>
                <div class="sm:w-3/4 text-sm  text-gray-600">
                 {{$lawyer->number}}
               </div>
             </div>
             <hr>
             <div class="flex flex-wrap ">
              <div class="sm:w-1/4">
                <h6 class="mb-0 text-sm text-gray-700 font-light">Место работы</h6>
              </div>
              <div class="sm:w-3/4 text-sm  text-gray-600">
                {{$lawyer->work}}
              </div>
            </div>
            <hr>
            <div class="flex flex-wrap ">
              <div class="lg:w-1/4 w-1/2">
                <h6 class="mb-0 text-sm text-gray-700 font-light">Кол-во ответов</h6>
              </div>
              <div class="lg:w-3/4 w-1/2 text-gray-600">
               <a class='transition duration-300 ease-in-out align-middle text-center rounded-sm  bg-blue-400 text-gray-50 hover:bg-blue-600 py-1 px-2 leading-tight text-xs' href="{{asset('answers/'.$lawyer->id)}}"><i class='votes' aria-hidden='true'></i>Ответов: {{$lawyer->answers->count()}}</a>
             </div>

           </div>
         </div>
       </div>

     </div>
   </div>




   @endforeach
      </div> 
    
   @include('main.side-banner-desktop-1')

</div>



  {{ $lawyers->links() }}
</div>

<!-- forum questions end -->
</div>
@endsection