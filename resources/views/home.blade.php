@extends('layout.app')

@section('title', 'home')

@section('content')
    <div>
        <div class="hero h-[100vh] w-[100%] flex flex-col items-center justify-center text-gray-800"> 
            <img src="/blogs_image.jpg" class="fit-content h-screen w-[100%] opacity-55" alt="Blogs Image">
            <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-center">
                <h1 class="text-4xl text-gray-800 font-bold mb-4">Welcome to Word & Wonder</h1>
                <p class="text-lg mb-8">Discover the world of words and wonders through our engaging blogs.</p>
                <a href="/blogs" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Explore Blogs</a>
            </div>
        </div>
    </div>

    
@endsection

