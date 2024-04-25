import type {WineType} from "~/types/WineType";
import type {WorkshopType} from "~/types/WorkshopType";


export const useWineStore = defineStore('list-wine', () => {
    const listWine = ref<WineType[]>([])
    const wineDetail = ref<WineType | null>(null)
    const loading = ref(false)
    const message = ref('')
    async function getWines() {
        const {
            data,
            pending,
            error,
            refresh
        } = await useFetch<WineType[]>('http://127.0.0.1:8000/api/wines', {
            method : 'GET'
        })
        if (data.value) {
            // @ts-ignore
            listWine.value = data.value['hydra:member']
        }
    }

    async function getWine(id: string | string[]) {
        const {
            data,
            pending,
            error,
            refresh
        } = await useFetch<WineType>('http://127.0.0.1:8000/api/wines/' + id, {
            method : 'GET'
        })
        if (data.value) {
            // @ts-ignore
            wineDetail.value = data.value
            return;
        }
        wineDetail.value = null

    }

    async function addWine(wine: WineType) {
        try {
            loading.value = true
            await $fetch('http://127.0.0.1:8000/api/wines', {
                headers: {
                    'Content-Type': 'application/ld+json',
                    'Accept': 'application/ld+json'
                },
                method: 'POST',
                body: JSON.stringify(wine)
            })
        }
        catch (e) {
            console.log(e)
        }
        finally {
            setMessage('Le vin a été ajouté avec succès')
            loading.value = false
        }

    }


    async function updateWine(wineId: number, wine: WineType) {
        try {
            loading.value = true;
            await $fetch('http://127.0.0.1:8000/api/wines/' + wineId, {
                headers: {
                    'Content-Type': 'application/merge-patch+json', // Corrected Content-Type
                    'Accept': 'application/ld+json'
                },
                method: 'PATCH',
                body: wine
            });
        } catch (e) {
            console.log(e);
        } finally {
            setMessage('La bouteille de vin a été mise à jour avec succès');
            loading.value = false;
        }
    }


    function setMessage(msg: string) {
        message.value = msg
    }

    return {listWine,loading,message, getWines, getWine, setMessage,addWine, updateWine ,wineDetail}
})