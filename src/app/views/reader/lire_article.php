<div class="bg-[#f3e8df] text-[#452829] min-h-screen font-sans selection:bg-[#d1c5f3]">

    <main class="max-w-3xl mx-auto px-6 py-20">

        <header class="mb-16">
            <div class="flex gap-2 mb-6">
                <?php foreach ($article->getCategories() as $cat): ?>
                    <span class="text-[10px] font-black uppercase tracking-[0.2em] text-[#57595b] px-3 py-1 bg-white rounded-full border border-[#e8dfd1]">
                        <?php echo $cat->getTitle(); ?>
                    </span>
                <?php endforeach; ?>
            </div>

            <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight leading-tight mb-8">
                <?php echo $article->getTitle(); ?>
            </h1>

            <div class="flex items-center gap-4 py-8 border-y border-[#e8dfd1]">
                <div class="w-12 h-12 rounded-2xl bg-[#452829] flex items-center justify-center text-white font-bold text-lg">
                    <?php echo substr($article->getNameAuthor(), 0, 1); ?>
                </div>
                <div>
                    <p class="text-sm font-bold"><?php echo $article->getNameAuthor(); ?></p>
                </div>
                <div class="ml-auto">
                    <?php if ($article->isLikedByCurrentUser()): ?>
                        <form action="Dislike_article" method="POST" class="flex items-center gap-2">
                            <input type="hidden" value="<?php echo $article->getId(); ?>" class="hidden" name="idArticle">
                            <button class="p-3 rounded-full bg-red-50">
                                <svg class="w-7 h-7 text-red-600 fill-red-600"
                                    viewBox="0 0 24 24">
                                    <path d="M12 21s-6.716-4.35-9.33-7.053C.478 11.745.5 8.5 3 6.5
                 5.1 4.8 8.1 5.3 12 9
                 15.9 5.3 18.9 4.8 21 6.5
                 23.5 8.5 23.522 11.745 21.33 13.947
                 18.716 16.65 12 21z" />
                                </svg>
                            </button>

                            <span class="text-lg font-bold"><?php echo $article->getLikes(); ?></span>
                        </form>
                    <?php else: ?>
                        <form action="like_article" method="POST" class="flex items-center gap-2">
                            <input type="hidden" value="<?php echo $article->getId(); ?>" class="hidden" name="idArticle">
                            <button class="p-3 rounded-full hover:bg-gray-100 transition-colors group">
                                <svg class="w-7 h-7 text-gray-400 group-hover:fill-current" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                </svg>
                            </button>
                            <span class="text-lg font-bold"><?php echo $article->getLikes(); ?></span>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </header>

        <article class="mb-20">
            <p class="text-xl leading-[1.9] text-[#452829]/90 font-light whitespace-pre-line">
                <?php echo $article->getContent(); ?>
            </p>
        </article>

        <section id="comments" class="pt-20 border-t border-[#e8dfd1]">
            <h3 class="text-2xl font-bold mb-10 flex items-center gap-3">
                Discussion <span class="text-sm font-medium text-[#57595b] opacity-50"><?php echo count($article->getComments()); ?> avis</span>
            </h3>

            <form action="/createComent" method="POST" class="mb-16">
                <textarea name="content" required class="w-full bg-white rounded-[2rem] p-8 border border-[#e8dfd1] focus:ring-4 focus:ring-[#d1c5f3]/20 focus:border-[#d1c5f3] outline-none transition-all placeholder:text-gray-300 min-h-[150px] text-lg" placeholder="Ajouter au mur..."></textarea>
                <input type="hidden" name="article_id" value="<?php echo $article->getId(); ?>">
                <div class="mt-4 flex justify-end">
                    <button class="bg-[#452829] text-white px-10 py-4 rounded-full text-sm font-bold hover:bg-[#57595b] transition-all shadow-xl shadow-[#452829]/10 active:scale-95">
                        Publier le message
                    </button>
                </div>
            </form>

            <div class="space-y-6">
                <?php foreach ($article->getComments() as $cmt): ?>
                    <div class="bg-white p-8 rounded-[2.5rem] shadow-sm border border-[#e8dfd1]/30 hover:shadow-xl hover:shadow-[#452829]/5 transition-all duration-300 group">
                        <div class="flex justify-between items-start mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-[#f3e8df] flex items-center justify-center text-[10px] font-black text-[#452829]">
                                    <?php echo substr($cmt->getNameReader(), 0, 1); ?>
                                </div>
                                <div>
                                    <span class="text-xs font-black uppercase tracking-widest block"><?php echo $cmt->getNameReader(); ?></span>
                                </div>
                            </div>

                            <form action="/raporeComment" method="POST" onsubmit="return confirm('Signaler ce commentaire ?');">
                                <input type="hidden" name="idComment" value="<?php echo $cmt->getId(); ?>">
                                <button type="submit" class="p-2 text-gray-200 hover:text-orange-400 transition-colors">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>

                        <p class="text-[#452829]/80 text-lg leading-relaxed mb-8 italic">
                            <?php echo $cmt->getContent(); ?>
                        </p>

                        <div class="flex items-center gap-4">
                            <?php if ($cmt->isLikedByCurrentUser()): ?>
                            <form action="/dislikeComment" method="POST">
                                <input type="hidden" name="idComment" value="<?php echo $cmt->getId(); ?>">
                                <input type="hidden" name="article_id" value="<?php echo $article->getId(); ?>">
                                <button class="flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 hover:bg-red-200 transition-colors group/dislike">
                                    <svg class="w-4 h-4 text-red-600 fill-red-600"
                                        viewBox="0 0 24 24">
                                        <path d="M12 21s-6.716-4.35-9.33-7.053C.478 11.745.5 8.5 3 6.5
                    5.1 4.8 8.1 5.3 12 9
                    15.9 5.3 18.9 4.8 21 6.5
                    23.5 8.5 23.522 11.745 21.33 13.947
                    18.716 16.65 12 21z" />
                                    </svg>
                                    <span class="text-xs font-black"><?php echo $cmt->getLikses(); ?></span>
                                </button>
                            </form>
                            <?php else: ?>
                            <form action="/likeComment" method="POST">
                                <input type="hidden" name="idComment" value="<?php echo $cmt->getId(); ?>">
                                <input type="hidden" name="article_id" value="<?php echo $article->getId(); ?>">
                                <button class="flex items-center gap-2 px-4 py-2 rounded-full bg-[#f3e8df]/50 hover:bg-red-50 transition-colors group/like">
                                    <svg class="w-4 h-4 text-red-400 group-hover/like:fill-current" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    <span class="text-xs font-black"><?php echo $cmt->getLikses(); ?></span>
                                </button>
                            </form>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </section>

    </main>

</div>