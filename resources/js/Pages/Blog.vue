<template>
  <CyberneticLayout>
    <!-- Blog Header -->
    <section class="pt-32 pb-20 px-6">
      <div class="max-w-6xl mx-auto text-center">
        <h1 class="text-5xl md:text-7xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-cyan-300 via-blue-400 to-purple-400 mb-6 font-mono tracking-tighter">
          المدونة
        </h1>
        <p class="text-xl text-gray-400 mb-8 max-w-2xl mx-auto font-light">
          رؤى تقنية، اكتشافات تكنولوجية، وأفكار في تطوير الويب
        </p>
        
        <!-- Blog Stats -->
        <div class="flex justify-center space-x-8 space-x-reverse text-cyan-400 font-mono text-sm">
          <div class="flex items-center space-x-2 space-x-reverse">
            <div class="w-2 h-2 bg-cyan-400 rounded-full animate-pulse"></div>
            <span>{{ posts.length }} مقالة</span>
          </div>
          <div class="flex items-center space-x-2 space-x-reverse">
            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
            <span>النظام يعمل بأفضل حال</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Blog Content -->
    <section class="py-16 px-6">
      <div class="max-w-6xl mx-auto">
        <!-- Featured Post -->
        <div v-if="featuredPost" class="mb-16 group">
          <div class="bg-black/40 backdrop-blur-md rounded-2xl overflow-hidden border border-cyan-500/30 hover:border-cyan-400/50 transition-all duration-500 transform hover:scale-[1.02] cursor-pointer"
               @click="openBlogModal(featuredPost)">
            <div class="grid lg:grid-cols-2 gap-8">
              <!-- Featured Image -->
              <div class="relative h-64 lg:h-full overflow-hidden order-2">
                <img :src="featuredPost.image" :alt="featuredPost.title" 
                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-r from-cyan-500/20 to-blue-500/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <div class="absolute top-4 right-4">
                  <span class="bg-cyan-500 text-cyan-900 px-3 py-1 rounded-full text-sm font-mono font-bold">
                    مميز
                  </span>
                </div>
              </div>
              
              <!-- Featured Content -->
              <div class="p-8 flex flex-col justify-center order-1">
                <div class="flex items-center space-x-4 space-x-reverse mb-4 justify-end">
                  <span class="text-cyan-400 font-mono text-sm">{{ featuredPost.date }}</span>
                  <span class="text-gray-500 font-mono text-sm">•</span>
                  <span class="text-cyan-400 font-mono text-sm">{{ featuredPost.readTime }}</span>
                </div>
                
                <h2 class="text-2xl lg:text-3xl font-bold text-cyan-300 mb-4 font-mono group-hover:text-cyan-200 transition-colors text-right">
                  {{ featuredPost.title }}
                </h2>
                
                <p class="text-gray-400 mb-6 leading-relaxed text-right">
                  {{ featuredPost.excerpt }}
                </p>
                
                <!-- Tags -->
                <div class="flex flex-wrap gap-2 mb-6 justify-end">
                  <span v-for="tag in featuredPost.tags" :key="tag"
                        class="bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full text-xs font-mono border border-cyan-500/30">
                    #{{ tag }}
                  </span>
                </div>
                
                <div class="inline-flex items-center space-x-2 space-x-reverse text-cyan-400 font-mono transition-colors group/btn justify-end">
                  <span>> اقرأ المقال كاملاً</span>
                  <span class="group-hover/btn:-translate-x-1 transition-transform">}</span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Blog Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div v-for="post in regularPosts" :key="post.id"
               class="group relative bg-black/40 backdrop-blur-md rounded-xl overflow-hidden border border-cyan-500/20 hover:border-cyan-400/50 transition-all duration-500 transform hover:-translate-y-2 cursor-pointer"
               @click="openBlogModal(post)">
            
            <!-- Post Image -->
            <div class="relative h-48 overflow-hidden">
              <img :src="post.image" :alt="post.title" 
                   class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
              <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
              <div class="absolute top-4 left-4">
                <span class="bg-blue-500/80 text-blue-100 px-2 py-1 rounded text-xs font-mono">
                  {{ post.category }}
                </span>
              </div>
            </div>
            
            <!-- Post Content -->
            <div class="p-6">
              <div class="flex items-center justify-between mb-3">
                <span class="text-cyan-400 font-mono text-xs">{{ post.date }}</span>
                <span class="text-gray-500 font-mono text-xs">{{ post.readTime }}</span>
              </div>
              
              <h3 class="text-lg font-bold text-cyan-300 mb-3 font-mono group-hover:text-cyan-200 transition-colors leading-tight text-right">
                {{ post.title }}
              </h3>
              
              <p class="text-gray-400 text-sm mb-4 leading-relaxed text-right">
                {{ post.excerpt }}
              </p>
              
              <!-- Tags -->
              <div class="flex flex-wrap gap-1 mb-4 justify-end">
                <span v-for="tag in post.tags.slice(0, 2)" :key="tag"
                      class="bg-gray-700 text-gray-300 px-2 py-1 rounded text-xs font-mono">
                  #{{ tag }}
                </span>
                <span v-if="post.tags.length > 2" class="text-gray-500 text-xs font-mono">
                  +{{ post.tags.length - 2 }}
                </span>
              </div>
              
              <div class="inline-flex items-center space-x-1 space-x-reverse text-cyan-400 font-mono text-sm transition-colors group/read justify-end">
                <span>> اقرأ المزيد</span>
                <span class="group-hover/read:-translate-x-1 transition-transform">←</span>
              </div>
            </div>

            <!-- Hover Glow Effect -->
            <div class="absolute inset-0 rounded-xl bg-cyan-500/10 blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500 -z-10"></div>
          </div>
        </div>

        <!-- Load More -->
        <div class="text-center mt-16">
          <button @click="loadMore" 
                  class="bg-gradient-to-r from-cyan-600 to-blue-700 text-cyan-100 px-8 py-3 rounded-lg border border-cyan-500/50 hover:border-cyan-300 transition-all duration-300 transform hover:scale-105 font-mono">
            > تحميل المزيد
          </button>
        </div>
      </div>
    </section>

    

    <!-- Blog Modal -->
    <div v-if="selectedBlog" class="fixed inset-0 z-50 flex items-center justify-center p-6 bg-black/80 backdrop-blur-md transition-all duration-500"
         :class="blogModalClass">
      <div class="relative max-w-4xl w-full max-h-[90vh] overflow-hidden bg-gradient-to-br from-gray-900 to-black rounded-3xl border border-cyan-500/30 shadow-2xl shadow-cyan-500/20">
        
        <!-- Modal Header -->
        <div class="relative p-6 border-b border-cyan-500/30 bg-black/40">
          <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-cyan-300 font-mono text-right flex-1 mr-4">
              {{ selectedBlog.title }}
            </h2>
            <button @click="closeBlogModal" 
                    class="flex-shrink-0 w-10 h-10 bg-cyan-500/20 hover:bg-cyan-500/30 border border-cyan-500/50 rounded-xl flex items-center justify-center transition-all duration-300 transform hover:scale-110 hover:rotate-90 group">
              <span class="text-cyan-300 group-hover:text-cyan-200 transition-colors">✕</span>
            </button>
          </div>
          <div class="flex items-center space-x-4 space-x-reverse justify-end mt-4">
            <span class="text-cyan-400 font-mono text-sm">{{ selectedBlog.date }}</span>
            <span class="text-gray-500">•</span>
            <span class="text-cyan-400 font-mono text-sm">{{ selectedBlog.readTime }}</span>
            <span class="text-gray-500">•</span>
            <span class="text-blue-400 font-mono text-sm">{{ selectedBlog.category }}</span>
          </div>
        </div>

        <!-- Modal Content -->
        <div class="overflow-y-auto max-h-[calc(90vh-200px)]">
          <div class="p-8">
            <!-- Blog Image -->
            <div class="relative h-64 mb-8 rounded-2xl overflow-hidden">
              <img :src="selectedBlog.image" :alt="selectedBlog.title" 
                   class="w-full h-full object-cover">
              <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
            </div>

            <!-- Blog Content -->
            <div class="prose prose-invert max-w-none text-right" dir="rtl">
              <div v-html="selectedBlog.fullContent" class="text-gray-300 leading-relaxed space-y-6"></div>
            </div>

            <!-- Tags -->
            <div class="flex flex-wrap gap-2 mt-8 justify-end">
              <span v-for="tag in selectedBlog.tags" :key="tag"
                    class="bg-cyan-500/10 text-cyan-400 px-3 py-1 rounded-full text-sm font-mono border border-cyan-500/30 hover:bg-cyan-500/20 transition-all duration-300 cursor-pointer">
                #{{ tag }}
              </span>
            </div>
          </div>
        </div>

        <!-- Modal Footer -->
        <div class="p-6 border-t border-cyan-500/30 bg-black/40">
          <div class="flex items-center justify-between">
            <div class="flex items-center space-x-4 space-x-reverse">
              <button @click="shareBlog" 
                      class="flex items-center space-x-2 space-x-reverse text-cyan-400 hover:text-cyan-300 transition-colors group">
                <span>مشاركة</span>
                <span class="group-hover:scale-110 transition-transform">📤</span>
              </button>
            </div>
            <button @click="closeBlogModal" 
                    class="bg-gradient-to-r from-cyan-600 to-blue-700 text-cyan-100 px-6 py-2 rounded-lg border border-cyan-500/50 hover:border-cyan-300 transition-all duration-300 transform hover:scale-105 font-mono">
              إغلاق
            </button>
          </div>
        </div>

        <!-- Cybernetic Effects -->
        <div class="absolute top-4 left-4 w-3 h-3 bg-cyan-400 rounded-full animate-pulse shadow-lg shadow-cyan-400"></div>
        <div class="absolute bottom-4 right-4 w-3 h-3 bg-blue-400 rounded-full animate-pulse shadow-lg shadow-blue-400" style="animation-delay: 0.5s;"></div>
      </div>
    </div>
  </CyberneticLayout>
