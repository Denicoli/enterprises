import { ref } from "vue"
import axios from "axios"
import { useRouter } from "vue-router";

axios.defaults.baseURL = import.meta.env.VITE_BASE_URL;

export default function useEnterprises() {
    const enterprises = ref([]);
    const enterprise  = ref([]);
    const errors = ref([]);
    const router = useRouter();

    const getEnterprises = async () => {
        const response = await axios.get('enterprise');
        enterprises.value = response.data.data;
    }

    const getEnterprise = async (id) => {
        const response = await axios.get('enterprise/' + id);
        enterprise.value = response.data.data;
    }

    const email = (Math.random() + 1).toString(36).substring(2) + "@" + (Math.random() + 1).toString(36).substring(2) + ".com";

    const storeEnterprise = async (data) => {
        try {
            data = {
                name: "name",
                email: email,
                password: "0000",
                ...data
            }
            await axios.post('enterprise', data);
            await router.push({name: "indexEnterprise"});
        } catch (error) {
            console.log(error)

            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const updateEnterprise = async (id) => {
        try {
            enterprise.value = {
                name: "name",
                email: email,
                password: "0000",
                ...enterprise.value
            }
            await axios.put('enterprise/' + id, enterprise.value);
            await router.push({name: "indexEnterprise"});
        } catch (error) {
            console.log(error)
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const destroyEnterprise = async (id) => {
        if (!window.confirm("Are you sure?")) {
            return;
        }
        await axios.delete('enterprise/' + id);
        await getEnterprises();
    }

    const deleteAll = async () => {
        if (!window.confirm("Are you sure?")) {
            return;
        }
        await axios.delete('enterprise');
        await getEnterprises();
    }

    return {
        enterprise,
        enterprises,
        getEnterprise,
        getEnterprises,
        storeEnterprise,
        updateEnterprise,
        destroyEnterprise,
        deleteAll,
        errors,
    }
}