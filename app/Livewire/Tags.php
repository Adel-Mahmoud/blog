<?php

namespace App\Livewire;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Tags extends Component
{
    use WithPagination;
    
    private $pagination = 2;
    
    protected $paginationTheme = "bootstrap";
    
    public $search = '';
    
    public function mySearch()
    {
        $this->resetPage();
    }
    
    public function render()
    {
        return view('livewire.tags', [
            'tags' => Tag::where('tag_name', 'like', '%'.$this->search.'%')->paginate($this->pagination),
        ]);
    }
}
