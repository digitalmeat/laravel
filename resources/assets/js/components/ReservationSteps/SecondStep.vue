<template>

  <section>
    SecondStep
  </section>

</template>

<script>
  export default {
    name: 'second-step',
    methods: {
      navigate() {
        this.$store.dispatch('navigate', 'next');
      }
    }
  }

</script>