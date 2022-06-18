@extends('documents.documents')
@section('content')
<style>
	body {
		background: rgba(0, 0, 0, 0.809);
	}
</style>
<div class="container mx-auto flex flex-col my-64 items-center justify-center sm:px-4">
	<form method='post' action='/admin/create-document' class=" space-y-8 bg-white py-8 px-4 bg-blue-xl bg-opacity-30 lg:w-1/2 w-full rounded p-2" id='create-document'>
		<div>
			<input name='name' type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white bg-opacity-30 text-gray-100 placeholder-gray-300 font-light focus:outline-none rounded" id="formGroupExampleInput" placeholder="Название документа" required>
		</div>

		<div>
			<select name='category' class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white bg-opacity-30 text-gray-100 placeholder-gray-300 font-light focus:outline-none rounded" title="Катерогия" id="exampleFormControlSelect1" required>
				<option disabled selected value>Выберите категорию</option>
				@foreach ($categories as $category)
				<option value='{{$category->id}}'>{{$category->name}}</option>
				@endforeach
			</select>
		</div>
@csrf
		<div>
			<input name='example' type="text" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white bg-opacity-30 text-gray-100 placeholder-gray-300 font-light focus:outline-none rounded" id="formGroupExampleInput2" placeholder="Ссылка на похожий документ">
		</div>
		<div class="text-right">
			<button form='create-document' class="inline-block align-middle text-center duration-300 ease-linear select-none font-normal rounded-full focus:outline-none py-2 px-4 bg-blue-500 text-white hover:bg-blue-600" type="submit">Начать <i class="fal fa-angle-right align-middle"></i></button>
		</div>
		
	</form>

</div>
@endsection