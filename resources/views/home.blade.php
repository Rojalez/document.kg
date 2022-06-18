@extends('forum.forum')

@section('content')

<div class="container mx-auto">
    <nav>
        <ol class="flex flex-wrap list-reset pt-3 pb-3 py-4 px-4 mt-20 mb-4 bg-gray-100 rounded">
            <li class="inline-block px-2 py-2 text-gray-700"><a href="/"><img src='/img/breadcrumb-logo.png' style='height:23px;widht:23px;'></a></li>
            <li class="inline-block px-2 py-2 text-gray-700 font-light text-sm"><a href="/forum">Форум</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 font-light text-sm"><a href="/lawyers">Юристы форума</a></li>
            <li class="inline-block px-2 py-2 text-gray-700 font-light text-sm active" aria-current="page">{{$user->name}}</li>
        </ol>
    </nav>



<div class="container mx-auto">

    @if (\Session::has('success'))
    <div class="relative px-3 py-3 my-4 border rounded bg-blue-200 border-blue-300 font-light text-gray-700 " role="alert">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
    @if (\Session::has('uncorrect'))
    <div class="relative px-3 py-3 my-4 border rounded bg-red-200 border-red-300 font-light text-gray-700 " role="alert">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
    @endif
    <section>
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
                        <div x-data="{id: 1}">
                            <button @click="$dispatch('open-dropdown',{id})" type="button" class="align-middle text-center rounded  py-2 px-3  bg-green-500 hover:bg-green-600 text-xs text-white">Редактировать профиль</button>
                            <div x-data="{ open: false }"
                                x-show="open"
                                @open-dropdown.window="if ($event.detail.id == 1) open = true"
                                class="fixed mt-20 z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
                                    <div class="flex items-end justify-center pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                                    <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle max-w-lg w-full">
                                        <div  @click.away="open = false"  class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                        <div class="sm:flex w-full sm:items-start">
                                            <div class="mt-3 w-full text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                <form id='redaktirovat' method='post' action='/user/change_user' enctype="multipart/form-data">
                                                    <div class="mb-4">
                                                        <label for="recipient-name" class="pt-2 pb-2 mb-0 leading-normal">Имя:</label>
                                                        <input type="text" name='name' class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="recipient-name" class="pt-2 pb-2 mb-0 leading-normal">Вы юрист?</label>
                                                        <input type="checkbox" name='lawyer' class="py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800">
                                                    </div>
                                                    <div class="mb-4">
                                                            <label class="w-full flex flex-col items-center px-4 py-2 bg-blue-400 text-white rounded tracking-wide cursor-pointer hover:bg-blue-500">
                                                                <span class="text-base leading-normal">Загрузить фото</span>
                                                                <input type='file' name='avatar' class="hidden" />
                                                            </label>
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="recipient-name" class="pt-2 pb-2 mb-0 leading-normal">Место
                                                            работы/должность:</label>
                                                        <input name='work' type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="recipient-name" class="pt-2 pb-2 mb-0 leading-normal">Номер:</label>
                                                        <input name='number' type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="recipient-name" class="pt-2 pb-2 mb-0 leading-normal">Почта:</label>
                                                        <input name='email' type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded">
                                                    </div>
                                                    <div class="mb-4">
                                                        <label for="recipient-name" class="pt-2 pb-2 mb-0 leading-normal">Новый
                                                            пароль:</label>
                                                        <input name='new_password' type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded">
                                                    </div>
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                        <div class="bg-white  py-3  sm:flex sm:flex-row-reverse">
                                            <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600"
                                                    form='redaktirovat'>Сохранить</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
              
                    </div>
                  </div>
                </div>
                <div class="md:w-2/3 w-full">
                  <div class="relative flex flex-col">
                    <div class="flex-auto p-6 space-y-4">
                      <div class="flex flex-wrap ">
                        <div class="lg:w-1/4 w-1/2">
                          <h6 class="mb-0 font-light">ФИО</h6>
                        </div>
                        <div class="lg:w-3/4 w-1/2 text-gray-600">
                          {{$user->name}}
                        </div>
                      </div>
                      <hr>
                      <div class="flex flex-wrap ">
                        <div class="lg:w-1/4 w-1/2">
                          <h6 class="mb-0 font-light">Эл/Почта</h6>
                        </div>
                        <div class="lg:w-3/4 w-1/2 text-gray-600">
                          {{$user->email}}
                        </div>
                      </div>
                      <hr>
                      <div class="flex flex-wrap ">
                        <div class="lg:w-1/4 w-1/2">
                          <h6 class="mb-0 font-light">Номер</h6>
                        </div>
                        <div class="lg:w-3/4 w-1/2 text-gray-600">
                         {{$user->number}}
                       </div>
                     </div>
                     <hr>
                     <div class="flex flex-wrap ">
                      <div class="lg:w-1/4 w-1/2">
                        <h6 class="mb-0 font-light">Место работы</h6>
                      </div>
                      <div class="lg:w-3/4 w-1/2 text-gray-600">
                        {{$user->work}}
                      </div>
                    </div>
                    <hr>
                    <div class="flex flex-wrap ">
                      <div class="lg:w-1/4 w-1/2">
                        <h6 class="mb-0 font-light">Кол-во ответов</h6>
                      </div>
                      <div class="lg:w-3/4 w-1/2 text-gray-600">
                       <a class=' align-middle text-center rounded-sm  bg-blue-400 text-gray-50 hover:bg-blue-600 py-1 px-2 leading-tight text-xs' href="{{asset('answers/'.$user->id)}}"><i class='votes' aria-hidden='true'></i>Ответов: {{$user->answers->count()}}</a>
              
                     </div>
              
                   </div>
                 </div>
               </div>
              
              </div>
              </div>

    </section>

   <div class="flex flex-col lg:grid lg:grid-cols-3 gap-2 my-4">
    <div class="container mx-auto my-2">
      <div class="relative flex flex-col rounded-lg break-words  bg-white shadow-lg">
             <div class="py-3 px-6 mb-0 rounded-t-lg bg-blue-400  text-white">
              <h5 class="text-center">Избранные НПА</h5>
                </div>
            <div class="flex-auto p-6">
              @foreach ($user->npa as $npa)
              <div class="flex flex-row ">
              <p class="mb-0 w-5/6 text-gray-800 text-sm" ><a href="{{asset('zakon/'.$npa->id)}}">{{$npa->name}}</a></p>
              <i class='fas fa-times-circle float-right' data-id='{{$npa->id}}' data-type='npa' user-delete></i>
              </div>
              @endforeach
          </div>
      </div>
  </div>

  <div class="container mx-auto my-2">
      <div class="relative flex flex-col rounded-lg break-words  bg-white shadow-lg">
          <div class="py-3 px-6 mb-0 rounded-t-lg bg-blue-400  text-white">
              <h5 class="text-center">Избранные документы</h5>
                </div>
            <div class="flex-auto p-6">
              @foreach ($user->documents as $document)
              <div class="flex flex-row ">
              <p class="mb-0 text-gray-700 text-sm"><a
                  href="{{route('documents-show', ['category' => $document->category()->first()->family_category()->first()->slug,'subcategory' => $document->category()->first()->slug,'slug' => $document->slug ])}}">{{$document->name}}</a>
              </p>
              <i class='fas fa-times-circle text-xl text-blue-500' data-id='{{$document->id}}' data-type='document' user-delete></i>
              </div>
              @endforeach
          </div>
      </div>
  </div>

  <div class="container mx-auto my-2" id='my-documents'>
      <div class="relative flex flex-col rounded-lg break-words  bg-white shadow-lg">
          <div class="py-3 px-6 mb-0 rounded-t-lg bg-blue-400  text-white">
              <h5 class="text-center">Сохраненные документы</h5>
                </div>
             <div class="flex-auto p-6">
              @foreach ($user->userdocuments as $userdocument)
              <div class="flex flex-row ">
                  <p class="mb-0 text-gray-700 text-sm"><a href="{{route('userdocument', ['id' =>$userdocument->id])}}">{{$userdocument->name}}</a></p>
                  <i class='fas fa-times-circle text-xl text-blue-500' data-id='{{$userdocument->id}}' data-type='userdocument' user-delete></i> 
              </div>
        
              @endforeach
          </div>
      </div>
  </div>
   </div>
</div>  
</div>


  @endsection