<script setup>
    import { onMounted } from 'vue';
    import useEnterprises from '../../composables/enterprises'

    const { enterprise, getEnterprise, updateEnterprise, errors} = useEnterprises();
    
    const props = defineProps({
        id: {
            required: true,
            type: String
        }
    })

    onMounted(() => getEnterprise(props.id));
</script>
<template>
    <div class="mt-12">
        <form class="mas-w-md mx-auto p-4 bg-white shadow-md rounded-md" @submit.prevent="updateEnterprise($route.params.id)">
            <div class="space-y-6">
                <div class="mb-6">
                    <label for="enterprise_name" class="block mb-2 text-sm font-medium">Enterprise Name</label>
                    <input type="text" id="enterprise_name" v-model="enterprise.enterprise_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <div v-if="errors.enterprise_name">
                        <span class="text-sm text-red-400">{{ errors.enterprise_name[0] }}</span>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="description" class="block mb-2 text-sm font-medium">Description</label>
                    <input type="text" id="description" v-model="enterprise.description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <div v-if="errors.description">
                        <span class="text-sm text-red-400">{{ errors.description[0] }}</span>
                    </div>
                </div>
                <div class="mb-6">
                    <label for="city" class="block mb-2 text-sm font-medium">City</label>
                    <input type="text" id="city" v-model="enterprise.city" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    <div v-if="errors.city">
                        <span class="text-sm text-red-400">{{ errors.city[0] }}</span>
                    </div>
                </div>
                <div class="mt-4">
                    <button type="submit" class="px-4 py-2 bg-orange-500 hover:bg-orange-700 text-white rounded">Store</button>
                </div>
            </div>
        </form>
    </div>
</template>