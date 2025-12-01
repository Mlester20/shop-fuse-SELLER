<!-- Main Dashboard Content -->
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-900 p-6">

    <h2 class="text-center mt-4 mb-4 text-3xl font-semibold text-white">
        Total Sales
    </h2>

    <!-- Stats Cards Row -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        
        <!-- Card 1 - Total Views -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-6">
            <div class="flex items-start justify-between mb-4">
                <div class="p-4 bg-blue-600 rounded-xl">
                    <i class="fas fa-eye text-white text-2xl"></i>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-white mb-1">$3.456K</h3>
            <p class="text-sm text-gray-400 mb-3">Total Views</p>
            <span class="text-sm text-green-400 font-medium flex items-center gap-1">
                <i class="fas fa-arrow-up"></i> 0.43%
            </span>
        </div>

        <!-- Card 2 - Total Profit -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-6">
            <div class="flex items-start justify-between mb-4">
                <div class="p-4 bg-purple-600 rounded-xl">
                    <i class="fas fa-shopping-cart text-white text-2xl"></i>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-white mb-1">$45.2K</h3>
            <p class="text-sm text-gray-400 mb-3">Total Profit</p>
            <span class="text-sm text-green-400 font-medium flex items-center gap-1">
                <i class="fas fa-arrow-up"></i> 4.35%
            </span>
        </div>

        <!-- Card 3 - Total Product -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-6">
            <div class="flex items-start justify-between mb-4">
                <div class="p-4 bg-green-600 rounded-xl">
                    <i class="fas fa-book text-white text-2xl"></i>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-white mb-1">2.450</h3>
            <p class="text-sm text-gray-400 mb-3">Total Bookings</p>
            <span class="text-sm text-green-400 font-medium flex items-center gap-1">
                <i class="fas fa-arrow-up"></i> 2.59%
            </span>
        </div>

        <!-- Card 4 - Total Users -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-6">
            <div class="flex items-start justify-between mb-4">
                <div class="p-4 bg-orange-600 rounded-xl">
                    <i class="fas fa-users text-white text-2xl"></i>
                </div>
            </div>
            <h3 class="text-3xl font-bold text-white mb-1">3.456</h3>
            <p class="text-sm text-gray-400 mb-3">Total Users</p>
            <span class="text-sm text-green-400 font-medium flex items-center gap-1">
                <i class="fas fa-arrow-up"></i> 0.95%
            </span>
        </div>

    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        <!-- Revenue Chart - Takes 2 columns -->
        <div class="lg:col-span-2 bg-gray-800 rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h3 class="text-xl font-semibold text-white mb-3">Revenue Overview</h3>
                    <div class="flex items-center space-x-4 mb-2">
                        <label class="flex items-center cursor-pointer">
                            <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                            <span class="text-sm text-gray-300">Total Revenue</span>
                        </label>
                        <label class="flex items-center cursor-pointer">
                            <span class="w-3 h-3 bg-purple-500 rounded-full mr-2"></span>
                            <span class="text-sm text-gray-300">Total Sales</span>
                        </label>
                    </div>
                    <p class="text-xs text-gray-500">12.04.2022 - 12.05.2022</p>
                </div>
                <div class="flex space-x-2">
                    <button class="px-4 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-700 transition">Day</button>
                    <button class="px-4 py-2 text-sm rounded-lg text-gray-400 hover:bg-gray-700 transition">Week</button>
                    <button class="px-4 py-2 text-sm rounded-lg bg-blue-600 text-white transition">Month</button>
                </div>
            </div>
            
            <!-- Line Chart with Area Fill -->
            <div class="h-64 relative">
                <!-- SVG Line Chart -->
                <svg class="w-full h-full" viewBox="0 0 600 250" preserveAspectRatio="none">
                    <!-- Grid Lines -->
                    <line x1="0" y1="50" x2="600" y2="50" stroke="#374151" stroke-width="0.5" opacity="0.5"/>
                    <line x1="0" y1="100" x2="600" y2="100" stroke="#374151" stroke-width="0.5" opacity="0.5"/>
                    <line x1="0" y1="150" x2="600" y2="150" stroke="#374151" stroke-width="0.5" opacity="0.5"/>
                    <line x1="0" y1="200" x2="600" y2="200" stroke="#374151" stroke-width="0.5" opacity="0.5"/>
                    
                    <!-- Total Sales Line (Purple) -->
                    <defs>
                        <linearGradient id="salesGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" style="stop-color:rgb(168, 85, 247);stop-opacity:0.4" />
                            <stop offset="100%" style="stop-color:rgb(168, 85, 247);stop-opacity:0.0" />
                        </linearGradient>
                    </defs>
                    <path d="M 0,180 L 50,160 L 100,140 L 150,155 L 200,135 L 250,145 L 300,125 L 350,140 L 400,130 L 450,120 L 500,125 L 550,115 L 600,120 L 600,250 L 0,250 Z" 
                          fill="url(#salesGradient)"/>
                    <path d="M 0,180 L 50,160 L 100,140 L 150,155 L 200,135 L 250,145 L 300,125 L 350,140 L 400,130 L 450,120 L 500,125 L 550,115 L 600,120" 
                          fill="none" stroke="rgb(168, 85, 247)" stroke-width="2.5"/>
                    
                    <!-- Total Revenue Line (Blue) -->
                    <defs>
                        <linearGradient id="revenueGradient" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" style="stop-color:rgb(59, 130, 246);stop-opacity:0.4" />
                            <stop offset="100%" style="stop-color:rgb(59, 130, 246);stop-opacity:0.0" />
                        </linearGradient>
                    </defs>
                    <path d="M 0,200 L 50,185 L 100,170 L 150,180 L 200,165 L 250,175 L 300,160 L 350,170 L 400,155 L 450,145 L 500,150 L 550,140 L 600,145 L 600,250 L 0,250 Z" 
                          fill="url(#revenueGradient)"/>
                    <path d="M 0,200 L 50,185 L 100,170 L 150,180 L 200,165 L 250,175 L 300,160 L 350,170 L 400,155 L 450,145 L 500,150 L 550,140 L 600,145" 
                          fill="none" stroke="rgb(59, 130, 246)" stroke-width="2.5"/>
                </svg>
            </div>
            <div class="flex justify-around mt-4 text-xs text-gray-500">
                <span>Sep</span>
                <span>Oct</span>
                <span>Nov</span>
                <span>Dec</span>
                <span>Jan</span>
                <span>Feb</span>
                <span>Mar</span>
                <span>Apr</span>
                <span>May</span>
                <span>Jun</span>
                <span>Jul</span>
                <span>Aug</span>
            </div>
        </div>

        <!-- Profit This Week - Takes 1 column -->
        <div class="bg-gray-800 rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-xl font-semibold text-white">Profit this week</h3>
                <select class="text-sm bg-gray-700 border border-gray-600 rounded-lg px-3 py-2 text-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option>This Week</option>
                    <option>Last Week</option>
                    <option>This Month</option>
                </select>
            </div>
            
            <div class="mb-6">
                <div class="flex items-center space-x-4 text-sm">
                    <label class="flex items-center cursor-pointer">
                        <span class="w-3 h-3 bg-blue-500 rounded-full mr-2"></span>
                        <span class="text-gray-300">Sales</span>
                    </label>
                    <label class="flex items-center cursor-pointer">
                        <span class="w-3 h-3 bg-purple-500 rounded-full mr-2"></span>
                        <span class="text-gray-300">Revenue</span>
                    </label>
                </div>
            </div>

            <!-- Bar Chart -->
            <div class="h-64 flex items-end justify-around gap-2">
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full flex flex-col items-center">
                        <div class="w-full bg-purple-500 rounded-t-lg" style="height: 80px;"></div>
                        <div class="w-full bg-blue-500 rounded-t-lg" style="height: 130px;"></div>
                    </div>
                    <span class="text-xs text-gray-500 mt-3">M</span>
                </div>
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full flex flex-col items-center">
                        <div class="w-full bg-purple-500 rounded-t-lg" style="height: 60px;"></div>
                        <div class="w-full bg-blue-500 rounded-t-lg" style="height: 95px;"></div>
                    </div>
                    <span class="text-xs text-gray-500 mt-3">T</span>
                </div>
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full flex flex-col items-center">
                        <div class="w-full bg-purple-500 rounded-t-lg" style="height: 90px;"></div>
                        <div class="w-full bg-blue-500 rounded-t-lg" style="height: 115px;"></div>
                    </div>
                    <span class="text-xs text-gray-500 mt-3">W</span>
                </div>
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full flex flex-col items-center">
                        <div class="w-full bg-purple-500 rounded-t-lg" style="height: 110px;"></div>
                        <div class="w-full bg-blue-500 rounded-t-lg" style="height: 145px;"></div>
                    </div>
                    <span class="text-xs text-gray-500 mt-3">T</span>
                </div>
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full flex flex-col items-center">
                        <div class="w-full bg-purple-500 rounded-t-lg" style="height: 70px;"></div>
                        <div class="w-full bg-blue-500 rounded-t-lg" style="height: 125px;"></div>
                    </div>
                    <span class="text-xs text-gray-500 mt-3">F</span>
                </div>
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full flex flex-col items-center">
                        <div class="w-full bg-purple-500 rounded-t-lg" style="height: 95px;"></div>
                        <div class="w-full bg-blue-500 rounded-t-lg" style="height: 165px;"></div>
                    </div>
                    <span class="text-xs text-gray-500 mt-3">S</span>
                </div>
                <div class="flex flex-col items-center flex-1">
                    <div class="w-full flex flex-col items-center">
                        <div class="w-full bg-purple-500 rounded-t-lg" style="height: 105px;"></div>
                        <div class="w-full bg-blue-500 rounded-t-lg" style="height: 180px;"></div>
                    </div>
                    <span class="text-xs text-gray-500 mt-3">S</span>
                </div>
            </div>
        </div>

    </div>

</main>