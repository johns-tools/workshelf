<template>
  <div>
    <h1>Hello, Vue 3 with Vite!</h1>
    <TwentyFirstToolbar :config="toolbarConfig" />
  </div>
</template>

<script>
import { TwentyFirstToolbar } from '@21st-extension/toolbar-vue';
import { VuePlugin } from '@21st-extension/vue';

export default {
  name: 'App',
  components: {
    TwentyFirstToolbar,
  },
  data() {
    return {
      toolbarConfig: {
        plugins: [VuePlugin],
      },
    };
  },
};
</script>

<style scoped>
h1 {
  color: #42b983;
}
</style>
