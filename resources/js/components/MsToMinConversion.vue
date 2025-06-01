<!-- File: MsToMinutes.vue -->
<template>
    <div class="flex flex-col justify-center w-full min-h-full px-6 py-12 lg:px-8">
        <div class="flex flex-col gap-4 min-w-[500px]">

            <label class="flex flex-col gap-2">
                <span class="text-sm font-medium text-gray-700">Milliseconds to Minutes</span>
                <input v-model.number="ms" type="number" min="0"
                    class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
            </label>

            <button @click="convert" :disabled="loading"
                class="px-4 py-2 font-semibold text-white transition bg-blue-600 rounded-lg hover:bg-blue-700 disabled:cursor-not-allowed disabled:opacity-50">
                {{ loading ? 'Converting…' : 'Convert' }}
            </button>

            <p v-if="result !== null" class="text-gray-800">
                <strong>{{ result }}</strong> minute<span v-if="result !== 1">s</span>
            </p>

            <p v-if="error" class="text-red-600">{{ error }}</p>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import axios from 'axios'

const ms = ref(450000)  // demo default
const result = ref(null)
const error = ref('')
const loading = ref(false)

async function convert() {
    error.value = ''
    result.value = null
    loading.value = true

    try {
        const { data } = await axios.get(
            '/api/convert-ms-to-minutes',
            { params: { ms_value: ms.value } }
        )
        result.value = data.ms_as_minutes
    } catch (err) {
        error.value = err.response.data.error_message
        console.error(err)
    } finally {
        loading.value = false
    }
}
</script>
