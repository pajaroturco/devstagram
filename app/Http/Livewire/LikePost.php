<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;

    public $isLiked;

    public $likes;

    public function mount($post)
    {
        $this->isLiked = $post->likedBy(auth()->user());
        $this->likes = $post->likes->count();
    }

    public function like()
    {
        if(!$this->post->likedBy(auth()->user())) {
            // like
            $this->post->likes()->create([
                'user_id' => auth()->user()->id,
            ]);
            $this->isLiked = true;
            $this->likes++;
        } else {
            // unlike
            $this->post->likes()->where('post_id', $this->post->id)->delete();
            $this->isLiked = false;
            $this->likes--;
        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
