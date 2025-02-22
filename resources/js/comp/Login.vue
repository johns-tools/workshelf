<template>
    <div class="flex flex-col justify-top items-center h-half">
        <div class="flex min-h-full min-w-full flex- flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <h5 class="mt-10 pb-2 text-center text-2xl/9 font-bold tracking-tight text-white">
                    Log In
                </h5>
            </div>

            <div class=" sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="#" method="POST">
                    <div>
                        <div class="mt-2">
                            <input placeholder="KEY-A" type="text" name="keya" id="keya" required="" 
                            class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                        </div>
                    </div>
                    <div>
                        <div class="mt-2">
                            <input placeholder="KEY-B" type="text" name="keyb" id="keyb" required="" 
                            class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
    const props = defineProps({
        initData: {
            type: Object,
            required: true,
        },
    });
</script>