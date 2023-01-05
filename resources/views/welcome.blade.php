<x-layout>
@foreach ($posts as $post)

    <article>
            <h1><a href="posts/{{$post->slug}}">{{ $post->title }}</a></h1>
            <p class="{{ $loop -> even ? 'mb' : ''}}">{{$post->excerpt}}</p>
            <a href="categories/{{$post->category->slug}}">{{ $post->category->name }}</a>

    </article>
    @endforeach
</x-layout>
