<template>
  <!-- System Boot Sequence -->
  <div v-if="!isBooted" class="fixed inset-0 bg-gray-900 z-50 flex items-center justify-center">
    <div class="text-center font-mono">
      <!-- Logo -->
      <div class="mb-8">
        <div class="w-20 h-20 bg-gradient-to-br from-cyan-500 via-blue-600 to-purple-600 rounded-xl flex items-center justify-center mx-auto border-2 border-cyan-400/60 mb-4">
          <div class="w-3 h-3 bg-cyan-300 rounded-full animate-pulse"></div>
        </div>
        <h1 class="text-2xl text-cyan-300 font-bold">عمر تك</h1>
      </div>

      <!-- Terminal Output -->
      <div class="text-green-400 text-lg space-y-2 max-w-md mx-auto text-right">
        <div v-for="(line, index) in bootSequence" 
             :key="index"
             class="terminal-line"
             :class="{ 'active': index === currentBootLine }">
          <span class="text-cyan-400 mr-2">></span>
          {{ line.text }}
          <span v-if="index === currentBootLine" class="blinking-cursor">_</span>
        </div>
      </div>

      <!-- Progress Bar -->
      <div class="mt-8 max-w-xs mx-auto">
        <div class="w-full bg-gray-800 rounded-full h-2">
          <div class="bg-gradient-to-r from-green-400 to-cyan-400 h-2 rounded-full transition-all duration-300"
               :style="{ width: bootProgress + '%' }"></div>
        </div>
        <p class="text-gray-400 text-sm mt-2">جاري تحميل النظام... {{ Math.round(bootProgress) }}%</p>
      </div>
    </div>
  </div>

  <CyberneticLayout v-if="isBooted">
    <!-- Enhanced Hero Section -->
    <section class="min-h-screen flex items-center justify-center px-4 sm:px-6 pt-16 pb-8 bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900">
      <div class="max-w-6xl mx-auto text-center">
        <!-- Holographic Title -->
        <div class="relative mb-8">
          <div class="absolute -inset-3 bg-gradient-to-r from-cyan-500 via-blue-500 to-purple-500 rounded-2xl blur-xl opacity-20 animate-pulse"></div>
          <h1 class="text-5xl sm:text-7xl md:text-8xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-blue-400 to-purple-400 mb-4 font-mono tracking-tighter relative z-10">
            عمر تك
          </h1>
          <div class="text-cyan-400 font-mono text-lg sm:text-xl tracking-widest mb-4 relative z-10">
            <span class="typing-animation">> النظام جاهز للعمل. ابدأ مشروعك الآن...</span>
          </div>
        </div>

        <p class="text-lg sm:text-xl md:text-2xl text-gray-300 mb-8 max-w-3xl mx-auto leading-relaxed">
          أصمم وأطور <span class="text-cyan-300 font-semibold">حلول ويب ذكية</span> باستخدام 
          <span class="text-blue-300">أحدث التقنيات</span> و <span class="text-purple-300">الذكاء الاصطناعي</span>. 
          حوّل رؤيتك إلى واقع رقمي استثنائي.
        </p>

        <!-- Enhanced Command Interface -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-12">
          <button @click="startProject" 
                  class="cyber-button cyber-button-primary group">
            <span class="relative z-10 flex items-center space-x-3 space-x-reverse">
              <span class="text-shadow-glow">ابدأ مشروعك</span>
              <span class="group-hover:translate-x-1 transition-transform duration-300">⚡</span>
            </span>
          </button>

          <Link href="/projects" 
                class="cyber-button cyber-button-secondary group">
            <span class="relative z-10 flex items-center space-x-3 space-x-reverse">
              <span class="text-shadow-glow">المشاريع</span>
              <span class="group-hover:rotate-180 transition-transform duration-300">🧠</span>
            </span>
          </Link>
        </div>
      </div>
    </section>

    <!-- Combined Dashboard Section -->
    <section class="py-16 px-4 sm:px-6 bg-gradient-to-b from-gray-900/50 to-gray-900">
      <div class="max-w-6xl mx-auto">
        <div class="text-center mb-12">
          <h2 class="text-3xl sm:text-4xl font-bold text-cyan-300 mb-4 font-mono">لوحة التحكم الرئيسية</h2>
          <p class="text-gray-400 max-w-2xl mx-auto">نظرة شاملة على أداء النظام وإمكانياته</p>
        </div>

        <!-- Dashboard Tabs -->
        <div class="flex justify-center mb-8">
          <div class="bg-gray-800/60 backdrop-blur-md rounded-xl p-1 border border-cyan-500/30">
            <button @click="activeTab = 'performance'" 
                    :class="['px-4 py-2 rounded-lg font-mono text-sm transition-all duration-300', activeTab === 'performance' ? 'cyber-tab-active' : 'text-gray-400 hover:text-cyan-300']">
              الأداء
            </button>
            <button @click="activeTab = 'features'" 
                    :class="['px-4 py-2 rounded-lg font-mono text-sm transition-all duration-300', activeTab === 'features' ? 'cyber-tab-active' : 'text-gray-400 hover:text-cyan-300']">
              الميزات
            </button>
          </div>
        </div>

        <!-- Dashboard Content -->
        <div class="cyber-panel relative overflow-hidden">
          <!-- Scan Line Overlay -->
          <div class="scan-line"></div>
          
          <!-- Performance Tab -->
          <div v-if="activeTab === 'performance'" class="grid grid-cols-1 lg:grid-cols-2 gap-6 p-4">
            <!-- Metrics -->
            <div class="space-y-4">
              <h3 class="text-xl font-bold text-cyan-300 mb-4 font-mono">إحصائيات الأداء</h3>
              <div v-for="metric in performanceMetrics" :key="metric.label"
                   class="cyber-metric-card group">
                <div class="flex items-center justify-between">
                  <div>
                    <div class="text-2xl font-bold text-cyan-400 font-mono">{{ metric.value }}</div>
                    <div class="text-gray-300 text-sm font-mono mt-1">{{ metric.label }}</div>
                  </div>
                  <div class="text-cyan-500 text-xs font-mono px-2 py-1 bg-cyan-400/10 rounded-full">
                    {{ metric.status }}
                  </div>
                </div>
                <div class="w-full bg-gray-700 rounded-full h-1.5 mt-2">
                  <div class="bg-gradient-to-r from-cyan-400 to-blue-500 h-1.5 rounded-full transition-all duration-2000"
                       :style="{ width: metric.progress }"></div>
                </div>
              </div>
            </div>

            <!-- Real-time Activity -->
            <div>
              <h3 class="text-xl font-bold text-cyan-300 mb-4 font-mono">النشاط المباشر</h3>
              <div class="cyber-terminal">
                <div v-for="log in activityLogs" :key="log.id"
                     class="terminal-log-line">
                  <span class="text-cyan-400 mr-2">></span>
                  <span :class="log.type === 'success' ? 'text-green-400' : 'text-cyan-300'">
                    {{ log.message }}
                  </span>
                  <span class="text-gray-500 text-xs mr-2">{{ log.time }}</span>
                </div>
                <div class="blinking-cursor mt-2 text-cyan-400">_</div>
              </div>
            </div>
          </div>

          <!-- Features Tab -->
          <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4">
            <div v-for="module in systemModules" :key="module.title" 
                 class="cyber-card group">
              <div class="text-2xl mb-3 text-cyan-400 group-hover:scale-110 transition-transform duration-300">
                {{ module.icon }}
              </div>
              <h3 class="text-lg font-bold text-cyan-300 mb-2 font-mono">{{ module.title }}</h3>
              <p class="text-gray-400 text-sm leading-relaxed mb-3">{{ module.description }}</p>
              
              <div class="flex items-center justify-between text-cyan-400 font-mono text-xs">
                <span>الكفاءة</span>
                <span>{{ module.efficiency }}</span>
              </div>
              <div class="w-full bg-gray-700 rounded-full h-1.5 mt-2">
                <div class="bg-gradient-to-r from-cyan-400 to-blue-500 h-1.5 rounded-full transition-all duration-1000" 
                     :style="{ width: module.efficiency }"></div>
              </div>
              
              <div class="absolute top-3 left-3 w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Tech Stack Pulse Section -->
    <section class="py-16 px-4 sm:px-6 bg-gray-900">
      <div class="max-w-5xl mx-auto">
        <div class="text-center mb-12">
          <h2 class="text-3xl sm:text-4xl font-bold text-cyan-300 mb-4 font-mono">التقنيات المستخدمة</h2>
          <p class="text-gray-400 max-w-2xl mx-auto">أحدث الأدوات والتقنيات لضمان الجودة والأداء المتميز</p>
        </div>

        <div class="grid grid-cols-3 md:grid-cols-6 gap-3">
          <div v-for="tech in techStack" :key="tech.name"
               class="tech-card group">
            <div class="tech-icon">
              <div class="text-2xl mb-2">{{ tech.icon }}</div>
              <p class="text-cyan-300 text-xs font-mono">{{ tech.name }}</p>
            </div>
            <div class="scan-animation"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- Core Modules Interactive Map -->
    <section class="py-16 px-4 sm:px-6 bg-gradient-to-b from-gray-900 to-gray-800">
      <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
          <h2 class="text-3xl sm:text-4xl font-bold text-cyan-300 mb-4 font-mono">النظام الأساسي</h2>
          <p class="text-gray-400 max-w-2xl mx-auto">هيكل متكامل من الوحدات المتصالة لضمان أفضل النتائج</p>
        </div>

        <div class="relative w-full h-80 sm:h-96">
          <!-- Central AI Node -->
          <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div class="core-module central group"
                 @mouseenter="hoveredModule = 'ai'"
                 @mouseleave="hoveredModule = null">
              <div class="text-xl">🧠</div>
              <span class="text-cyan-300 font-mono text-xs mt-1">الذكاء الاصطناعي</span>
            </div>
          </div>

          <!-- Surrounding Modules -->
          <div v-for="(module, index) in coreModules" :key="module.name"
               class="absolute core-module group"
               :class="module.position"
               @mouseenter="hoveredModule = module.name"
               @mouseleave="hoveredModule = null">
            <div class="text-lg">{{ module.icon }}</div>
            <span class="text-cyan-300 font-mono text-xs mt-1">{{ module.name }}</span>
          </div>

          <!-- Connection Lines -->
          <svg class="absolute inset-0 w-full h-full pointer-events-none">
            <line v-for="(line, index) in connectionLines" :key="index"
                  :x1="line.x1" :y1="line.y1" :x2="line.x2" :y2="line.y2"
                  class="connection-line" />
          </svg>
        </div>

        <!-- Module Tooltip -->
        <div v-if="hoveredModule" class="text-center mt-6">
          <div class="cyber-tooltip inline-block">
            <h4 class="text-cyan-300 font-mono font-bold mb-1">{{ getModuleInfo(hoveredModule).title }}</h4>
            <p class="text-gray-300 text-sm">{{ getModuleInfo(hoveredModule).description }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Project Showcase -->
    <section class="py-16 px-4 sm:px-6 bg-gray-900">
      <div class="max-w-5xl mx-auto">
        <div class="text-center mb-12">
          <h2 class="text-3xl sm:text-4xl font-bold text-cyan-300 mb-4 font-mono">مشاريع مميزة</h2>
          <p class="text-gray-400 max-w-2xl mx-auto">أبرز الأعمال التي تعكس مستوى التميز والاحترافية</p>
        </div>

        <div class="cyber-panel">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 items-center p-4">
            <!-- Project Preview -->
            <div class="project-preview group">
              <div class="project-image">
                <!-- Using an iframe to embed the live Sakkbah website -->
                <div class="w-full h-64 sm:h-80 lg:h-96 bg-gray-800 rounded-xl overflow-hidden relative border border-cyan-500/20">
                  <iframe src="https://sakkbah.sa/"
                          class="w-full h-full border-0"
                          title="Sakkbah Live Website Preview"
                          loading="lazy"
                          sandbox="allow-scripts allow-same-origin allow-popups allow-forms allow-modals allow-downloads allow-pointer-lock allow-presentation allow-orientation-lock allow-top-navigation allow-top-navigation-by-user-activation"
                          allowfullscreen>
                  </iframe>
                  <!-- Overlay for visual cue, indicating it's a live preview -->
                  <div class="absolute inset-0 bg-black/30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
                    <span class="text-white text-lg font-mono">عرض مباشر</span>
                  </div>
                </div>
              </div>
            </div>

            <!-- Project Details -->
            <div>
              <h3 class="text-2xl font-bold text-cyan-300 mb-3 font-mono">منصة تسوق إلكتروني - سكبّة</h3>
              <p class="text-gray-300 mb-4 leading-relaxed text-sm">
                منصة تسوق إلكتروني متكاملة تقدم تجربة فريدة للمستخدمين، مع واجهة عصرية وسهولة في التصفح والشراء. تم تصميمها لتلبية احتياجات السوق السعودي وتوفير تجربة تسوق سلسة وآمنة.
              </p>
              <div class="flex flex-wrap gap-2 mb-4">
                <span class="px-2 py-1 bg-cyan-400/10 text-cyan-300 rounded text-xs font-mono">Vue.js</span>
                <span class="px-2 py-1 bg-blue-400/10 text-blue-300 rounded text-xs font-mono">Laravel</span>
                <span class="px-2 py-1 bg-green-400/10 text-green-300 rounded text-xs font-mono">E-commerce</span>
                <span class="px-2 py-1 bg-purple-400/10 text-purple-300 rounded text-xs font-mono">Payment Gateway</span>
              </div>
              <Link href="https://sakkbah.sa/" target="_blank" rel="noopener noreferrer" class="cyber-button cyber-button-primary text-sm">
                <span>زيارة الموقع المباشر</span>
                <span>⟫</span>
              </Link>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 px-4 sm:px-6 bg-gradient-to-b from-gray-900 to-gray-800">
      <div class="max-w-5xl mx-auto">
        <div class="text-center mb-12">
          <h2 class="text-3xl sm:text-4xl font-bold text-cyan-300 mb-4 font-mono">آراء العملاء</h2>
          <p class="text-gray-400 max-w-2xl mx-auto">ثقة عملائنا هي شهادتنا الحقيقية</p>
        </div>

        <div class="flex gap-4 overflow-x-auto snap-x py-6 px-2 -mx-2">
          <div v-for="testimonial in testimonials" :key="testimonial.id"
               class="snap-center cyber-card testimonial-card flex-shrink-0 w-72">
            <div class="text-cyan-400 text-2xl mb-3">❝</div>
            <p class="text-gray-300 mb-4 leading-relaxed text-sm flex-1">{{ testimonial.text }}</p>
            <div class="border-t border-cyan-500/20 pt-3">
              <p class="text-cyan-300 font-semibold text-sm">{{ testimonial.author }}</p>
              <p class="text-gray-500 text-xs">{{ testimonial.position }}</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Terminal Section -->
    <section class="py-16 px-4 sm:px-6 bg-gray-900">
      <div class="max-w-2xl mx-auto">
        <div class="text-center mb-12">
          <h2 class="text-3xl sm:text-4xl font-bold text-cyan-300 mb-4 font-mono">محطة الاتصال</h2>
          <p class="text-gray-400">أدخل الأمر للاتصال بالنظام</p>
        </div>

        <div class="cyber-terminal-large">
          <div class="terminal-header">
            <div class="flex space-x-2 space-x-reverse">
              <div class="w-2 h-2 bg-red-400 rounded-full"></div>
              <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
              <div class="w-2 h-2 bg-green-400 rounded-full"></div>
            </div>
            <span class="text-cyan-300 font-mono text-xs">terminal@amrtech:~</span>
          </div>
          
          <div class="terminal-body p-4">
            <p class="text-green-400 font-mono mb-3 text-sm">> أدخل الأمر للاتصال:</p>
            
            <div class="command-input-group">
              <span class="text-cyan-400 font-mono">$</span>
              <input v-model="command" 
                     @keyup.enter="executeCommand"
                     placeholder="اكتب help للحصول على القائمة"
                     class="command-input text-sm" />
            </div>

            <div v-if="commandOutput" class="command-output mt-3 p-3">
              <p class="text-cyan-300 font-mono text-sm">{{ commandOutput }}</p>
            </div>

            <div class="available-commands mt-4">
              <p class="text-gray-400 font-mono text-xs mb-2">الأوامر المتاحة:</p>
              <div class="flex flex-wrap gap-1">
                <span v-for="cmd in availableCommands" :key="cmd"
                      class="px-2 py-1 bg-cyan-400/10 text-cyan-300 rounded text-xs font-mono cursor-pointer hover:bg-cyan-400/20 transition-colors"
                      @click="command = cmd; executeCommand()">
                  {{ cmd }}
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </CyberneticLayout>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import { ref, computed, onMounted } from 'vue'

// Boot Sequence
const isBooted = ref(false)
const currentBootLine = ref(0)
const bootProgress = ref(0)
const bootSequence = ref([
  { text: 'تهيئة النظام الأساسي...', delay: 800 },
  { text: 'تحميل وحدات الواجهة...', delay: 600 },
  { text: 'تشغيل المحرك الرسومي...', delay: 700 },
  { text: 'الاتصال بقاعدة البيانات...', delay: 500 },
  { text: 'تفعيل وحدات الذكاء الاصطناعي...', delay: 900 },
  { text: 'جاري التحقق من الأمان...', delay: 600 },
  { text: 'النظام جاهز للعمل ✅', delay: 1000 }
])

// Dashboard
const activeTab = ref('performance')

// Core Modules
const hoveredModule = ref(null)

// Contact Terminal
const command = ref('')
const commandOutput = ref('')

// Performance Metrics
const performanceMetrics = ref([
  { value: '99.99%', label: 'جاهزية النظام', progress: '100%', status: 'مثالي' },
  { value: '24+', label: 'مشروع مكتمل', progress: '100%', status: 'مكتمل' },
  { value: '0.01s', label: 'زمن الاستجابة', progress: '95%', status: 'سريع' },
  { value: '100%', label: 'رضا العملاء', progress: '100%', status: 'ممتاز' }
])

// System Modules
const systemModules = ref([
  { 
    icon: '🔒', 
    title: 'أمان متقدم', 
    description: 'بروتوكولات أمان متقدمة مع تشفير من الطرف إلى الطرف',
    efficiency: '99.9%'
  },
  { 
    icon: '⚡', 
    title: 'أداء فائق', 
    description: 'تحميل فائق السرعة مع تحسين كفاءة الموارد',
    efficiency: '98%'
  },
  { 
    icon: '🤖', 
    title: 'ذكاء اصطناعي', 
    description: 'دمج نماذج الذكاء الاصطناعي لتحسين التجربة',
    efficiency: '95%'
  }
])

// Tech Stack
const techStack = ref([
  { name: 'Vue.js', icon: '⚡' },
  { name: 'Laravel', icon: '🐘' },
  { name: 'Tailwind', icon: '🎨' },
  { name: 'Node.js', icon: '🟢' },
  { name: 'AI', icon: '🧠' },
  { name: 'Database', icon: '💾' }
])

// Core Modules Map
const coreModules = ref([
  { name: 'الواجهة الأمامية', icon: '🎨', position: 'top-module' },
  { name: 'الخلفية', icon: '⚙️', position: 'left-module' },
  { name: 'قاعدة البيانات', icon: '💾', position: 'right-module' },
  { name: 'الأمان', icon: '🛡️', position: 'bottom-left-module' },
  { name: 'API', icon: '🔗', position: 'bottom-right-module' }
])

// Connection Lines for Core Modules
const connectionLines = computed(() => [
  { x1: '50%', y1: '50%', x2: '50%', y2: '20%' },  // AI to Frontend
  { x1: '50%', y1: '50%', x2: '20%', y2: '50%' },  // AI to Backend
  { x1: '50%', y1: '50%', x2: '80%', y2: '50%' },  // AI to Database
  { x1: '50%', y1: '50%', x2: '30%', y2: '80%' },  // AI to Security
  { x1: '50%', y1: '50%', x2: '70%', y2: '80%' }   // AI to API
])

// Activity Logs
const activityLogs = ref([
  { id: 1, message: 'جاري تحميل وحدات النظام...', time: '10:30:01', type: 'info' },
  { id: 2, message: 'الاتصال بخوادم الذكاء الاصطناعي...', time: '10:30:03', type: 'info' },
  { id: 3, message: 'فحص أمان النظام...', time: '10:30:05', type: 'info' },
  { id: 4, message: 'جميع الأنظمة تعمل بشكل طبيعي ✅', time: '10:30:07', type: 'success' }
])

// Testimonials
const testimonials = ref([
  {
    id: 1,
    text: 'مستوى احترافي متميز وسرعة في التنفيذ. المشروع تجاوز توقعاتنا بكثير!',
    author: 'أحمد محمد',
    position: 'مدير تقنية المعلومات'
  },
  {
    id: 2,
    text: 'الاهتمام بالتفاصيل والدقة في العمل جعلوا التعاون تجربة رائعة.',
    author: 'فاطمة عبدالله',
    position: 'مديرة التسويق'
  },
  {
    id: 3,
    text: 'سرعة الاستجابة والدعم الفني المتميز كانا超出 التوقعات.',
    author: 'خالد الحربي',
    position: 'رائد أعمال'
  }
])

// Available Commands
const availableCommands = ref([
  'contact --email',
  'contact --whatsapp', 
  'view --projects',
  'view --github',
  'system --status',
  'help'
])

// Methods
const getModuleInfo = (moduleName) => {
  const modules = {
    'ai': { title: 'الذكاء الاصطناعي', description: 'نماذج متقدمة للتعلم الآلي ومعالجة اللغة الطبيعية' },
    'الواجهة الأمامية': { title: 'الواجهة الأمامية', description: 'تصميمات تفاعلية باستخدام أحدث تقنيات الويب' },
    'الخلفية': { title: 'الخلفية', description: 'هيكل قوي وآمن لإدارة البيانات والعمليات' },
    'قاعدة البيانات': { title: 'قاعدة البيانات', description: 'تخزين آمن وفعال للبيانات مع استرجاع سريع' },
    'الأمان': { title: 'الأمان', description: 'حماية شاملة من التهديدات والاختراقات' },
    'API': { title: 'واجهة البرمجة', description: 'ربط سلس بين الأنظمة والتطبيقات المختلفة' }
  }
  return modules[moduleName] || { title: moduleName, description: 'معلومات غير متوفرة' }
}

const executeCommand = () => {
  switch(command.value.toLowerCase()) {
    case 'contact --email':
      commandOutput.value = '📧 البريد الإلكتروني: amr04801@gmail.com'
      break
    case 'contact --whatsapp':
      commandOutput.value = '📱 واتساب: +966557339170'
      break
    case 'view --projects':
      commandOutput.value = '🌐 جاري تحميل المشاريع...'
      setTimeout(() => window.location.href = '/projects', 1000)
      break
    case 'view --github':
      commandOutput.value = '⚡ جاري فتح GitHub...'
      setTimeout(() => window.open('https://github.com', '_blank'), 1000)
      break
    case 'system --status':
      commandOutput.value = '✅ جميع الأنظمة تعمل بشكل طبيعي - الجاهزية: 100%'
      break
    case 'help':
      commandOutput.value = 'الأوامر المتاحة: contact --email, contact --whatsapp, view --projects, view --github, system --status'
      break
    default:
      commandOutput.value = '❌ أمر غير معروف. اكتب "help" للحصول على قائمة الأوامر.'
  }
}

const startProject = () => {
  // Simulate project initialization
  const newLog = {
    id: Date.now(),
    message: 'بدء مشروع جديد... تهيئة البيئة التطويرية',
    time: new Date().toLocaleTimeString('ar-SA'),
    type: 'info'
  }
  activityLogs.value.push(newLog)
}

// Boot Sequence Animation
const startBootSequence = () => {
  let totalDelay = 0
  bootSequence.value.forEach((line, index) => {
    totalDelay += line.delay
    setTimeout(() => {
      currentBootLine.value = index
      bootProgress.value = ((index + 1) / bootSequence.value.length) * 100
      
      if (index === bootSequence.value.length - 1) {
        setTimeout(() => {
          isBooted.value = true
        }, 1000)
      }
    }, totalDelay)
  })
}

// Initialize
onMounted(() => {
  startBootSequence()
})
</script>

<style scoped>
/* CSS Variables */
:root {
  --cyber-cyan: #22d3ee;
  --cyber-blue: #3b82f6;
  --cyber-purple: #8b5cf6;
  --cyber-green: #10b981;
}

/* Boot Sequence */
.terminal-line {
  opacity: 0;
  animation: fadeInUp 0.5s ease-out forwards;
}

.terminal-line.active {
  opacity: 1;
}

.blinking-cursor {
  animation: blink 1s infinite;
}

@keyframes blink {
  0%, 50% { opacity: 1; }
  51%, 100% { opacity: 0; }
}

@keyframes fadeInUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Cyber Components */
.cyber-button {
  position: relative;
  padding: 0.75rem 1.5rem;
  border-radius: 0.75rem;
  border-width: 2px;
  transition: all 0.3s;
  font-family: monospace;
  font-weight: 600;
}

.cyber-button:hover {
  transform: scale(1.05);
}

.cyber-button-primary {
  background: linear-gradient(to right, #155e75, #1e40af);
  color: #cffafe;
  border-color: rgba(34, 211, 238, 0.5);
}

.cyber-button-primary:hover {
  background: linear-gradient(to right, #0891b2, #1d4ed8);
  border-color: rgba(34, 211, 238, 1);
}

.cyber-button-secondary {
  background: linear-gradient(to right, #7e22ce, #3730a3);
  color: #e9d5ff;
  border-color: rgba(192, 132, 252, 0.5);
}

.cyber-button-secondary:hover {
  background: linear-gradient(to right, #9333ea, #4338ca);
  border-color: rgba(192, 132, 252, 1);
}

.cyber-panel {
  background: rgba(17, 24, 39, 0.8);
  backdrop-filter: blur(16px);
  border-radius: 1rem;
  border: 1px solid rgba(34, 211, 238, 0.3);
  box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5);
  position: relative;
  overflow: hidden;
}

.cyber-card {
  position: relative;
  background: rgba(17, 24, 39, 0.6);
  backdrop-filter: blur(12px);
  border-radius: 0.75rem;
  padding: 1rem;
  border: 1px solid rgba(34, 211, 238, 0.2);
  transition: all 0.3s;
}

.cyber-card:hover {
  border-color: rgba(34, 211, 238, 0.5);
  transform: translateY(-2px);
  box-shadow: 0 10px 25px -5px rgba(34, 211, 238, 0.2);
}

.cyber-metric-card {
  padding: 1rem;
  border-radius: 0.75rem;
  background: rgba(17, 24, 39, 0.6);
  backdrop-filter: blur(12px);
  border: 1px solid rgba(34, 211, 238, 0.2);
  transition: all 0.3s;
}

.cyber-metric-card:hover {
  border-color: rgba(34, 211, 238, 0.5);
  transform: scale(1.02);
}

.cyber-terminal {
  font-family: monospace;
  color: #10b981;
  font-size: 0.75rem;
  background: rgba(17, 24, 39, 0.6);
  padding: 1rem;
  border-radius: 0.5rem;
  border: 1px solid rgba(34, 211, 238, 0.2);
  height: 10rem;
  overflow: hidden;
  position: relative;
}

.cyber-terminal-large {
  background: rgba(17, 24, 39, 0.8);
  backdrop-filter: blur(16px);
  border-radius: 1rem;
  border: 1px solid rgba(34, 211, 238, 0.3);
  overflow: hidden;
}

.cyber-tooltip {
  background: rgba(0, 0, 0, 0.9);
  backdrop-filter: blur(16px);
  border-radius: 0.5rem;
  padding: 0.75rem;
  border: 1px solid rgba(34, 211, 238, 0.5);
  max-width: 16rem;
}

.cyber-tab-active {
  background: linear-gradient(to right, #155e75, #1e40af);
  color: #cffafe;
}

/* Animations */
.typing-animation {
  overflow: hidden;
  border-right: 2px solid var(--cyber-cyan);
  white-space: nowrap;
  animation: typing 3.5s steps(40, end), blink-caret 0.75s step-end infinite;
}

@keyframes typing {
  from { width: 0 }
  to { width: 100% }
}

@keyframes blink-caret {
  from, to { border-color: transparent }
  50% { border-color: var(--cyber-cyan) }
}

.text-shadow-glow {
  text-shadow: 0 0 8px rgba(34, 211, 238, 0.5);
}

/* Scan Line Effect */
.scan-line {
  position: absolute;
  inset: 0;
  background: linear-gradient(to bottom, transparent, rgba(34, 211, 238, 0.05), transparent);
  animation: scan 3s linear infinite;
}

@keyframes scan {
  0% { transform: translateY(-100%); }
  100% { transform: translateY(100%); }
}

/* Tech Stack Cards */
.tech-card {
  position: relative;
  background: rgba(17, 24, 39, 0.6);
  backdrop-filter: blur(12px);
  border-radius: 0.5rem;
  padding: 1rem 0.5rem;
  border: 1px solid rgba(34, 211, 238, 0.2);
  transition: all 0.3s;
  text-align: center;
  overflow: hidden;
}

.tech-card:hover {
  border-color: rgba(34, 211, 238, 0.5);
  transform: scale(1.05);
}

.scan-animation {
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 1px;
  background: linear-gradient(to right, transparent, var(--cyber-cyan), transparent);
  animation: scanHorizontal 2s linear infinite;
}

@keyframes scanHorizontal {
  0% { transform: translateX(-100%); }
  100% { transform: translateX(100%); }
}

/* Core Modules Map */
.core-module {
  background: rgba(17, 24, 39, 0.8);
  backdrop-filter: blur(12px);
  border-radius: 0.75rem;
  padding: 0.75rem;
  border: 1px solid rgba(34, 211, 238, 0.3);
  transition: all 0.3s;
  text-align: center;
  width: 5rem;
  height: 5rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}

.core-module:hover {
  border-color: rgba(34, 211, 238, 0.6);
  transform: scale(1.1);
}

.core-module.central {
  width: 6rem;
  height: 6rem;
  background: rgba(34, 211, 238, 0.1);
}

.core-module.top-module { top: 10%; left: 50%; transform: translateX(-50%); }
.core-module.left-module { top: 50%; left: 10%; transform: translateY(-50%); }
.core-module.right-module { top: 50%; right: 10%; transform: translateY(-50%); }
.core-module.bottom-left-module { bottom: 10%; left: 25%; transform: translateX(-50%); }
.core-module.bottom-right-module { bottom: 10%; right: 25%; transform: translateX(50%); }

.connection-line {
  stroke: var(--cyber-cyan);
  stroke-width: 1.5;
  stroke-dasharray: 4;
  animation: dash 3s linear infinite;
  opacity: 0.4;
}

@keyframes dash {
  to {
    stroke-dashoffset: -8;
  }
}

/* Terminal Styles */
.terminal-header {
  background: rgba(0, 0, 0, 0.8);
  padding: 0.5rem 1rem;
  border-bottom: 1px solid rgba(34, 211, 238, 0.3);
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.command-input-group {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  background: rgba(0, 0, 0, 0.4);
  border-radius: 0.375rem;
  padding: 0.5rem 0.75rem;
  border: 1px solid rgba(34, 211, 238, 0.3);
}

.command-input-group:focus-within {
  border-color: var(--cyber-cyan);
}

.command-input {
  background: transparent;
  border: none;
  outline: none;
  color: #bae6fd;
  width: 100%;
  font-family: monospace;
}

.command-input::placeholder {
  color: rgba(34, 211, 238, 0.5);
}

.command-output {
  background: rgba(0, 0, 0, 0.4);
  border-radius: 0.375rem;
  padding: 0.75rem;
  border: 1px solid rgba(16, 185, 129, 0.3);
}

.terminal-log-line {
  display: flex;
  align-items: center;
  gap: 0.5rem;
  padding: 0.125rem 0;
}

/* Mobile Optimizations */
@media (max-width: 640px) {
  .core-module {
    width: 4rem;
    height: 4rem;
    padding: 0.5rem;
    font-size: 0.75rem;
  }
  
  .core-module.central {
    width: 5rem;
    height: 5rem;
  }
}

/* Accessibility */
@media (prefers-reduced-motion: reduce) {
  .typing-animation,
  .transition-all,
  .scan-line,
  .scan-animation,
  .blinking-cursor,
  .connection-line {
    animation: none !important;
    transition: none !important;
  }
}
</style>