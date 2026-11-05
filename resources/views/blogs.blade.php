@extends('layout.app')

@section('title', 'Login')

@section('content')
<div class="min-h-[screen] bg-gray-50 px-4 py-20">
    <div class="mx-auto max-w-7xl">
        <h1 class="mb-8 text-3xl font-bold text-gray-900">Blogs</h1>

        @if ($blogs->isEmpty())
            <p class="rounded-lg border border-gray-200 bg-white p-6 text-gray-600">
                No blogs have been published yet.
            </p>
        @else
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($blogs as $blog)
                <a href="{{ route('blogs.show', $blog) }}" class="block">
                    <article class="flex h-[420px] flex-col overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition hover:shadow-md">
                        @if ($blog->image)
                            <img
                                src="{{ route('blog-images.show', basename($blog->image)) }}"
                                alt="{{ $blog->title }}"
                                class="h-44 w-full shrink-0 object-cover"
                            >
                        @else
                            <div class="flex h-44 shrink-0 items-center justify-center bg-gray-100 text-gray-400">
                                No image
                            </div>
                        @endif

                        <div class="flex flex-1 flex-col p-5">
                            <h2 class="mb-3 text-xl font-semibold text-gray-900">
                                {{ $blog->title }}
                            </h2>

                            <p class="mb-5 line-clamp-3 whitespace-pre-line text-gray-700">
                                {{ $blog->content }}
                            </p>

                            <p class="mt-auto border-t border-gray-100 pt-4 text-sm text-gray-500">
                                By {{ $blog->user->name }}
                                on {{ $blog->created_at->format('F j, Y') }}
                            </p>
                            <p class="mt-3 font-semibold text-emerald-600">
                                Read More →
                            </p>
                        </div>
                    </article>
                </a>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection