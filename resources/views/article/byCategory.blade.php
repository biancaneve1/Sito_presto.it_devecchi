<x-layout>
    <x-slot name="titleName">{{__('ui.Articles_by_category')}}</x-slot>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h2 class="mb-5 pages-titles">{{ __("ui.$category->name") }}</h2>
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center mt-5">
                    <x-card :article="$article" />
                </div>
            @empty
                @auth
                    <div class="col-12 mt-5">
                        <h4 class="text-center pages-titles">{{__('ui.There_are_no_ads')}}, <a href="{{ route('article.create') }}">{{__('ui.Add_one')}}</a></h4>
                    </div>
                @endauth
            @endforelse
        </div>
    </div>
</x-layout>
