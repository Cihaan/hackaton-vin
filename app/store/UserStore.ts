import type {UserType} from '~/types/UserType';
import type {WorkshopType} from "~/types/WorkshopType";

export const useUserStore = defineStore('user', () => {
    const isError = ref(false);
    const user = ref<UserType>({
        email: '',
        role: ['ROLE_USER']
    });
    const waitList = ref<UserType[]>([]);
    const router = useRouter()

    async function login(email: string, password: string) {
        try {
            const response  = await $fetch<UserType>('http://localhost:8000/api/login', {
                method: 'POST',
                body: JSON.stringify({username: email, password})
            });

            user.value.email = response.email;
            user.value.role = response.role;

            localStorage.setItem('user', JSON.stringify(user.value));

            await router.replace('/administration/list-workshop')
        } catch (e) {
            console.log("ERREUUUUR", e);
            isError.value = true;
        }
    }

    onMounted(() => {
        const userStorage = localStorage.getItem('user');
        if (userStorage) {
            user.value = JSON.parse(userStorage);
        }
    })

    async function getWaitList() {
        const {
            data,
            pending,
            error,
            refresh
        } = await useFetch<UserType[]>('http://127.0.0.1:8000/api/users', {
            method : 'GET'
        })
        if (data.value) {
            // @ts-ignore
            waitList.value = data.value['hydra:member']
        }
    }

    return {user, isError, waitList ,login,getWaitList};
});
