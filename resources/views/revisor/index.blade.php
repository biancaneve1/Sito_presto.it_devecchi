<x-layout>

    <div class="container-fluid revisor-dash-box">
        <div class="row p-4">
            <div class="col-9">
                <div class="mt-5">
                    <h1 class="display-5 pb-2 pages-titles text-center">{{ __('ui.REVISOR_DASHBOARD') }}...</h1>
                </div>
            </div>
        </div>
        @if (session('messageAccepted'))
            <div class="row justify-content-center">
                <div class="col-8 message-success">
                    {{ session('messageAccepted') }}
                </div>
            </div>
        @endif
        @if (session('messageRefused'))
            <div class="row justify-content-center">
                <div class="col-8 message-refused">
                    {{ session('messageRefused') }}
                </div>
            </div>
        @endif
        @if (session('messageCancelLast'))
            <div class="row justify-content-center">
                <div class="col-8 message-success">
                    {{ session('messageCancelLast') }}
                </div>
            </div>
        @endif
        @if ($article_to_check)
            <div class="row justify-content-center px-5">
                <div class="col-md-8">
                    <div class="row justify-content-center p-5 mb-4">
                        @if ($article_to_check->images()->count())
                            @foreach ($article_to_check->images as $key => $image)
                                <div class="col-6 col-md-4 mb-4">
                                    <img src="{{ $image->getUrl(300, 400) }}"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}"
                                        class="img-fluid rounded shadow">
                                </div>
                                <div class="col-md-5 ps-3">
                                    <div class="card-body text-center">
                                        <h5 class="fw-bold">{{ __('ui.Labels') }}</h5>
                                        @if ($image->labels)
                                            @foreach ($image->labels as $label)
                                                #{{ $label }} ,
                                            @endforeach
                                        @else
                                            <p>{{ __('ui.No-Labels') }}</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card-body text-start mb-5">
                                        <h5 class="fw-bold">{{ __('ui.Ratings') }}</h5>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->adult }}"></div>
                                            </div>
                                            <div class="col-10">{{ __('ui.Adult') }}</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->violence }}"></div>
                                            </div>
                                            <div class="col-10">{{ __('ui.Violence') }}</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->spoof }}"></div>
                                            </div>
                                            <div class="col-10">{{ __('ui.Spoof') }}</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->racy }}"></div>
                                            </div>
                                            <div class="col-10">{{ __('ui.Racy') }}</div>
                                        </div>
                                        <div class="row justify-content-center">
                                            <div class="col-2">
                                                <div class="text-center mx-auto {{ $image->medical }}"></div>
                                            </div>
                                            <div class="col-10">{{ __('ui.Medical') }}</div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4 mb-4 text-center">
                                    {{-- <img src="https://picsum.photos/300" alt=""
                                        class="img-fluid rounded shadow"> --}}
                                    <img src="/layout-images/unavailable_img.jpg" alt=""
                                        class="img-fluid rounded shadow">
                                </div>
                            @endfor
                        @endif
                    </div>
                </div>
                <div
                    class="col-md-4 d-flex flex-column align-items-center justify-content-between shadow mb-5 p-3 rounded-5 box-details">
                    <div class="mb-dashboard">
                        @if (session('locale') == 'it')
                            <h1 class="text-uppercase pages-titles">{{ $article_to_check->title }}</h1>
                        @endif
                        @if (session('locale') == 'en')
                            <h1 class="text-uppercase pages-titles">{{ $article_to_check->titleEng }}</h1>
                        @endif
                        @if (session('locale') == 'de')
                            <h1 class="text-uppercase pages-titles">{{ $article_to_check->titleDe }}</h1>
                        @endif
                        <h3 class="pages-text">{{ __('ui.Author') }} : {{ $article_to_check->user->name }} </h3>
                        <h4 class="pages-text"> {{ __('ui.Price') }} : € {{ $article_to_check->price }} </h4>
                        <h4 class="pages-text">{{ __('ui.Category') }}: {{ __("ui.{$article_to_check->category->name}") }}
                        </h4>
                        @if (session('locale') == 'it')
                            <h4 class="pages-text">{{ __('ui.Description') }}: {{ $article_to_check->description }}
                            </h4>
                        @endif
                        @if (session('locale') == 'en')
                            <h4 class="pages-text">{{ __('ui.Description') }}: {{ $article_to_check->descriptionEng }}
                            </h4>
                        @endif
                        @if (session('locale') == 'de')
                            <h4 class="pages-text">{{ __('ui.Description') }}: {{ $article_to_check->descriptionDe }}
                            </h4>
                        @endif
                    </div>
                    <div class="d-flex justify-content-center mb-dashboard">
                        <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="post"
                            class="d-flex">
                            @csrf
                            @method('PATCH')
                            <button class="btn-delete  fw-bold">
                                <span class="material-symbols-outlined fs-1">Close</span>
                            </button>
                        </form>
                        <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="post"
                            class="d-flex">
                            @csrf
                            @method('PATCH')
                            <button class="btn-accept  fw-bold">
                                <span class="material-symbols-outlined fs-1">Check</span>
                            </button>
                        </form>
                        <a href="{{ route('UncheckLastArticle') }}" class="d-flex text-decoration-none">
                            <button class="btn-cancel  fw-bold">
                                <span class="material-symbols-outlined fs-1 ms-3">arrow_back_ios</span>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h1 class="display-5 pages-text">{{ __('ui.No_items_to_review') }}!</h1>
                    <button class="btn-home mt-5 ">
                        <a href="{{ route('HomePage') }}"
                            class="text-white text-decoration-none">{{ __('ui.Return_to_homepage') }}</a>
                    </button>
                    <button class="btn-home2 mt-5">
                        <a href="{{ route('UncheckLastArticle') }}"
                            class="text-white text-decoration-none">{{ __('ui.Cancel') }}</a>
                    </button>
                </div>
            </div>
        @endif
    </div>
</x-layout>
