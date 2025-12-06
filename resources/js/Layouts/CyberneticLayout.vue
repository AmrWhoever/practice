<template>
  <div class="min-h-screen bg-gray-900" dir="rtl">
    <!-- Cybernetic Background -->
    <div class="fixed inset-0 -z-10">
      <!-- Dark Base with Blue Tones -->
      <div class="absolute inset-0 bg-gradient-to-br from-gray-900 via-blue-900/20 to-black"></div>
      
      <!-- Circuit Board Grid -->
      <div class="absolute inset-0 opacity-20">
        <div class="w-full h-full" style="
          background-image: 
            linear-gradient(rgba(0, 255, 255, 0.1) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0, 255, 255, 0.1) 1px, transparent 1px);
          background-size: 50px 50px;
        "></div>
      </div>

      <!-- Animated Data Streams -->
      <div class="absolute inset-0 overflow-hidden">
        <div v-for="stream in dataStreams" :key="stream.id" 
             class="absolute w-0.5 bg-cyan-400/30 animate-pulse"
             :style="stream.style">
        </div>
      </div>

      <!-- Floating Holographic Elements -->
      <div class="absolute -left-32 top-1/4 w-64 h-64 bg-cyan-500/10 rounded-full mix-blend-screen filter blur-3xl opacity-30 animate-cyber-float"></div>
      <div class="absolute -right-32 top-1/2 w-64 h-64 bg-blue-500/10 rounded-full mix-blend-screen filter blur-3xl opacity-30 animate-cyber-float" style="animation-delay: -2s;"></div>
      <div class="absolute left-1/2 -bottom-32 w-64 h-64 bg-indigo-500/10 rounded-full mix-blend-screen filter blur-3xl opacity-30 animate-cyber-float" style="animation-delay: -4s;"></div>

      <!-- Binary Rain Effect -->
      <div class="absolute inset-0 opacity-10">
        <div v-for="binary in binaryRain" :key="binary.id"
             class="absolute text-cyan-400 font-mono text-xs animate-binary-fall"
             :style="binary.style">
          {{ binary.value }}
        </div>
      </div>
    </div>

    <!-- Header -->
    <header>
      <nav class="fixed top-0 w-full z-50 backdrop-blur-md bg-black/60 border-b border-cyan-500/50 shadow-2xl shadow-cyan-500/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div class="flex justify-between items-center h-16">
            <!-- Cyber Logo -->
            <Link href="/" class="flex items-center space-x-3 group">
              <div class="relative">
                <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 via-blue-600 to-purple-600 rounded-xl flex items-center justify-center transform group-hover:rotate-180 transition-transform duration-700 border-2 border-cyan-400/60 shadow-lg shadow-cyan-500/30">
                  <div class="w-3 h-3 bg-cyan-300 rounded-full animate-pulse shadow-lg shadow-cyan-400"></div>
                </div>
                <div class="absolute -inset-2 bg-gradient-to-r from-cyan-500 to-purple-500 rounded-xl blur-lg opacity-0 group-hover:opacity-40 transition-opacity duration-500"></div>
              </div>
              <div class="flex flex-col">
                <span class="text-xl font-bold text-cyan-300 font-mono tracking-wider drop-shadow-lg">عمر تك</span>
                <span class="text-xs text-cyan-500 font-mono">AmrTech</span>
              </div>
            </Link>

            <!-- Navigation -->
            <div class="hidden md:flex items-center space-x-2 space-x-reverse">
              <Link href="/" class="relative group/nav px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105" :class="{'active-nav': currentRoute === '/'}">
                <span class="relative z-10 font-mono text-sm tracking-wider flex items-center space-x-2 space-x-reverse">
                  <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></span>
                  <span class="transition-colors duration-300" :class="currentRoute === '/' ? 'text-cyan-300 font-bold' : 'text-gray-400 hover:text-cyan-200'">
                    الرئيسية
                  </span>
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-500/10 rounded-lg border border-cyan-500/30 opacity-0 group-hover/nav:opacity-100 transition-all duration-300"></div>
                <div class="absolute bottom-0 left-1/2 h-0.5 bg-cyan-400 transform -translate-x-1/2 transition-all duration-300" :class="currentRoute === '/' ? 'w-3/4' : 'w-0 group-hover/nav:w-3/4'"></div>
              </Link>

              <Link href="/about" class="relative group/nav px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105" :class="{'active-nav': currentRoute === '/about'}">
                <span class="relative z-10 font-mono text-sm tracking-wider flex items-center space-x-2 space-x-reverse">
                  <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.1s"></span>
                  <span class="transition-colors duration-300" :class="currentRoute === '/about' ? 'text-cyan-300 font-bold' : 'text-gray-400 hover:text-cyan-200'">
                    عني
                  </span>
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-500/10 rounded-lg border border-cyan-500/30 opacity-0 group-hover/nav:opacity-100 transition-all duration-300"></div>
                <div class="absolute bottom-0 left-1/2 h-0.5 bg-cyan-400 transform -translate-x-1/2 transition-all duration-300" :class="currentRoute === '/about' ? 'w-3/4' : 'w-0 group-hover/nav:w-3/4'"></div>
              </Link>

              <Link href="/projects" class="relative group/nav px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105" :class="{'active-nav': currentRoute === '/projects'}">
                <span class="relative z-10 font-mono text-sm tracking-wider flex items-center space-x-2 space-x-reverse">
                  <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></span>
                  <span class="transition-colors duration-300" :class="currentRoute === '/projects' ? 'text-cyan-300 font-bold' : 'text-gray-400 hover:text-cyan-200'">
                    المشاريع
                  </span>
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-500/10 rounded-lg border border-cyan-500/30 opacity-0 group-hover/nav:opacity-100 transition-all duration-300"></div>
                <div class="absolute bottom-0 left-1/2 h-0.5 bg-cyan-400 transform -translate-x-1/2 transition-all duration-300" :class="currentRoute === '/projects' ? 'w-3/4' : 'w-0 group-hover/nav:w-3/4'"></div>
              </Link>

              <Link href="/blog" class="relative group/nav px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105" :class="{'active-nav': currentRoute === '/blog'}">
                <span class="relative z-10 font-mono text-sm tracking-wider flex items-center space-x-2 space-x-reverse">
                  <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.3s"></span>
                  <span class="transition-colors duration-300" :class="currentRoute === '/blog' ? 'text-cyan-300 font-bold' : 'text-gray-400 hover:text-cyan-200'">
                    المدونة
                  </span>
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-500/10 rounded-lg border border-cyan-500/30 opacity-0 group-hover/nav:opacity-100 transition-all duration-300"></div>
                <div class="absolute bottom-0 left-1/2 h-0.5 bg-cyan-400 transform -translate-x-1/2 transition-all duration-300" :class="currentRoute === '/blog' ? 'w-3/4' : 'w-0 group-hover/nav:w-3/4'"></div>
              </Link>

              <Link href="/contact" class="relative group/nav px-4 py-2 rounded-lg transition-all duration-300 transform hover:scale-105" :class="{'active-nav': currentRoute === '/contact'}">
                <span class="relative z-10 font-mono text-sm tracking-wider flex items-center space-x-2 space-x-reverse">
                  <span class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></span>
                  <span class="transition-colors duration-300" :class="currentRoute === '/contact' ? 'text-cyan-300 font-bold' : 'text-gray-400 hover:text-cyan-200'">
                    اتصل بي
                  </span>
                </span>
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/10 to-blue-500/10 rounded-lg border border-cyan-500/30 opacity-0 group-hover/nav:opacity-100 transition-all duration-300"></div>
                <div class="absolute bottom-0 left-1/2 h-0.5 bg-cyan-400 transform -translate-x-1/2 transition-all duration-300" :class="currentRoute === '/contact' ? 'w-3/4' : 'w-0 group-hover/nav:w-3/4'"></div>
              </Link>
            </div>

            <!-- System Status -->
            <div class="flex items-center space-x-4 space-x-reverse">
              <div class="flex items-center space-x-3 space-x-reverse bg-black/40 rounded-lg px-3 py-2 border border-cyan-500/30">
                <div class="flex space-x-1 space-x-reverse">
                  <div class="w-2 h-2 rounded-full animate-pulse" :class="systemStatusColor"></div>
                  <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse" style="animation-delay: 0.2s"></div>
                  <div class="w-2 h-2 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.4s"></div>
                </div>
                <span class="text-cyan-300 font-mono text-sm tracking-wider">{{ systemStatusText }}</span>
              </div>
              <button @click="activateSystem" 
                      :disabled="engageButtonState !== 'idle'"
                      class="group relative bg-gradient-to-r from-cyan-600 to-blue-700 hover:from-cyan-500 hover:to-blue-600 text-white px-5 py-2.5 rounded-lg border border-cyan-400/50 hover:border-cyan-300 transition-all duration-300 transform hover:scale-105 font-mono text-sm shadow-lg shadow-cyan-500/25 hover:shadow-cyan-400/40">
                <span class="flex items-center space-x-2 space-x-reverse">
                  <template v-if="engageButtonState === 'idle'">
                    <span>ابدأ مشروعك</span>
                    <span class="group-hover:rotate-90 transition-transform">⚡</span>
                  </template>
                  <template v-else-if="engageButtonState === 'initializing'">
                    <span>جاري التحميل...</span>
                    <span class="inline-block animate-spin">⟳</span>
                  </template>
                  <template v-else-if="engageButtonState === 'active'">
                    <span>جاهز للتواصل</span>
                    <span>⚡</span>
                  </template>
                </span>
              </button>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <!-- Main Content -->
    <main class="relative z-10 pt-16 bg-transparent">
      <slot />
    </main>

    <!-- Footer -->
    <footer class="relative z-10 py-16 px-6 bg-gradient-to-t from-black to-gray-900/80 border-t border-cyan-500/30">
      <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
          <!-- Brand -->
          <div class="text-center md:text-right">
            <div class="flex items-center justify-center md:justify-end space-x-3 space-x-reverse mb-6">
              <div class="w-12 h-12 bg-gradient-to-br from-cyan-500 via-blue-600 to-purple-600 rounded-xl flex items-center justify-center border-2 border-cyan-400/60 shadow-lg shadow-cyan-500/30">
                <div class="w-3 h-3 bg-cyan-300 rounded-full animate-pulse shadow-lg shadow-cyan-400"></div>
              </div>
              <div class="flex flex-col">
                <span class="text-xl font-bold text-cyan-300 font-mono tracking-wider">عمر تك</span>
                <span class="text-xs text-cyan-500 font-mono">AmrTech</span>
              </div>
            </div>
            <p class="text-gray-400 text-sm max-w-xs mx-auto md:mx-0 md:mr-auto">
              مطور واجهات أمامية مبتكر، أصمم وأطور مواقع ويب استثنائية باستخدام أحدث التقنيات.
            </p>
          </div>
          
          <!-- Contact -->
          <div class="text-center">
            <h3 class="text-cyan-300 font-mono text-lg mb-6">اتصل بي</h3>
            <div class="space-y-4">
              <a href="https://wa.me/966557339170" target="_blank" 
                 class="flex items-center justify-center space-x-2 space-x-reverse text-gray-400 hover:text-cyan-300 transition-colors duration-300">
                <span>واتساب</span>
                <span>📱</span>
              </a>
              <a href="mailto:amr04801@gmail.com" 
                 class="flex items-center justify-center space-x-2 space-x-reverse text-gray-400 hover:text-cyan-300 transition-colors duration-300">
                <span>البريد الإلكتروني</span>
                <span>✉️</span>
              </a>
            </div>
          </div>
          
          <!-- Services -->
          <div class="text-center md:text-right">
            <h3 class="text-cyan-300 font-mono text-lg mb-6">خدماتي</h3>
            <div class="space-y-2 text-gray-400 text-sm">
              <div>تطوير الويب</div>
              <div>تصميم واجهات المستخدم</div>
              <div>تطبيقات الويب التفاعلية</div>
              <div>تحسين أداء المواقع</div>
            </div>
          </div>
        </div>
        
        <div class="border-t border-cyan-500/20 mt-12 pt-8 text-center">
          <p class="text-gray-500 text-sm font-mono">© 2024 عمرو تك. جميع الحقوق محفوظة.</p>
        </div>
      </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button v-if="showScrollTop" @click="scrollToTop" 
            class="fixed bottom-8 left-8 z-50 w-12 h-12 bg-gradient-to-br from-cyan-500 to-blue-600 rounded-full border border-cyan-400/50 shadow-lg shadow-cyan-500/30 hover:shadow-cyan-400/50 transition-all duration-300 transform hover:scale-110 flex items-center justify-center">
      <span class="text-white font-bold text-xl">↑</span>
    </button>

    <!-- Robotic HUD Overlay -->
    <div class="fixed inset-0 pointer-events-none -z-5 opacity-5">
      <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-cyan-400 to-transparent animate-pulse"></div>
      <div class="absolute bottom-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-blue-400 to-transparent animate-pulse"></div>
      <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-transparent via-cyan-400 to-transparent animate-pulse"></div>
      <div class="absolute top-0 right-0 w-1 h-full bg-gradient-to-b from-transparent via-blue-400 to-transparent animate-pulse"></div>
    </div>

    <!-- Progress Bar -->
    <div v-if="showProgressBar" class="fixed top-0 left-0 w-full h-1 z-50">
      <div class="h-full bg-gradient-to-r from-cyan-500 to-blue-600 animate-progress"></div>
    </div>
  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { ref, computed, onMounted, onUnmounted } from 'vue'

