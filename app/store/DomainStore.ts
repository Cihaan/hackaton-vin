import type {DomainType} from "~/types/DomainType";

export const useDomainStore = defineStore('domain', () => {
    const listDomain = ref<DomainType[]>([])
    const loading = ref(false)
    const message = ref('')

    async function getDomains() {
        try {
            loading.value = true
            const {data, pending, error, refresh} = await useFetch<DomainType[]>('http://127.0.0.1:8000/api/domains', {
                method: 'GET'
            })
            if(data.value){
                // @ts-ignore
                listDomain.value = data.value['hydra:member']
            }
        }
        catch (e) {
            console.log(e)
        }
        finally {
            loading.value = false
        }

    }

    async function addDomain(domain: DomainType) {
        try {
            loading.value = true
            await $fetch('http://127.0.0.1:8000/api/domains', {
                headers: {
                    'Content-Type': 'application/ld+json',
                    'Accept': 'application/ld+json'
                },
                method: 'POST',
                body: JSON.stringify(domain)
            })
        }
        catch (e) {
            console.log(e)
        }
        finally {
            message.value = 'La région a été ajouté avec succès'
            loading.value = false
        }

    }

    function setMessage(msg: string) {
        message.value = msg
    }

    return { listDomain,loading,message, getDomains, addDomain,setMessage }
})