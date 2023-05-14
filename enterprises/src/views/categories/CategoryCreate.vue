<script setup>
    import { reactive } from 'vue';
    import useCategories from '../../composables/categories'

    const { storeCategory, errors} = useCategories();

    const form = reactive({
        name: "",
        description: ""
    })
</script>
<template>
    <div class="mt-12">
        <form class="mas-w-md mx-auto p-4 bg-white shadow-md rounded-md" @submit.prevent="storeCategory(form)">
            <div class="space-y-6">
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium">Category Name</label>
                    <input type="text" id="name" v-model="form.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Event Manager">
                    <div v-if="errors.name">
                        <span class="text-sm text-red-400">{{ errors.name[0] }}</span>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="description" class="block mb-2 text-sm font-medium">Description</label>
                    <input type="text" id="description" v-model="form.description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="event management">
                    <div v-if="errors.description">
                        <span class="text-sm text-red-400">{{ errors.description[0] }}</span>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-orange-500 hover:bg-orange-700 text-white rounded">Store</button>
                </div>
            </div>
        </form>
    </div>
</template>