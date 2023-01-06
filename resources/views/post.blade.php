<x-layout>
    <article>
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <div>By <a href="#">{{$post->user->name}}</a> in <a href="categories/{{$post->category->slug}}">{{ $post->category->name }}</a></div>
            <div>
            <a href="/">Go back</a>
            </div>
    </article>
    </x-layout>
