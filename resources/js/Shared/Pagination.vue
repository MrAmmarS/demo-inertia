<template>
  <div>
    <Component 
      :is="link.url ? 'Link' : 'span'" 
      v-for="link in links" 
      :href="link.url" 
      v-html="link.label" 
      class="bg-white border-gray-300 text-black relative inline-flex items-center px-4 py-2 border text-sm font-medium hover:bg-gray-300"
      :class="{ 'text-gray-500 hover:bg-white disabled' : !link.url , 'font-bold bg-gray-300' : link.active }"
    />
  </div>

    
    <!-- class="z-10 bg-indigo-50 border-indigo-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium"  -->

    <!-- :class="link.url ? '' : 'text-gray-500'" -->
</template>


<script>
export default {
  props:{
    links: Array
  }
}
</script>