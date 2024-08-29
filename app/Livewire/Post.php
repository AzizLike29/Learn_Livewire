<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

class Post extends Component
{
    public function render()
    {
        $posts = \App\Models\Post::latest()->get();
        return view('livewire.post', compact('posts'));
    }

    public $title, $content, $postId, $slug, $status, $updatePost = false, $addPost = false;

    protected $rules = [
        'title' => 'required',
        'content' => 'required',
        'status' => 'required',
    ];

    public function resetFields()
    {
        $this->title = '';
        $this->content = '';
        $this->status = 1;
    }

    public function create()
    {
        $this->resetFields();
        $this->addPost = true;
        $this->updatePost = false;
    }

    public function store()
    {
        $this->validate();
        try {
            \App\Models\Post::create([
                'title' => $this->title,
                'content' => $this->content,
                'status' => $this->status,
                'slug' => Str::slug($this->title)
            ]);

            session()->flash('success', 'Post created successfully!');
            $this->resetFields();
            $this->addPost = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    public function edit($id)
    {
        try {
            $post = \App\Models\Post::find($id);

            if (!$post) {
                session()->flash('error', 'Post not found!!');
            } else {
                $this->title = $post->title;
                $this->content = $post->content;
                $this->status = $post->status;
                $this->postId = $post->id;
                $this->updatePost = true;
                $this->addPost = false;
            }
        } catch (\Exception $ex) {
            session()->flash('error', 'Something goes wrong!!');
        }
    }

    public function update()
    {
        $this->validate();

        try {
            \App\Models\Post::whereId($this->postId)->update([
                'title' => $this->title,
                'content' => $this->content,
                'status' => $this->status,
                'slug' => Str::slug($this->title),
            ]);

            session()->flash('success', 'Post updated successfully!');
            $this->resetFields();
            $this->addPost = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Something went wrong!');
        }
    }


    public function cancel()
    {
        $this->addPost = false;
        $this->updatePost = false;
        $this->resetFields();
    }

    public function destroy($id)
    {
        try {
            \App\Models\Post::find($id)->delete();
            session()->flash('success', 'Post deleted successfully!');
        } catch (\Exception $ex) {
            session()->flash('error', 'Something went wrong!');
        }
    }
}
