<template>
    <div v-if="errors">
  <div v-for="(v, k) in errors" :key="k" class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0">
    <p v-for="error in v" :key="error" class="text-sm">
      {{ error }}
    </p>
  </div>
</div>

    <form class="space-y-6" @submit.prevent="saveTache">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label for="designation" class="block text-sm font-medium text-gray-700">designation</label>
                <div class="mt-1">
                    <input type="text" name="designation" id="designation"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="tache.designation">
                </div>
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <div class="mt-1">
                    <input type="text" name="description" id="description"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="tache.description">
                </div>
            </div>

            <div>
                <label for="tarification" class="block text-sm font-medium text-gray-700">tarification</label>
                <div class="mt-1">
                    <input type="text" name="tarification" id="tarification"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="tache.tarification">
                </div>
            </div>

            <div>
                <label for="app_id" class="block text-sm font-medium text-gray-700">Application ID</label>
                <div class="mt-1">
                    <input type="text" name="app_id" id="app_id"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                           v-model="tache.app_id">
                </div>
            </div>
        </div>

        <button type="submit"
                class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25">
            Save
        </button>
    </form>
</template>

<script>
import useTache from "../../composables/tache";
import {onMounted} from "vue";
export default {
    props: {
        id: {
            required: true,
            type: String
        }
    },
    setup(props) {
        const { errors, tache, getTache, updateTache } = useTache()
        onMounted(getTache(props.id))
        const saveTache = async () => {
            await updateTache(props.id)
        }
        return {
            errors,
            tache,
            saveTache
        }
    }
}
</script>
