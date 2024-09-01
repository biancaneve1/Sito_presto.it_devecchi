<div>
    @if (session('articleCreated'))
        <div class="message-success">
            {{ session('articleCreated') }}
        </div>
    @endif
    <form wire:submit="store">
        <div class="mb-3">
            <label for="title" class="form-label">{{__('ui.Title')}}</label>
            <input type="text" class="form-control @error('title')is-invalid @enderror" id="title"
                wire:model.live="title">
            @error('title')
                <span class="text-danger fst-italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">{{__('ui.Price')}}</label>
            <input type="float" class="form-control @error('price')is-invalid @enderror" id="price"
                wire:model.live="price">
            @error('price')
                <span class="text-danger fst-italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{__('ui.Description')}}</label>
            <textarea name="description" id="description" class="form-control @error('description')is-invalid @enderror"
                wire:model.live="description"></textarea>
            @error('description')
                <span class="text-danger fst-italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">{{__('ui.Category')}}</label>
            <select id="category_id" class="form-select @error('category_id')is-invalid @enderror"
                wire:model="category_id">
                <option value="" selected>{{__('ui.Choose_a_category')}}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ __("ui.$category->name") }}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="text-danger fst-italic">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <input type="file" wire:model.live="temporary_images" multiple
                class="form-control @error('temporary_images.*')is-invalid @enderror" placeholder="Img/">
            @error('temporary_images.*')
                <span class="text-danger fst-italic">{{ $message }}</span>
            @enderror
            @error('temporary_images')
                <span class="text-danger fst-italic">{{ $message }}</span>
            @enderror
        </div>
        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>{{__('ui.Photo_preview')}} :</p>
                    <div class="row border-custom-temp-img shadow py-4">
                        @foreach ($images as $key => $image)
                            <div class="col d-flex flex-column align-items-center my-3">
                                <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}})"></div>
                                <button type="button" class="btn mt-1 btn-danger rounded-5" wire:click="removeImage({{$key}})">X</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-center mt-5">
            <button class="cta" type="submit">
                <span>{{__('ui.Insert')}}</span>
                <svg width="15px" height="10px" viewBox="0 0 13 10">
                    <path d="M1,5 L11,5"></path>
                    <polyline points="8 1 12 5 8 9"></polyline>
                </svg>
            </button>
        </div>
    </form>
</div>
