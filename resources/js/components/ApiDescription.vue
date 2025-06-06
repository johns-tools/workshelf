<template>
    <div class="flex flex-col justify-center w-full min-h-full px-6 py-12 lg:px-8">
        <div class="flex flex-col gap-4 min-w-[500px]">
            <h2 class="text-lg font-semibold">API Descriptions</h2>
            <ul class="list-disc space-y-2 pl-4">
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
            </ul>
        </div>
    </div>
</template>

<script setup>
// purely static content
</script>
