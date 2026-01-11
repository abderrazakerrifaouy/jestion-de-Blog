
<div class="bg-[#f3e8df] flex items-center justify-center min-h-screen p-4">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl overflow-hidden border border-[#e8dfd1]">
        
        <div class="bg-[#452829] p-8 text-center">
            <h1 class="text-[#f3e8df] text-3xl font-bold tracking-tighter">ARTICL<span class="text-[#d1c5f3]">HUB</span></h1>
            <p class="text-[#e8dfd1] mt-2 text-sm uppercase tracking-widest">Create Acounte</p>
        </div>

        <form action="/register" method="POST" class="p-8 space-y-5">
            
            <div class="grid grid-cols-2 gap-4">
                <div class="space-y-1">
                    <label class="text-xs font-bold text-[#452829] uppercase">First Name</label>
                    <input type="text" name="firstName" required 
                        class="w-full px-4 py-2 bg-[#f3e8df] border-none rounded-lg focus:ring-2 focus:ring-[#d1c5f3] outline-none text-[#452829]"
                        placeholder="abderrazak">
                </div>
                <div class="space-y-1">
                    <label class="text-xs font-bold text-[#452829] uppercase">Last Name</label>
                    <input type="text" name="lastName" required 
                        class="w-full px-4 py-2 bg-[#f3e8df] border-none rounded-lg focus:ring-2 focus:ring-[#d1c5f3] outline-none text-[#452829]"
                        placeholder="Errifaouy">
                </div>
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-[#452829] uppercase">Email</label>
                <input type="email" name="email" required 
                    class="w-full px-4 py-2 bg-[#f3e8df] border-none rounded-lg focus:ring-2 focus:ring-[#d1c5f3] outline-none text-[#452829]"
                    placeholder="email@example.com">
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-[#452829] uppercase">Password</label>
                <input type="password" name="pass" required 
                    class="w-full px-4 py-2 bg-[#f3e8df] border-none rounded-lg focus:ring-2 focus:ring-[#d1c5f3] outline-none text-[#452829]"
                    placeholder="••••••••">
            </div>

            <div class="space-y-1">
                <label class="text-xs font-bold text-[#452829] uppercase">valide Password</label>
                <input type="password" name="passValide" required 
                    class="w-full px-4 py-2 bg-[#f3e8df] border-none rounded-lg focus:ring-2 focus:ring-[#d1c5f3] outline-none text-[#452829]"
                    placeholder="••••••••">
            </div>

            <button type="submit" 
                class="w-full bg-[#57595b] hover:bg-[#452829] text-[#f3e8df] font-bold py-3 rounded-xl transition duration-300 shadow-lg mt-4">
                CREATE ACCOUNT
            </button>

            <p class="text-center text-xs text-gray-500 mt-4">
                Already have an account? 
                <a href="/login" class="text-[#452829] font-bold hover:underline">Log in here</a>
            </p>
        </form>
    </div>

</div>