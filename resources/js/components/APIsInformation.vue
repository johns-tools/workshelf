<template>
    <div class="flex flex-col justify-center w-full min-h-full px-6 py-12 lg:px-8">
        <div class="flex flex-col gap-4 min-w-[500px] text-gray-300">
            <h2 class="text-lg font-semibold">API end-points so far:</h2>
            <ul class="p-0 m-0 list-none api-list-animate">
                <li class="py-2 my-2 border-b border-gray-700 last:border-b-0">
                    <span>
                        <code class="api-backtick">/api/convert-ms-to-minutes</code>
                        &ndash; Convert a number of milliseconds to minutes.
                    </span>
                </li>
                <li class="py-2 my-2 border-b border-gray-700 last:border-b-0">
                    <span>
                        <code class="api-backtick">/api/interest-repayment-calculation</code>
                        &ndash; Calculate monthly interest, total interest and repayment for a loan.
                    </span>
                </li>
                <li class="py-2 my-2 border-b border-gray-700 last:border-b-0">
                    <span>
                        <code class="api-backtick">/api/calculate-ev-mileage</code>
                        &ndash; Estimate electric vehicle charge cost and cost per mile.
                    </span>
                </li>
                <li class="py-2 my-2 border-b border-gray-700 last:border-b-0">
                    <span>
                        <code class="api-backtick">/api/calculate-petrol-mileage</code>
                        &ndash; Estimate petrol vehicle fuel cost and cost per mile.
                    </span>
                </li>
                <li class="py-2 my-2 border-b border-gray-700 last:border-b-0">
                    <span>
                        <code class="api-backtick">/api/calculate-area</code>
                        &ndash; Calculate area from length and width in centimeters.
                    </span>
                </li>
                <li class="py-2 my-2 border-b border-gray-700 last:border-b-0">
                    <span>
                        <code class="api-backtick">/api/percentage-increase</code>
                        &ndash; Calculate compound interest with an optional monthly addition.
                    </span>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { useAnimateListItems } from '../composables/useAnimateListItems';
useAnimateListItems();
</script>
