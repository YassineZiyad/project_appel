import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'

export default function useTache() {
    const taches = ref([])
    const tache = ref([])
    const tachesforapp = ref([])
    const router = useRouter()
    const errors = ref('')

    const getTaches = async() => {
        let response = await axios.get('/api/taches')
        taches.value=response.data.data;
    }

    const getTache = async(id) => {
        let response = await axios.get('/api/taches/' + id)
        tache.value=response.data.data;
    }

    const getTachesforapp = async(id) => {
        let response = await axios.get('/api/tachesforapp/' + id)
        tachesforapp.value=response.data.data;
    }

    const storeTache = async(data) => {
        errors.value = ''
        try {
            await axios.post('/api/taches/',data)
            await router.push({name:'tache.index'})
        } catch (e) {

            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }
    const updateTache = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/taches/' + id, tache.value)
            router.go(-1)
            //await router.push({name: 'tache.index'})
        } catch (e) {
            if (e.response.status === 422) {
               errors.value = e.response.data.errors
            }
        }
    }
    const destroyTache = async(id) => {
        await axios.delete('/api/taches/' + id)
    }
    return {
        taches,
        tache,
        errors,
        tachesforapp,
        getTachesforapp,
        getTache,
        getTaches,
        storeTache,
        destroyTache,
        updateTache
    }
}
