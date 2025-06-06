<template>
    <div class="flex flex-col justify-center min-w-full min-h-full px-6 py-6 lg:px-8">
        <h1 class="flex flex-col justify-center min-w-full pt-8">{{ apiEndpoints.length - 1 }} out of 100 API Endpoints</h1>
        <dropdown></dropdown>
        <api-description v-show="store.showDescription"></api-description>
        <ms-to-min-conversion v-show="store.showMsToMin"></ms-to-min-conversion>
        <interest-repayment-calculation v-show="store.showInterestRepayment"></interest-repayment-calculation>
        <electric-car-mileage v-show="store.showElectricMileage"></electric-car-mileage>
    </div>
</template>

<script setup>
import dropdown from '@/components/UI/dropdown.vue';
import ApiDescription from '@/components/ApiDescription.vue';
import { useComponentVisibilityStore } from '../stores/componentVisibility'
import { apiEndpoints } from '@/data/apiEndpoints'
const store = useComponentVisibilityStore()
</script>
