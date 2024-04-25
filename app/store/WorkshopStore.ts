import type {WorkshopType} from "~/types/WorkshopType";


export const useWorkshopStore = defineStore('list-workshop', () => {
    const listWorkshop = ref<WorkshopType[]>([])
    const workshopDetail = ref<WorkshopType | null>(null)

    async function getWorkShops() {
        const {
            data,
            pending,
            error,
            refresh
        } = await useFetch<WorkshopType[]>('http://127.0.0.1:8000/api/workshops', {})
        if (data.value) {
            // @ts-ignore
            listWorkshop.value = data.value['hydra:member']
        }
    }

    async function getWorkShop(id: string | string[]) {
        const {
            data,
            pending,
            error,
            refresh
        } = await useFetch<WorkshopType>('http://127.0.0.1:8000/api/workshops/' + id, {})
        if (data.value) {
            // @ts-ignore
            workshopDetail.value = data.value
            return;
        }
        workshopDetail.value = null
    }

    return {listWorkshop, getWorkShops, getWorkShop, workshopDetail}
})