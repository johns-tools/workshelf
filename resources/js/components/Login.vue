<template>
    <div class="flex flex-col justify-center min-w-full min-h-full px-6 py-12 flex- lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
            <h5 class="pb-2 mt-10 font-bold tracking-tight text-center text-white text-2xl/9">
                Log In 123
            </h5>
        </div>

        <div class=" sm:mx-auto sm:w-full sm:max-w-sm">
            <form class="space-y-6" action="/login" method="POST">
                <input type="hidden" name="_token" :value="props.csrfToken" autocomplete="off">
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
</template>

<script setup>

    import { onMounted } from "vue";

    const props = defineProps({
        initData: {
            type: Object,
            required: true,
        },
        csrfToken: {
            type: String,
            required: true,
        }
    });

    onMounted(() => {
        console.log('CSRF Token:', props.csrfToken);
    });

</script>