</template>

<script setup>
import CyberneticLayout from '../Layouts/CyberneticLayout.vue'
import { ref, computed } from 'vue'

const selectedBlog = ref(null)
const showModal = ref(false)

// Mock blog data with full content
const posts = ref([
  {
    id: 1,
    slug: 'vuejs-best-practices',
    title: 'أفضل الممارسات في Vue.js',
    excerpt: 'استكشاف أفضل الطرق والممارسات لكتابة كود نظيف وفعال باستخدام Vue.js',
    fullContent: `
      <h3 class="text-2xl font-bold text-cyan-300 mb-4">مقدمة في Vue.js</h3>
      <p class="mb-4">Vue.js هو إطار عمل تقدمي لبناء واجهات المستخدم. على عكس الأطر الأخرى الأحادية، تم تصميم Vue.js من الأسفل إلى الأعلى لتطوير تدريجي. تعتبر المكتبة الأساسية تركز فقط على طبقة العرض، ويسهل دمجها مع مكتبات أو مشاريع موجودة.</p>
      
      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">المزايا الرئيسية</h4>
      <ul class="list-disc pr-6 mb-4 space-y-2">
        <li>منحنى تعلم سهل ومتدرج</li>
        <li>أداء عالي وسريع</li>
        <li>مرونة في التطوير</li>
        <li>مجتمع نشط ودعم قوي</li>
      </ul>

      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">أفضل الممارسات</h4>
      <div class="bg-gray-800 rounded-xl p-4 mb-4 border border-cyan-500/20">
        <pre class="text-cyan-300 text-sm"><code>// مثال على كود نظيف
export default {
  name: 'UserProfile',
  props: {
    user: {
      type: Object,
      required: true
    }
  },
  data() {
    return {
      isLoading: false,
      userData: null
    }
  },
  computed: {
    fullName() {
      return \`\${this.user.firstName} \${this.user.lastName}\`
    }
  },
  methods: {
    async fetchUserData() {
      this.isLoading = true
      try {
        this.userData = await api.getUser(this.user.id)
      } catch (error) {
        console.error('Error:', error)
      } finally {
        this.isLoading = false
      }
    }
  }
}</code></pre>
      </div>

      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">نصائح للتطوير</h4>
      <p class="mb-4">استخدم Composition API للمشاريع الكبيرة، حافظ على المكونات صغيرة ومتخصصة، استخدم Vuex لإدارة الحالة، وطبق مبدأ Single Responsibility Principle.</p>
    `,
    image: 'https://images.unsplash.com/photo-1501504905252-473c47e087f8?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
    date: '2024-12-01',
    readTime: '8 دقائق',
    category: 'تطوير الويب',
    tags: ['Vue.js', 'أفضل الممارسات', 'JavaScript', 'تطوير الواجهات'],
    featured: true
  },
  {
    id: 2,
    slug: 'responsive-design',
    title: 'التصميم المتجاوب في 2024',
    excerpt: 'أحدث تقنيات وأساليب التصميم المتجاوب لمواكبة تطور الأجهزة المختلفة',
    fullContent: `
      <h3 class="text-2xl font-bold text-cyan-300 mb-4">ثورة التصميم المتجاوب</h3>
      <p class="mb-4">التصميم المتجاوب لم يعد رفاهية بل أصبح ضرورة في عالم يزداد فيه استخدام الأجهزة المحمولة. في 2024، نشهد تطورات كبيرة في هذا المجال.</p>
      
      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">أحدث التقنيات</h4>
      <ul class="list-disc pr-6 mb-4 space-y-2">
        <li>CSS Container Queries</li>
        <li>CSS Subgrid</li>
        <li>Viewport Units الجديدة</li>
        <li>تحسينات في Flexbox و Grid</li>
      </ul>

      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">أفضل الممارسات</h4>
      <div class="bg-gray-800 rounded-xl p-4 mb-4 border border-cyan-500/20">
        <pre class="text-cyan-300 text-sm"><code>/* مثال على CSS حديث */
.container {
  container-type: inline-size;
}

@container (min-width: 400px) {
  .card {
    grid-template-columns: 1fr 2fr;
  }
}

.responsive-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 1rem;
}

.fluid-typography {
  font-size: clamp(1rem, 2.5vw, 2rem);
}</code></pre>
      </div>

      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">استراتيجيات التطبيق</h4>
      <p class="mb-4">ابدأ بتصميم Mobile First، استخدم نظام Grid مرن، طبق Fluid Typography، واختبر على أجهزة متعددة.</p>
    `,
    image: 'https://images.unsplash.com/photo-1635070041078-e363dbe005cb?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
    date: '2024-11-28',
    readTime: '6 دقائق',
    category: 'تصميم',
    tags: ['تصميم متجاوب', 'CSS', 'موبايل', 'تجربة المستخدم'],
    featured: false
  },
  {
    id: 3,
    slug: 'web-performance',
    title: 'تحسين أداء المواقع',
    excerpt: 'استراتيجيات وأدوات فعالة لتحسين سرعة وأداء مواقع الويب',
    fullContent: `
      <h3 class="text-2xl font-bold text-cyan-300 mb-4">أهمية أداء المواقع</h3>
      <p class="mb-4">أداء الموقع يؤثر مباشرة على تجربة المستخدم، تحسين محركات البحث، ومعدلات التحويل. كل ثانية تأخير يمكن أن تكلفك عملاء محتملين.</p>
      
      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">استراتيجيات التحسين</h4>
      <ul class="list-disc pr-6 mb-4 space-y-2">
        <li>تحسين الصور والفيديو</li>
        <li>تقليل طلبات HTTP</li>
        <li>استخدام التخزين المؤقت</li>
        <li>تحسين JavaScript و CSS</li>
        <li>استخدام CDN</li>
      </ul>

      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">أدوات القياس</h4>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
        <div class="bg-gray-800 rounded-lg p-4 border border-cyan-500/20">
          <h5 class="text-cyan-300 font-bold mb-2">Google PageSpeed</h5>
          <p class="text-sm text-gray-300">أداة مجانية لتحليل أداء المواقع وتقديم توصيات التحسين.</p>
        </div>
        <div class="bg-gray-800 rounded-lg p-4 border border-cyan-500/20">
          <h5 class="text-cyan-300 font-bold mb-2">GTmetrix</h5>
          <p class="text-sm text-gray-300">تحليل شامل للأداء مع تقارير مفصلة واقتراحات عملية.</p>
        </div>
      </div>

      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">نصائح فورية</h4>
      <p class="mb-4">استخدم lazy loading للصور، قلل من استخدام المكتبات الخارجية، طبق code splitting، واحرص على compression الملفات.</p>
    `,
    image: 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
    date: '2024-11-25',
    readTime: '10 دقائق',
    category: 'أداء',
    tags: ['أداء', 'تحسين', 'سرعة', 'SEO'],
    featured: false
  },
  {
    id: 4,
    slug: 'tailwind-css',
    title: 'إتقان Tailwind CSS',
    excerpt: 'كيفية الاستفادة القصوى من Tailwind CSS في مشاريعك التالية',
    fullContent: `
      <h3 class="text-2xl font-bold text-cyan-300 mb-4">ما هو Tailwind CSS؟</h3>
      <p class="mb-4">Tailwind CSS هو إطار عمل CSS من فئة Utility-First يسمح لك ببناء تصاميم مخصصة مباشرة في ملف HTML الخاص بك.</p>
      
      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">المزايا الرئيسية</h4>
      <ul class="list-disc pr-6 mb-4 space-y-2">
        <li>لا حاجة لكتابة CSS مخصص</li>
        <li>تصاميم متسقة وسريعة</li>
        <li>مرونة عالية في التصميم</li>
        <li>حجم ملف صغير بعد البناء</li>
      </ul>

      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">أمثلة عملية</h4>
      <div class="bg-gray-800 rounded-xl p-4 mb-4 border border-cyan-500/20">
        <pre class="text-cyan-300 text-sm"><code>&lt;!-- زر باستخدام Tailwind --&gt;
&lt;button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors duration-200"&gt;
  انقر هنا
&lt;/button&gt;

&lt;!-- بطاقة منتج --&gt;
&lt;div class="max-w-sm rounded-lg overflow-hidden shadow-lg bg-white"&gt;
  &lt;img class="w-full" src="/img/card-top.jpg" alt="Product"&gt;
  &lt;div class="px-6 py-4"&gt;
    &lt;div class="font-bold text-xl mb-2"&gt;اسم المنتج&lt;/div&gt;
    &lt;p class="text-gray-700 text-base"&gt;وصف المنتج...&lt;/p&gt;
  &lt;/div&gt;
&lt;/div&gt;</code></pre>
      </div>

      <h4 class="text-xl font-bold text-cyan-200 mb-3 mt-6">نصائح متقدمة</h4>
      <p class="mb-4">استخدم @apply لإنشاء مكونات مخصصة، طبق التخصيص عبر tailwind.config.js، استخدم Plugins للإضافات، واحرص على PurgeCSS للإنتاج.</p>
    `,
    image: 'https://images.unsplash.com/photo-1667372393119-3d4c48d07fc9?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80',
    date: '2024-11-20',
    readTime: '7 دقائق',
    category: 'CSS',
    tags: ['Tailwind', 'CSS', 'إطار عمل', 'تصميم'],
    featured: false
  }
])

