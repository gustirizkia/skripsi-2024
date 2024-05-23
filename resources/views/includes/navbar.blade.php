<div class="z-50 ">
    <div class="hidden md:flex justify-between  px-20 py-2  {{ request()->is('/') ? 'text-' : 'bg-hijau-custom-dua' }}">
        <div class="z-50">
            <a href="">
                <img src="{{ asset('image/logo-white.png') }}" alt="logo lawtalk" class="h-10">
            </a>
        </div>
        <div class="my-auto flex z-50">
            <div class="my-auto">
                <a href="/" class="mx-5 text-white hover:text-gray-300">Home</a>
            </div>
            <div class="my-auto">
                <a href="{{ route('lawyer-page') }}" class="mx-5 text-white hover:text-gray-300">Lawyer</a>
            </div>
            <div class="my-auto">
                <a href="{{ route('forum-diskusi-front') }}" class="mx-5 text-white hover:text-gray-300">Diskusi</a>
            </div>
        </div>
        <div class="my-auto flex z-50">
            @if (auth()->user())
                <div class="my-auto">
                    <a href="/user/transaksi"
                        class="ml-5 py-1 px-2 rounded {{ request()->is('/') || request()->is('home') ? 'text-white bg-hijau-custom-dua  ' : 'text-black bg-white' }}">
                        Hallo, {{ auth()->user()->name }}
                    </a>
                </div>
            @else
                <div class="my-auto">
                    <a href="/login"
                        class="mx-5  {{ request()->is('/') || request()->is('home') ? 'text-gray-900' : 'text-white' }}">Login</a>
                </div>
                <div class="my-auto">
                    <a href="/register"
                        class="ml-5 {{ request()->is('/') || request()->is('home') ? 'text-white bg-hijau-custom-dua py-1 px-2 rounded' : 'text-white' }}">Register</a>
                </div>
            @endif
        </div>
    </div>
</div>
