<script setup>
    import { reactive } from 'vue';
    import useUsers from '../../composables/users'

    const { storeUser, errors} = useUsers();

    const form = reactive({
        name: "",
        email: "",
        password: ""
    })
</script>
<template>
    <div class="mt-12">
        <form class="mas-w-md mx-auto p-4 bg-white shadow-md rounded-md" @submit.prevent="storeUser(form)">
            <div class="space-y-6">
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium">Name</label>
                    <input type="text" id="name" v-model="form.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="John Wick">
                    <div v-if="errors.name">
                        <span class="text-sm text-red-400">{{ errors.name[0] }}</span>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="email" class="block mb-2 text-sm font-medium">Email</label>
                    <input type="email" id="email" v-model="form.email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="john.wick@babayaga.com">
                    <div v-if="errors.email">
                        <span class="text-sm text-red-400">{{ errors.email[0] }}</span>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium">Password</label>
                    <input type="password" id="password" v-model="form.password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="•••••••••">
                    <div v-if="errors.password">
                        <span class="text-sm text-red-400">{{ errors.password[0] }}</span>
                    </div>
                </div> 
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-orange-500 hover:bg-orange-700 text-white rounded">Store</button>
                </div>
            </div>
        </form>
    </div>
</template>