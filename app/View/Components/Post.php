<?php

namespace App\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Post extends Component
{
    /**
     * Create a new component instance.
     */
    public $post;
    public $comments;

    public function __construct($post, $comments)
    {
        $this->post = $post;
        $this->comments = $comments;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|\Closure|string
    {
        return <<<'blade'
        <div>
        <main role="main" class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <h3 class="pb-4 mb-4 font-italic border-bottom">
                        From the Firehose
                    </h3>


                    <div class="blog-post">
                        <h2 class="blog-post-title">{{ $post->title }}</h2>
                        <p class="blog-post-meta">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }} بقلم <a
                                href="#">{{ $post->author }}</a></p>

                        <p style="background-color: #e5e5e5; padding: 20px;">{{ $post->body }}</p>
                    </div>
                    <a class='btn btn-primary' href='/posts/{{$post->id}}/edit'>تعديل</a>
                    <h1>التعليقات</h1>
                    @if (count($comments) == 0)
                        <h3>لا توجد تعليقات</h3>
                    @else
                        @foreach ($comments as $comment)
                            <h4>
                                {{ $comment->name }}
                            </h4>
                            <p style="background-color: #e5e5e5; padding: 20px;">
                                {{ $comment->body }}
                            </p>
                        @endforeach
                    @endif



blade;
    }
}
