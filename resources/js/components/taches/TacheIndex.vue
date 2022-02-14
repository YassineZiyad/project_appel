<template>
    <div class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md">
        <div class="flex place-content-end mb-4">
            <div class="px-4 py-2 text-gray bg-indigo-600 hover:bg-indigo-700 cursor-pointer">
                <router-link :to="{ name: 'tache.create' ,params: { id: app_id } }" class="text-sm font-medium">Create Tache</router-link>
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Designation</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Tarification</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Description</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                    <span
                        class="text-xs font-medium tracking-wider leading-4 text-left text-gray-500 uppercase">Application</span>
                </th>
                <th class="px-6 py-3 bg-gray-50">
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            <template v-for="item in tachesforapp" :key="item._id">
                <tr class="bg-white">
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.designation }}
                    </td>
                    <td class="px-4 py-2 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.tarification }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.description }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ item.app_id }}
                    </td>
                    <td class="px-8 py-6 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                      <router-link :to ="{ name: 'tache.edit', params: { id: item._id } }"
                                     class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </router-link>
                        <router-link :to ="{ name: 'affectation.make', params: { id: item._id } }"
                                     class="mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Affectation
                        </router-link>
                        <button @click="deleteTache(item._id)"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Delete</button>
                    </td>
                </tr>
            </template>
            </tbody>
        </table>
    </div>
</template>

<script>
    import useTache from "../../composables/tache"
    import  {onMounted} from "vue"

    export default {
        props: {
            id: {
                required: true,
                type: String
            }
        },
        setup(props){

            const {errors,tachesforapp, getTachesforapp,destroyTache} = useTache()
            const app_id =props.id;

            onMounted(getTachesforapp(props.id))

            const deleteTache = async (id) => {

                if (!window.confirm('confirm !')) {
                    return
                }
                await destroyTache(id);
                await getTachesforapp(props.id);
            }

            return {
                tachesforapp,
                deleteTache,
                getTachesforapp,
                app_id
            }
        }
    }
</script>
