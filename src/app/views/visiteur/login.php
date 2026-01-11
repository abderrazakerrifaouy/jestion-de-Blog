
<div class="bg-[#f3e8df] flex items-center justify-center min-h-screen p-4">

    <div class="bg-white w-full max-w-md rounded-3xl shadow-2xl overflow-hidden flex flex-col border border-[#e8dfd1]">
        
        <div class="bg-[#452829] p-10 text-center">
            <h1 class="text-[#f3e8df] text-4xl font-bold tracking-tighter">ARTICL<span class="text-[#d1c5f3]">HUB</span></h1>
            <p class="text-[#e8dfd1] mt-3 text-xs uppercase tracking-[0.2em] font-medium opacity-80">Welcome Back</p>
        </div>

        <form action="/login" method="POST" class="p-10 space-y-6">
            
            <div class="space-y-2">
                <label for="email" class="text-[10px] font-black text-[#452829] uppercase tracking-widest ml-1">Email Address</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-[#57595b]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.206"></path></svg>
                    </span>
                    <input type="email" id="email" name="email" required 
                        class="w-full pl-11 pr-4 py-3 bg-[#f3e8df] border-none rounded-2xl focus:ring-2 focus:ring-[#d1c5f3] outline-none text-[#452829] placeholder-gray-400 transition-all"
                        placeholder="name@company.com">
                </div>
            </div>

            <div class="space-y-2">
                <div class="flex justify-between items-center px-1">
                    <label for="pass" class="text-[10px] font-black text-[#452829] uppercase tracking-widest">Password</label>
                    <a href="#" class="text-[10px] font-bold text-[#57595b] hover:text-[#452829] uppercase">Forgot?</a>
                </div>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-[#57595b]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </span>
                    <input type="password" id="pass" name="pass" required 
                        class="w-full pl-11 pr-4 py-3 bg-[#f3e8df] border-none rounded-2xl focus:ring-2 focus:ring-[#d1c5f3] outline-none text-[#452829] placeholder-gray-400 transition-all"
                        placeholder="••••••••">
                </div>
            </div>

            <div class="flex items-center px-1">
                <input type="checkbox" id="remember" class="w-4 h-4 text-[#452829] border-[#e8dfd1] rounded focus:ring-[#d1c5f3]">
                <label for="remember" class="ml-2 text-xs text-[#57595b] font-medium">Keep me logged in</label>
            </div>

            <button type="submit" 
                class="w-full bg-[#452829] hover:bg-[#57595b] text-[#f3e8df] font-black py-4 rounded-2xl transition duration-300 shadow-xl transform hover:-translate-y-0.5 active:scale-95 uppercase tracking-widest text-sm">
                Loge In
            </button>

            <div class="pt-4 text-center">
                <p class="text-xs text-gray-500 font-medium">
                    New to ArticlHub? 
                    <a href="/register" class="text-[#452829] font-black hover:underline ml-1">Create Acounte</a>
                </p>
            </div>
        </form>
    </div>

</div>