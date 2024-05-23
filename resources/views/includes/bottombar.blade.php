<div class="shadow flex justify-between bottom-0 fixed z-50 bg-white w-full border-t p-2 rounded-t-2xl">

    <div class="text-center">
        <svg xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mx-auto {{ request()->is('/') ? 'text-hijau-custom-dua' : 'text-gray-400' }}" fill="none"
            viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <div class="text-sm font-semibold {{ request()->is('/') ? 'text-hijau-custom-dua' : 'text-gray-400' }}">Home
        </div>
    </div>
    <div class="text-center">
        <svg xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mx-auto {{ request()->is('forum*') ? 'text-hijau-custom-dua' : 'text-gray-400' }}"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
        </svg>
        <div class="text-sm font-semibold {{ request()->is('forum*') ? 'text-hijau-custom-dua' : 'text-gray-400' }}">
            Forum
        </div>
    </div>
    <div class="text-center">
        <svg xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mx-auto {{ request()->is('profile*') ? 'text-hijau-custom-dua' : 'text-gray-400' }}"
            fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        <div class="text-sm font-semibold {{ request()->is('profile*') ? 'text-hijau-custom-dua' : 'text-gray-400' }}">
            Profile
        </div>
    </div>
</div>
