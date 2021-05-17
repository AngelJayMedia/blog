<?php

namespace App\Http\Livewire\Buttons;

use App\Models\Post;
use Livewire\Component;

class Featured extends Component
{
    public Post $post;
    public string $name;
    public bool $featured;

    public function mount()
    {
        $this->featured = $this->post->getAttribute('featured');
    }

    public function render()
    {
        return view('livewire.buttons.featured');
    }

    public function updating($name, $value)
    {
        $this->post->setAttribute($name, $value)->save();
    }
}
