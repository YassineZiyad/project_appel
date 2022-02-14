import { createRouter, createWebHistory } from "vue-router";
import ApplicationIndex from "../components/applications/ApplicationIndex";
import TacheIndex from "../components/taches/TacheIndex";
import ApplicationCreate from "../components/applications/CreateApplication";
import TacheCreate from "../components/taches/CreateTache";
import ApplicationEdit from "../components/applications/EditeApplication";
import EditeTache from "../components/taches/EditeTache";
import MakeAffectation from "../components/affectations/MakeAffectation";



const routes= [
    {
        path:'/dashboard',
        name:'application.index',
        component:ApplicationIndex
    },
    {
        path:'/tache/:id/',
        name:'tache.index',
        component:TacheIndex,
        props: true
    },
    {
        path:'/tache/:id/create',
        name:'tache.create',
        component:TacheCreate,
        props: true
    },
    {
        path:'/tache/:id/edit',
        name:'tache.edit',
        component:EditeTache,
        props: true
    },
    {
        path: '/application/create',
        name: 'application.create',
        component: ApplicationCreate
    },
    {
        path: '/applications/:id/edit',
        name: 'application.edit',
        component: ApplicationEdit,
        props: true
    },
    {
        path: '/affectations/:id/make',
        name: 'affectation.make',
        component: MakeAffectation,
        props: true
    }
]

 export default createRouter({
     history:createWebHistory(),
     routes
 })
