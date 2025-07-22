<template>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                    <div class="mb-6">
                        <div class="flex items-center justify-between">
                            <div>
                                <h1 class="text-2xl font-bold text-gray-900">Client Management</h1>
                                <p class="text-gray-600">Manage your pet care clients and their information</p>
                            </div>
                            
                            <div class="flex items-center space-x-2 bg-gray-100 rounded-lg p-1">
                                <button
                                    @click="setViewMode('list')"
                                    :class="[
                                        'inline-flex items-center px-3 py-2 rounded-md text-sm font-medium transition-all duration-200',
                                        getViewButtonClasses('list')
                                    ]"
                                >
                                    <i class="fas fa-list mr-2"></i>
                                    List View
                                </button>
                                <button
                                    @click="setViewMode('grid')"
                                    :class="[
                                        'inline-flex items-center px-3 py-2 rounded-md text-sm font-medium transition-all duration-200',
                                        getViewButtonClasses('grid')
                                    ]"
                                >
                                    <i class="fas fa-th mr-2"></i>
                                    Grid View
                                </button>
                            </div>
                        </div>
                    </div>

                    <div v-if="props.length === 0" class="text-center py-12">
                        <div class="text-gray-400 text-lg">No clients found.</div>
                    </div>

                    <!-- List View -->
                    <div v-else-if="viewMode === 'list'" class="shadow overflow-hidden sm:rounded-md transition-all duration-300">
                        <ul>
                            <slot name="list-view"></slot>
                        </ul>
                    </div>

                    <!-- Grid View -->
                    <div v-else class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 transition-all duration-300">
                        <slot name="grid-view"></slot>
                    </div>
                </div>
</template>

<script lang="ts" setup>
import { ref, computed, defineProps } from 'vue';
import Card from '@/Components/Bee/Card.vue'

// Reactive state for view mode
const viewMode = ref('list'); // 'list' or 'grid'
const props = defineProps({
    data: {
        type: Array,
        default: []
    }
}) // Replace with your actual client data
                // // Sample data - replace with your actual client data
                // const clients = ref<any>([
                //     {
                //         id: 1,
                //         name: 'Sarah Johnson',
                //         memberSince: '2023',
                //         avatarUrl: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face',
                //         contact: {
                //             email: 'sarah.johnson@email.com',
                //             phone: '(555) 123-4567'
                //         },
                //         pets: [
                //             { name: 'Max', breed: 'Golden Retriever' },
                //             { name: 'Luna', breed: 'Persian Cat' }
                //         ],
                //         lastService: {
                //             type: 'Grooming',
                //             date: '2024-06-10'
                //         },
                //         status: 'Active'
                //     },
                //     {
                //         id: 2,
                //         name: 'Michael Chen',
                //         memberSince: '2022',
                //         avatarUrl: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face',
                //         contact: {
                //             email: 'michael.chen@email.com',
                //             phone: '(555) 987-6543'
                //         },
                //         pets: [
                //             { name: 'Buddy', breed: 'Labrador' }
                //         ],
                //         lastService: {
                //             type: 'Vet Checkup',
                //             date: '2024-06-05'
                //         },
                //         status: 'Active'
                //     },
                //     {
                //         id: 3,
                //         name: 'Emily Rodriguez',
                //         memberSince: '2024',
                //         avatarUrl: 'https://images.unsplash.com/photo-1494790108755-2616b332c2e2?w=100&h=100&fit=crop&crop=face',
                //         contact: {
                //             email: 'emily.rodriguez@email.com',
                //             phone: '(555) 456-7890'
                //         },
                //         pets: [
                //             { name: 'Whiskers', breed: 'Maine Coon' },
                //             { name: 'Shadow', breed: 'German Shepherd' }
                //         ],
                //         lastService: {
                //             type: 'Training',
                //             date: '2024-05-28'
                //         },
                //         status: 'Inactive'
                //     },
                //     {
                //         id: 4,
                //         name: 'David Thompson',
                //         memberSince: '2023',
                //         avatarUrl: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face',
                //         contact: {
                //             email: 'david.thompson@email.com',
                //             phone: '(555) 321-0987'
                //         },
                //         pets: [
                //             { name: 'Bella', breed: 'French Bulldog' }
                //         ],
                //         lastService: {
                //             type: 'Grooming',
                //             date: '2024-06-12'
                //         },
                //         status: 'Active'
                //     }
                // ]);

                // const getStatusClasses = (status) => {
                //     return status === 'Active' 
                //         ? 'bg-green-100 text-green-800' 
                //         : 'bg-gray-100 text-gray-800';
                // };

                const getViewButtonClasses = (mode) => {
                    return viewMode.value === mode
                        ? 'bg-white text-gray-900 shadow-sm'
                        : 'text-gray-500 hover:text-gray-700';
                };

                const setViewMode = (mode) => {
                    viewMode.value = mode;
                };
</script>
