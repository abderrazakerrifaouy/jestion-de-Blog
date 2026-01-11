<?php
$article = [
    'id' => $article->getId(),
    'title' => $article->getTitle(),
    'content' => $article->getContent(),
    'categories' => $article->getCategories(),
    'likes' => $article->getLikes(),
    'comments_count' => count($article->getComments())
];
?>

<div class="bg-[#f3e8df] text-[#452829] min-h-screen">

    <main class="max-w-6xl mx-auto px-4 py-12">
        <div class="flex flex-col lg:flex-row gap-8">
            

            <div class="flex-1 space-y-6">
                <a href="/"
                   class="text-xs font-bold text-[#57595b] hover:text-[#452829] flex items-center transition uppercase tracking-widest">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15 19l-7-7 7-7"></path>
                    </svg>
                    Back to My Articles
                </a>

                <div class="bg-white rounded-[2.5rem] p-8 md:p-12 shadow-xl border border-[#e8dfd1]">

                    <div class="flex flex-wrap gap-2 mb-6">
                        <?php foreach ($article['categories'] as $cat): ?>
                            <span
                                class="px-3 py-1 bg-[#f3e8df] text-[#452829] text-[10px] font-black uppercase rounded-full">
                                <?php echo htmlspecialchars($cat->getTitle()); ?>
                            </span>
                        <?php endforeach; ?>
                    </div>

                    <h1 class="text-4xl md:text-5xl font-black text-[#452829] mb-8 leading-tight">
                        <?php echo htmlspecialchars($article['title']); ?>
                    </h1>

                    <div class="prose prose-lg max-w-none">
                        <p class="text-xl leading-relaxed text-gray-700 whitespace-pre-line">
                            <?php echo nl2br(htmlspecialchars($article['content'])); ?>
                        </p>
                    </div>

                </div>
            </div>

            <aside class="w-full lg:w-80 space-y-6">

                <div class="bg-[#452829] rounded-3xl p-6 text-[#f3e8df] shadow-2xl">
                    <h3 class="text-sm font-black uppercase tracking-widest mb-6 border-b border-[#57595b] pb-2">
                        Article Tools
                    </h3>

                    <div class="space-y-3">
                        <button
                            onclick=" window.location.href='/delete-article?id=<?= $article['id'] ?>' "
                            class="flex items-center justify-center w-full border border-red-400/50 text-red-300 hover:bg-red-500 hover:text-white py-3 rounded-xl font-bold transition-all">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24">
                                <path d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862
                                         a2 2 0 01-1.995-1.858L5 7
                                         m5 4v6m4-6v6
                                         M9 4h6m-7 3h8"></path>
                            </svg>
                            Delete Article
                        </button>
                    </div>
                </div>

                <!-- PERFORMANCE -->
                <div class="bg-white rounded-3xl p-6 border border-[#e8dfd1] shadow-sm">
                    <h3 class="text-[10px] font-black uppercase text-[#57595b] tracking-widest mb-4">
                        Performance
                    </h3>

                    <div class="grid grid-cols-2 gap-4">
                        <div class="text-center p-3 bg-[#f3e8df]/50 rounded-2xl">
                            <p class="text-xs font-bold text-gray-500">Likes</p>
                            <p class="text-xl font-black"><?php echo $article['likes']; ?></p>
                        </div>

                        <div class="text-center p-3 bg-[#f3e8df]/50 rounded-2xl">
                            <p class="text-xs font-bold text-gray-500">Comments</p>
                            <p class="text-xl font-black"><?php echo $article['comments_count']; ?></p>
                        </div>
                    </div>

                    
                </div>

            </aside>
        </div>
    </main>
</div>
