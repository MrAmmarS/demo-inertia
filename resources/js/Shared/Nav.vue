<template>
  <nav>
    <ul class="flex space-x-6">
      <li>
        <NavLink href="/" :active="$page.component == 'Home'">
          Home
        </NavLink>
      </li>

      <li>
        <NavLink href="/users" :active="$page.component == 'Users'">
          Users
        </NavLink>
      </li>

      <li>
        <NavLink href="/settings" :active="$page.component == 'Settings'">
          Settings
        </NavLink>
      </li>

      <li>
        <NavLink href="/logout" method="post">
          Logout
        </NavLink>
      </li>
    </ul>
  </nav>
</template>

<script>
import NavLink from "./NavLink";

export default {
  components: { NavLink },
};
</script>


<!-- import { Link } from '@inertiajs/inertia-vue3' -->
<!-- <li><Link href="/" class="text-blue-500 hover:underline">Home</Link></li>
<li><Link href="/users" class="text-blue-500 hover:underline">Users</Link></li>
<li><Link href="/settings" class="text-blue-500 hover:underline">Settings</Link></li>
<li><Link href="/logout" method="post" as="button" class="text-blue-500 hover:underline">Log Out</Link></li> -->