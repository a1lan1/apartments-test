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

    <el-row v-if="pagination && pagination.total_pages > 1">
        <el-col
            :span="12"
            :offset="6"
        >
            <el-pagination
                background
                layout="prev, pager, next"
                :total="pagination.total"
                class="pagination"
            />
        </el-col>
    </el-row>
</template>

<script lang="ts" setup>
import { storeToRefs } from 'pinia'
import { onMounted, onUnmounted } from 'vue'
import { useApartmentStore } from '@/stores/apartment'

const store = useApartmentStore()
const { loading, apartments, pagination } = storeToRefs(store)
const { fetchApartments, resetApartments } = store

onMounted(() => fetchApartments())
onUnmounted(() => resetApartments())

function currency(value) {
    if (!value) return ''

    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'USD',
    }).format(value)
}
</script>

<style scoped>
.pagination {
    margin-top: 10px;
}
</style>
