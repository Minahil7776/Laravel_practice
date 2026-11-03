@extends('layout.app')

@section('title', 'Login')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gray-100">

<div class="max-w-md w-full h-full mx-auto text-white bg-gray-800 p-8 rounded-lg shadow-md">

    <h1 class="text-3xl font-bold text-center mb-6">
        Login
    </h1>

    <form action="{{ route('login.authenticate') }}" method="POST">

        @csrf

        <div class="mb-4">
            <label class="block mb-2 font-medium">
                Email
            </label>

            <input
                type="email"
                name="email"
                placeholder="Enter your email"
                class="w-full border rounded-md p-3 focus:ring-blue-500"
                required
            >
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-medium">
                Password
            </label>

            <input
                type="password"
                name="password"
                placeholder="Enter your password"
                class="w-full border rounded-md p-3  focus:ring-blue-500"
                required
            >
        </div>

        <button
            type="submit"
            class="w-full bg-white font-bold text-gray-800 p-3 rounded-md hover:bg-gray-300"
        >
            Login
        </button>

    </form>

</div>
</div>

@endsection