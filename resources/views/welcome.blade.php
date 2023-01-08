<x-layout>
{{-- @foreach ($posts as $post)

    <article>
            <h1><a href="posts/{{$post->slug}}">{{ $post->title }}</a></h1>
            <p class="{{ $loop -> even ? 'mb' : ''}}">{{$post->excerpt}}</p>
            <div>
            by <a href="authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="categories/{{$post->category->slug}}">{{ $post->category->name }}</a>

            </div>

    </article>
    @endforeach --}}
    @include ('_header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-feature-post />

        <div class="lg:grid lg:grid-cols-2">
            <x-post-card />
            <x-post-card />
        </div>

        <div class="lg:grid lg:grid-cols-3">
            <x-post-card />
            <x-post-card />
            <x-post-card />
        </div>
    </main>
</x-layout>
