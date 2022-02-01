<template>
  <Layout>
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
      <div v-if="form.errors.name" v-text="form.errors.name" class="text-red-500 text-xs italic mt-1"></div>
    </div>

    <div class="mb-6">
      <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="email">
        Email
      </label>
      <input v-model="form.email" class="border border-gray-400 p-2 w-full rounded" placeholder="johndoe@gmail.com" type="email" name="email" id="email" required>
      <div v-if="form.errors.email" v-text="form.errors.email" class="text-red-500 text-xs italic mt-1"></div>
    </div>

    <div class="mb-6">
      <label class="block mb-2 uppercase font-bold text-xs text-gray-700" for="password">
        Password
      </label>
      <input v-model="form.password" class="border border-gray-400 p-2 w-full rounded" placeholder="******" type="password" name="password" id="password" required>
      <div v-if="form.errors.password" v-text="form.errors.password" class="text-red-500 text-xs italic mt-1"></div>
    </div>

    <div class="flex justify-end">
      <Link href="/users" class="mr-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-black bg-gray-200 hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-grey-500">
        Cancel
      </Link>
      <button type="submit" :disabled="form.processing" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Submit
      </button>
    </div>

  </form>
  </Layout>
</template>


<script setup>
import Layout from '../../Shared/Layout';
import { useForm } from "@inertiajs/inertia-vue3"; 

  defineProps({
    errors: Object,
  });

  let form = useForm({
    name: '',
    email: '',
    password: '',
  });

  let submit = () => {
    form.post('/users'); 
  };
</script>
