<div class="shadow flex justify-around bottom-0 fixed z-50 bg-white w-full border-t p-2 rounded-t-2xl">

    <div class="text-center">
        <a href="/">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mx-auto {{ request()->is('/') ? 'text-hijau-custom-dua' : 'text-gray-400' }}"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <div class="text-sm font-semibold {{ request()->is('/') ? 'text-hijau-custom-dua' : 'text-gray-400' }}">Home
            </div>
        </a>
    </div>
    <div class="text-center">

        <svg xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6 mx-auto {{ request()->is('lawyer*') ? 'text-hijau-custom-dua' : 'text-gray-400' }}"
            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
        </svg>

        <div class="text-sm font-semibold {{ request()->is('lawyer*') ? 'text-hijau-custom-dua' : 'text-gray-400' }}">
            Lawyer
        </div>
    </div>
    <div class="text-center">
        <a href="/user/transaksi">
            <svg xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 mx-auto {{ request()->is('users*') ? 'text-hijau-custom-dua' : 'text-gray-400' }}"
                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <div
                class="text-sm font-semibold {{ request()->is('users*') ? 'text-hijau-custom-dua' : 'text-gray-400' }}">
                Profile
            </div>
        </a>
    </div>
</div>
