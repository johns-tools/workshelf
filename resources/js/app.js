import "./bootstrap";
import { createApp } from 'vue';
import { createPinia } from 'pinia'

import MsToMinConversion from './components/MsToMinConversion.vue'
import InterestRepaymentCalculation from './components/InterestRepaymentCalculation.vue'
import ElectricCarMileage from './components/ElectricCarMileage.vue'
import PetrolCarMileage from './components/PetrolCarMileage.vue'
import AreaConversion from './components/AreaConversion.vue'
import PercentageIncrease from './components/PercentageIncrease.vue'
import OneHundredAPIs from './components/OneHundredAPIs.vue'
import APIsInformation from './components/APIsInformation.vue'


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
app.component('electricCarMileage', ElectricCarMileage)
app.component('petrolCarMileage', PetrolCarMileage)
app.component('areaConversion', AreaConversion)
app.component('percentageIncrease', PercentageIncrease)
app.component('apisInformation', APIsInformation)
app.component('oneHundredApis', OneHundredAPIs)

app.mount('#app');
