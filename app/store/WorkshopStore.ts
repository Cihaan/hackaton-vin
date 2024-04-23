import type {WorkshopType} from "~/types/WorkshopType";


export const useWorkshopStore = defineStore('list-workshop', () => {
    const listWorkshop = ref<WorkshopType[]>([])

    async function getWorkShop() {
        const {data, pending, error, refresh} = await useFetch<WorkshopType[]>('http://127.0.0.1:8000/api/workshops', {})
        if(data.value){
            // @ts-ignore
            listWorkshop.value = data.value['hydra:member']
        }
    }

    return { listWorkshop, getWorkShop }
})