<x-layout>
    <x-slot name="titleName">{{ __('ui.Article_details') }}</x-slot>
    <div class="container-fluid show-box">
        <div class="row">
            <div class="col-12 col-md-6 swiper-box">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        @if ($article->images->count() > 0)
                            @foreach ($article->images as $key => $image)
                                <div class="swiper-slide">
                                    <img class="card-carousel" src="{{ $image->getUrl(300, 400) }}"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                </div>
                            @endforeach
                        @else
                            <div class="swiper-slide">
                                {{-- <img class="card-carousel" src="https://picsum.photos/500/803" alt=""> --}}
                                <img class="card-carousel" src="/layout-images/unavailable_img.jpg" alt="">
                            </div>
                        @endif

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex justify-content-center">
                <div class="show-text">
                    <div class="d-flex justify-content-center">
                        @if (session('locale') == 'it')
                            <h2 class="text-center mb-5 show-title">{{ $article->title }}</h2>
                        @endif
                        @if (session('locale') == 'en')
                            <h2 class="text-center mb-5 show-title">{{ $article->titleEng }}</h2>
                        @endif
                        @if (session('locale') == 'de')
                            <h2 class="text-center mb-5 show-title">{{ $article->titleDe }}</h2>
                        @endif
                    </div>
                    <h4>{{ __('ui.Price') }}</h4>
                    <p>€ {{ $article->price }}</p>
                    <h4>{{ __('ui.Description') }}</h4>
                    @if (session('locale') == 'it')
                        <p>{{ $article->description }}</p>
                    @endif
                    @if (session('locale') == 'en')
                        <p>{{ $article->descriptionEng }}</p>
                    @endif
                    @if (session('locale') == 'de')
                        <p>{{ $article->descriptionDe }}</p>
                    @endif
                    <h4>{{ __('ui.Category') }}</h4>
                    <p>{{ __("ui.{$article->category->name}") }}</p>
                    <h4>{{ __('ui.Created_from') }}</h4>
                    <p>{{ $article->user->name }}, {{ $article->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <script>
        var swiper = new Swiper(".mySwiper", {
            effect: "cards",
            grabCursor: true,
        });
    </script>

</x-layout>
