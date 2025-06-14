<template>
    <div class="flex flex-col justify-center w-full min-h-full px-6 py-12 lg:px-8">
        <div class="flex flex-col gap-4 min-w-[500px]">
            <label class="flex flex-col gap-2">
                <span class="text-sm font-medium text-gray-300">Tank Capacity (litres)</span>
                <input v-model.number="tankLitres" type="number" min="0"
                    class="w-full p-2 text-gray-100 placeholder-gray-400 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </label>
            <label class="flex flex-col gap-2">
                <span class="text-sm font-medium text-gray-300">Cost per litre</span>
                <input v-model.number="costPerLitre" type="number" step="0.01" min="0"
                    class="w-full p-2 text-gray-100 placeholder-gray-400 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </label>
            <label class="flex flex-col gap-2">
                <span class="text-sm font-medium text-gray-300">Range (miles)</span>
                <input v-model.number="rangeMiles" type="number" min="0"
                    class="w-full p-2 text-gray-100 placeholder-gray-400 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </label>
            <label class="flex flex-col gap-2">
                <span class="text-sm font-medium text-gray-300">Miles per gallon (UK)</span>
                <input v-model.number="mpg" type="number" min="0"
                    class="w-full p-2 text-gray-100 placeholder-gray-400 bg-gray-800 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </label>
            <button @click="submit" :disabled="loading"
                class="px-4 py-2 font-semibold text-white transition bg-blue-600 rounded-lg hover:bg-blue-700 disabled:cursor-not-allowed disabled:opacity-50">
                {{ loading ? 'Calculating…' : 'Calculate' }}
            </button>
            <p v-if="error" class="text-red-600">{{ error }}</p>
            <pre v-if="result" class="p-4 mt-4 overflow-x-auto text-sm text-left text-gray-200 whitespace-pre-wrap bg-gray-800 rounded-lg">{{ formattedResult }}</pre>
        </div>
    </div>
</template>

<script setup>
import { ref, computed, watch } from 'vue'
import axios from 'axios'

const tankLitres = ref(50)
const costPerLitre = ref(1.50)
const rangeMiles = ref(400)
const mpg = ref(40)

watch([tankLitres, mpg], () => {
    if (mpg.value > 0 && tankLitres.value > 0) {
        const ukGallons = tankLitres.value / 4.54609
        rangeMiles.value = parseFloat((ukGallons * mpg.value).toFixed(2))
    }
})

const loading = ref(false)
const error = ref('')
const result = ref(null)

const formattedResult = computed(() => result.value ? JSON.stringify(result.value, null, 2) : '')

async function submit() {
    error.value = ''
    result.value = null
    loading.value = true
    try {
        const { data } = await axios.post('/api/calculate-petrol-mileage', {
            tank_litres: tankLitres.value,
            cost_per_litre: costPerLitre.value,
            range_miles: rangeMiles.value,
            mpg: mpg.value
        })
        result.value = data.data ?? data
    } catch (err) {
        error.value = err.response?.data?.error_message || 'An error occurred'
        console.error(err)
    } finally {
        loading.value = false
    }
}
</script>
