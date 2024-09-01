<x-layout>
    <x-slot name="titleName pages-titles">{{__('ui.Create_an_article')}}</x-slot>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <h4 class="mb-5 text-center pages-titles">{{__('ui.Insert_an_article')}}</h4>
            <div class="col-10 col-md-8 p-5  form-custom">
              <livewire:create-article-form />
            </div>
        </div>
    </div>
</x-layout>