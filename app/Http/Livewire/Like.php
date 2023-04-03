<?php

namespace App\Http\Livewire;

use App\Models\Myhustle;
use Livewire\Component;

class Like extends Component
{

    public Myhustle $myhustle;
    public int $count=0;



    public function mount(Myhustle $myhustle)
    {
        $this->myhustle = $myhustle;
    }

    public function like(): void
    {
        // Like
        if ($this->myhustle->isLiked()) {
            $this->myhustle->removeLike();
    
            $this->count--;
        } elseif (auth()->user()) {
            $this->myhustle->likes()->create([
                'user_id' => auth()->id(),
            ]);
    
            $this->count++;
        } 
    }
    public function render()
    {
        return view('livewire.like');
    }
}
