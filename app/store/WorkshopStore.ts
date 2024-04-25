import type {WorkshopType} from '~/types/WorkshopType';


export const useWorkshopStore = defineStore('list-workshop', () => {
    const listWorkshop = ref<WorkshopType[]>([]);
    const workshopDetail = ref<WorkshopType | null>(null);
    const loading = ref(false);
    const message = ref('');

    const reservationError = ref('');
    const reservationModalOpen = ref(false);
    const reservationEmail = ref('');
    const reservationModalPaiement = ref(false);

    async function getWorkShops() {
        const {data, pending, error, refresh} = await useFetch<WorkshopType[]>('http://127.0.0.1:8000/api/workshops', {});
        if (data.value) {
            // @ts-ignore
            listWorkshop.value = data.value['hydra:member'];
        }
    }

    async function getWorkShop(id: string | string[]) {
        const {
            data,
            pending,
            error,
            refresh
        } = await useFetch<WorkshopType>('http://127.0.0.1:8000/api/workshops/' + id, {
            method: 'GET'
        });
        if (data.value) {
            // @ts-ignore
            workshopDetail.value = data.value;
            return;
        }
        workshopDetail.value = null;
    }

    async function addWorkShop(workshop: WorkshopType) {
        try {
            loading.value = true;
            await $fetch('http://127.0.0.1:8000/api/workshops', {
                headers: {
                    'Content-Type': 'application/ld+json',
                    'Accept': 'application/ld+json'
                },
                method: 'POST',
                body: workshop
            });
        } catch (e) {
            console.log(e);
        } finally {
            setMessage('L\'atelier a été ajouté avec succès');
            loading.value = false;
        }

    }

    async function updateWorkShop(workshopId: number, workshop: WorkshopType) {
        try {
            loading.value = true;
            await $fetch('http://127.0.0.1:8000/api/workshops/' + workshopId, {
                headers: {
                    'Content-Type': 'application/merge-patch+json', // Corrected Content-Type
                    'Accept': 'application/ld+json'
                },
                method: 'PATCH',
                body: workshop
            });
        } catch (e) {
            console.log(e);
        } finally {
            setMessage('L\'atelier a été mise à jour avec succès');
            loading.value = false;
        }
    }

    async function reserveWorkShop(id_workshop: string) {
        if (!reservationEmail.value.includes('@')){
            reservationError.value = 'Veuillez saisir un email valide';
            return
        }

        try {
            loading.value = true;
            await $fetch('http://127.0.0.1:8000/api/inscription', {
                headers: {
                    'Content-Type': 'application/ld+json',
                    'Accept': 'application/ld+json'
                },
                method: 'POST',
                body: {
                    id_workshop,
                    email: reservationEmail.value
                }
            });

            reservationError.value = '';
            reservationEmail.value = '';
            reservationModalOpen.value = false;
            reservationModalPaiement.value = true;
        } catch (e: any) {
            console.log(e.statusCode);
            if (e.statusCode == 403) {
                reservationError.value = "Vous êtes déjà inscrit à cet atelier";
            }

            if (e.statusCode == 500) {
                reservationError.value = "Une erreur s'est produite, veuillez réessayer plus tard";
            }
            console.log(e);
        } finally {
        }
    }


    function setMessage(msg: string) {
        message.value = msg;
    }

    return {
        listWorkshop,
        loading,
        message,
        getWorkShops,
        getWorkShop,
        setMessage,
        addWorkShop,
        updateWorkShop,
        workshopDetail,
        reserveWorkShop,
        reservationModalOpen,
        reservationEmail,
        reservationError,
        reservationModalPaiement
    };

});