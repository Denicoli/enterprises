import { ref } from "vue"
import axios from "axios"
import { useRouter } from "vue-router";

axios.defaults.baseURL = import.meta.env.VITE_BASE_URL;

export default function useUsers() {
    const users = ref([]);
    const user  = ref([]);
    const errors = ref([]);
    const router = useRouter();

    const getUsers = async () => {
        const response = await axios.get('user');
        users.value = response.data.data;
    }

    const getUser = async (id) => {
        const response = await axios.get('user/' + id);
        user.value = response.data.data;
    }

    const storeUser = async (data) => {
        try {
            await axios.post('user', data);
            await router.push({name: "indexUser"});
        } catch (error) {
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const updateUser = async (id) => {
        try {
            await axios.put('user/' + id, user.value);
            await router.push({name: "indexUser"});
        } catch (error) {
            console.log(error)
            if (error.response.status === 422) {
                errors.value = error.response.data.errors;
            }
        }
    }

    const destroyUser = async (id) => {
        if (!window.confirm("Are you sure?")) {
            return;
        }
        await axios.delete('user/' + id);
        await getUsers();
    }

    const deleteAll = async () => {
        if (!window.confirm("Are you sure?")) {
            return;
        }
        await axios.delete('user');
        await getUsers();
    }

    return {
        user,
        users,
        getUser,
        getUsers,
        storeUser,
        updateUser,
        destroyUser,
        deleteAll,
        errors,
    }
}