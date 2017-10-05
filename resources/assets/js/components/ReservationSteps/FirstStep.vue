<template>

  <section>
    FirstStep
    <button class="btn btn-primary" @click.prevent="navigate">Siguiente</button>
  </section>

</template>

<script>
  export default {
    name: 'first-step',
    methods: {
      navigate() {
        this.$store.dispatch('navigate', 'next');
      }
    }
  }

</script>