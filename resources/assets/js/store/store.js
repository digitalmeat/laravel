import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    fsm: null,
    stateHelper: null,
  },
  getters: {
    fsm(state) {
      return state.fsm
    },
    stateHelper(state) {
      return state.stateHelper;
    },
  },
  actions: {
    navigate(state, val) {
      state.getters.fsm.do(val);
    }
  },
  mutations: {
    setFsm(state, val) {
      state.fsm = val;
    },
    setStateHelper(state, val) {
      state.stateHelper = val;
    }
  }

});