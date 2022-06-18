@extends('forum.forum')
@section('header')
<title>{{$question->question}}</title>
@endsection
@section('content')
<div class="container mx-auto mt-20">
    <nav aria-label="breadcrumb">
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mb-4 bg-gray-100 rounded-md">
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/"><img src='/img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
            <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light"><a href="/forum">Форум</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 text-sm font-light active" aria-current="page">{{$question->question}}</li>
        </ol>
    </nav>
@include('forum.create-question')
<div class="bg-blue-100 my-2 rounded w-full">
    <p class="text-gray-600 p-6"><i class="fal fa-info-circle text-blue-600 mr-1"></i>Присоединяйтесь к обсуждениям. Будьте вежливы и следуйте правилам форума. <a href="/forum/rules" class="text-blue-600">Узнать больше о правилах форума > </a></p>
</div>
<div class="container mx-auto">
    <div class="flex flex-col">
            <!-- start questions -->
                <div class="relative flex flex-col shadow-md rounded-b-md break-words mb-3 mt-3">
                    <div class="py-3 px-6 mb-0 rounded-t-md bg-gray-100 text-gray-900 ">
                        <h5 class="text-xl">{{$question->question}}</h5>
                    </div>
                    <div class="p-6">
                        <p class="py-2 text-sm font-light">{{$question->text}}</p>
                        @foreach($question->tag as $tag)
                        {{-- <a href="/forum/category/{{$tag->name}}"> --}}
                            <kbd class='mr-1 my-1 bg-gray-100 px-2 py-1 text-xs font-light rounded-sm font-sans'>{{$tag->name}}</kbd>
                        {{-- </a> --}}
                        @endforeach
                    </div>
                    <div class="py-3 px-6 rounded-b-md bg-gray-100 pl-0">
                        <small class="text-gray-700 px-6 font-light">{{$question->created_at}}</small>
                        <a class="float-right" href="/user/{{$question->user->id}}"><small class="text-gray-700">Автор:
                                {{$question->user->name}}</small></a>
                    </div>
                </div>
            <!-- success create question -->
            <div class='my-4'>
            @if (\Session::has('success_answer'))
            <div class="relative px-3 py-3 mb-4 border rounded bg-orange-200 border-orange-300 text-orange-800 opacity-100 block" role="alert">
                <ul>
                    <li>{!! \Session::get('success_answer') !!}</li>
                </ul>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
                <div class="mb-4">
                    
                    <textarea class="w-full bg-blue-50 border-2 rounded h-64 p-4" name="text" id="editor" 
                       placeholder="Введите свой ответ здесь">
                    </textarea>
            
                </div>
                <div class="mb-4 mt-3">
                    <button id='create-question' type="button" class="transition duration-300 ease-in-out align-middle text-center rounded-md py-1 px-3 leading-normal no-underline  bg-blue-500 hover:bg-blue-600 text-white float-right font-semibold">Ответить</button>
                </div>
                {{ csrf_field() }}
                <input type="hidden" name='question_id' value='{{$question->id}}'>
            </div>
            <!-- answers -->
            <h2 class='py-4 text-xl'>Ответы</h2>
          @if (!$question->answers->count())
          <p class='relative px-3 py-3 mb-4 border rounded bg-blue-100 border-blue-200 text-gray-600 font-light mt-3'>Ответьте первым на этот вопрос !</p>
          @endif
            @foreach($question->answers as $answer)
            <div class="flex flex-col shadow-md rounded-md bg-white mb-3">
                <div class="py-3 px-6 bg-gray-100 rounded-t-md">
                    <h5 class="mb-3 text-blue-500 transition duration-300 ease-in-out hover:text-blue-600 "><a class="" href="/user/{{$answer->user->id}}">{{$answer->user->name}}</a></h5>
                    <span class="text-xs text-gray-500 font-light">{{$answer->created_at}}</span>
                </div>
                <div class="text-gray-700 font-light text-sm p-6">
                    <p class="mb-0">{!!$answer->text!!}</p>
                </div>
            </div>
            @endforeach
    </div>
</div>
</div>

<script type="text/javascript">
    tinymce.init({
      selector: '#editor'
    });
    </script>
@endsection