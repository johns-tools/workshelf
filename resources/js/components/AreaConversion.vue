<template>
    <div class="flex flex-col justify-center w-full min-h-full px-6 py-12 lg:px-8">
        <div class="flex flex-col gap-4 min-w-[500px]">
            <label class="flex flex-col gap-2">
                <span class="text-sm font-medium text-gray-300">Length (cm)</span>
                <input v-model.number="length" type="number" min="0"
                    class="w-full p-2 bg-gray-800 text-gray-100 placeholder-gray-400 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </label>
            <label class="flex flex-col gap-2">
                <span class="text-sm font-medium text-gray-300">Width (cm)</span>
                <input v-model.number="width" type="number" min="0"
                    class="w-full p-2 bg-gray-800 text-gray-100 placeholder-gray-400 border border-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </label>
            <button @click="calculate" :disabled="loading"
                class="px-4 py-2 font-semibold text-white transition bg-blue-600 rounded-lg hover:bg-blue-700 disabled:cursor-not-allowed disabled:opacity-50">
                {{ loading ? 'Calculating…' : 'Calculate' }}
            </button>
            <p v-if="error" class="text-red-600">{{ error }}</p>
            <pre v-if="result" class="p-4 mt-4 overflow-x-auto text-sm text-left text-gray-200 whitespace-pre-wrap bg-gray-800 rounded-lg">{{ formattedResult }}</pre>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'
import axios from 'axios'

const length = ref(10)
const width = ref(10)
const loading = ref(false)
const error = ref('')
const result = ref(null)

const formattedResult = computed(() => result.value ? JSON.stringify(result.value, null, 2) : '')

async function calculate() {
    error.value = ''
    result.value = null
    loading.value = true
    try {
        const { data } = await axios.get('/api/calculate-area', {
            params: {
                length_cm: length.value,
                width_cm: width.value,
            }
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
