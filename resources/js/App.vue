<template>
    <div class="common-layout">
        <BaseHeader />

        <el-container>
            <el-main class="layout-container"></el-main>
        </el-container>
    </div>
</template>

<script lang="ts" setup>
    import BaseHeader from '@/components/layouts/BaseHeader.vue'
</script>

<style scoped>
    .layout-container {
        height: 500px;
    }
</style>
