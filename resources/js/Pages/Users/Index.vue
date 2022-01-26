<template>

  <Head title="Users" />

  <div class="flex justify-between mb-6">
    <div class="flex items-center">
      <h1 class="text-3xl font-semibold">
        Users
      </h1>
      
      <Link href="/users/create" class="text-blue-500 ml-2 " >
        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
      </Link>
    </div>

    <input v-model="search" type="text" placeholder="Search" class="border border-gray-300 rounded-md shadow-sm  px-6  focus:ring-indigo-500 focus:border-indigo-500">
  </div>

  <div class="flex flex-col mt-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Name
                </th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                  Email
                </th>
                <th scope="col" class="relative px-6 py-3">
                  <span class="sr-only">Edit</span>
                </th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              <tr v-for="user in users.data" :key="user.id">
                <td class="px-6 py-4 whitespace-nowrap">
                  <div class="flex items-center">
                    <div>
                      <div class="text-sm font-medium text-gray-900">
                        {{ user.name }}
                      </div>
                    </div>
                  </div>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                  {{ user.email }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <Link href="'/users' + ${user.id} + '/edit'" class="text-indigo-600 hover:text-indigo-900">Edit</Link>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <Pagination :links="users.links" class="mt-6 flex justify-center" />
</template>


<script setup>
import Pagination from "../../Shared/Pagination";
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";

let props = defineProps({ 
  users: Object,
  filters: Object, 
});

let search = ref(props.filters.search);
 
// composition API
watch (search, value => {
  console.log('changed' + value);
  Inertia.get('/users' , { search: value }, { 
    preserveState: true,
    replace: true
    });
});

</script>


<!-- <script> 
import Pagination from "../Shared/Pagination";
export default {
  components: { Pagination },
  props: {
    users: Object,
  },\
  data: {
    search: Obejct
  }
};
</script> -->