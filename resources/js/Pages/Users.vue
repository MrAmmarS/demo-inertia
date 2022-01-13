<template>

  <Head title="Users" />

  <h1 class="text-3xl font-semibold">
    Users
  </h1>


  <ul>
    <li v-for="user in users" :key="user.id" v-text="user.name">

    </li>
  </ul>
</template>

<script>
export default {

  props: {
    users: Array
  }
};
</script>
