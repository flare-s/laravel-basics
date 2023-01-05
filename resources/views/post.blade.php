<x-layout>
    <article>
            <h1>{{ $post->title }}</h1>
            <p>{!! $post->body !!}</p>
            <a href="categories/{{$post->category->slug}}">{{ $post->category->name }}</a>
            <div>
            <a href="/">Go back</a>
            </div>
    </article>
    </x-layout>
