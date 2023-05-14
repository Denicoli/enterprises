<script setup>
    import useUsers from '../../composables/users';
    import { onMounted } from 'vue';

    const { users, getUsers, destroyUser, deleteAll } = useUsers();

    onMounted(() => getUsers());
</script>
<template>
    <div class="mt-12">
        <div class="flex justify-end m-2 p-2">
            <RouterLink :to="{name: 'createUser'}" class="px-4 py-2 bg-orange-500 hover:bg-orange-700 text-white rounded">New User</RouterLink>
            <button @click="deleteAll()" class="px-4 py-2 ml-4 bg-red-500 hover:bg-red-700 text-white rounded">Delete All</button>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="user in users" :key="user.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ user.name }}</td>
                        <td class="px-6 py-4">{{ user.email }}</td>
                        <td class="px-6 py-4 font-bold">
                            <RouterLink :to="{name: 'editUser', params: {id: user.id}}" class="px-4 py-2 bg-green-400 hover:bg-green-600 text-white rounded">Edit</RouterLink>
                            <button @click="destroyUser(user.id)" 
                            class="px-4 py-2 ml-4 bg-red-500 hover:bg-red-700 text-white rounded">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>