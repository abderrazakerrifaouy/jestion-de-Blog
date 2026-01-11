

<div class="bg-[#f3e8df] text-[#452829] min-h-screen">

    <main class="max-w-5xl mx-auto px-4 py-12">
        <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-6">
            <div>
                <h1 class="text-4xl font-black tracking-tighter uppercase">Categories</h1>
                <p class="text-[#57595b] font-medium mt-1">Organize and manage article topics.</p>
            </div>

            <form action="/categorie" method="POST" class="flex items-center bg-white p-2 rounded-2xl shadow-lg border border-[#e8dfd1] w-full md:w-auto">
                <input type="text" name="title" placeholder="New Category Title..." required 
                    class="bg-transparent border-none focus:ring-0 px-4 py-2 text-sm w-full md:w-64">
                <button type="submit" name="add_category" 
                    class="bg-[#452829] text-[#f3e8df] px-6 py-2 rounded-xl font-bold text-sm hover:bg-[#57595b] transition whitespace-nowrap border-none">
                    Add Topic
                </button>
            </form>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <?php foreach($categories as $cat): ?>
            <div class="bg-white p-6 rounded-[2rem] border border-[#e8dfd1] shadow-sm flex items-center justify-between group hover:border-[#d1c5f3] transition-all">
                <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 rounded-xl bg-[#f3e8df] flex items-center justify-center text-[#452829] font-black">
                        <?php echo $cat->getTitle()[0]; ?>
                    </div>
                    <span class="font-bold text-lg"><?php echo $cat->getTitle(); ?></span>
                </div>

                <div class="flex items-center space-x-2">
                    <form action="/process_category" method="POST" onsubmit="return confirm('Clear this category?');">
                        <input type="hidden" name="id" value="<?php echo $cat->getId(); ?>">
                        <button type="submit" name="delete_category" class="p-2 text-red-300 hover:text-red-600 transition" title="Clear Category">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </button>
                    </form>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        
    </main>

</div>