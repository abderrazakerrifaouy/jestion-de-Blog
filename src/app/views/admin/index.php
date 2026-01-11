<?php



$stats = [
    'users' => $users,   
    'articles' => $articles,    
    'categories' => $categories,    
    'comments' => $comments 
];
?>
<div class="bg-[#f3e8df] text-[#452829] min-h-screen flex flex-col">
    <div class="flex flex-1 max-w-7xl mx-auto w-full px-4 py-8 gap-8">
        <main class="flex-1 space-y-8">
            <div class="bg-[#452829] rounded-[2.5rem] p-10 text-[#f3e8df] shadow-2xl relative overflow-hidden">
                <div class="relative z-10">
                    <h1 class="text-4xl font-black tracking-tighter mb-2">Admin Control Center</h1>
                    <p class="text-[#d1c5f3] font-medium">Monitoring platform activity and content integrity.</p>
                </div>
                <div class="absolute -right-10 -bottom-10 w-64 h-64 bg-[#57595b] rounded-full opacity-20"></div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                <?php foreach ($stats as $label => $value): ?>
                    <div
                        class="bg-white p-6 rounded-3xl border border-[#e8dfd1] shadow-sm hover:border-[#d1c5f3] transition-colors">
                        <p class="text-[10px] font-black text-[#57595b] uppercase tracking-widest mb-1">
                            <?php echo $label; ?></p>
                        <p class="text-3xl font-black text-[#452829]"><?php echo $value; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="bg-white rounded-[2rem] border border-[#e8dfd1] shadow-xl overflow-hidden">
                <div class="p-8 border-b border-[#f3e8df] flex justify-between items-center">
                    <h2 class="text-xl font-black tracking-tight uppercase">Recent Articles Feed</h2>
                    
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <thead>
                            <tr class="bg-[#f3e8df]/50 text-[10px] font-black uppercase tracking-widest text-[#57595b]">
                                <th class="px-8 py-4">Article TITLE</th>
                                <th class="px-8 py-4">Author</th>
                                <th class="px-8 py-4 ">Category</th>
                                <th class="px-8 py-4 text-right">Likes</th>

                            </tr>
                        </thead>
                        <tbody class="divide-y divide-[#f3e8df]">
                            <? foreach($listArticls as $articl):?>
                            <tr class="hover:bg-[#f3e8df]/20 transition">
                                <td class="px-8 py-5 text-sm font-bold"><?= $articl->getTitle() ?></td>
                                <td class="px-8 py-5 text-sm"> <?= $articl->getNameAuthor() ?> </td>
                                <td class="px-8 py-5  space-x-3"> 
                                    <?php foreach ($articl->getCategories() as $category): ?>
                                        <span
                                            class="inline-block bg-[#57595b] text-white text-xs font-bold px-2 py-1 rounded-full mr-2 mb-1">
                                            <?= $category->getTitle() ?>
                                        </span>
                                    <?php endforeach; ?>
                                </td>
                                <td class="px-8 py-5 text-right text-sm font-bold"> <?= $articl->getLikes() ?> </td>
                            </tr>
                            <? endforeach ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>