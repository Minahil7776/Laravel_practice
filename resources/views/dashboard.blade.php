@extends('layout.app')

@section('content')

<div class="min-h-screen bg-gray-100 py-20 px-4  ">

    <div class="max-w-3xl mx-auto">

        {{-- Welcome Message --}}
        <div class="mb-8 text-center">
            <h2 class="text-2xl font-bold text-gray-800">
                Welcome, {{ Auth::user()->name }}!
            </h2>
            <p class="text-gray-500 mt-2">
                Share your thoughts and ideas with the world.
            </p>
        </div>

        {{-- Blog Form --}}
        <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-200">

            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">
                    Create a New Blog
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Fill in the details below to publish your blog post.
                </p>
            </div>

            <form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <div class="mb-6">
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                        Blog Title
                    </label>

                    <input
                        type="text"
                        name="title"
                        id="title"
                        placeholder="Enter your blog title..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 placeholder-gray-400  transition"
                        required
                    >
                </div>

                {{-- Content --}}
                <div class="mb-6">
                    <label for="content" class="block text-sm font-semibold text-gray-700 mb-2">
                        Blog Content
                    </label>

                    <textarea
                        name="content"
                        id="content"
                        rows="7"
                        placeholder="Write your blog content here..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-3 text-gray-700 placeholder-gray-400  transition resize-y"
                        required
                    ></textarea>
                </div>

                {{-- Submit Button --}}
                <div class="flex justify-between items-center gap-4">
                    <div class="mb-6">
        <label for="image" class="block mb-2 font-semibold">
            Upload Blog Image
        </label>

        <input
            type="file"
            name="image"
            id="image"
            accept="image/*"
            class="w-full border rounded-lg p-3"
        >
    </div>
                    <button
                        type="submit"
                        class="bg-gray-600 hover:bg-gray-700 text-white font-semibold px-6 py-3 rounded-lg shadow-sm transition duration-200 offset-2"
                    >
                        Publish Blog
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection
