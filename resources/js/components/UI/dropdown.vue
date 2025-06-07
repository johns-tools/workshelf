<template>
    <Listbox as="div" v-model="selected">
        <div class="relative mt-2">
            <ListboxButton
                class="grid w-full cursor-default grid-cols-1 rounded-md bg-gray-800 py-1.5 pl-3 pr-2 text-left text-gray-100 outline outline-1 -outline-offset-1 outline-gray-600 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                <span class="flex w-full col-start-1 row-start-1 gap-2 pr-6">
                    <span class="truncate">{{ selected.name }}</span>
                    <span class="text-gray-400 truncate">{{ selected.username }}</span>
                </span>
                <ChevronUpDownIcon
                    class="self-center col-start-1 row-start-1 text-gray-400 size-5 justify-self-end sm:size-4"
                    aria-hidden="true" />
            </ListboxButton>

            <transition leave-active-class="transition duration-100 ease-in" leave-from-class="opacity-100"
                leave-to-class="opacity-0">
                <ListboxOptions class="absolute z-10 w-full py-1 mt-1 overflow-auto text-base bg-gray-800 rounded-sm shadow-lg max-h-60 ring-1 ring-gray-700 focus:outline-none sm:text-sm">

                    <ListboxOption as="template" v-for="item in data" :key="item.type" :value="item"
                        v-slot="{ active, selected }">

                        <li class="border-b border-gray-700 rounded-sm"
                            :class="[active ? 'bg-indigo-600 text-white outline-none' : 'text-gray-100', 'relative cursor-default select-none py-2 pl-3 pr-9']">

                            <div class="flex">
                                <span :class="[selected ? 'font-semibold' : 'font-normal', 'truncate']">{{ item.name }}</span>
                                <span :class="[active ? 'text-indigo-200' : 'text-gray-400', 'ml-2 truncate']">{{ item.type }}</span>
                            </div>

                            <span v-if="selected" :class="[active ? 'text-white' : 'text-indigo-400', 'absolute inset-y-0 right-0 flex items-center pr-4']">
                                <CheckIcon class="size-5" aria-hidden="true" />
                            </span>
                        </li>

                    </ListboxOption>
                </ListboxOptions>
            </transition>
        </div>
    </Listbox>
</template>

<script setup>
import { ref, watch } from 'vue'
import { Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions } from '@headlessui/vue'
import { ChevronUpDownIcon } from '@heroicons/vue/16/solid'
import { CheckIcon } from '@heroicons/vue/20/solid'
import { useComponentVisibilityStore } from '@/stores/componentVisibility'
import { apiEndpoints } from '@/data/apiEndpoints'

const data = apiEndpoints

const selected = ref(data[0])
const store = useComponentVisibilityStore()

watch(selected, (newVal) => {
    store.showComponent(newVal.type)
})

</script>