// Reactive state for the engage button
const engageButtonState = ref('idle'); // 'idle', 'initializing', 'active'
const showScrollTop = ref(false)
const showProgressBar = ref(false)

// Get current route for navigation highlighting
const currentRoute = computed(() => usePage().url)

// System status based on button state
const systemStatusColor = computed(() => {
  switch(engageButtonState.value) {
    case 'idle': return 'bg-green-400'
    case 'initializing': return 'bg-yellow-400'
    case 'active': return 'bg-cyan-400'
    default: return 'bg-green-400'
  }
})

const systemStatusText = computed(() => {
  switch(engageButtonState.value) {
    case 'idle': return 'جاهز للعمل'
    case 'initializing': return 'جاري التهيئة'
    case 'active': return 'النظام نشط'
    default: return 'جاهز للعمل'
  }
})

// Optimized data for animations
const dataStreams = ref(Array.from({length: 15}, (_, i) => ({
  id: i,
  style: {
    left: Math.random() * 100 + '%',
    height: Math.random() * 100 + 50 + '%',
    animationDelay: Math.random() * 3 + 's',
    animationDuration: Math.random() * 2 + 1 + 's'
  }
})))

const binaryRain = ref(Array.from({length: 30}, (_, i) => ({
  id: i,
  value: Math.random() > 0.5 ? '1' : '0',
  style: {
    left: Math.random() * 100 + '%',
    animationDelay: Math.random() * 10 + 's',
    animationDuration: Math.random() * 10 + 5 + 's'
  }
})))

