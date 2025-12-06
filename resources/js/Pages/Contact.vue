<template>
  <CyberneticLayout>
    <!-- Hero Section with Particles -->
    <section class="pt-32 pb-20 px-6 relative overflow-hidden">
      <!-- Animated Background Particles -->
      <div class="absolute inset-0 opacity-10 pointer-events-none">
        <div v-for="particle in floatingParticles" :key="particle.id"
             class="absolute text-cyan-400 animate-float"
             :style="particle.style">
          {{ particle.icon }}
        </div>
      </div>
      
      <div class="max-w-6xl mx-auto text-center relative z-10">
        <h1 class="text-6xl md:text-7xl font-bold text-white mb-6 drop-shadow-2xl">
          <span class="bg-gradient-to-r from-cyan-400 via-blue-400 to-purple-400 bg-clip-text text-transparent animate-gradient">
            اتصل بي
          </span>
        </h1>
        <p class="text-xl text-white/70 mb-4 max-w-2xl mx-auto">
          ابدأ تواصلك بخطوة بسيطة — وسأهتم بالباقي
        </p>
        <p class="text-lg text-white/60">
          مستعد لبدء رحلتك الرقمية؟ دعنا نعمل معًا على مشروعك القادم
        </p>
      </div>
    </section>

    <!-- Contact Dashboard Section -->
    <section class="py-16 px-6">
      <div class="max-w-4xl mx-auto">
        <!-- Main Contact Header -->
        <div class="text-center mb-12">
          <h2 class="text-4xl font-bold text-white mb-4">تواصل معي مباشرة</h2>
          <p class="text-xl text-white/70">اختر الطريقة المناسبة لك للتواصل</p>
        </div>

        <!-- Primary Contact Methods -->
        <div class="grid md:grid-cols-2 gap-8 mb-12">
          <!-- WhatsApp Card -->
          <div class="group relative bg-gradient-to-br from-green-500/20 to-green-600/20 backdrop-blur-md rounded-2xl p-8 border border-green-400/30 hover:border-green-400/60 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-green-500/20">
            <div class="text-center">
              <!-- Icon -->
              <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-6 transform group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300 shadow-2xl shadow-green-500/30">
                <span class="text-white text-3xl">💬</span>
              </div>
              
              <!-- Content -->
              <h3 class="text-2xl font-bold text-white mb-3">واتساب</h3>
              <p class="text-white/80 mb-4">تواصل فوري ومباشر</p>
              <p class="text-green-400 text-lg font-mono mb-6">+966 55 733 9170</p>
              
              <!-- Action Button -->
              <a href="https://wa.me/966557339170" target="_blank"
                 class="inline-flex items-center space-x-2 space-x-reverse bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 group/btn">
                <span>ابدأ المحادثة</span>
                <span class="group-hover/btn:translate-x-1 transition-transform">🚀</span>
              </a>
            </div>

            <!-- Hover Effect -->
            <div class="absolute inset-0 rounded-2xl overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-r from-green-500/0 via-green-500/10 to-green-500/0 transform -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
            </div>
          </div>

          <!-- Email Card -->
          <div class="group relative bg-gradient-to-br from-blue-500/20 to-blue-600/20 backdrop-blur-md rounded-2xl p-8 border border-blue-400/30 hover:border-blue-400/60 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-blue-500/20">
            <div class="text-center">
              <!-- Icon -->
              <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-6 transform group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300 shadow-2xl shadow-blue-500/30">
                <span class="text-white text-3xl">📧</span>
              </div>
              
              <!-- Content -->
              <h3 class="text-2xl font-bold text-white mb-3">البريد الإلكتروني</h3>
              <p class="text-white/80 mb-4">للرسائل الرسمية والمشاريع</p>
              <p class="text-blue-400 text-lg font-mono mb-6">amr04801@gmail.com</p>
              
              <!-- Action Button -->
              <a href="mailto:amr04801@gmail.com"
                 class="inline-flex items-center space-x-2 space-x-reverse bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl transition-all duration-300 transform hover:scale-105 group/btn">
                <span>أرسل بريدًا</span>
                <span class="group-hover/btn:translate-x-1 transition-transform">✉️</span>
              </a>
            </div>

            <!-- Hover Effect -->
            <div class="absolute inset-0 rounded-2xl overflow-hidden">
              <div class="absolute inset-0 bg-gradient-to-r from-blue-500/0 via-blue-500/10 to-blue-500/0 transform -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
            </div>
          </div>
        </div>

        <!-- Contact Information Grid -->
        <div class="grid sm:grid-cols-3 gap-6 mb-12">
          <div v-for="info in contactInfo" :key="info.id"
               class="group text-center p-6 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 hover:border-cyan-400/50 transition-all duration-300 transform hover:scale-105">
            <div class="text-3xl mb-3 text-cyan-400">{{ info.icon }}</div>
            <h4 class="text-white font-semibold mb-2">{{ info.title }}</h4>
            <p class="text-white/70 text-sm">{{ info.value }}</p>
            <p class="text-cyan-400 text-xs mt-2">{{ info.subtitle }}</p>
          </div>
        </div>

        <!-- Quick Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
          <div v-for="stat in quickStats" :key="stat.id"
               class="text-center p-6 bg-white/5 rounded-2xl border border-white/10 hover:border-cyan-400/30 transition-all duration-300">
            <div class="text-2xl mb-2" :class="stat.color">{{ stat.icon }}</div>
            <div class="text-white font-bold text-lg mb-1">{{ stat.value }}</div>
            <div class="text-white/60 text-sm">{{ stat.label }}</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Availability & Process Section -->
    <section class="py-20 px-6">
      <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16">
          <!-- Availability Timeline -->
          <div class="cyber-panel">
            <h2 class="text-3xl font-bold text-cyan-300 text-center mb-8">أوقات التوفر</h2>
            <div class="space-y-4">
              <div v-for="slot in availabilitySlots" :key="slot.id"
                   class="flex items-center space-x-4 space-x-reverse p-4 rounded-xl border border-cyan-500/30 bg-cyan-500/10 hover:bg-cyan-500/20 transition-all duration-300 group">
                <div class="text-2xl transform group-hover:scale-110 transition-transform">{{ slot.icon }}</div>
                <div class="flex-1 text-right">
                  <h4 class="text-white font-semibold">{{ slot.title }}</h4>
                  <p class="text-cyan-400 text-sm">{{ slot.time }}</p>
                </div>
                <div class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs border border-green-500/30">
                  {{ slot.status }}
                </div>
              </div>
            </div>
          </div>

          <!-- Work Process -->
          <div class="cyber-panel">
            <h2 class="text-3xl font-bold text-cyan-300 text-center mb-8">كيفية العمل</h2>
            <div class="space-y-6">
              <div v-for="step in workProcess" :key="step.id"
                   class="flex items-start space-x-4 space-x-reverse group">
                <div class="flex-shrink-0 w-10 h-10 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-full flex items-center justify-center text-white font-bold transform group-hover:scale-110 transition-transform">
                  {{ step.step }}
                </div>
                <div class="text-right flex-1">
                  <h4 class="text-white font-semibold mb-2">{{ step.title }}</h4>
                  <p class="text-white/70 text-sm leading-relaxed">{{ step.description }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-6 bg-gradient-to-r from-cyan-800/40 to-blue-800/40 backdrop-blur-md border-t border-white/20">
      <div class="max-w-4xl mx-auto text-center space-y-8">
        <!-- Main CTA -->
        <div>
          <h2 class="text-4xl font-bold text-white mb-6">هل أنت جاهز لبدء مشروعك؟</h2>
          <p class="text-xl text-white/70 mb-8">تواصل معي الآن ودعنا نصنع شيئًا مميزًا معًا</p>
        </div>

        <!-- CTA Buttons -->
        <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
          <a href="https://wa.me/966557339170" target="_blank"
             class="cyber-cta-btn cyber-cta-whatsapp group">
            <span class="flex items-center space-x-3 space-x-reverse">
              <span>تواصل عبر واتساب</span>
              <span class="text-2xl group-hover:scale-110 transition-transform">💬</span>
            </span>
          </a>
          
          <a href="mailto:amr04801@gmail.com"
             class="cyber-cta-btn cyber-cta-email group">
            <span class="flex items-center space-x-3 space-x-reverse">
              <span>أرسل بريدًا إلكترونيًا</span>
              <span class="text-2xl group-hover:scale-110 transition-transform">📧</span>
            </span>
          </a>
        </div>

        <!-- Quick Contact Info -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-8 border-t border-white/20">
          <div class="text-center p-4">
            <div class="text-green-400 text-2xl mb-2">💬</div>
            <div class="text-white font-mono text-lg">+966 55 733 9170</div>
            <div class="text-white/60 text-sm">واتساب</div>
          </div>
          <div class="text-center p-4">
            <div class="text-blue-400 text-2xl mb-2">📧</div>
            <div class="text-white font-mono text-lg">amr04801@gmail.com</div>
            <div class="text-white/60 text-sm">بريد إلكتروني</div>
          </div>
        </div>
      </div>
    </section>

    <!-- Floating Action Buttons -->
    <div class="fixed bottom-6 right-6 flex flex-col gap-3 z-50">
      <a v-for="action in floatingActions" :key="action.id"
         :href="action.href"
         :target="action.target"
         :class="action.class"
         class="floating-action-btn group relative">
        <span class="text-xl">{{ action.icon }}</span>
        
        <!-- Tooltip -->
        <div class="absolute left-full ml-3 top-1/2 transform -translate-y-1/2 bg-black/90 text-white px-3 py-2 rounded-lg text-sm whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none">
          {{ action.tooltip }}
          <div class="absolute right-full top-1/2 transform -translate-y-1/2 border-4 border-transparent border-r-black/90"></div>
        </div>
      </a>
    </div>
  </CyberneticLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import CyberneticLayout from '../Layouts/CyberneticLayout.vue'

// Floating Particles
const floatingParticles = ref([])

// Contact Information
const contactInfo = ref([
  {
    id: 1,
    icon: '⚡',
    title: 'وقت الاستجابة',
    value: 'خلال 24 ساعة',
    subtitle: 'أقصى حد للرد'
  },
  {
    id: 2,
    icon: '🌍',
    title: 'المكان',
    value: 'عمل عن بُعد',
    subtitle: 'متاح عالميًا'
  },
  {
    id: 3,
    icon: '💼',
    title: 'نوع العمل',
    value: 'مشاريع ويب',
    subtitle: 'تطوير وتصميم'
  }
])

// Quick Stats
const quickStats = ref([
  {
    id: 1,
    icon: '🚀',
    value: '24h',
    label: 'وقت الاستجابة',
    color: 'text-cyan-400'
  },
  {
    id: 2,
    icon: '✅',
    value: '100%',
    label: 'التواصل الفعال',
    color: 'text-green-400'
  },
  {
    id: 3,
    icon: '🌍',
    value: 'عالمي',
    label: 'نطاق العمل',
    color: 'text-purple-400'
  },
  {
    id: 4,
    icon: '💬',
    value: 'مباشر',
    label: 'دعم فوري',
    color: 'text-yellow-400'
  }
])

// Availability Slots
const availabilitySlots = ref([
  {
    id: 1,
    icon: '🌅',
    title: 'الصباح',
    time: '9:00 ص - 12:00 م',
    status: 'نشط'
  },
  {
    id: 2,
    icon: '☀️',
    title: 'الظهيرة',
    time: '1:00 م - 5:00 م',
    status: 'نشط'
  },
  {
    id: 3,
    icon: '🌙',
    title: 'المساء',
    time: '7:00 م - 10:00 م',
    status: 'متاح'
  }
])

// Work Process
const workProcess = ref([
  {
    id: 1,
    step: '1',
    title: 'التواصل الأولي',
    description: 'نناقش فكرتك ومتطلبات المشروع عبر واتساب أو البريد الإلكتروني'
  },
  {
    id: 2,
    step: '2',
    title: 'التحليل والتخطيط',
    description: 'أقوم بتحليل المشروع وتقديم خطة عمل وتكلفة مقترحة'
  },
  {
    id: 3,
    step: '3',
    title: 'بدء التطوير',
    description: 'نبدأ في تطوير المشروع مع تحديثات مستمرة عن التقدم'
  },
  {
    id: 4,
    step: '4',
    title: 'التسليم والدعم',
    description: 'تسليم المشروع النهائي مع دعم فني مستمر'
  }
])

// Floating Actions
const floatingActions = ref([
  {
    id: 1,
    icon: '💬',
    href: 'https://wa.me/966557339170',
    target: '_blank',
    class: 'bg-green-600 hover:bg-green-700',
    tooltip: 'تحدث معي على واتساب'
  },
  {
    id: 2,
    icon: '📧',
    href: 'mailto:amr04801@gmail.com',
    target: '_self',
    class: 'bg-blue-600 hover:bg-blue-700',
    tooltip: 'أرسل بريدًا إلكترونيًا'
  }
])

// Initialize animations
const initializeParticles = () => {
  floatingParticles.value = Array.from({length: 8}, (_, i) => ({
    id: i,
    icon: ['💬', '📧', '📱', '⚡', '🌍', '🚀', '💡', '⭐'][i],
    style: {
      left: Math.random() * 100 + '%',
      top: Math.random() * 100 + '%',
      animationDelay: Math.random() * 5 + 's',
      animationDuration: (Math.random() * 10 + 10) + 's'
    }
  }))
}

onMounted(() => {
  initializeParticles()
})
</script>

<style scoped>
/* Gradient Animation */
.animate-gradient {
  background-size: 200% 200%;
  animation: gradient 3s ease infinite;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

/* Floating Animation */
.animate-float {
  animation: float linear infinite;
}

@keyframes float {
  0%, 100% {
    transform: translateY(0px) rotate(0deg);
  }
  33% {
    transform: translateY(-20px) rotate(120deg);
  }
  66% {
    transform: translateY(10px) rotate(240deg);
  }
}

/* Cyber Panel */
.cyber-panel {
  background: rgba(17, 24, 39, 0.8);
  backdrop-filter: blur(16px);
  border-radius: 1.5rem;
  padding: 2rem;
  border: 1px solid rgba(34, 211, 238, 0.3);
  box-shadow: 0 25px 50px -12px rgba(34, 211, 238, 0.1);
  position: relative;
  overflow: hidden;
}

.cyber-panel::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 1px;
  background: linear-gradient(90deg, transparent, rgba(34, 211, 238, 0.5), transparent);
}

/* CTA Buttons */
.cyber-cta-btn {
  padding: 1.25rem 2.5rem;
  border-radius: 1rem;
  font-weight: 600;
  font-family: monospace;
  transition: all 0.3s;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  min-width: 250px;
  text-align: center;
  font-size: 1.1rem;
}

.cyber-cta-whatsapp {
  background: linear-gradient(135deg, #25D366, #128C7E);
  color: white;
  border: none;
}

.cyber-cta-whatsapp:hover {
  transform: translateY(-3px);
  box-shadow: 0 20px 40px -10px rgba(37, 211, 102, 0.4);
}

.cyber-cta-email {
  background: linear-gradient(135deg, #EA4335, #4285F4);
  color: white;
  border: none;
}

.cyber-cta-email:hover {
  transform: translateY(-3px);
  box-shadow: 0 20px 40px -10px rgba(66, 133, 244, 0.4);
}

/* Floating Action Buttons */
.floating-action-btn {
  width: 56px;
  height: 56px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: white;
  text-decoration: none;
  transition: all 0.3s;
  box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
}

.floating-action-btn:hover {
  transform: scale(1.1) translateY(-2px);
  box-shadow: 0 15px 30px -5px rgba(0, 0, 0, 0.4);
}

/* Mobile Optimizations */
@media (max-width: 768px) {
  .cyber-cta-btn {
    min-width: 200px;
    padding: 1rem 2rem;
    font-size: 1rem;
  }
}

/* Accessibility */
@media (prefers-reduced-motion: reduce) {
  .animate-gradient,
  .animate-float {
    animation: none;
  }
  
  .cyber-cta-btn:hover,
  .floating-action-btn:hover {
    transform: none;
  }
}
</style>