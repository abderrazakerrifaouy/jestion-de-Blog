<?php
// Role must be 'author' or 'admin' to access this page
$userRole = 'author';

// Database simulation: Fetching categories from 'categories' table
// SQL: SELECT * FROM categories;

?>



<div class="bg-[#f3e8df] text-[#452829] min-h-screen">

    <main class="max-w-4xl mx-auto px-4 py-12">
        <div class="mb-8">
            <a href="author_dashboard.php" class="text-xs font-bold text-[#57595b] hover:text-[#452829] uppercase tracking-widest flex items-center mb-4 transition">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Back to Studio
            </a>
            <h1 class="text-4xl font-black tracking-tighter">Creat New <span class="text-[#d1c5f3]">Articl</span></h1>
        </div>

        <form action="/create-article" method="POST" class="space-y-8">

            <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-[#e8dfd1]">
                <label class="block text-sm font-black uppercase tracking-widest mb-4">Select Categories</label>
                <div class="flex flex-wrap gap-3">
                    <?php foreach ($categories as $cat): ?>
                        <label class="cursor-pointer group">
                            <input type="checkbox" name="categories[]" value="<?php echo $cat->getId(); ?>" class="hidden peer">
                            <span class="px-5 py-2 rounded-full border-2 border-[#f3e8df] text-sm font-bold block transition-all peer-checked:bg-[#452829] peer-checked:text-[#f3e8df] peer-checked:border-[#452829] group-hover:border-[#d1c5f3]">
                                <?php echo $cat->getTitle(); ?>
                            </span>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="bg-white rounded-[2.5rem] shadow-xl border border-[#e8dfd1] overflow-hidden">

                <div class="bg-[#f3e8df]/50 px-8 py-3 border-b border-[#e8dfd1] flex items-center space-x-4">
                    <div class="flex space-x-2">
                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                    </div>
                    <span class="text-[10px] font-bold text-[#57595b] uppercase tracking-widest">
                        Editor Mode
                    </span>
                </div>

                <!-- Content -->
                <div class="p-8 space-y-6">

                    <!-- Title -->
                    <input
                        type="text"
                        name="title"
                        required
                        placeholder="Article title..."
                        class="w-full bg-transparent border-none focus:outline-none text-4xl font-black placeholder-gray-300 tracking-tight" />

                    <!-- Divider -->
                    <div class="w-16 h-[2px] bg-[#e8dfd1]"></div>

                    <!-- Textarea -->
                    <textarea
                        name="content"
                        required
                        rows="15"
                        class="w-full bg-transparent border-none focus:outline-none focus:ring-0 text-lg leading-relaxed placeholder-gray-300 resize-none"
                        placeholder="Once upon a time... Write your story here.">
        </textarea>

                </div>

                <!-- Footer -->
                <div class="bg-[#f3e8df]/30 px-8 py-6 border-t border-[#e8dfd1] flex justify-end items-center space-x-4">
                    <button type="button" class="text-sm font-bold text-[#57595b] hover:underline">
                        Save as Draft
                    </button>

                    <button type="submit"
                        class="bg-[#452829] text-[#f3e8df] px-10 py-3 rounded-2xl font-black shadow-lg hover:bg-[#57595b] transition-all active:scale-95 uppercase tracking-widest text-sm">
                        Publish Article
                    </button>
                </div>

            </div>
        </form>
    </main>

</div>

</html>