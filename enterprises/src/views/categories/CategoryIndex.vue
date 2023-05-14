<script setup>
    import useCategories from '../../composables/categories';
    import { onMounted } from 'vue';

    const { categories, getCategories, destroyCategory, deleteAll } = useCategories();

    onMounted(() => getCategories());
</script>
<template>
    <div class="mt-12">
        <div class="flex justify-end m-2 p-2">
            <RouterLink :to="{name: 'createCategory'}" class="px-4 py-2 bg-orange-500 hover:bg-orange-700 text-white rounded">New Category</RouterLink>
            <button @click="deleteAll()" class="px-4 py-2 ml-4 bg-red-500 hover:bg-red-700 text-white rounded">Delete All</button>
        </div>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Category Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="category in categories" :key="category.id" class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">{{ category.name }}</td>
                        <td class="px-6 py-4">{{ category.description }}</td>
                        <td class="px-6 py-4 font-bold">
                            <RouterLink :to="{name: 'editCategory', params: {id: category.id}}" class="px-4 py-2 bg-green-400 hover:bg-green-600 text-white rounded">Edit</RouterLink>
                            <button @click="destroyCategory(category.id)" 
                            class="px-4 py-2 ml-4 bg-red-500 hover:bg-red-700 text-white rounded">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>