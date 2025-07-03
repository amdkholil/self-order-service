<template>
<div class="flex min-h-screen w-full bg-gray-200 dark:bg-black">
  <div class="container py-4 max-w-xl mx-auto bg-secondary-200 dark:bg-gray-800">
    <router-view />
  </div>

  <!-- Footer -->
  <FooterComp/>
</div>
</template>

<script>
import FooterComp from '@/components/global/FooterComp.vue';
</script>
