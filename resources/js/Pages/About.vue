<template>
  <CyberneticLayout>
    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-6">
      <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-6xl md:text-7xl font-bold text-white mb-6 drop-shadow-2xl">
          <span class="bg-gradient-to-r from-green-400 via-yellow-400 to-orange-400 bg-clip-text text-transparent animate-gradient">
            عمرو تك
          </span>
        </h1>
        <p class="text-xl text-white/80 mb-8 max-w-2xl mx-auto">
          خلف الكواليس الرقمية - أصنع عجائب الويب منذ 2018
        </p>
      </div>
    </section>

    <!-- Story Section -->
    <section class="py-20 px-6">
      <div class="max-w-6xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 items-center">
          <!-- Animated Profile -->
          <div class="relative group">
            <div class="relative z-10 bg-gradient-to-br from-cyan-500/20 to-purple-500/20 rounded-3xl p-8 backdrop-blur-md border border-white/20 transform group-hover:scale-105 transition-all duration-500">
              <div class="text-center">
                <div class="w-32 h-32 mx-auto mb-6 relative">
                  <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" 
                       alt="عمرو" class="w-full h-full rounded-full object-cover border-4 border-white/20">
                  <div class="absolute inset-0 rounded-full bg-gradient-to-r from-cyan-400 to-purple-400 opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                </div>
                <h3 class="text-2xl font-bold text-white mb-2">عمرو</h3>
                <p class="text-cyan-300 font-medium">مطور واجهات أمامية</p>
              </div>
            </div>
            <!-- Floating Elements -->
            <div class="absolute -top-4 -left-4 w-20 h-20 bg-yellow-400 rounded-full blur-xl opacity-30 animate-pulse"></div>
            <div class="absolute -bottom-4 -right-4 w-24 h-24 bg-pink-400 rounded-full blur-xl opacity-30 animate-pulse" style="animation-delay: 1s;"></div>
          </div>

          <!-- Story Content -->
          <div class="space-y-6">
            <h2 class="text-4xl font-bold text-white mb-6">رحلتي في عالم الويب</h2>
            <p class="text-lg text-white/80 leading-relaxed">
              في عالم الرقمية، اكتشفت فن تطوير الويب. ما بدأ كتعلم أساسيات HTML تطور إلى إتقان تطوير الواجهات الأمامية المتقدمة.
            </p>
            <p class="text-lg text-white/80 leading-relaxed">
              على مدار <span class="text-cyan-300 font-semibold">5+ سنوات</span>، أتقنت فنون 
              <span class="text-purple-300">Vue.js</span>، <span class="text-green-300">React</span>، و 
              <span class="text-yellow-300">التقنيات الحديثة</span>. أتخصص في تحويل الأفكار المعقدة 
              إلى تجارب رقمية أنيقة ووظيفية.
            </p>
            <div class="flex flex-wrap gap-3 mt-8">
              <span v-for="skill in technicalSkills" :key="skill" 
                    class="bg-white/10 text-white/90 px-4 py-2 rounded-full border border-white/20 hover:bg-cyan-500/20 hover:border-cyan-400 transition-all duration-300 cursor-pointer transform hover:scale-105">
                {{ skill }}
              </span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Technical Skills -->
    <section class="py-20 px-6 bg-white/5 backdrop-blur-md">
      <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold text-center text-white mb-16">مهاراتي التقنية</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
          <div v-for="skill in skills" :key="skill.name" 
               class="group text-center p-8 rounded-3xl bg-white/10 backdrop-blur-md border border-white/20 hover:border-cyan-400/50 transition-all duration-500 transform hover:-translate-y-2">
            <div class="text-5xl mb-4 transform group-hover:scale-110 group-hover:rotate-12 transition-transform duration-300">
              {{ skill.icon }}
            </div>
            <h3 class="text-xl font-bold text-white mb-3">{{ skill.name }}</h3>
            <p class="text-white/70 text-sm">{{ skill.description }}</p>
            <div class="mt-4 w-full bg-white/20 rounded-full h-2">
              <div class="bg-gradient-to-r from-cyan-400 to-blue-500 h-2 rounded-full transition-all duration-1000" 
                   :style="{ width: skill.level }"></div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Timeline -->
    <section class="py-20 px-6">
      <div class="max-w-4xl mx-auto">
        <h2 class="text-4xl font-bold text-center text-white mb-16">خط الزمن المهني</h2>
        <div class="space-y-12">
          <div v-for="event in timeline" :key="event.year" 
               class="group relative flex items-center space-x-8 p-6 rounded-3xl bg-white/10 backdrop-blur-md border border-white/20 hover:border-purple-400/50 transition-all duration-300">
            <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-cyan-500 to-purple-500 rounded-2xl flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
              <span class="text-white font-bold">{{ event.year }}</span>
            </div>
            <div class="flex-1">
              <h3 class="text-xl font-bold text-white mb-2">{{ event.title }}</h3>
              <p class="text-white/70">{{ event.description }}</p>
            </div>
            <div class="text-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
              {{ event.icon }}
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 px-6 bg-gradient-to-b from-transparent to-black/30">
      <div class="max-w-6xl mx-auto">
        <h2 class="text-4xl font-bold text-center text-white mb-16">إحصائياتي</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <div v-for="stat in stats" :key="stat.title" 
               class="group text-center p-8 rounded-3xl bg-white/10 backdrop-blur-md border border-white/20 hover:border-cyan-400/50 transition-all duration-500 transform hover:-translate-y-2">
            <div class="text-4xl mb-4 text-cyan-400 transform group-hover:scale-110 transition-transform duration-300">
              {{ stat.icon }}
            </div>
            <div class="text-3xl font-bold text-white mb-2">{{ stat.value }}</div>
            <p class="text-white/70 text-sm">{{ stat.title }}</p>
          </div>
        </div>
      </div>
    </section>
  </CyberneticLayout>
