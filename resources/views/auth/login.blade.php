<x-layout>
    <x-slot name="titleName">Login</x-slot>
    <div class="container mt-5 ">
        <div class="row justify-content-center">
            <h2 class="pages-titles mt-5">LOGIN</h2>
            <div class="col-10 col-md-8 p-5 form-custom">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('ui.Enter_email')}}:</label>
                        <input type="email" class="form-control @error('email')is-invalid @enderror" id="email"
                            name="email">
                        @error('email')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('ui.Enter_password')}}:</label>
                        <input type="password"class="form-control @error('password')is-invalid @enderror" id="password"
                            name="password">
                        @error('password')
                            <span class="text-danger fst-italic">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center mt-5">
                        <button class="cta" type="submit">
                            <span>Login</span>
                            <svg width="15px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
