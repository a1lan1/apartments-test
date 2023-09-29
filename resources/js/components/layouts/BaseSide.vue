<template>
    <el-aside width="200px">
        <el-menu :default-openeds="['1']">
            <el-sub-menu v-if="filters" index="1">
                <template #title>
                    <el-icon>
                        <Filter />
                    </el-icon> Filters
                </template>

                <el-menu-item index="1-1">
                    <el-tooltip class="item" effect="dark" content="Price" placement="top">
                        <el-slider
                            v-model="filters.price"
                            label="Price"
                            range
                            :min="100000"
                            :max="1000000"
                            @change="handleFilter"
                        />
                    </el-tooltip>
                </el-menu-item>

                <el-menu-item index="1-2">
                    <el-tooltip class="item" effect="dark" content="Search by name" placement="top">
                        <el-input
                            v-model="filters.name"
                            placeholder="Search by name"
                            clearable
                            @clear="handleFilter"
                            @input="debounceSearch"
                        />
                    </el-tooltip>
                </el-menu-item>

                <el-menu-item index="1-3">
                    <el-tooltip class="item" effect="dark" content="Bedrooms" placement="top">
                        <el-select
                            v-model="filters.bedrooms"
                            placeholder="Bedrooms"
                            clearable
                            @change="handleFilter"
                        >
                            <el-option
                                v-for="num in 5"
                                :key="num"
                                :label="num"
                                :value="num"
                            />
                        </el-select>
                    </el-tooltip>
                </el-menu-item>

                <el-menu-item index="1-4">
                    <el-tooltip class="item" effect="dark" content="Bathrooms" placement="top">
                        <el-select
                            v-model="filters.bathrooms"
                            placeholder="Bathrooms"
                            clearable
                            @change="handleFilter"
                        >
                            <el-option
                                v-for="num in 5"
                                :key="num"
                                :label="num"
                                :value="num"
                            />
                        </el-select>
                    </el-tooltip>
                </el-menu-item>

                <el-menu-item index="1-5">
                    <el-tooltip class="item" effect="dark" content="Storeys" placement="top">
                        <el-select
                            v-model="filters.storeys"
                            placeholder="Storeys"
                            clearable
                            @change="handleFilter"
                        >
                            <el-option
                                v-for="num in 5"
                                :key="num"
                                :label="num"
                                :value="num"
                            />
                        </el-select>
                    </el-tooltip>
                </el-menu-item>

                <el-menu-item index="1-6">
                    <el-tooltip class="item" effect="dark" content="Garages" placement="top">
                        <el-select
                            v-model="filters.garages"
                            placeholder="Garages"
                            clearable
                            @change="handleFilter"
                        >
                            <el-option
                                v-for="num in 5"
                                :key="num"
                                :label="num"
                                :value="num"
                            />
                        </el-select>
                    </el-tooltip>
                </el-menu-item>

                <el-menu-item index="1-7">
                    <el-button
                        type="warning"
                        plain
                        class="w-100"
                        @click="resetFilter"
                    >
                        Reset filter
                    </el-button>
                </el-menu-item>
            </el-sub-menu>
        </el-menu>
    </el-aside>
</template>

<script lang="ts" setup>
import { ref, reactive, onMounted } from 'vue'
import { Filter } from '@element-plus/icons-vue'
import { useApartmentStore } from '@/stores/apartment'

const store = useApartmentStore()
const { fetchApartments } = store

const defaultFilter = {
    name: '',
    price: [100000, 1000000],
    bedrooms: null,
    bathrooms: null,
    storeys: null,
    garages: null,
}

const filters = reactive({ ...defaultFilter })

let debounce = ref(null)

onMounted(() => setFilterDefault())

function handleFilter() {
    fetchApartments(filters)
}

function debounceSearch() {
    if (filters.name.length < 3) return

    clearTimeout(debounce)
    debounce = setTimeout(() => handleFilter(), 600)
}

function setFilterDefault() {
    Object.assign(filters, { ...defaultFilter })
}

function resetFilter() {
    setFilterDefault()
    fetchApartments()
}
</script>

<style scoped>
.w-100 {
    width: 100%;
}
</style>