const activateSystem = () => {
  engageButtonState.value = 'initializing';
  showProgressBar.value = true
  
  setTimeout(() => {
    engageButtonState.value = 'active';
    showProgressBar.value = false
    createHologramEffect();
    showSystemOnlineMessage();
  }, 2000);

  setTimeout(() => {
    engageButtonState.value = 'idle';
  }, 5000);
}

const createHologramEffect = () => {
  for (let i = 0; i < 30; i++) {
    const hologram = document.createElement('div')
    hologram.className = 'fixed w-1 h-6 bg-cyan-400 pointer-events-none rounded-full shadow-lg shadow-cyan-400'
    hologram.style.left = Math.random() * 100 + 'vw'
    hologram.style.top = '-20px'
    hologram.style.animation = `hologram-fall ${Math.random() * 2 + 1}s linear forwards`
    hologram.style.opacity = Math.random() * 0.7 + 0.3
    document.body.appendChild(hologram)

    setTimeout(() => hologram.remove(), 3000)
  }
}

const showSystemOnlineMessage = () => {
  const message = document.createElement('div')
  message.className = 'fixed top-20 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-cyan-600 to-blue-700 text-white px-6 py-3 rounded-lg border border-cyan-400/50 shadow-lg shadow-cyan-500/30 font-mono z-50 animate-fade-in-out'
  message.textContent = 'System Online ✅'
  document.body.appendChild(message)
  
  setTimeout(() => {
    message.remove()
  }, 3000)
}

