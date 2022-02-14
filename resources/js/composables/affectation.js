import { ref } from 'vue'
import axios from 'axios'
import { useRouter } from 'vue-router'
export default function useAffectation() {
    const affectation = ref([])
    const users = ref([])
    const tache = ref([])
    const router = useRouter()
    const errors = ref('')

    const getUsers = async() => {
        let response = await axios.get('/api/users')
        users.value=response.data.data;
    }

    const storeAffectation = async(data) =>{
        errors.value = ''
        try {
            await axios.post('/api/affectations/',data)
            router.go(-1)
            //await router.push({name:'affectation.index'})
        } catch (e) {

            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    return{
        users,
        errors,
        getUsers,
        storeAffectation,
    }
}
