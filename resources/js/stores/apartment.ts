import axios from 'axios'
import { defineStore } from 'pinia'
import { ElNotification } from 'element-plus'

export const useApartmentStore = defineStore('apartment', {
    state: () => ({
        loading: false,
        apartments: null,
        pagination: null,
    }),

    getters: {},

    actions: {
        async fetchApartments (filter: Object) {
            this.loading = true

            await axios
                .post('/api/v1/apartments/list', filter)
                .then(({ data }) => this.setApartmentsData(data))
                .catch(({ response }) =>
                    ElNotification({
                        title: 'Error',
                        message: response.data.message,
                        type: 'error',
                    })
                )
                .finally(() => (this.loading = false))
        },
        async storeApartments (data: Object) {
            this.loading = true

            await axios
                .post('/api/v1/apartments/store', data)
                .catch(({ response }) =>
                    ElNotification({
                        title: 'Error',
                        message: response.data.message,
                        type: 'error',
                    })
                )
                .finally(() => (this.loading = false))
        },
        setApartmentsData ({ items, pagination }) {
            this.apartments = items
            this.pagination = pagination
        },
        resetApartments () {
            this.$reset()
        }
    }
})
