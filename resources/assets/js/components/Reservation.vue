<template>
  <div>
    <first-step v-show="state && state.is.first"></first-step>
    <second-step v-show="state && state.is.second"></second-step>
  </div>
</template>

<script>
  import FirstStep from './ReservationSteps/FirstStep.vue';
  import SecondStep from './ReservationSteps/SecondStep.vue';
  import {StateMachine, StateHelper} from 'state-machine';

  export default {
    name: 'reservation',
    components: {FirstStep, SecondStep},
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
    }
  }
</script>