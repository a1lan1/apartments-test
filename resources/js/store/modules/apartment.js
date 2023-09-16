import axios from 'axios'
import { ElNotification } from 'element-plus'

export default {
    namespaced: true,

    state() {
        return {
            loading: false,
            apartments: null,
            pagination: null,
        }
    },

    getters: {
        loading: state => state.loading,
        apartments: state => state.apartments,
        pagination: state => state.pagination,
    },

    mutations: {
        FETCH_APARTMENTS(state, apartments) {
            state.apartments = apartments.items
            state.pagination = apartments.pagination
        },
        FETCH_LOADING(state, value) {
            state.loading = value
        }
    },

    actions: {
        async fetchApartments ({ commit }, filter) {
            commit('FETCH_LOADING', true)

            await axios
                .post('/api/v1/apartments', filter)
                .then(({ data }) => commit('FETCH_APARTMENTS', data))
                .catch(({ response }) =>
                    ElNotification({
                        title: 'Error',
                        message: response.data.message,
                        type: 'error',
                    })
                )
                .finally(() => commit('FETCH_LOADING', false))
        },
        resetApartments ({ commit }) {
            commit('FETCH_APARTMENTS', null)
        }
    }
}
