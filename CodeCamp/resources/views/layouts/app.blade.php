<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EatWise</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-50">

<!--NAVBAR -->
<nav class="sticky lg:static top-0 z-50 w-full bg-orange-50/95 backdrop-blur-md shadow-sm">
    <div class="w-full lg:container mx-auto px-4 h-16 flex items-center justify-between">

        <!--LOGO-->
        <a href="{{ url('/') }}" class="flex items-center shrink-0 no-underline!">
            <img src="{{ asset('image/Logo.png') }}" alt="EatWise Logo" class="h-6 w-auto object-contain">
        </a>

        <!--DESKTOP MENU-->
        <div class="hidden lg:flex items-center space-x-8">
            <a href="{{ url('/') }}" class="text-sm font-semibold text-gray-500! no-underline! hover:text-gray-800! transition-colors">Home</a>
            <a href="{{ route('about') }}" class="text-sm font-semibold text-gray-500! no-underline! hover:text-gray-800! transition-colors">About Us</a>
            <a href="{{ route('services') }}" class="text-sm font-semibold text-gray-500! no-underline! hover:text-gray-800! transition-colors">Services</a>
            
           @guest
                <button id="loginBtn">
                    <a class="text-sm font-semibold text-orange-500! no-underline! hover:text-orange-700! transition-colors">Login</a>
                </button>
           @else
                <a href="{{ route('profile') }}" class="flex items-center group no-underline!">
                    <div class="w-9 h-9 rounded-full bg-orange-100 flex items-center justify-center border border-orange-200 group-hover:bg-orange-400 transition-all duration-300">
                        <i class="fas fa-user text-orange-500 group-hover:text-white text-sm"></i>
                    </div>
                    <span class="ml-2 text-sm font-semibold text-gray-500! group-hover:text-gray-800! transition-colors">
                        {{ auth()->user()->UserName }}
                    </span>
                </a>

                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-sm font-semibold text-gray-400! hover:text-orange-700! transition-colors ml-4">
                        Logout
                    </button>
                </form>
            @endguest
                    </div>

        <!--BURGER BUTTON-->
            <button id="mobile-menu-button" class="lg:hidden text-orange-400! hover:bg-white/20 rounded-lg transition-colors">
                <i class="fas fa-bars text-xl"></i>
            </button>
        </div>

    <!-- MOBILE MENU -->
    <div id="mobile-menu" class="lg:hidden overflow-hidden max-h-0 opacity-0 transition-all duration-400 ease-in-out bg-orange-50">
        <div>
            <a href="{{ url('/') }}"
            class="md:text-sm text-xs font-semibold text-gray-500! no-underline! hover:text-gray-800! transition-colors block odd:bg-orange-100 even:bg-orange-50">
                <span class="w-full lg:container flex px-4 py-3">
                    Home
                </span>
            </a>

            <a href="{{ route('about') }}"
            class="md:text-sm text-xs font-semibold text-gray-500! no-underline! hover:text-gray-800! transition-colors block odd:bg-orange-100 even:bg-orange-50">
                <span class="w-full lg:container flex px-4 py-3">
                    About Us
                </span>
            </a>

            <a href="{{ route('services') }}"
            class="md:text-sm text-xs font-semibold text-gray-500! no-underline! hover:text-gray-800! transition-colors block odd:bg-orange-100 even:bg-orange-50">
                <span class="w-full lg:container flex px-4 py-3">
                    Services
                </span>
            </a>

            @guest
                <button id="loginBtnMobile" class="w-full odd:bg-orange-100 even:bg-orange-50">
                    <a class="flex px-4 py-3 md:text-sm text-xs font-semibold text-orange-500! no-underline! hover:text-orange-700! transition-colors">
                        Login
                    </a>
                </button>
            @else
                <a href="{{ route('profile') }}" class="flex items-center px-4 py-3 md:text-sm text-xs font-semibold text-gray-500! no-underline! hover:text-gray-800! transition-colors odd:bg-orange-100 even:bg-orange-50">
                    <i class="fas fa-user-circle mr-3 text-orange-500 text-lg"></i>
                    My Profile ({{ auth()->user()->UserName }})
                </a>

                <form action="{{ route('logout') }}" method="POST" class="w-full odd:bg-orange-100 even:bg-orange-50">
                    @csrf
                    <button type="submit" class="flex w-full px-4 py-3 md:text-sm text-xs font-semibold text-gray-500! hover:text-orange-700! transition-colors">
                        <i class="fas fa-sign-out-alt mr-3"></i> Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>

<main>
    @yield('content')
</main>

<footer class="bg-gray-900 text-light text-xs py-5 flex items-center">
    <div class="container text-center">
        <a href="{{ url('/') }}" class="flex items-center shrink-0 no-underline!">
            <img class="block mx-auto h-4 w-auto mb-2" src="{{ asset('image/Logo_white.png') }}" alt="EatWise Logo" />
        </a>
        <p class="mb-0">&copy; {{ date('Y') }} EatWise. All Rights Reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('authModal');
    const loginBtns = [document.getElementById('loginBtn'), document.getElementById('loginBtnMobile')];
    const closeBtn = document.getElementById('closeBtn');
    
    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    // TOGGLE MENU
    mobileMenuBtn.addEventListener('click', (e) => {
        e.stopPropagation(); // prevent outside click trigger

        if (mobileMenu.classList.contains('max-h-0')) {
            // OPEN
            mobileMenu.classList.remove('max-h-0', 'opacity-0');
            mobileMenu.classList.add('max-h-[500px]', 'opacity-100');
        } else {
            // CLOSE
            closeMobileMenu();
        }
    });

    // CLICK OUTSIDE TO CLOSE
    document.addEventListener('click', (e) => {
        if (!mobileMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
            closeMobileMenu();
        }
    });

    // CLOSE FUNCTION
    function closeMobileMenu() {
        mobileMenu.classList.remove('max-h-[500px]', 'opacity-100');
        mobileMenu.classList.add('max-h-0', 'opacity-0');
    }

    // Modal Controls
    loginBtns.forEach(btn => {
        if(btn) {
            btn.addEventListener('click', () => {
                modal.classList.remove('hidden');
                modal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            });
        }
    });

    if(closeBtn) {
        closeBtn.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        });
    }

    // Close on outside click
    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }
    });
});
</script>
</body>
</html>