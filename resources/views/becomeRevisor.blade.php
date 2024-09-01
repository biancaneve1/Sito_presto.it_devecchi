<x-layout>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000"><h4 class="pages-titles mt-5">{{__('ui.Work_with_us')}}</h4>
            </div>
           <div class="col-10 col-md-6 form-custom p-5">
                <form action="{{route('become.revisor')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('ui.Username')}}</label>
                        <input type="text" class="form-control" id="name" value="{{Auth::user()->name}}" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="reason" class="form-label">{{__('ui.Reason')}}</label>
                        <textarea id="reason" class="form-control" name="reason"></textarea>
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button class="cta" type="submit">
                            <span>{{__('ui.Become_a_reviewer')}}</span>
                            <svg width="15px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </button>
                    </div>
                    {{-- <button type="submit" class="btn btn-primary">Diventa revisor</button> --}}
                    {{-- <a href="{{route('become.revisor')}}">Diventa Revisor</a> --}}
                </form>
            </div>
        </div>
    </div>
</x-layout>