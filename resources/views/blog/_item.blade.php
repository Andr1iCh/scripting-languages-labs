<article class="blog-card">
    <a href="{{ route('blog.show', $blog) }}" class="blog-card-cover">
        <img
            src="{{ asset('images/blog-placeholder.jpg') }}"
            alt="{{ $blog->title }}"
            class="blog-card-image"
            width="720"
            height="410"
            loading="lazy"
        >
    </a>
    <div class="blog-card-body">
        <span class="blog-category">
            {{ $blog->category?->category_name ?? 'Без категорії' }}
        </span>
        <h2>
            <a href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a>
        </h2>
        <p class="blog-meta">
            Автор: {{ $blog->author?->name ?? 'Редакція' }}
            &middot;
            <time datetime="{{ $blog->dt_created->toDateString() }}">
                {{ $blog->dt_created->format('d.m.Y') }}
            </time>
        </p>
        <p class="blog-description">
            {{ \Illuminate\Support\Str::limit($blog->description ?? '', 120) }}
        </p>
        <a href="{{ route('blog.show', $blog) }}" class="blog-read-more">
            Читати далі <span aria-hidden="true">→</span>
        </a>
    </div>
</article>
