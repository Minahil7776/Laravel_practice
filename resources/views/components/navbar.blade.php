<nav class="fixed top-0 left-0 right-0 bg-gray-900 text-white p-4 z-50">
    <div class="container mx-auto flex justify-between">

        <h1 class="text-xl font-bold">
            <a href="/dashboard">Word & Wonder</a>
        </h1>

        @guest
           <div class="flex gap-6">
               <a href="/">Home</a>
            <a href="/signup">Sign Up</a>
            <a href="/login">Login</a>

            
        </div>
        @endguest

        @auth
        <div class="flex gap-6">
            <a href="/blogs">Blogs</a>
            <form action="{{ route('logout') }}" method="POST">
            @csrf
            
            <button type="submit" class="cursor-pointer">Logout</button>
        </form>
        </div>
        @endauth
    </div>
</nav>
