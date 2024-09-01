<?php

namespace App\Livewire;

use Livewire\Component;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use OpenAI\Laravel\Facades\OpenAI;
use App\Jobs\GoogleVisionLabelImage;
use App\Jobs\GoogleVisionSafeSearch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CreateArticleForm extends Component
{
    use WithFileUploads;

    public $article;

    #[Validate('min:4')]
    #[Validate('required')]
    public $title;
    #[Validate('required')]
    #[Validate('numeric')]
    #[Validate('decimal:0,2')]
    #[Validate('min:1')]
    public $price;
    #[Validate('required')]
    #[Validate('max:300')]
    public $description;
    #[Validate('required')]
    public $category_id;

    public $images = [];
    public $temporary_images;

    public function store(){
        $this->validate();

        $titleOBJ = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'traduci in inglese'],
                ['role' => 'user', 'content' => $this->title],
            ]
            ]);
        $Title = $titleOBJ->choices[0]->message->content;

        $descriptionOBJ = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'traduci in inglese'],
                ['role' => 'user', 'content' => $this->description],
            ]
            ]);
        $Description = $descriptionOBJ->choices[0]->message->content;


        $titelOBJ = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'traduci in tedesco'],
                ['role' => 'user', 'content' => $this->title],
            ]
            ]);
        $Titel = $titelOBJ->choices[0]->message->content;

        $beschreibungOBJ = OpenAI::chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'traduci in tedesco'],
                ['role' => 'user', 'content' => $this->description],
            ]
            ]);
        $Beschreibung = $beschreibungOBJ->choices[0]->message->content;

        $article = Auth::user()->articles()->create([
            'title' => $this->title,
            'price' => $this->price,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'titleEng' => $Title,
            'titleDe' => $Titel,
            'descriptionEng' => $Description,
            'descriptionDe' => $Beschreibung,
        ]);
        
        if(count($this->images) > 0){
            foreach($this->images as $image){
                $newFileName = "articles/{$article->id}";
                $newImage = $article->images()->create([
                    'path' => $image->store($newFileName, 'public')
                ]);
                RemoveFaces::withChain([
                   new ResizeImage($newImage->path, 300,400),
                   new GoogleVisionSafeSearch($newImage->id),
                   new GoogleVisionLabelImage($newImage->id)
                ])->dispatch($newImage->id);
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }
        $this->reset();
        session()->flash('articleCreated','Articolo creato correttamente ');
    }

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6'
        ])){
            foreach($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))){
            unset($this->images[$key]); 
            $this->temporary_images="";
        }
    }

    public function render()
    {
        return view('livewire.create-article-form');
    }
}
