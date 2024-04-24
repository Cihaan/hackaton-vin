import type {SchoolType} from "~/types/SchoolType";

export const useSchoolStore = defineStore('school', () => {
    const listSchool = ref<SchoolType[]>([])
    const loading = ref(false)
    const message = ref('')

    async function getSchool() {
        try {
            loading.value = true
            const {data, pending, error, refresh} = await useFetch<SchoolType[]>('http://127.0.0.1:8000/api/schools', {
                method: 'GET'
            })
            if(data.value){
                // @ts-ignore
                listSchool.value = data.value['hydra:member']
            }
        }
        catch (e) {
            console.log(e)
        }
        finally {
            loading.value = false
        }

    }

    async function addSchool(school: SchoolType) {
        try {
            loading.value = true
            console.log(school)
            await $fetch('http://127.0.0.1:8000/api/schools', {
                headers: {
                    'Content-Type': 'application/ld+json',
                    'Accept': 'application/ld+json'
                },
                method: 'POST',
                body: JSON.stringify(school)
            })
        }
        catch (e) {
            console.log(e)
        }
        finally {
            message.value = 'L\'établissement a été ajouté avec succès'
            loading.value = false
        }

    }

    function setMessage(msg: string) {
        message.value = msg
    }

    return { listSchool,loading,message, getSchool, addSchool,setMessage }
})