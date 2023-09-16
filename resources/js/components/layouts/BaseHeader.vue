<template>
    <el-header>
        <el-row justify="space-between">
            <el-text class="logo" type="primary" size="large">
                Apartments
            </el-text>

            <el-switch
                :model-value="!isDark"
                inline-prompt
                size="large"
                :active-icon="Sunny"
                :inactive-icon="Moon"
                @change="toggleDark()"
            />
        </el-row>
    </el-header>
</template>

<script lang="ts" setup>
    import { Moon, Sunny } from '@element-plus/icons-vue'
    import { isDark, toggleDark } from '@/composables'
</script>

<style scoped>
    .logo {
        font-size: 25px;
        font-weight: bold;
    }
</style>
