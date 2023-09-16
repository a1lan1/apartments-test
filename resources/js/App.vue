<template>
    <div class="common-layout">
        <BaseHeader />

        <el-container>
            <BaseSide />

            <el-main class="layout-container">
                <ApartmentsTable />
            </el-main>
        </el-container>
    </div>
</template>

<script lang="ts" setup>
    import ApartmentsTable from '@/components/ApartmentsTable.vue'
    import BaseHeader from '@/components/layouts/BaseHeader.vue'
    import BaseSide from '@/components/layouts/BaseSide.vue'
</script>

<style scoped>
    .layout-container {
        height: 500px;
    }
</style>
