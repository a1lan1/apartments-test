<template>
    <el-table
        v-loading="loading"
        :data="apartments"
        stripe
        border
        empty-text="No results were found."
    >
        <el-table-column
            prop="name"
            label="Name"
        />
        <el-table-column
            prop="bedrooms"
            label="Bedrooms"
            width="120"
        />
        <el-table-column
            prop="bathrooms"
            label="Bathrooms"
            width="120"
        />
        <el-table-column
            prop="storeys"
            label="Storeys"
            width="120"
        />
        <el-table-column
            prop="garages"
            label="Garages"
            width="120"
        />
        <el-table-column
            prop="price"
            label="Price"
            width="200"
        >
            <template #default="scope">
                {{ currency(scope.row.price) }}
            </template>
        </el-table-column>
    </el-table>

    <el-row>
        <el-col
            :span="12"
            :offset="6"
        >
            <el-pagination
                v-if="pagination"
                background
                layout="prev, pager, next"
                :total="pagination.total"
                class="pagination"
            />
        </el-col>
    </el-row>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
    computed: {
        ...mapGetters('apartment', ['loading', 'apartments', 'pagination']),
    },

    mounted() {
        this.fetchApartments()
    },

    beforeDestroy() {
        this.resetApartments()
    },

    methods: {
        ...mapActions('apartment', ['fetchApartments', 'resetApartments']),

        currency(value) {
            if (!value) return ''

            return new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
            }).format(value)
        },
    },
}
</script>

<style scoped>
.pagination {
    margin-top: 10px;
}
</style>
