<article>
    <h2>
        <a href="{{ route('blog.show', $blog) }}">
            {{ $blog->title }}
        </a>
    </h2>
    <p>{{ $blog->description }}</p>
</article>
