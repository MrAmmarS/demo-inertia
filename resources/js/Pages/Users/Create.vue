<template>
  <Head title="Create User" />

  <div class="flex max-w-md mb-6 mx-auto">
    <h1 class="text-3xl font-semibold">
      Crete New User
    </h1>
  </div>

  <form @submit.prevent="submit" class="max-w-md mx-auto mt-8" >
    <div class="mb-6">
      <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="name">
        Name
      </label>
      <input v-model="form.name" class="border border-gray-400 p-2 w-full rounded" placeholder="John Doe" type="text" name="name" id="name" required>
    </div>

    <div class="mb-6">
      <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
        Email
      </label>
      <input v-model="form.email" class="border border-gray-400 p-2 w-full rounded" placeholder="johndoe@gmail.com" type="email" name="email" id="email" required>
    </div>

    <div class="mb-6">
      <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
        Password
      </label>
      <input v-model="form.password" class="border border-gray-400 p-2 w-full rounded" placeholder="******" type="password" name="password" id="password" required>
    </div>

    <div class="flex justify-end">
      <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Submit
      </button>
    </div>

  </form>
</template>


<script setup>
import { reactive } from 'vue';
import { Inertia } from "@inertiajs/inertia"; 

  let form = reactive({
    name: '',
    email: '',
    password: '',

  });

  let submit = () => {
    Inertia.post('/users',form); 
  };
</script>
