<template>
    <div class="flex flex-col justify-center min-w-full min-h-full px-6 py-6 lg:px-8">
        <h1 class="flex flex-col justify-center min-w-full pt-8">One Hundred APIs :</h1>
        <dropdown></dropdown>
        <ms-to-min-conversion v-show="store.showMsToMin"></ms-to-min-conversion>
        <interest-repayment-calculation v-show="store.showInterestRepayment"></interest-repayment-calculation>
    </div>
</template>

<script setup>
import dropdown from '@/components/UI/dropdown.vue';
import { useComponentVisibilityStore } from '../stores/componentVisibility'
const store = useComponentVisibilityStore()
</script>
