import "./bootstrap";
import { createApp } from 'vue'; // ???? HU!!
import Login from './components/Login.vue';
import Stats from './components/Stats.vue';
import ReverbMessageListener from './components/ReverbMessageListener.vue';

const app = createApp({});
app.component('login', Login);
app.component('stats', Stats);
app.component('reverbMessageListener', ReverbMessageListener)
app.mount('#app');

