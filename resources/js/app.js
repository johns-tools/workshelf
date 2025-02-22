import { createApp } from 'vue';
import Login from './comp/Login.vue';
import Stats from './comp/Stats.vue';

createApp(Login).mount('#login');
createApp(Stats).mount('#stats');