import "./bootstrap";
import { createApp } from 'vue';
import { createPinia } from 'pinia'
import { TwentyFirstToolbar } from '@21st-extension/toolbar-vue';
import { VuePlugin } from '@21st-extension/vue';

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

const app = createApp({
  data() {
    return {
      toolbarConfig: {
        plugins: [VuePlugin],
      },
    };
  },
});
const pinia = createPinia()

// app.component('login', Login);
// app.component('stats', Stats);
// app.component('reverbMessageListener', ReverbMessageListener)

app.use(pinia)

app.component('twenty-first-toolbar', TwentyFirstToolbar)
app.component('msToMinConversion', MsToMinConversion)
app.component('interestRepaymentCalculation', InterestRepaymentCalculation)
app.component('electricCarMileage', ElectricCarMileage)
app.component('petrolCarMileage', PetrolCarMileage)
app.component('areaConversion', AreaConversion)
app.component('percentageIncrease', PercentageIncrease)
app.component('apisInformation', APIsInformation)
app.component('oneHundredApis', OneHundredAPIs)

app.mount('#app');
