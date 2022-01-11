<template>
  <!-- header -->
  <section class="p-6 bg-gray-200">
    <header class="flex justify-between">
      <h1 class="font-bold text-lg">
        My App
      </h1>
      
      <Nav />
    </header>
  </section>

  <!-- main app -->
  <section class="p-6">
    <div class="">
      <slot />
    </div>
  </section>

  <!-- may add another footer section -->
  
</template>


 <script>
import Nav from "./Nav";

export default {
  components:{ Nav }
}
</script>