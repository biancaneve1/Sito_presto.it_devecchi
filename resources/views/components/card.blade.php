{{-- <div class="card" style="width: 18rem;">
    <img src="https://picsum.photos/200/300" class="card-img-top" alt=" Immagine dell'articolo {{ $article->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $article->title }}</h5>
        <p class="card-text">€ {{ $article->price }} </p>
        <p class="card-text"> {{ $article->category->name }} </p>
        <div class="d-flex justify-content-center mt-3">
            <button class="cta">
                <span>
                    <a href="{{ route('article.show', $article) }}">Dettaglio</a>
                </span>
                <svg width="15px" height="10px" viewBox="0 0 13 10">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                </svg>
            </button>
        </div>
    </div>
</div> --}}

<a href="{{ route('article.show', $article) }}" class="card-link mb-5">
    <div class="card2">
        {{-- <img src="{{$article->images->isNotEmpty() ? $article->images->first()->getUrl(300,400) : "https://picsum.photos/200/300" }}" alt="Immagine dell'articolo {{ $article->title }}"> --}}
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 400) : '/layout-images/unavailable_img.jpg' }}"
            alt="Immagine dell'articolo {{ $article->title }}">
        <div class="d-flex justify-content-center">
            <div class="text-box-card mt-5">
                @if (session('locale') == 'it')
                    <h5>{{ Str::limit($article->title, 14) }}</h5>
                @endif
                @if (session('locale') == 'en')
                    <h5>{{ Str::limit($article->titleEng, 14) }}</h5>
                @endif
                @if (session('locale') == 'de')
                    <h5>{{ Str::limit($article->titleDe, 14) }}</h5>
                @endif
                <p class="fw-bold mt-3">{{ __('ui.Price') }}: {{ $article->price }} €</p>
                <p>{{ __("ui.{$article->category->name}") }}</p>
            </div>
        </div>
    </div>
</a>
