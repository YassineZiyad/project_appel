import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'


export default function useApplication() {
    const applications = ref([])
    const application = ref([])
    const router = useRouter()
    const errors = ref('')
    const getApplications = async() => {
        let response = await axios.get('/api/applications')
        applications.value=response.data.data;

    }
    const getApplication = async(id) => {
        let response = await axios.get('/api/applications/'+ id)
        application.value=response.data.data;

    }

    const storeApplication = async(data) => {
        errors.value = ''
        try {
            await axios.post('/api/applications/',data)
            await router.push({name:'application.index'})
        } catch (e) {

            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }
    const updateApplication = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/applications/' + id, application.value)
            await router.push({name: 'application.index'})
        } catch (e) {
            if (e.response.status === 422) {
               errors.value = e.response.data.errors
            }
        }
    }
    const destroyApplication = async(id) => {
        await axios.delete('/api/applications/' + id)
    }

    return {
        applications,
        application,
        errors,
        getApplications,
        getApplication,
        destroyApplication,
        storeApplication,
        updateApplication
    }

}
