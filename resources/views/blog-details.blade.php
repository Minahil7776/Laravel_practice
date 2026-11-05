@extends('layout.app')

@section('title', $blog->title)

@section('content')

<div class="max-w-4xl mx-auto mt-10 px-4">

    {{-- Back Button --}}
    <a href="{{ route('blogs.index') }}"
       class="text-emerald-600 hover:underline">
        ← Back to Blogs
    </a>

    {{-- Blog Article --}}
    <article class="bg-white rounded-xl shadow-md p-6 mt-6">

        {{-- Blog Image --}}
        @if ($blog->image)
            <img
                src="{{ route('blog-images.show', basename($blog->image)) }}"
                alt="{{ $blog->title }}"
                class="w-full h-96 object-cover rounded-xl mb-6"
            >
        @endif

        {{-- Blog Title --}}
        <h1 class="text-3xl font-bold text-gray-800 mb-4">
            {{ $blog->title }}
        </h1>

        {{-- Author and Date --}}
        <div class="text-gray-500 text-sm mb-6">
            By {{ $blog->user->name }}
            | {{ $blog->created_at->format('F j, Y') }}
        </div>

        <hr class="mb-6">

        {{-- Full Blog Content --}}
        <div class="text-gray-700 leading-8 whitespace-pre-line">
            {{ $blog->content }}
        </div>

    </article>

</div>

@endsection