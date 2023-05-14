import { ref } from "vue"
import axios from "axios"
import { useRouter } from "vue-router";

axios.defaults.baseURL = import.meta.env.VITE_BASE_URL;

export default function useCategories() {
    const categories = ref([]);
    const category  = ref([]);
    const errors = ref([]);
    const router = useRouter();

    const getCategories = async () => {
        const response = await axios.get('category');
        categories.value = response.data.data;
    }

    const getCategory = async (id) => {
        const response = await axios.get('category/' + id);
        category.value = response.data.data;
    }

    const storeCategory = async (data) => {
        try {
            await axios.post('category', data);
            await router.push({name: "indexCategory"});
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const updateCategory = async (id) => {
        try {
            await axios.put('category/' + id, category.value);
            await router.push({name: "indexCategory"});
        } catch (error) {
            console.log(error)
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const destroyCategory = async (id) => {
        if (!window.confirm("Are you sure?")) {
            return;
        }
        await axios.delete('category/' + id);
        await getCategories();
    }

    const deleteAll = async () => {
        if (!window.confirm("Are you sure?")) {
            return;
        }
        await axios.delete('category');
        await getCategories();
    }

    return {
        category,
        categories,
        getCategory,
        getCategories,
        storeCategory,
        updateCategory,
        destroyCategory,
        deleteAll,
        errors,
    }
}