const featuredPost = computed(() => {
  return posts.value.find(post => post.featured)
})

const regularPosts = computed(() => {
  return posts.value.filter(post => !post.featured)
})

const blogModalClass = computed(() => {
  return showModal.value ? 'opacity-100 scale-100' : 'opacity-0 scale-95 pointer-events-none'
})

const openBlogModal = (blog) => {
  selectedBlog.value = blog
  showModal.value = true
  document.body.style.overflow = 'hidden'
}

const closeBlogModal = () => {
  showModal.value = false
  setTimeout(() => {
    selectedBlog.value = null
    document.body.style.overflow = 'auto'
  }, 300)
}

const shareBlog = () => {
  if (navigator.share) {
    navigator.share({
      title: selectedBlog.value.title,
      text: selectedBlog.value.excerpt,
      url: window.location.href + '/blog/' + selectedBlog.value.slug
    })
  } else {
    // Fallback for browsers that don't support Web Share API
    navigator.clipboard.writeText(window.location.href + '/blog/' + selectedBlog.value.slug)
    alert('تم نسخ رابط المقال إلى الحافظة!')
  }
}

const loadMore = () => {
  // In a real app, this would load more posts from an API
  console.log('جاري تحميل المزيد من المقالات...')
}

// Close modal on ESC key
const handleKeydown = (event) => {
  if (event.key === 'Escape' && showModal.value) {
    closeBlogModal()
  }
}

// Add event listener
if (typeof window !== 'undefined') {
  window.addEventListener('keydown', handleKeydown)
}
</script>

<style scoped>
/* Custom scrollbar for modal */
::-webkit-scrollbar {
  width: 8px;
}

::-webkit-scrollbar-track {
  background: rgba(255, 255, 255, 0.1);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb {
  background: rgba(34, 211, 238, 0.3);
  border-radius: 4px;
}

::-webkit-scrollbar-thumb:hover {
  background: rgba(34, 211, 238, 0.5);
}

/* Smooth transitions */
.modal-enter-active,
.modal-leave-active {
  transition: all 0.3s ease;
}

.modal-enter-from,
.modal-leave-to {
  opacity: 0;
  transform: scale(0.95);
}
</style>