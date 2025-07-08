<template>
  <link rel="icon" type="image/x-icon" href="/favicon.ico">
  <div class="flex min-h-screen w-full bg-gray-200 dark:bg-black">
    <div class="container max-w-xl  mx-auto bg-secondary-200 dark:bg-gray-800">
      <ScrollArea>
        <router-view />
      </ScrollArea>
    </div>

    <!-- Footer -->
    <FooterComp />
  </div>
</template>

<script>
import FooterComp from '@/components/global/FooterComp.vue';
import ScrollArea from './components/ui/scroll-area/ScrollArea.vue';
</script>
