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
    const loading = ref(false);
    const message = ref('');

    const userStorage = localStorage.getItem('user');
    if (userStorage) {
        user.value = JSON.parse(userStorage);
    }

    async function login(email: string, password: string) {
        try {
            loading.value = true
            const response  = await $fetch<any>('http://localhost:8000/api/login', {
                method: 'POST',
                body: JSON.stringify({username: email, password})
            });

            console.log(response);

            user.value.email = response.username;
            user.value.role = response.role;

            localStorage.setItem('user', JSON.stringify(user.value));

            await router.replace('/administration/list-workshop')
        } catch (e) {
            console.log("ERREUUUUR", e);
            isError.value = true;
        }
        finally {
            loading.value = false
        }
    }


    async function getWaitList() {
        const {
            data,
            pending,
            error,
            refresh
        } = await useFetch<UserType[]>('http://127.0.0.1:8000/api/reservations', {
            method : 'GET'
        })
        if (data.value) {
            // @ts-ignore
            waitList.value = data.value['hydra:member']
        }
    }

    async function updateReservation(reservationId: number, reservation: UserType){
        try {
            loading.value = true;
            await $fetch('http://127.0.0.1:8000/api/reservations/' + reservationId, {
                headers: {
                    'Content-Type': 'application/merge-patch+json', // Corrected Content-Type
                    'Accept': 'application/ld+json'
                },
                method: 'PATCH',
                body: reservation
            });
        } catch (e) {
            console.log(e);
        } finally {
            setMessage('La réservation a été mise à jour avec succès');
            loading.value = false;
        }

        setTimeout(() => {
            setMessage('')
        }, 1500)

    }

    function setMessage(msg: string) {
        message.value = msg;
    }

    return {user, isError, waitList,loading,message ,login,getWaitList, updateReservation,setMessage};
});