const handleScroll = () => {
  showScrollTop.value = window.scrollY > 300
}

const scrollToTop = () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  })
}

// Add scroll event listener
onMounted(() => {
  window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll)
})
</script>

<style scoped>
@keyframes hologram-fall {
  to {
    transform: translateY(100vh) rotate(360deg);
    opacity: 0;
  }
}

@keyframes cyber-float {
  0%, 100% { 
    transform: translateY(0px) rotate(0deg) scale(1);
    opacity: 0.3;
  }
  33% { 
    transform: translateY(-20px) rotate(120deg) scale(1.1);
    opacity: 0.4;
  }
  66% { 
    transform: translateY(10px) rotate(240deg) scale(0.9);
    opacity: 0.2;
  }
}

@keyframes binary-fall {
  0% {
    transform: translateY(-100px) rotate(0deg);
    opacity: 0;
  }
  10% {
    opacity: 1;
  }
  90% {
    opacity: 1;
  }
  100% {
    transform: translateY(100vh) rotate(360deg);
    opacity: 0;
  }
}

@keyframes fade-in-out {
  0% {
    opacity: 0;
    transform: translate(-50%, -20px);
  }
  20% {
    opacity: 1;
    transform: translate(-50%, 0);
  }
  80% {
    opacity: 1;
    transform: translate(-50%, 0);
  }
  100% {
    opacity: 0;
    transform: translate(-50%, -20px);
  }
}

@keyframes progress {
  0% {
    width: 0%;
  }
  50% {
    width: 70%;
  }
  100% {
    width: 100%;
  }
}

.animate-cyber-float {
  animation: cyber-float 15s ease-in-out infinite;
}

.animate-binary-fall {
  animation: binary-fall linear infinite;
}

.animate-fade-in-out {
  animation: fade-in-out 3s ease-in-out forwards;
}

.animate-progress {
  animation: progress 2s ease-in-out forwards;
}

/* Reduce motion for users who prefer it */
@media (prefers-reduced-motion: reduce) {
  .animate-cyber-float,
  .animate-binary-fall,
  .animate-pulse,
  .animate-fade-in-out,
  .animate-progress {
    animation: none;
  }
  
  .transform,
  .transition-all {
    transform: none;
    transition: none;
  }
}

/* Mobile optimizations */
@media (max-width: 768px) {
  .absolute.-left-32,
  .absolute.-right-32,
  .absolute.-bottom-32 {
    display: none;
  }
}
</style>