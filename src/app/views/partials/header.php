<?php
$userRole = $_SESSION['role'] ?? 'visiteur';
?>

<header class="bg-[#452829] text-[#f3e8df] shadow-md border-b border-[#57595b]">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">


      <div class="flex items-center space-x-8">
        <div class="flex-shrink-0 flex items-center">
          <span class="text-2xl font-bold tracking-tighter border-b-2 border-[#d1c5f3]">
            ARTICL
          </span>
        </div>

        <nav class="hidden md:flex space-x-4">

          <a href="/" class="flex items-center space-x-1 hover:text-[#d1c5f3] px-3 py-2 text-sm font-medium transition">
            <span>Home</span>
          </a>


          <?php if ($userRole === 'reader' || $userRole === 'author'): ?>
            <a href="/articles" class="hover:text-[#d1c5f3] px-3 py-2 text-sm font-medium transition">
              Lire Articles
            </a>
          <?php endif; ?>

          <?php if ($userRole === 'reader'): ?>
            <a href="/profile" class="hover:text-[#d1c5f3] px-3 py-2 text-sm font-medium transition">
              Profile
            </a>
          <?php endif; ?>

          

          <?php if ($userRole === 'admin'): ?>
            <a href="/categories" class="hover:text-[#d1c5f3] px-3 py-2 text-sm font-medium transition">
              Clear Category
            </a>
            <a href="/admin_roles" class="hover:text-[#d1c5f3] px-3 py-2 text-sm font-medium transition">
              Role Requests
            </a>
          <?php endif; ?>

        </nav>
      </div>

      <div class="flex items-center space-x-5">


        <?php if ($userRole === 'visiteur'): ?>
          <a href="/login" class="text-sm font-medium hover:text-[#d1c5f3]">Login</a>
          <a href="/register"
             class="bg-[#57595b] hover:bg-[#d1c5f3] hover:text-[#452829] px-4 py-2 rounded text-sm font-bold transition">
            Create Account
          </a>

        <?php elseif ($userRole === 'reader'): ?>


          <button class="text-[#e8dfd1] hover:text-white">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
          </button>

          <button class="relative text-[#e8dfd1] hover:text-white">
            <span class="absolute top-0 right-0 block h-2 w-2 rounded-full bg-red-500 ring-2 ring-[#452829]"></span>
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0
                       0118 14.158V11a6.002 6.002 0
                       00-4-5.659V5a2 2 0
                       10-4 0v.341C7.67
                       6.165 6 8.388 6
                       11v3.159c0
                       .538-.214
                       1.055-.595
                       1.436L4 17h5"/>
            </svg>
          </button>


        <?php else: ?>
          <span class="text-sm italic text-[#d1c5f3]">
            <?php echo ucfirst($userRole); ?>
          </span>
        <?php endif; ?>

        <?php if ($userRole !== 'visiteur'): ?>
          <a href="/logout" class="text-xs hover:underline ml-4">
            Logout
          </a>
        <?php endif; ?>

      </div>
    </div>
  </div>
</header>
