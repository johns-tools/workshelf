import "./bootstrap";
import { createApp } from 'vue';
import { createPinia } from 'pinia'

import MsToMinConversion from './components/MsToMinConversion.vue'
import InterestRepaymentCalculation from './components/InterestRepaymentCalculation.vue'
import OneHundredAPIs from './components/OneHundredAPIs.vue'


// import Login from './components/Login.vue';
// import Stats from './components/Stats.vue';
// import ReverbMessageListener from './components/ReverbMessageListener.vue';

const app = createApp({});
const pinia = createPinia()

// app.component('login', Login);
// app.component('stats', Stats);
// app.component('reverbMessageListener', ReverbMessageListener)

app.use(pinia)

app.component('msToMinConversion', MsToMinConversion)
app.component('interestRepaymentCalculation', InterestRepaymentCalculation)
app.component('oneHundredApis', OneHundredAPIs)

app.mount('#app');
