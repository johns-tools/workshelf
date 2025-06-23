<template>
    <div class="flex flex-col justify-center w-full min-h-full px-6 py-12 lg:px-8">
        <div class="flex flex-col gap-4 min-w-[500px]">
            <label class="flex flex-col gap-2">
                <span class="text-sm font-medium text-gray-300">Principal Amount</span>
                <input v-model.number="principal" type="number" min="0"
                    class="w-full p-2 text-gray-100 placeholder-gray-400 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </label>
            <label class="flex flex-col gap-2">
                <span class="text-sm font-medium text-gray-300">Months</span>
                <input v-model.number="months" type="number" min="1"
                    class="w-full p-2 text-gray-100 placeholder-gray-400 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </label>
            <label class="flex flex-col gap-2">
                <span class="text-sm font-medium text-gray-300">Interest Rate (%)</span>
                <input v-model.number="interest" type="number" step="0.01" min="0"
                    class="w-full p-2 text-gray-100 placeholder-gray-400 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </label>
            <label class="flex flex-col gap-2">
                <span class="text-sm font-medium text-gray-300">Monthly Addition (optional)</span>
                <input v-model.number="addition" type="number" min="0"
                    class="w-full p-2 text-gray-100 placeholder-gray-400 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </label>
            <button @click="calculate"
                class="px-4 py-2 font-semibold text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                Calculate
            </button>
            <p v-if="error" class="text-red-600">{{ error }}</p>
            <pre v-if="result" class="p-4 mt-4 overflow-x-auto text-sm text-left text-gray-200 whitespace-pre-wrap bg-gray-800 rounded-lg">{{ formattedResult }}</pre>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'

const principal = ref(1000)
const months = ref(12)
const interest = ref(5)
const addition = ref(0)

const result = ref(null)
const error = ref('')

const formattedResult = computed(() => result.value ? JSON.stringify(result.value, null, 2) : '')

function calculate() {
    error.value = ''
    result.value = null
    if (principal.value < 0 || months.value <= 0 || interest.value < 0 || addition.value < 0) {
        error.value = 'Please enter valid values.'
        return
    }

    const monthlyRate = interest.value / 100 / 12
    let total = principal.value
    for (let i = 0; i < months.value; i++) {
        total = total * (1 + monthlyRate) + addition.value
    }

    result.value = {
        principal: principal.value,
        months: months.value,
        interest_rate: interest.value,
        monthly_addition: addition.value,
        final_amount: parseFloat(total.toFixed(2))
    }
}
</script>
