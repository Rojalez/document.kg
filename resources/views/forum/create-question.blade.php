<div x-data="{id: 1}" class="container mx-auto my-2">
    <div class='flex flex-row justify-between'>
        <h2 class="py-2 text-xl text-gray-700">Форум юридической помощи</h2>
        <button @click="$dispatch('open-dropdown',{id})" type="button" class="align-middle text-center rounded md:py-2 md:px-3 py-0 px-2  bg-blue-400 transition duration-300 ease-in-out hover:bg-blue-500 md:text-lg text-xs text-white">Задать вопрос</button>
    </div>
</div>
<div x-data="{ open: false }"
x-show="open"
@open-dropdown.window="if ($event.detail.id == 1) open = true"
class="fixed lg:mt-0 mt-20 z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
        <div  @click.away="open = false"  class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="sm:flex w-full sm:items-start">
            <div class="mt-3 w-full text-center sm:mt-0 sm:ml-4 sm:text-left">
              <form action='/forum/create-question' class="w-full" method='post' id='create-question'>
                <div class="mb-4">
                    <label for="recipient-name" class="pt-2 pb-2 mb-0 leading-normal">Тема вопроса:</label>
                    <input required name='question' type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="question">
                </div>
                <div class="mb-4">
                    <label for="message-text" class="pt-2 pb-2 mb-0 leading-normal">Подробное описание:</label>
                    <textarea required name='text' class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" id="text"></textarea>
                </div>
                <div class='flex items-stretch w-full'>
                    <select  name='tags[]' title='Выберите тег' class="w-3/4 bg-gray-100 rounded-l-md">
                    @foreach ($tags as $tag)
                    <option value='{{$tag->id}}'>{{$tag->name}}</option>
                    @endforeach
                    </select>
                    <div class="w-1/4">
                        <button class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded-r-md py-1 px-3 leading-normal no-underline bg-blue-600 transition duration-300 ease-in-out text-white hover:bg-blue-600 w-full" type="button" id="button-search-on-show">ОК</button>
                    </div>
                </div>
                {{ csrf_field() }}
              </form>
            </div>
          </div>
          <div class="bg-white  py-3  sm:flex sm:flex-row-reverse">
            <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm" form='create-question'>
              Готово!
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
  


