<?php
$requests = $usersRequests ;
?>


<div class="bg-[#f3e8df] text-[#452829] min-h-screen font-sans">

    <main class="max-w-6xl mx-auto px-6 py-16">
        
        <header class="mb-12">
            <h1 class="text-4xl font-black tracking-tight uppercase mb-2 text-[#452829]">Demandes d'accès Auteur</h1>
            <p class="text-[#57595b] font-medium italic">Validez ou refusez les demandes de passage du rôle Reader à Author.</p>
        </header>

        <div class="space-y-6">
            <?php if (empty($requests)): ?>
                <div class="bg-white p-12 rounded-[2.5rem] border border-dashed border-[#e8dfd1] text-center">
                    <p class="font-bold text-gray-400">Aucune demande en attente pour le moment.</p>
                </div>
            <?php else: ?>
                <?php foreach($requests as $req): ?>
                <div class="bg-white rounded-[2rem] border border-[#e8dfd1] overflow-hidden shadow-sm hover:shadow-md transition">
                    <div class="flex flex-col md:flex-row">
                        
                        <div class="p-8 md:w-1/3 bg-[#57595b]/5 border-r border-[#f3e8df]">
                            <div class="flex items-center gap-4 mb-4">
                                <div class="w-10 h-10 rounded-full bg-[#452829] text-white flex items-center justify-center font-bold">
                                    <?php echo substr($req['firstName'], 0, 1); ?>
                                </div>
                                <div>
                                    <h3 class="font-black text-sm uppercase"><?php echo $req['firstName'] . ' ' . $req['lastName']; ?></h3>
                                    <p class="text-[10px] text-gray-400 font-bold"><?php echo $req['email']; ?></p>
                                </div>
                            </div>
                            <div class="text-[10px] font-black uppercase tracking-widest text-[#d1c5f3] bg-[#452829] inline-block px-3 py-1 rounded-full">
                                Reader
                            </div>
                        </div>

                        <div class="p-8 flex-1 flex flex-col justify-between">
                            <div>
                                <h4 class="text-[10px] font-black uppercase text-gray-400 mb-3 tracking-widest">Motivation de la demande</h4>
                                <p class="text-[#452829] leading-relaxed italic">
                                    "<?php echo nl2br($req['requestContent']); ?>"
                                </p>
                            </div>

                            <div class="mt-8 flex gap-4 justify-end">
                                <form action="/process_role_change" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $req['id']; ?>">
                                    <input type="hidden" name="action" value="refuse">
                                    <button class="px-6 py-2.5 rounded-full border border-red-200 text-red-500 text-xs font-black uppercase tracking-widest hover:bg-red-50 transition">
                                        Refuser
                                    </button>
                                </form>

                                <form action="/process_role_change" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $req['id']; ?>">
                                    <input type="hidden" name="action" value="accept">
                                    <button class="px-6 py-2.5 rounded-full bg-[#452829] text-white text-xs font-black uppercase tracking-widest hover:bg-[#57595b] transition shadow-lg shadow-[#452829]/20">
                                        Accepter & Promouvoir
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>

</div>
</html>