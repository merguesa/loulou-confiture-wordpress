<?php
/**
 * Hero Section Partial
 * 
 * @package LoulouTheme
 */
?>

<!-- Hero Section -->
<div class="bg-gradient-to-br from-rose-400 via-pink-500 to-rose-600 relative overflow-hidden">
    <!-- Background decorative elements -->
    <div aria-hidden="true" class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80">
        <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-orange-300 to-amber-200 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
    </div>
    
    <div class="relative isolate px-6 pt-14 lg:px-8">
        <div class="mx-auto max-w-4xl py-32 sm:py-48 lg:py-56">
            <!-- Announcement badge -->
            <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div class="relative rounded-full px-4 py-2 text-sm/6 text-white bg-white/10 backdrop-blur-sm ring-1 ring-white/20 hover:ring-white/30 transition-all">
                    🍓 Nouvelles saveurs de saison disponibles !
                    <a href="<?php echo home_url('/nos-confitures'); ?>" class="font-semibold text-white ml-1">
                        <span aria-hidden="true" class="absolute inset-0"></span>
                        Découvrir <span aria-hidden="true">&rarr;</span>
                    </a>
                </div>
            </div>
            
            <!-- Main hero content -->
            <div class="text-center text-white">
                <h1 class="text-balance text-4xl font-bold tracking-tight sm:text-6xl lg:text-7xl mb-6">
                    <?php bloginfo('name'); ?>
                </h1>
                <h2 class="text-2xl mb-6 font-medium opacity-90">
                    Le goût du vrai fruit, naturellement.
                </h2>
                <p class="max-w-2xl mx-auto text-lg mb-8 leading-relaxed opacity-90">
                    Des confitures 100 % naturelles et bio, préparées à la main avec des fruits frais et un soupçon de douceur.
                    Sans additifs, sans conservateurs — juste le vrai goût du fruit.
                </p>
                
                <!-- CTA buttons -->
                <div class="mt-10 flex items-center justify-center gap-x-6 flex-wrap">
                    <a href="<?php echo home_url('/nos-confitures'); ?>" class="inline-block bg-white text-rose-700 font-semibold py-3 px-6 rounded-lg shadow-lg hover:bg-rose-50 hover:shadow-xl transition-all transform hover:-translate-y-1">
                        Découvrir nos confitures
                    </a>
                    <a href="<?php echo home_url('/notre-histoire'); ?>" class="text-lg font-semibold text-white hover:text-rose-100 transition-colors">
                        Notre histoire <span aria-hidden="true">→</span>
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Bottom decorative element -->
        <div aria-hidden="true" class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]">
            <div style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)" class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-orange-300 to-amber-200 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"></div>
        </div>
    </div>
</div>