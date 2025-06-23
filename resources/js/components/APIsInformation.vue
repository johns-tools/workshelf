<template>
    <div class="flex flex-col justify-center w-full min-h-full px-6 py-12 lg:px-8">
        <div class="flex flex-col gap-4 min-w-[500px] text-gray-300">
            <h2 class="text-lg font-semibold">API end-points so far:</h2>
            <ul class="pl-4 space-y-2 list-disc">
                <li>
                    <strong>/api/convert-ms-to-minutes</strong>
                    &ndash; Convert a number of milliseconds to minutes.
                </li>
                <li>
                    <strong>/api/interest-repayment-calculation</strong>
                    &ndash; Calculate monthly interest, total interest and repayment for a loan.
                </li>
                <li>
                    <strong>/api/calculate-ev-mileage</strong>
                    &ndash; Estimate electric vehicle charge cost and cost per mile.
                </li>
                <li>
                    <strong>/api/calculate-petrol-mileage</strong>
                    &ndash; Estimate petrol vehicle fuel cost and cost per mile.
                </li>
                <li>
                    <strong>/api/calculate-area</strong>
                    &ndash; Calculate area from length and width in centimetres.
                </li>
                <li>
                    <strong>/api/percentage-increase</strong>
                    &ndash; Calculate compound interest with an optional monthly addition.
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
// purely static content
</script>
