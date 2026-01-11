<?php
$user = [
    'id' => $user->getId(),
    'firstName' => $user->getFirstName(),
    'lastName' => $user->getLastName(),
    'email' => $user->getEmail(),
    'role' => $_SESSION['role']
];

$requestPending = false; 
?>


<div class="bg-[#f3e8df] text-[#452829] min-h-screen font-sans">

 

    <main class="max-w-4xl mx-auto px-6 py-16">
        
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            
            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2.5rem] p-8 shadow-sm border border-[#e8dfd1] text-center">
                    <div class="w-24 h-24 bg-[#452829] text-white rounded-3xl mx-auto flex items-center justify-center text-3xl font-black mb-6 shadow-xl shadow-[#452829]/10">
                        <?php echo substr($user['firstName'], 0, 1); ?>
                    </div>
                    <h2 class="text-2xl font-extrabold tracking-tight mb-1">
                        <?php echo $user['firstName'] . ' ' . $user['lastName']; ?>
                    </h2>
                    <p class="text-xs font-black uppercase tracking-widest text-[#d1c5f3] mb-6">
                        <?php echo $user['role']; ?>
                    </p>
                    
                    <div class="pt-6 border-t border-[#f3e8df] text-left space-y-4">
                        <div>
                            <p class="text-[10px] font-black uppercase text-gray-400">Email</p>
                            <p class="text-sm font-bold"><?php echo $user['email']; ?></p>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-8">
                
                <section class="bg-[#452829] text-[#f3e8df] rounded-[3rem] p-10 shadow-2xl relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-3xl font-black tracking-tighter mb-4 italic text-[#d1c5f3]">
                            Devenez Auteur.
                        </h3>
                        <p class="text-sm font-light leading-relaxed mb-8 opacity-80">
                            Partagez votre expertise avec la communauté. En devenant auteur, vous pourrez rédiger, modifier et gérer vos propres articles sur ArticlHub.
                        </p>

                        <?php if($requestPending): ?>
                            <div class="bg-[#57595b] rounded-2xl p-6 border border-[#d1c5f3]/30 flex items-center gap-4">
                                <div class="w-3 h-3 bg-orange-400 rounded-full animate-pulse"></div>
                                <p class="text-sm font-bold">Votre demande est en cours de révision par l'administrateur.</p>
                            </div>
                        <?php else: ?>
                            <form action="/request_role_change" method="POST" class="space-y-4">
                                <textarea name="motivation" required 
                                    class="w-full bg-[#57595b] border-none rounded-2xl p-5 text-[#f3e8df] focus:ring-2 focus:ring-[#d1c5f3] outline-none placeholder:text-[#f3e8df]/30 text-sm" 
                                    placeholder="Pourquoi souhaitez-vous devenir auteur ? (Décrivez vos sujets de prédilection...)"></textarea>
                                <button type="submit" class="bg-[#d1c5f3] text-[#452829] px-8 py-3 rounded-full text-xs font-black uppercase tracking-widest hover:bg-white transition-all transform active:scale-95">
                                    Envoyer ma demande
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>
                    <div class="absolute -right-10 -bottom-10 w-40 h-40 bg-[#d1c5f3] rounded-full opacity-10"></div>
                </section>
            </div>
        </div>
    </main>

</div>