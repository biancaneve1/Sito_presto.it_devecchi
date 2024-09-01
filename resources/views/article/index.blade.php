<x-layout>
    <x-slot name="titleName">{{__('ui.Article_list')}}</x-slot>
    <div class="container ">
        <div class="row text-center mt-5 ">
            <div class="col-12">
                <div data-aos="flip-left"
                   data-aos-easing="ease-out-cubic"
                   data-aos-duration="2000"><h2 class="pages-titles">{{__('ui.List_of_items')}}</h2>
                </div>
          </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <x-card :article="$article" />
                </div>
            @empty
                @auth
                    <div class="col-12">
                        <h4 class="text-center pages-titles">{{__('ui.There_are_no_ads')}}, <a href="{{ route('article.create') }}">{{__('ui.Add_one')}}</a></h4>
                    </div>
                @endauth
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
</x-layout>

