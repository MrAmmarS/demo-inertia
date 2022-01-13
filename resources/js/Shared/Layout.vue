<template>
  <!-- header -->
  <section class="p-6 bg-gray-200">
    <header class="flex justify-between">
      
      <div class="flex items-center">
        <h1 class="font-bold text-lg">
          My App
        </h1>
        
        <p class="text-sm  ml-6">
          Welcome back, {{ username  }}!
        </p>
      </div>
      
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
  components:{ Nav },

  computed: {
    username() {
      return this.$page.props.auth.user.username;
    }
   }

};
</script>