<template>
  <div>
    <div v-show="state && state.is.first">
      Primer Paso
    </div>
    <div v-show="state && state.is.second">
      Segundo Paso
    </div>
    <button class="btn btn-primary" @click.prevent="navigate('next')">Continuar</button>
  </div>
</template>

<script>
  import {StateMachine, StateHelper} from 'state-machine';

  export default {
    name: 'reservation',
    mounted() {
      let fsm = new StateMachine({
        transitions: [
          'next : first > second > third',
          'back : first < second < third'
        ]
      });

      this.$store.commit('setFsm', fsm);
      this.$store.commit('setStateHelper', StateHelper.object(fsm).data);
    },
    computed: {
      state() {
        return this.$store.getters.stateHelper;
      }
    },
    methods: {
      navigate(to) {
        this.$store.dispatch('navigate', to);
      }
    }
  }
</script>