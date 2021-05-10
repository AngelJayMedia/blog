<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search  = '';
    public $orderBy = 'id';
    public $perPage  = 10;
    public $orderAsc = true;

    public function render()
    {
        return view('livewire.posts.index', [
            'posts' => Post::searchPost($this->search)
                ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
