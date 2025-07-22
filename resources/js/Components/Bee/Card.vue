<template>
    <section :class="['bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-100 dark:border-gray-700',props.cardClass]">
    
        <div v-if="props.cardHeader" class="p-4 border-b border-gray-100 dark:border-gray-700">
            <h2 class="font-medium text-gray-900 dark:text-white flex items-center">
                <span class="w-1.5 h-1.5 bg-blue-500 rounded-full mr-2"></span>
                {{ props.cardHeader }}
            </h2>
        </div>
        <div class="p-4 space-y-4">
            <slot />
        </div>
    </section>
</template>

<script lang="ts" setup>
import { defineProps } from 'vue'


const props = defineProps({
    cardHeader: String,
    cardClass: {
        type: String,
        default: ''
    }
})
</script>