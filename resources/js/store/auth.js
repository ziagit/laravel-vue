import axios from "axios";
export default {
    namespaced: true,
    state: {
        token: null,
        user: null,
    },
    getters: {
        authenticated(state) {
            return state.token && state.user
        },
        user(state) {
            return state.user
        },
    },

    mutations: {
        SET_TOKEN(state, token) {
            state.token = token
        },
        SET_USER(state, data) {
            state.user = data
        },
    },
    actions: {
        async signIn({ dispatch }, credentials) {
            let response = await axios.post("signin", credentials)
            return dispatch('attempt', response.data)
        },

        async signUp({ dispatch }, credentials) {
            let response = await axios.post("signup", credentials)
            return dispatch('attempt', response.data)
        },
        async attempt({ commit, state }, token) {
            if (token) {
                commit('SET_TOKEN', token)
            }
            if (!state.token) {
                return
            }
            //header will be set by subsciber here
            try {
                let response = await axios.get('me');
                console.log("user: ", response.data)
                commit('SET_USER', response.data)
            } catch (e) {
                commit('SET_TOKEN', null)
                commit('SET_USER', null)
            }
        },
        signOut({ commit }) {
            return axios.post('signout').then(() => {
                commit('SET_TOKEN', null)
                commit('SET_USER', null)
                localStorage.removeItem("token")
            })
        }
    },
};