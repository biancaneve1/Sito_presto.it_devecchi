<x-layout>
    <x-slot name="titleName">Home Page</x-slot>
    <div class="container-fluid white-band-home">
        <div class="row d-flex flex-row   ">
            <div class="col-12 a-welcome text-center fw-bold">
                <a class="a-welcome" href="">{{ __('ui.MAP') }}</a>
                <a class="a-welcome" href="">{{ __('ui.BLOG') }} </a>
                <a class="a-welcome" href="">{{ __('ui.TEAM') }}</a>
                <a class="a-welcome" href="">{{ __('ui.CONTACTS') }}</a>
                <a class="a-welcome" href="">{{ __('ui.WORKS') }}</a>
                <a class="a-welcome" href="">{{ __('ui.AFFILIATES') }}</a>
                <a class="a-welcome" href="">{{ __('ui.PRESS') }}</a>
                <a class="a-welcome" href="">{{ __('ui.ELEPHPANTS_ITALY') }}</a>
                <a class="a-welcome" href="">{{ __('ui.PRESENT_CARD') }}</a>
                <a class="a-welcome" href="">{{ __('ui.PRESENT_LIST') }}</a>
                <a class="a-welcome" href="">{{ __('ui.ABROAD') }}</a>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-6">
                @if (session('errorMessage'))
                    <div class="message-refused ">
                        {{ session('errorMessage') }}
                    </div>
                @endif
                @if (session('messageRevisor'))
                    <div class="message-success ">
                        {{ session('messageRevisor') }}
                    </div>
                @endif
            </div>

        </div>

    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
            </div>
            <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
                <h5 class=" pages-titles">{{ __('ui.Choose_from_a_sea_of_opportunities') }} ...</h5>
                <h5 class="text-center">{{ __('ui.Purchase_home') }}.</h5>
            </div>
            @auth
                <div class="d-flex justify-content-center mt-3">
                    <a href="{{ route('article.create') }}" class="button-home">
                        <div class="scene">
                            <div class="cube">
                                <span class="side top">{{ __('ui.An_article') }}</span>
                                <span class="side front">{{ __('ui.Add') }} </span>
                            </div>
                        </div>
                    </a>
                </div>
            @endauth
        </div>
    </div>
    </div>
    <div class="container card-home-box">
        <div class="row justify-content-center">
            @foreach ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4 d-flex justify-content-center">
                    <x-card :article="$article" />
                </div>
            @endforeach
        </div>
    </div>
    <div class="container mt-5 ">
        <div class="row p-5">
            <div class="col-12 col-md-4 ">
                <h4 class="pages-text">{{ __('ui.Find_shops') }}</h4>
                <p>{{ __('ui.Backshop') }}</p>
            </div>
            <div class=" col-12 col-md-4">
                <h4 class="pages-text">{{ __('ui.Community') }}</h4>
                <p>{{ __('ui.MarketPlace') }}.</p>
            </div>
            <div class=" col-12 col-md-4">
                <h4 class="pages-text">{{ __('ui.Questions') }}.</h4>
                <p>{{ __('ui.Privacy') }}</p>
            </div>
        </div>
    </div>
</x-layout>
