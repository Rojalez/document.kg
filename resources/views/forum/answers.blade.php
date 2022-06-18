@extends('forum.forum')
@section('header')
<title>Ответы пользователя - {{$user->name}}</title>
@endsection

@section('content')


<div class="container mx-auto mt-20">
    @include('main.side-banner-mob')
    <div class="bg-blue-100 my-2 rounded w-full">
        <p class="text-gray-600 p-6"><i class="fal fa-info-circle text-blue-600 mr-1"></i>Присоединяйтесь к обсуждениям. Будьте вежливы и следуйте правилам форума. <a href="/forum/rules" class="text-blue-600">Узнать больше о правилах форума > </a></p>
    </div>
    <div class="container mx-auto">
        <h2 class='text-xl mb-4 text-gray-500'><a href="{{asset('user/'.$user->id)}}" style="text-decoration: none;">
            Ответы пользователя: <span class="text-blue-400 transition duration-300 ease-in-out hover:text-blue-500">{{ $user->name}}</span>
        </a></h2>
        <div class="flex flex-col space-x-0 lg:space-x-2 w-full lg:flex-row">
            <div class="w-full">
                @foreach ($user->answers as $answer)
        <div class="p-6 border relative flex flex-col rounded-md bg-white shadow-md mb-3">
            <h5 class="text-blue-400 transition duration-300 ease-in-out hover:text-blue-500"><a href="{{asset('forum/'.$answer->question->slug)}}">
               {{$answer->question->question}}
            </a></h5>
            <div class="flex-auto text-sm font-light">
                <p>{!!$answer->text!!}</p>
            </div>
            <div class="py-3 text-xs font-light text-gray-900">
                <span>{{$answer->created_at->format('d.m.y')}}</span>
            </div>
           
        </div>
        @endforeach

     
            </div>
            @include('main.side-banner-desktop-1')     
        </div> 
         
    </div>
  </div>
@endsection