</template>

<script setup>
import CyberneticLayout from '../Layouts/CyberneticLayout.vue'

const technicalSkills = [
  'Vue.js', 'React', 'JavaScript', 
  'CSS3', 'HTML5', 'Tailwind CSS',
  'Responsive Design', 'UI/UX'
]

const skills = [
  { name: 'تطوير الواجهات', icon: '🎨', level: '95%', description: 'تصميم واجهات مستخدم جذابة وسهلة الاستخدام' },
  { name: 'التفاعلية', icon: '⚡', level: '90%', description: 'تطبيقات ويب تفاعلية وسريعة الاستجابة' },
  { name: 'التصميم المتجاوب', icon: '📱', level: '92%', description: 'تصميم متكامل لجميع أحجام الشاشات' },
  { name: 'أداء الموقع', icon: '🚀', level: '88%', description: 'تحسين سرعة وأداء المواقع' }
]

const timeline = [
  { year: '2018', title: 'بداية الرحلة', description: 'بداية تعلم تطوير الويب وتصميم الواجهات', icon: '📜' },
  { year: '2019', title: 'إتقان JavaScript', description: 'التمكن من البرمجة بلغة JavaScript وتطبيقاتها', icon: '⚡' },
  { year: '2020', title: 'إتقان Vue.js', description: 'التركيز على إطار عمل Vue.js وتطبيقاته المتقدمة', icon: '🔮' },
  { year: '2022', title: 'العمل الحر', description: 'بداية العمل مع عملاء من مختلف أنحاء العالم', icon: '🎯' },
  { year: '2024', title: 'التخصص المتقدم', description: 'التعمق في تطوير واجهات مستخدم مبتكرة وتفاعلية', icon: '👑' }
]

const stats = [
  { icon: '🚀', value: '24+', title: 'مشروع مكتمل' },
  { icon: '⏳', value: '3', title: 'مشاريع جارية' },
  { icon: '👥', value: '18+', title: 'عميل راضٍ' },
  { icon: '📅', value: '5+', title: 'سنوات خبرة' }
]
</script>

<style scoped>
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
</style>