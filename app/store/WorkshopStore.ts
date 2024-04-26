import type {WorkshopType} from '~/types/WorkshopType';


export const useWorkshopStore = defineStore('list-workshop', () => {
    const listWorkshop = ref<WorkshopType[]>([]);
    const workshopDetail = ref<WorkshopType | null>(null);
    const loading = ref(false);
    const message = ref('');

    const isModalOpen = ref(false);
    const currentWorkshop = ref<string>('');

    const reservationError = ref('');
    const reservationModalOpen = ref(false);
    const reservationEmail = ref('');
    const reservationModalPaiement = ref(false);

    const debloquerError = ref('');
    const debloquerModalOpen = ref(false);
    const debloquerEmail = ref('');
    const debloquerisReserved = ref(false);

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

        setTimeout(() => {
            setMessage('')
        }, 1500)

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

        setTimeout(() => {
            setMessage('')
        }, 1500)
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

    async function debloquerWorkShop(id_workshop: string) {
        try {
            loading.value = true;
            const response = await $fetch<any>('http://127.0.0.1:8000/api/checkPassword', {
                headers: {
                    'Content-Type': 'application/ld+json',
                    'Accept': 'application/ld+json'
                },
                method: 'POST',
                body: {
                    workshop_id: id_workshop,
                    password: debloquerEmail.value
                }
            });

            if (response === "1") {
                debloquerisReserved.value = true;
                debloquerModalOpen.value = false;
                debloquerError.value = '';
            } else {
                debloquerisReserved.value = false;
                debloquerError.value = "Le mot de passe est incorrect"
            }

            debloquerEmail.value = '';
        } catch (e: any) {
                debloquerError.value = "Le mot de passe est incorrect";
        } finally {
        }
    }

    async function deleteWorkshop() {
        try {
            loading.value = true
            await $fetch('http://127.0.0.1:8000/api/workshops/' + currentWorkshop.value, {
                headers: {
                    'Content-Type': 'application/ld+json',
                    'Accept': 'application/ld+json'
                },
                method: 'DELETE',
            })
            await getWorkShops()
        }
        catch (e) {
            console.log(e)
        }
        finally {
            loading.value = false
            isModalOpen.value = false
        }
    }


    function setMessage(msg: string) {
        message.value = msg;
    }

    return {
        listWorkshop,
        loading,
        message,
        debloquerisReserved,
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
        reservationModalPaiement,
        debloquerError,
        debloquerModalOpen,
        debloquerEmail,
        debloquerWorkShop,
        isModalOpen,
        currentWorkshop,
        deleteWorkshop
    };

});