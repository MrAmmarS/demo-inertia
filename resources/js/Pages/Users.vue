<template>

  <Layout>
    <h1 class="text-3xl font-semibold">Users</h1>


    <div style="margin-top: 800px">
      <p>The current time is {{ time }}.</p>
    </div>
    
    <Link href="/users" class="text-blue-500 hover:underline" preserve-scroll>Refresh</Link>
  </Layout>



</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import Layout from '../Shared/Layout';

export default {
  components: { Link, Layout },

  props: {
    time: String
  }
};
</script>
