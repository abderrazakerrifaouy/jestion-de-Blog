<div class="bg-[#f3e8df] text-[#452829] min-h-screen">


    <main class="max-w-7xl mx-auto px-4 py-8">
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
            <div>
                <h1 class="text-3xl font-black tracking-tighter">Author <span class="text-[#57595b]">Studio</span></h1>
                <p class="text-sm text-[#57595b] font-medium">Manage your stories and engage with your readers.</p>
            </div>
            
            <a href="/create-article" class="inline-flex items-center justify-center space-x-2 bg-[#452829] text-[#f3e8df] px-6 py-3 rounded-2xl font-bold hover:bg-[#57595b] transition-all shadow-xl group">
                <svg class="w-5 h-5 transition-transform group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                <span>Creat Articl</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            <div class="bg-white p-6 rounded-[2rem] border border-[#e8dfd1] shadow-sm">
                <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Total Articles</p>
                <p class="text-3xl font-black"><?= $countArticles ?></p>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-[#e8dfd1] shadow-sm">
                <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Total Likes</p>
                <p class="text-3xl font-black text-[#d1c5f3]"><?= $countLikes ?></p>
            </div>
            <div class="bg-white p-6 rounded-[2rem] border border-[#e8dfd1] shadow-sm">
                <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Comments Received</p>
                <p class="text-3xl font-black"><?= $countComments ?></p>
            </div>
        </div>

        <div class="space-y-6">
            <div class="flex items-center justify-between border-b border-[#e8dfd1] pb-4">
                <h2 class="font-black text-lg uppercase tracking-tight">Mes Articles</h2>
            </div>

            <div class="grid grid-cols-1 gap-4">
                <?php foreach ($articles as $article): ?>
                <div class="bg-white p-6 rounded-3xl border border-[#e8dfd1] flex flex-col md:flex-row items-center justify-between gap-4 hover:shadow-md transition" onclick="window.location.href='/afiche-article?id=<?= $article->getId() ?>'">
                    <div class="flex items-center space-x-6">
                        <div class="w-16 h-16 bg-[#f3e8df] rounded-2xl flex items-center justify-center text-[#452829]">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l5 5v11a2 2 0 01-2 2z"></path><path d="M14 4v5h5"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-lg leading-tight"><?= $article->getTitle() ?></h3>
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <div class="flex space-x-4 mr-6 text-gray-400">
                            <span class="flex items-center text-xs"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z"></path></svg> <?= $article->getLikes() ?></span>
                            <span class="flex items-center text-xs"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7z"></path></svg> <?= count($article->getComments()) ?></span>
                        </div>
                        <a href="/delete-article?id=<?= $article->getId() ?>" class="p-2 text-[#57595b] hover:bg-[#f3e8df] rounded-xl transition">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-4v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>

</div>