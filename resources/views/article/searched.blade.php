<x-layout>

    <div class="container-fluid">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12 mt-5">
                <div data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
     <h2 class="pages-titles mt-5">{{__('ui.Search_results')}}:
        <span>{{ $query }}</span>
    </h2>
    </div>
               
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row py-5 justify-content-center align-items-center text-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 d-flex justify-content-center">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3>
                        {{__('ui.No_items_match_your_search')}}.
                    </h3>
                </div>
            @endforelse
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div>{{ $articles->links() }}</div>
    </div>
</x-layout>
