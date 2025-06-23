<template>
    <div class="flex flex-col justify-center min-w-full min-h-full px-6 py-6 text-gray-300 lg:px-8">
        <h1 class="flex flex-col justify-center min-w-full pt-8">{{ apiEndpoints.length - 1 }} out of 100 API Endpoints</h1>
        <dropdown></dropdown>
        <apis-information v-show="store.showDescription"></apis-information>
        <ms-to-min-conversion v-show="store.showMsToMin"></ms-to-min-conversion>
        <interest-repayment-calculation v-show="store.showInterestRepayment"></interest-repayment-calculation>
        <electric-car-mileage v-show="store.showElectricMileage"></electric-car-mileage>
        <petrol-car-mileage v-show="store.showPetrolMileage"></petrol-car-mileage>
        <area-conversion v-show="store.showAreaConversion"></area-conversion>
        <percentage-increase v-show="store.showPercentageIncrease"></percentage-increase>
    </div>
</template>

<script setup>
import dropdown from '@/components/UI/dropdown.vue';
import apisInformation from '@/components/apisInformation.vue';
import PetrolCarMileage from '@/components/PetrolCarMileage.vue';
import { useComponentVisibilityStore } from '../stores/componentVisibility'
import { apiEndpoints } from '@/data/apiEndpoints'
const store = useComponentVisibilityStore()
</script>
