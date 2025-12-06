<template>
  <CyberneticLayout>
    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-6">
      <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-6xl md:text-7xl font-bold text-white mb-6 drop-shadow-2xl">
          <span class="bg-gradient-to-r from-purple-400 via-pink-400 to-red-400 bg-clip-text text-transparent animate-gradient">
            مشاريعي
          </span>
        </h1>
        <p class="text-xl text-white/80 mb-8 max-w-2xl mx-auto">
          مجموعة من إبداعاتي الرقمية وتطبيقات الويب المميزة
        </p>
      </div>
    </section>

    <!-- Interactive Filter -->
    <section class="py-8 px-6">
      <div class="max-w-6xl mx-auto">
        <div class="flex flex-wrap justify-center gap-4 mb-12">
          <button v-for="filter in filters" :key="filter" 
                  @click="activeFilter = filter"
                  :class="[
                    'px-6 py-3 rounded-full border transition-all duration-300 transform hover:scale-105 font-mono text-sm',
                    activeFilter === filter 
                      ? 'bg-cyan-500 text-white border-cyan-400 shadow-lg shadow-cyan-500/25' 
                      : 'bg-white/10 text-white/80 border-white/20 hover:bg-white/20'
                  ]">
            {{ filter }}
          </button>
        </div>
      </div>
    </section>

    <!-- Projects Grid -->
    <section class="py-16 px-6">
      <div class="max-w-7xl mx-auto">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="project in filteredProjects" :key="project.id"
               class="group relative bg-white/10 backdrop-blur-md rounded-3xl overflow-hidden border border-white/20 hover:border-cyan-400/50 transition-all duration-700 transform hover:scale-105">
            
            <!-- Project Image with Overlay -->
            <div class="relative h-48 overflow-hidden">
              <img :src="project.image" :alt="project.title" 
                   class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              <div class="absolute top-4 left-4">
                <span class="bg-gradient-to-r from-cyan-500 to-blue-500 text-white px-3 py-1 rounded-full text-sm font-mono shadow-lg">
                  {{ project.category }}
                </span>
              </div>
              <!-- Animated Elements -->
              <div class="absolute inset-0 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                <div v-for="i in 8" :key="i" 
                     class="absolute w-2 h-2 bg-yellow-300 rounded-full animate-ping"
                     :style="{
                       left: Math.random() * 100 + '%',
                       top: Math.random() * 100 + '%',
                       animationDelay: Math.random() * 2 + 's'
                     }">
                </div>
              </div>
            </div>
            
            <!-- Project Content -->
            <div class="p-6 relative z-10">
              <h3 class="text-xl font-bold text-white mb-2 group-hover:text-cyan-300 transition-colors text-right">
                {{ project.title }}
              </h3>
              <p class="text-white/70 mb-4 text-sm text-right">{{ project.description }}</p>
              
              <!-- Tech Stack -->
              <div class="flex flex-wrap gap-2 mb-4 justify-end">
                <span v-for="tech in project.tech" :key="tech"
                      class="bg-white/10 text-white/90 px-3 py-1 rounded-full text-xs border border-white/20 hover:bg-cyan-500/20 hover:border-cyan-400 transition-all duration-300">
                  {{ tech }}
                </span>
              </div>
              
              <!-- Action Buttons -->
              <div class="flex space-x-3 space-x-reverse">
                <a :href="project.liveUrl" target="_blank"
                        class="flex-1 bg-gradient-to-r from-cyan-500 to-blue-500 text-white py-2 px-4 rounded-lg hover:from-cyan-600 hover:to-blue-600 transition-all duration-300 transform hover:scale-105 group/btn text-center">
                  <span class="flex items-center justify-center space-x-2 space-x-reverse">
                    <span>عرض المشروع</span>
                    <span class="group-hover/btn:rotate-180 transition-transform">🔮</span>
                  </span>
                </a>
                <button @click="viewDetails(project)"
                        class="px-4 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg hover:from-purple-600 hover:to-pink-600 transition-all duration-300 transform hover:scale-105">
                  ✨
                </button>
              </div>
            </div>

            <!-- Glow Effect -->
            <div class="absolute inset-0 rounded-3xl bg-cyan-500/20 blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10"></div>
          </div>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 px-6">
      <div class="max-w-4xl mx-auto text-center">
        <div class="bg-gradient-to-r from-purple-500/20 to-pink-500/20 rounded-3xl p-12 backdrop-blur-md border border-white/20">
          <h2 class="text-4xl font-bold text-white mb-6">مستعد لبدء مشروعك؟</h2>
          <p class="text-xl text-white/80 mb-8">
            دعنا نعمل معًا لبناء شيء استثنائي
          </p>
          <a href="/contact"
                class="inline-block bg-gradient-to-r from-cyan-500 to-blue-500 text-white px-8 py-4 rounded-xl hover:from-cyan-600 hover:to-blue-600 transition-all duration-300 transform hover:scale-105 shadow-2xl hover:shadow-cyan-500/25">
            <span class="flex items-center space-x-2 space-x-reverse">
              <span>ابدأ مشروعك</span>
              <span class="animate-bounce">🚀</span>
            </span>
          </a>
        </div>
      </div>
    </section>
  </CyberneticLayout>
