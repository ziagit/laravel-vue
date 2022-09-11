import Vue from "vue";
import Vuex from "vuex";
import auth from "./auth";
import createPersistedState from "vuex-persistedstate";
Vue.use(Vuex);

export default new Vuex.Store({
    plugins: [createPersistedState({
        storage: window.localStorage,
        paths: ['']
    })],
    state: {

    },
    getters: {

    },
    mutations: {

    },
    actions: {

    },
    modules: {
        auth,
    }

});