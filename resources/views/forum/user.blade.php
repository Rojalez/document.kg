@extends('forum.forum')
@section('header')
<title>{{$user->name}}</title>
@endsection

@section('content')
<div class="container mx-auto mt-20">
    <nav aria-label="breadcrumb">
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-100 rounded">
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/"><img src='/img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
            <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light"><a href="/forum">Форум</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light"><a href="/lawyers">Юристы форума</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light active" aria-current="page">{{$user->name}}</li>
        </ol>
    </nav>

@include('forum.create-question')       

<div class="flex flex-wrap bg-gray-50 shadow-lg my-2 rounded-md">
  <div class="md:w-1/3 mb-3">
    <div class="relative flex flex-col break-words">
      <div class="flex-auto p-6">
        <div class="flex flex-col items-center text-center">

          <img src="{{asset('storage/uploads/'.$user->avatar)}}" alt="Admin" class="rounded max-w-full h-auto" >
          <div class="mt-3">
            <a href="{{asset('user/'.$user->id)}}"><h4>{{$user->name}}</h4></a>
          </div>
          <small class="text-gray-500 text-xs align-bottom">{{$user->created_at->format('d.m.Y')}}</small>
        </div>

      </div>
    </div>
  </div>
  <div class="md:w-2/3 w-full">
    <div class="relative flex flex-col">
      <div class="flex-auto p-6 space-y-4">
        <div class="flex flex-wrap ">
          <div class="sm:w-1/4">
            <h6 class="mb-0">ФИО</h6>
          </div>
          <div class="sm:w-3/4 text-gray-600">
            {{$user->name}}
          </div>
        </div>
        <hr>
        <div class="flex flex-wrap ">
          <div class="sm:w-1/4">
            <h6 class="mb-0">Эл/Почта</h6>
          </div>
          <div class="sm:w-3/4 text-gray-600">
            {{$user->email}}
          </div>
        </div>
        <hr>
        <div class="flex flex-wrap ">
          <div class="sm:w-1/4">
            <h6 class="mb-0">Номер</h6>
          </div>
          <div class="sm:w-3/4 text-gray-600">
           {{$user->number}}
         </div>
       </div>
       <hr>
       <div class="flex flex-wrap ">
        <div class="sm:w-1/4">
          <h6 class="mb-0">Место работы</h6>
        </div>
        <div class="sm:w-3/4 text-gray-600">
          {{$user->work}}
        </div>
      </div>
      <hr>
      <div class="flex flex-wrap ">
        <div class="sm:w-1/4 hide-on-mob">
          <h6 class="mb-0">Кол-во ответов</h6>
        </div>
        <div class="sm:w-3/4 text-gray-600">
         <a class=' align-middle text-center rounded-sm  bg-blue-400 text-gray-50 hover:bg-blue-600 transition duration-300 ease-in-out py-1 px-2 leading-tight text-xs' href="{{asset('answers/'.$user->id)}}"><i class='votes' aria-hidden='true'></i>Ответов: {{$user->answers->count()}}</a>

       </div>

     </div>
   </div>
 </div>

</div>
</div>
</div>
@endsection