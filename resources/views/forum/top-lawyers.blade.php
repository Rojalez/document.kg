<div class="container mx-auto">
    <div class="center w-full  mx-auto">
        @foreach ($top_lawyers as $lawyer)
        <div class="relative flex flex-col break-words bg-gray-100 rounded">
            <img class="rounded-t object-center w-full object-cover" src="{{asset('storage/uploads/'.$lawyer->avatar)}}" alt="{{$lawyer->name}}">
            <a href="user/{{$lawyer->id}}">
                <h5 class="mb-3 text-sm text-center">{{$lawyer->name}}</h5>
            </a>
            <div class="flex items-center justify-center flex-wrap ">
                <a href="/answers/{{$lawyer->id}}">
                    <p class="transition duration-300 ease-in-out align-middle text-center font-normal rounded  no-underline bg-blue-400 text-gray-50 hover:bg-blue-500 ring ring-blue-200 py-2 px-4 leading-tight text-sm  mb-2">Ответов:
                        {{$lawyer->answers->count()}}
                    </p>
                </a>
            </div>
        </div>
        @endforeach
    </div>        
</div>
<style>
      /* the slides */
  .slick-slide {
    margin-left:27px;
  }

  /* the parent */
  .slick-list {
    margin-left:-27px;
  }
</style>
<script>
    $('.center').slick({
      centerMode: true,
      centerPadding: '0px',
      slidesToShow: 5,
      arrows: true,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            arrows: true,
            centerMode: true,
            centerPadding: '0px',
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,

          }
        },
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '0px',
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000,

          }
        }
      ]
    });
</script>           