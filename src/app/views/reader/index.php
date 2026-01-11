<?php
use App\Models\Article;

?>

<div class="bg-[#f3e8df] text-[#452829] font-sans selection:bg-[#d1c5f3]">

    <header class="max-w-7xl mx-auto px-6 py-24 text-center">
        <h1 class="text-6xl md:text-8xl font-extrabold tracking-tighter leading-none mb-8">
            LE POUVOIR DES <br> <span class="text-[#d1c5f3] italic">MOTS BRUTS.</span>
        </h1>
        <p class="max-w-xl mx-auto text-[#57595b] text-lg font-light leading-relaxed">
            Une plateforme de lecture pure. Pas de distractions, pas d'images superflues. Juste du contenu de haute qualité écrit par des experts.
        </p>
    </header>

    <section class="max-w-7xl mx-auto px-6 mb-16">
        <div class="bg-white rounded-[2.5rem] p-4 shadow-sm border border-[#e8dfd1] flex flex-col md:flex-row gap-4 items-center">
            <input type="text" placeholder="Rechercher un sujet..." class="flex-1 bg-transparent border-none focus:ring-0 px-6 font-medium">
            <div class="flex gap-2">
                <button class="bg-[#452829] text-white p-3 rounded-full">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </button>
            </div>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-6 pb-24">
        <div class="flex items-center justify-between mb-12">
            <h2 class="text-2xl font-bold italic underline decoration-[#d1c5f3] decoration-4">Dernières Publications</h2>
            <span class="text-xs font-black uppercase tracking-widest opacity-40">2026 Edition</span>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <?php foreach($articles as $art): ?>
                <a href="/lire_article?id=<?php echo $art->getId(); ?>" class="group">
                    <div class="bg-white p-10 rounded-[3rem] border border-[#e8dfd1]/50 h-full flex flex-col justify-between shadow-sm group-hover:shadow-2xl group-hover:shadow-[#452829]/5 group-hover:-translate-y-2 transition-all duration-500">
                        <div>
                            <div class="flex justify-between items-start mb-8">
                                <span class="px-4 py-1.5 bg-[#f3e8df] text-[#452829] text-[10px] font-black uppercase rounded-full tracking-widest">
                                    <?php echo $art->getCategories()[0]->getTitle() ?? 'Général'; ?>
                                </span>
                                <div class="flex items-center gap-1 text-[#452829]/30">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
                                    <span class="text-xs font-bold"><?php echo $art->getLikes(); ?></span>
                                </div>
                            </div>

                            <h3 class="text-2xl font-extrabold leading-tight mb-4 group-hover:text-[#57595b] transition-colors">
                                <?php echo $art->getTitle(); ?>
                            </h3>
                            
                            <p class="text-[#57595b] font-light leading-relaxed line-clamp-3 mb-8">
                                <?php echo $art->getContent(); ?>
                            </p>
                        </div>

                        <div class="flex items-center gap-3 pt-6 border-t border-[#f3e8df]">
                            <div class="w-8 h-8 rounded-full bg-[#452829] flex items-center justify-center text-white text-[10px] font-bold">
                                <?php echo substr($art->getNameAuthor(), 0, 1); ?>
                            </div>
                            <span class="text-xs font-bold"><?php echo $art->getNameAuthor(); ?></span>
                            <span class="ml-auto text-[10px] font-black uppercase text-[#d1c5f3]">Lire l'article</span>
                        </div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </main>

    <footer class="bg-[#452829] text-[#f3e8df] py-16">
        <div class="max-w-7xl mx-auto px-6 flex flex-col md:flex-row justify-between items-center gap-8">
            <span class="text-3xl font-black uppercase italic tracking-tighter">Articl<span class="text-[#d1c5f3]">Hub.</span></span>
            <p class="text-sm opacity-50">© 2026 ArticlHub Studio. Tous droits réservés.</p>
            <div class="flex gap-6">
                <a href="#" class="text-xs font-bold uppercase tracking-widest hover:text-[#d1c5f3]">Twitter</a>
                <a href="#" class="text-xs font-bold uppercase tracking-widest hover:text-[#d1c5f3]">LinkedIn</a>
            </div>
        </div>
    </footer>

</div>