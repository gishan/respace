<!-- components/BlogPosts -->
<script setup>
import { ref } from 'vue'

// Sample blog posts data - in a real app, this would come from an API
const blogPosts = ref([
  {
    id: 1,
    title: 'How to Choose the Perfect Event Venue',
    excerpt: 'Discover the key factors to consider when selecting an event venue that will make your occasion truly memorable.',
    image: '/images/blog/venue-selection.jpg',
    author: 'Sarah Johnson',
    date: '2024-12-10',
    readTime: '5 min read',
    category: 'Venue Tips'
  },
  {
    id: 2,
    title: 'Top Office Space Trends for 2024',
    excerpt: 'Explore the latest trends in office space design and how they\'re shaping the future of workplace environments.',
    image: '/images/blog/office-trends.jpg',
    author: 'Michael Chen',
    date: '2024-12-08',
    readTime: '4 min read',
    category: 'Office Spaces'
  },
  {
    id: 3,
    title: 'Making Your Space More Sustainable',
    excerpt: 'Learn practical tips for creating environmentally friendly spaces that reduce your carbon footprint.',
    image: '/images/blog/sustainable-spaces.jpg',
    author: 'Emma Davis',
    date: '2024-12-05',
    readTime: '6 min read',
    category: 'Sustainability'
  }
])

const formatDate = (dateString) => {
  return new Date(dateString).toLocaleDateString('en-US', {
    year: 'numeric',
    month: 'long',
    day: 'numeric'
  })
}
</script>

<template>
  <div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Latest Blog Posts</h2>
        <p class="text-lg text-gray-600">Stay informed with our latest articles and insights</p>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <article 
          v-for="post in blogPosts" 
          :key="post.id"
          class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform duration-300 hover:-translate-y-2"
        >
          <!-- Image -->
          <div class="relative h-48 w-full overflow-hidden">
            <div 
              class="absolute inset-0 bg-gray-200"
              :style="{
                backgroundImage: `url(${post.image})`,
                backgroundSize: 'cover',
                backgroundPosition: 'center'
              }"
            ></div>
            <div class="absolute top-4 left-4">
              <span class="px-3 py-1 bg-yellow-500 text-black text-sm font-medium rounded-full">
                {{ post.category }}
              </span>
            </div>
          </div>

          <!-- Content -->
          <div class="p-6">
            <div class="flex items-center text-sm text-gray-500 mb-4">
              <span>{{ formatDate(post.date) }}</span>
              <span class="mx-2">•</span>
              <span>{{ post.readTime }}</span>
            </div>

            <h3 class="text-xl font-bold text-gray-900 mb-2">
              {{ post.title }}
            </h3>

            <p class="text-gray-600 mb-4 line-clamp-3">
              {{ post.excerpt }}
            </p>

            <!-- Author -->
            <div class="flex items-center">
              <div class="flex-shrink-0">
                <div class="h-10 w-10 rounded-full bg-gray-200 flex items-center justify-center">
                  <span class="text-gray-600 font-medium">
                    {{ post.author.split(' ').map(n => n[0]).join('') }}
                  </span>
                </div>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">
                  {{ post.author }}
                </p>
              </div>
            </div>
          </div>

          <!-- Read More Link -->
          <div class="px-6 pb-6">
            <a 
              href="#" 
              class="text-yellow-500 hover:text-yellow-600 font-medium inline-flex items-center transition-colors"
            >
              Read More
              <svg 
                class="w-4 h-4 ml-2" 
                fill="none" 
                stroke="currentColor" 
                viewBox="0 0 24 24"
              >
                <path 
                  stroke-linecap="round" 
                  stroke-linejoin="round" 
                  stroke-width="2" 
                  d="M9 5l7 7-7 7"
                />
              </svg>
            </a>
          </div>
        </article>
      </div>

      <!-- View All Posts Button -->
      <div class="text-center mt-12">
        <a 
          href="#" 
          class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium text-white bg-yellow-500 hover:bg-yellow-600 transition-colors"
        >
          View All Posts
          <svg 
            class="ml-2 -mr-1 w-5 h-5" 
            fill="none" 
            stroke="currentColor" 
            viewBox="0 0 24 24"
          >
            <path 
              stroke-linecap="round" 
              stroke-linejoin="round" 
              stroke-width="2" 
              d="M17 8l4 4m0 0l-4 4m4-4H3"
            />
          </svg>
        </a>
      </div>
    </div>
  </div>
</template>

<style scoped>
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>