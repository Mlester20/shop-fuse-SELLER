<header class="fixed top-0 left-0 right-0 z-50 backdrop-blur-md bg-gradient-to-r from-purple-500/10 via-blue-500/10 to-pink-500/10 border-b border-white/10 shadow-lg">
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo/Brand -->
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <span class="text-xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                    <?php echo isset($_ENV['APP_NAME']) ? $_ENV['APP_NAME'] : 'Sellers'; ?>
                </span>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-8">
                <!-- <a href="#home" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors duration-200 font-medium text-sm">
                    Home
                </a> -->
                <a href="#features" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors duration-200 font-medium text-sm">
                    Features
                </a>
                <a href="#about" class="text-gray-700 dark:text-gray-300 hover:text-purple-600 dark:hover:text-purple-400 transition-colors duration-200 font-medium text-sm">
                    About
                </a>
            </div>

            <!-- Mobile Menu Button (Optional) -->
            <div class="md:hidden">
                <button class="p-2 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-white/10 transition-colors duration-200" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>
</header>
