<header>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 header-custom">
                <h1 class="titolo-header" id="headertitle">Presto ElePHPants</h1>
                <form role="search" action="{{route('article.search')}}" method="GET" class="d-none" id="headerform">
                    <div class="position-relative">
                        <input type="search" name="query" id="" class="search-input" placeholder="{{__('ui.Search')}}...">
                        <button type="submit" class="search-button">
                            <span class="material-symbols-outlined search-icon">search</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row d-flex header-bottom-line stage_animation_box">
           <p class="title-bottom-line-header stage_animation">
                "{{__('ui.Scrolling_text')}}."
           </p>
        </div>
    </div>
</header>
