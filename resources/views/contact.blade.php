
@extends('layout.app')

@section('title', 'Contact Us')

@section('content')

<div class="max-w-2xl mx-auto mt-12 p-6">

    <h1 class="text-3xl font-bold text-gray-800 mb-2">
        Contact Us
    </h1>

    <p class="text-gray-500 mb-8">
        Have a question or suggestion? Send us a message.
    </p>

    @if(session('success'))
        <div class="bg-gray-100 text-gray-700 p-3 rounded-lg mb-5">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-lg mb-5">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf

        <div class="mb-5">
            <label class="block mb-2 font-medium">Your Name</label>
            <input type="text" name="name"
                value="{{ old('name') }}"
                class="w-full border-b-2 border-gray-300 p-3 focus:border-gray-600 focus:outline-none"
                required>
        </div>

        <div class="mb-5">
            <label class="block mb-2 font-medium">Your Email</label>
            <input type="email" name="email"
                value="{{ old('email') }}"
                class="w-full border-b-2 border-gray-300 p-3 focus:border-gray-600 focus:outline-none"
                required>
        </div>

        <div class="mb-5">
            <label class="block mb-2 font-medium">Subject</label>
            <input type="text" name="subject"
                value="{{ old('subject') }}"
                class="w-full border-b-2 border-gray-300 p-3 focus:border-gray-600 focus:outline-none"
                required>
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium">Message</label>
            <textarea name="message" rows="5"
                class="w-full border-b-2 border-gray-300 p-3 focus:border-gray-600 focus:outline-none"
                required>{{ old('message') }}</textarea>
        </div>

        <button type="submit"
            class="bg-gray-700 hover:bg-gray-800 text-white px-6 py-3 rounded-lg transition">
            Send Message
        </button>

    </form>

</div>

@endsection
