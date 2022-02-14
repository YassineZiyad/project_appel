require('./bootstrap');
//require('alpinejs');
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import { createApp } from "vue";
import router from './router';
import ApplicationIndex from './components/applications/ApplicationIndex';

createApp({
    components: {
        ApplicationIndex
    }
}).use(router).mount('#app');
