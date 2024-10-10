<nav class="border-[#1E1E2C] border-2 w-full py-[18px] ">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 flex justify-between">
        <a class="text-white font-bold items-center flex gap-2" href="/">
            <x-ui.logo class="w-10"/>
            <span class="text-xl">FreelanceHours</span>
        </a>

        <ul class="text-[#C3C3D1] flex items-center gap-4 text-[16px]">
            <li class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                <a href="/">Procurar um projeto</a>
            </li>

            <li class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                <a href="/about">Como funciona?</a>
            </li>
        </ul>

        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                <nav class="-mx-3 flex flex-1 justify-end">
                    @auth

                        <a
                            href="{{ url('/newproject') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Anunciar um projeto
                        </a>

                        <!-- Log out -->
                        <form method="POST" action="{{ route('logout') }}"
                              class="rounded-md px-3 py-2 text-red-600 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-red-600 dark:hover:text-white/80 dark:focus-visible:ring-white">
                            @csrf
                            <button>
                                {{ __('Log Out') }}
                            </button>
                        </form>

                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Logar
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Registrar
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </div>
</nav>
