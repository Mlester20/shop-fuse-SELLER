<header class="fixed top-0 left-0 right-0 z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-xl border-b border-gray-200/50 dark:border-gray-700/50 shadow-sm">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            
            <!-- Logo & Brand -->
            <div class="flex items-center">
                <a href="dashboard.php" class="flex items-center group">
                    <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-500 rounded-lg flex items-center justify-center transform group-hover:scale-110 transition-transform duration-200 shadow-lg">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <span class="ml-3 text-xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                        Shop Fuse
                    </span>
                </a>
            </div>

            <!-- Desktop Navigation Links -->
                <div class="hidden md:flex items-center space-x-1">
                    <a href="dashboard.php" class="flex items-center space-x-1 px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-colors duration-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                        <span>Home</span>
                    </a>
                    <div class="relative group">
                        <button class="flex items-center space-x-1 px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-colors duration-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                            <span>Products</span>
                            <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-0 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="products.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-700 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-all duration-200 rounded-t-lg">
                                Add Products
                            </a>
                            <a href="productLists.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-700 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-all duration-200">
                                My Products
                            </a>
                        </div>
                    </div>
                    <div class="relative group">
                        <button class="flex items-center space-x-1 px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-colors duration-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                            <span>Order Products</span>
                            <svg class="w-4 h-4 transform group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-0 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="#" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-700 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-all duration-200 rounded-t-lg">
                                Process Orders
                            </a>
                            <a href="orders.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-700 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-all duration-200 rounded-t-lg">
                                Orders
                            </a>
                            <a href="#" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-700 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-all duration-200">
                                Order History
                            </a>
                            <a href="#" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-700 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-all duration-200 rounded-b-lg">
                                Returns
                            </a>
                        </div>
                    </div>
                </div>

            <!-- Right Side Actions -->
            <div class="flex items-center space-x-4">
                
                <!-- User Profile Dropdown (Only when logged in) -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 px-4 py-2 text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-colors duration-200 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800">
                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-500 rounded-full flex items-center justify-center">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <span><?php echo htmlspecialchars($_SESSION['name']); ?></span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-0 w-48 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <a href="/public/settings.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-700 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-all duration-200 rounded-t-lg">
                                Settings
                            </a>
                            <button 
                                onclick="toggleDarkMode()"
                                class="w-full text-left px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-700 hover:text-purple-600 dark:hover:text-purple-400 font-medium transition-all duration-200 flex items-center justify-between"
                            >
                                <span>Dark Mode</span>
                                <svg id="theme-toggle-indicator" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                                </svg>
                            </button>
                            <button 
                                onclick="logout()"
                                class="w-full text-left px-4 py-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 font-medium transition-all duration-200 rounded-b-lg"
                            >
                                Logout
                            </button>
                        </div>
                    </div>
                <!-- Mobile Menu Button -->
                <button 
                    onclick="toggleMobileMenu()"
                    class="md:hidden p-2 text-gray-600 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-all duration-200"
                    aria-label="Toggle menu"
                >
                    <svg id="menu-open-icon" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="menu-close-icon" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 dark:border-gray-700">
        <div class="px-4 pt-4 pb-6 space-y-3 bg-white/95 dark:bg-gray-900/95 backdrop-blur-xl">
            
            <?php if ($isLoggedIn): ?>
                <!-- Mobile Navigation Links -->
                <a href="/" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200">
                    Home
                </a>
                <a href="/features.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200">
                    Features
                </a>
                <a href="/pricing.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200">
                    Pricing
                </a>
                <a href="/about.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200">
                    About
                </a>
                <a href="/contact.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200">
                    Contact
                </a>

                <!-- Mobile Profile Section -->
                <div class="pt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
                    <a href="/public/settings.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200">
                        Settings
                    </a>
                    <button 
                        onclick="toggleDarkMode()"
                        class="w-full text-left px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200"
                    >
                        Dark Mode
                    </button>
                    <button 
                        onclick="logout()"
                        class="w-full text-left px-4 py-3 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg font-medium transition-all duration-200"
                    >
                        Logout
                    </button>
                </div>
            <?php else: ?>
                <!-- Mobile Navigation Links -->
                <a href="/" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200">
                    Home
                </a>
                <a href="/features.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200">
                    Features
                </a>
                <a href="/pricing.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200">
                    Pricing
                </a>
                <a href="/about.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200">
                    About
                </a>
                <a href="/contact.php" class="block px-4 py-3 text-gray-700 dark:text-gray-300 hover:bg-purple-50 dark:hover:bg-gray-800 hover:text-purple-600 dark:hover:text-purple-400 rounded-lg font-medium transition-all duration-200">
                    Contact
                </a>

                <!-- Mobile Auth Buttons -->
                <div class="pt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
                    <a 
                        href="/login.php" 
                        class="block px-4 py-3 text-center text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 rounded-lg font-medium transition-all duration-200"
                    >
                        Sign In
                    </a>
                    <a 
                        href="/register.php" 
                        class="block px-4 py-3 text-center bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white font-semibold rounded-lg shadow-lg transition-all duration-200"
                    >
                        Get Started
                    </a>
                </div>
            <?php endif; ?>

        </div>
    </div>

</header>

<!-- Spacer to prevent content from going under fixed navbar -->
<div class="h-16"></div>

<script>
    // Toggle Mobile Menu
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpenIcon = document.getElementById('menu-open-icon');
        const menuCloseIcon = document.getElementById('menu-close-icon');
        
        mobileMenu.classList.toggle('hidden');
        menuOpenIcon.classList.toggle('hidden');
        menuCloseIcon.classList.toggle('hidden');
    }

    // Dark Mode Toggle
    function toggleDarkMode() {
        const html = document.documentElement;
        const themeIndicator = document.getElementById('theme-toggle-indicator');
        
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
            if (themeIndicator) {
                themeIndicator.classList.add('hidden');
            }
        } else {
            html.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
            if (themeIndicator) {
                themeIndicator.classList.remove('hidden');
            }
        }
    }

    // Logout Function
    function logout() {
        if (confirm('Are you sure you want to logout?')) {
            window.location.href = '/controllers/logout.php';
        }
    }

    // Initialize Dark Mode on Page Load
    (function() {
        const themeIndicator = document.getElementById('theme-toggle-indicator');
        
        if (localStorage.getItem('color-theme') === 'dark' || 
            (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            if (themeIndicator) {
                themeIndicator.classList.remove('hidden');
            }
        } else {
            if (themeIndicator) {
                themeIndicator.classList.add('hidden');
            }
        }
    })();

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const mobileMenu = document.getElementById('mobile-menu');
        const menuButton = event.target.closest('button[onclick="toggleMobileMenu()"]');
        
        if (!menuButton && !mobileMenu.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
            toggleMobileMenu();
        }
    });
</script>