</template>

<script setup>
import CyberneticLayout from '../Layouts/CyberneticLayout.vue'
import { computed, ref } from 'vue'

const activeFilter = ref('الكل')

const filters = ['الكل', 'مواقع ويب', 'متاجر إلكترونية', 'تطبيقات ويب', 'تصميم واجهات']

const projects = [
  {
    id: 1,
    title: 'سكبة',
    description: 'منصة إلكترونية متكاملة تقدم خدمات متنوعة مع واجهة مستخدم مبتكرة وسهلة الاستخدام',
    category: 'موقع ويب',
    tech: ['Vue.js', 'Tailwind CSS', 'JavaScript', 'Responsive'],
    image: 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
    liveUrl: 'https://sakkbah.sa/'
  },
  {
    id: 2,
    title: 'صناديق',
    description: 'متجر إلكتروني متخصص مع نظام إدارة محتوى متكامل وتجربة مستخدم محسنة',
    category: 'متجر إلكتروني',
    tech: ['Vue.js', 'CSS3', 'UI/UX', 'E-commerce'],
    image: 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
    liveUrl: 'https://sanadeeq.sa/'
  },
  {
    id: 3,
    title: 'منصة تعليمية',
    description: 'منصة للتعلم عن بعد مع نظام متابعة الطلاب وإدارة المحتوى التعليمي',
    category: 'تطبيق ويب',
    tech: ['Vue.js', 'Firebase', 'Real-time', 'PWA'],
    image: 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
  },
  {
    id: 4,
    title: 'نظام حجوزات',
    description: 'نظام متكامل لإدارة الحجوزات والمواعيد مع واجهة إدارة سهلة الاستخدام',
    category: 'تطبيق ويب',
    tech: ['React', 'Node.js', 'MongoDB', 'REST API'],
    image: 'https://images.unsplash.com/photo-1432888622747-4eb9a8efeb07?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
  },
  {
    id: 5,
    title: 'موقع شركة',
    description: 'موقع مؤسسي احترافي مع نظام عرض الخدمات وطلب الاستشارات',
    category: 'موقع ويب',
    tech: ['HTML5', 'CSS3', 'JavaScript', 'SEO'],
    image: 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
  },
  {
    id: 6,
    title: 'لوحة تحكم',
    description: 'لوحة تحكم متقدمة لإدارة المحتوى والبيانات مع رسوم بيانية تفاعلية',
    category: 'تطبيق ويب',
    tech: ['Vue.js', 'Chart.js', 'Admin', 'Dashboard'],
    image: 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80'
  }
]

const filteredProjects = computed(() => {
  if (activeFilter.value === 'الكل') return projects
  return projects.filter(project => {
    const categoryMap = {
      'مواقع ويب': 'موقع ويب',
      'متاجر إلكترونية': 'متجر إلكتروني',
      'تطبيقات ويب': 'تطبيق ويب',
      'تصميم واجهات': 'موقع ويب'
    }
    return project.category === categoryMap[activeFilter.value]
  })
})

const viewDetails = (project) => {
  console.log('عرض تفاصيل المشروع:', project.title)
}
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