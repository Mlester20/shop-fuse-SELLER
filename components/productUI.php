<!-- Product Form (Inline) -->
<div class="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl max-w-2xl w-full p-6 mx-auto mt-8">

    <!-- Form Header -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Product</h2>
        <p class="text-gray-500 dark:text-gray-400 text-sm mt-1">Fill in the product details below</p>
    </div>

    <!-- Form -->
    <form id="productFormInline" class="space-y-5" action="../controllers/productController.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" id="productIdInline" name="product_id">

        <!-- Product Name -->
        <div>
            <label for="productNameInline" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Product Name <span class="text-red-500">*</span>
            </label>
            <input 
                type="text" 
                id="productNameInline" 
                name="product_name"
                placeholder="Enter product name"
                required
                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
            >
        </div>

        <!-- Description -->
        <div>
            <label for="descriptionInline" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Description <span class="text-red-500">*</span>
            </label>
            <textarea 
                id="descriptionInline" 
                name="description"
                placeholder="Enter product description"
                rows="3"
                required
                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:text-white resize-none transition-all duration-200"
            ></textarea>
        </div>

        <!-- Price & Stock Row -->
        <div class="grid grid-cols-2 gap-4">
            <!-- Price -->
            <div>
                <label for="priceInline" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Price <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-3 text-gray-500 dark:text-gray-400 font-semibold">$</span>
                    <input 
                        type="number" 
                        id="priceInline" 
                        name="price"
                        placeholder="0.00"
                        step="0.01"
                        min="0"
                        required
                        class="w-full pl-8 pr-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                    >
                </div>
            </div>

            <!-- Stock -->
            <div>
                <label for="stockInline" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    Stock <span class="text-red-500">*</span>
                </label>
                <input 
                    type="number" 
                    id="stockInline" 
                    name="stock"
                    placeholder="0"
                    min="0"
                    required
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                >
            </div>
        </div>

        <!-- Category -->
        <div>
            <label for="categoryInline" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Category <span class="text-red-500">*</span>
            </label>
            <select 
                id="categoryInline" 
                name="category"
                required
                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
            >
                <option value="">Select a category</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="home">Home & Garden</option>
                <option value="sports">Sports & Outdoors</option>
                <option value="books">Books & Media</option>
                <option value="toys">Toys & Games</option>
                <option value="beauty">Beauty & Personal Care</option>
                <option value="food">Food & Beverages</option>
                <option value="other">Other</option>
            </select>
        </div>

        <!-- Image Upload -->
        <div>
            <label for="imageInline" class="block text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">
                Product Image
            </label>
            <div class="border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6 text-center cursor-pointer hover:border-purple-500 hover:bg-purple-50 dark:hover:bg-gray-700/50 transition-all duration-200" onclick="document.getElementById('imageInline').click()">
                <svg id="uploadIconInline" class="w-12 h-12 mx-auto text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <p id="uploadTextInline" class="text-gray-600 dark:text-gray-400 font-medium">Click to upload or drag and drop</p>
                <p class="text-gray-500 dark:text-gray-500 text-sm">PNG, JPG, GIF up to 10MB</p>
                <input 
                    type="file" 
                    id="imageInline" 
                    name="image"
                    accept="image/*"
                    class="hidden"
                    onchange="handleImageUploadInline(event)"
                >
            </div>
            <!-- Image Preview -->
            <div id="imagePreviewInline" class="mt-4 hidden">
                <div class="relative inline-block">
                    <img id="previewImageInline" src="" alt="Preview" class="max-h-40 rounded-lg border border-gray-300 dark:border-gray-600">
                    <button 
                        type="button"
                        onclick="removeImageInline()"
                        class="absolute top-2 right-2 bg-red-500 hover:bg-red-600 text-white rounded-full p-1 transition-colors"
                    >
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Submit -->
        <div class="flex justify-end mt-4">
            <button 
                type="button"
                onclick="submitProductFormInline()"
                class="px-6 py-2.5 bg-gradient-to-r from-purple-600 to-pink-600 hover:from-purple-700 hover:to-pink-700 text-white rounded-lg font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200"
            >
                Save Product
            </button>
        </div>

    </form>
</div>

<script>
    // Handle Image Upload Inline
    function handleImageUploadInline(event) {
        const file = event.target.files[0];
        if (file) {
            if (!file.type.startsWith('image/')) return alert('Please select a valid image file');
            if (file.size > 10 * 1024 * 1024) return alert('File size must be less than 10MB');
            
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImageInline').src = e.target.result;
                document.getElementById('imagePreviewInline').classList.remove('hidden');
            };
            reader.readAsDataURL(file);
        }
    }

    function removeImageInline() {
        document.getElementById('imageInline').value = '';
        document.getElementById('imagePreviewInline').classList.add('hidden');
    }

    // Submit the product form (called by Save Product button)
    function submitProductFormInline() {
        const form = document.getElementById('productFormInline');
        if (!form) return alert('Form not found');

        // Optionally perform client-side checks here
        form.submit();
    }

</script>