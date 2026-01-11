

<div class="bg-[#f3e8df] text-[#452829] min-h-screen pb-12">



    <main class="max-w-7xl mx-auto px-6 py-12">

        <div class="mb-12">
            <h1 class="text-4xl font-black tracking-tighter uppercase mb-2">Explorer</h1>
            <p class="text-[#57595b] font-medium italic">Découvrez nos derniers articles rédigés par la communauté.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <?php foreach ($articles as $art): ?>
                <div class="bg-white rounded-[2.5rem] border border-[#e8dfd1] p-8 flex flex-col justify-between hover:shadow-2xl hover:border-[#d1c5f3] transition-all duration-300 group">

                    <div>
                        <div class="flex justify-between items-center mb-6">
                            <div class="flex gap-2">
                                <?php for ($i = 0; $i < min(2, count($art->getCategories())); $i++): ?>
                                    <span class="px-3 py-1 bg-[#f3e8df] text-[#452829] text-[10px] font-black uppercase rounded-lg">
                                        <?= $art->getCategories()[$i]->getTitle(); ?>
                                    </span>
                                <?php endfor; ?>

                                <?php if (count($art->getCategories()) > 2): ?>
                                    <span class="px-3 py-1 bg-[#e8dfd1] text-[#452829] text-[10px] font-black uppercase rounded-lg">
                                        ...
                                    </span>
                                <?php endif; ?>
                            </div>
                            <span class="text-[10px] font-bold text-gray-400">ID #<?php echo $art->getId(); ?></span>
                        </div>

                        <h2 class="text-2xl font-black leading-tight mb-4 group-hover:text-[#57595b] transition-colors">
                            <?php echo $art->getTitle(); ?>
                        </h2>

                        <p class="text-gray-500 text-sm leading-relaxed line-clamp-3 mb-8">
                            <?php echo substr($art->getContent(), 0, 120) . '...'; ?>
                        </p>
                    </div>

                    <div class="pt-6 border-t border-[#f3e8df] flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 rounded-xl bg-[#452829] flex items-center justify-center text-[#f3e8df] font-black">
                                <?php echo strtoupper(substr($art->getNameAuthor(), 0, 1)); ?>
                            </div>
                            <div>
                                <p class="text-[10px] font-black text-gray-400 uppercase tracking-tighter">Auteur</p>
                                <p class="text-xs font-bold"><?php echo $art->getNameAuthor(); ?></p>
                            </div>
                        </div>

                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4 text-red-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                </svg>
                                <span class="text-xs font-black"><?php echo $art->getLikes(); ?></span>
                            </div>
                            <a href="lire_article?id=<?php echo $art->getId(); ?>" class="bg-[#452829] p-2 rounded-xl text-[#f3e8df] hover:bg-[#d1c5f3] hover:text-[#452829] transition-all">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </main>

</div>

