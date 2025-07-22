<script setup lang="ts">
import { ref } from 'vue'
import { Head, router } from '@inertiajs/vue3'
import Default from '@/Layouts/Default.vue'
import ListView from '@/Components/Bee/ListView.vue'
import Card from '@/Components/Bee/Card.vue'
defineOptions({
    layout: Default
})

const clients = ref<any>([
                    {
                        id: 1,
                        name: 'Sarah Johnson',
                        memberSince: '2023',
                        avatarUrl: 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=100&h=100&fit=crop&crop=face',
                        contact: {
                            email: 'sarah.johnson@email.com',
                            phone: '(555) 123-4567'
                        },
                        pets: [
                            { name: 'Max', breed: 'Golden Retriever' },
                            { name: 'Luna', breed: 'Persian Cat' }
                        ],
                        lastService: {
                            type: 'Grooming',
                            date: '2024-06-10'
                        },
                        status: 'Active'
                    },
                    {
                        id: 2,
                        name: 'Michael Chen',
                        memberSince: '2022',
                        avatarUrl: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=100&h=100&fit=crop&crop=face',
                        contact: {
                            email: 'michael.chen@email.com',
                            phone: '(555) 987-6543'
                        },
                        pets: [
                            { name: 'Buddy', breed: 'Labrador' }
                        ],
                        lastService: {
                            type: 'Vet Checkup',
                            date: '2024-06-05'
                        },
                        status: 'Active'
                    },
                    {
                        id: 3,
                        name: 'Emily Rodriguez',
                        memberSince: '2024',
                        avatarUrl: 'https://images.unsplash.com/photo-1494790108755-2616b332c2e2?w=100&h=100&fit=crop&crop=face',
                        contact: {
                            email: 'emily.rodriguez@email.com',
                            phone: '(555) 456-7890'
                        },
                        pets: [
                            { name: 'Whiskers', breed: 'Maine Coon' },
                            { name: 'Shadow', breed: 'German Shepherd' }
                        ],
                        lastService: {
                            type: 'Training',
                            date: '2024-05-28'
                        },
                        status: 'Inactive'
                    },
                    {
                        id: 4,
                        name: 'David Thompson',
                        memberSince: '2023',
                        avatarUrl: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100&h=100&fit=crop&crop=face',
                        contact: {
                            email: 'david.thompson@email.com',
                            phone: '(555) 321-0987'
                        },
                        pets: [
                            { name: 'Bella', breed: 'French Bulldog' }
                        ],
                        lastService: {
                            type: 'Grooming',
                            date: '2024-06-12'
                        },
                        status: 'Active'
                    }
                ]);

const getStatusClasses = (status) => {
    return status === 'Active' 
        ? 'bg-green-100 text-green-800' 
        : 'bg-gray-100 text-gray-800';
};
</script>

<template>
    <Head title="Audit Log" />

    <main class="min-h-screen bg-gray-50 dark:bg-gray-900">
        <ListView>
                    <template #list-view>
                        <li v-for="client in clients" :key="client.id">
                               <Card class="px-4 py-4 sm:px-6 transition-colors duration-150">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center min-w-0 flex-1">
                                            <div class="flex-shrink-0">
                                                <img class="h-12 w-12 rounded-full object-cover" :src="client.avatarUrl" :alt="client.name" />
                                            </div>
                                            <div class="min-w-0 flex-1 px-4">
                                                <div class="flex items-center justify-between">
                                                    <div>
                                                        <p class="text-sm font-medium text-indigo-600">{{ client.name }}</p>
                                                        <p class="text-xs text-gray-500">Member since {{ client.memberSince }}</p>
                                                    </div>
                                                    <div class="flex items-center space-x-4">
                                                        <span :class="[
                                                            'px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full',
                                                            getStatusClasses(client.status)
                                                        ]">
                                                            {{ client.status }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="mt-2 grid grid-cols-1 md:grid-cols-4 gap-4">
                                                    <div>
                                                        <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Contact</p>
                                                        <div class="mt-1 space-y-1">
                                                            <div class="flex items-center text-sm text-gray-900">
                                                                <i class="fas fa-envelope w-3 h-3 text-gray-400 mr-2"></i>
                                                                {{ client.contact.email }}
                                                            </div>
                                                            <div class="flex items-center text-sm text-gray-500">
                                                                <i class="fas fa-phone w-3 h-3 text-gray-400 mr-2"></i>
                                                                {{ client.contact.phone }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Pets</p>
                                                        <div class="mt-1 space-y-1">
                                                            <div v-for="pet in client.pets" :key="pet.name" class="flex items-center text-sm text-gray-900">
                                                                <i class="fas fa-heart w-3 h-3 text-gray-400 mr-2"></i>
                                                                <span class="font-medium">{{ pet.name }}</span>
                                                                <span class="text-gray-500 ml-1">({{ pet.breed }})</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <p class="text-xs text-gray-500 uppercase tracking-wide font-medium">Last Service</p>
                                                        <div class="mt-1">
                                                            <p class="text-sm font-medium text-gray-900">{{ client.lastService.type }}</p>
                                                            <div class="flex items-center text-sm text-gray-500">
                                                                <i class="fas fa-calendar w-3 h-3 text-gray-400 mr-2"></i>
                                                                {{ client.lastService.date }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex items-center justify-end">
                                                        <button class="inline-flex items-center px-3 py-1 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150">
                                                            <i class="fas fa-eye mr-1"></i>
                                                            View Profile
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </Card>
                        </li>
                    </template>

                    <template #grid-view>
                        <Card v-for="client in clients" :key="client.id" class="overflow-hidden shadow rounded-lg hover:shadow-md transition-shadow duration-200">
                            <div class="p-6">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0">
                                        <img class="h-16 w-16 rounded-full object-cover" :src="client.avatarUrl" :alt="client.name" />
                                    </div>
                                    <div class="ml-4 flex-1">
                                        <div class="flex items-center justify-between">
                                            <div>
                                                <h3 class="text-lg leading-6 font-medium text-gray-900">{{ client.name }}</h3>
                                                <p class="text-sm text-gray-500">Member since {{ client.memberSince }}</p>
                                            </div>
                                            <span :class="[
                                                'px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full',
                                                getStatusClasses(client.status)
                                            ]">
                                                {{ client.status }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4 space-y-3">
                                    <div>
                                        <h4 class="text-xs text-gray-500 uppercase tracking-wide font-medium">Contact Information</h4>
                                        <div class="mt-1 space-y-1">
                                            <div class="flex items-center text-sm text-gray-900">
                                                <i class="fas fa-envelope w-4 h-4 text-gray-400 mr-2"></i>
                                                {{ client.contact.email }}
                                            </div>
                                            <div class="flex items-center text-sm text-gray-500">
                                                <i class="fas fa-phone w-4 h-4 text-gray-400 mr-2"></i>
                                                {{ client.contact.phone }}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <h4 class="text-xs text-gray-500 uppercase tracking-wide font-medium">Pets</h4>
                                        <div class="mt-1 space-y-1">
                                            <div v-for="pet in client.pets" :key="pet.name" class="flex items-center text-sm text-gray-900">
                                                <i class="fas fa-heart w-3 h-3 text-gray-400 mr-2"></i>
                                                <span class="font-medium">{{ pet.name }}</span>
                                                <span class="text-gray-500 ml-1">({{ pet.breed }})</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <h4 class="text-xs text-gray-500 uppercase tracking-wide font-medium">Last Service</h4>
                                        <div class="mt-1">
                                            <p class="text-sm font-medium text-gray-900">{{ client.lastService.type }}</p>
                                            <div class="flex items-center text-sm text-gray-500">
                                                <i class="fas fa-calendar w-4 h-4 text-gray-400 mr-2"></i>
                                                {{ client.lastService.date }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <button class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors duration-150">
                                        <i class="fas fa-eye mr-2"></i>
                                        View Profile
                                    </button>
                                </div>
                            </div>
                        </Card>
                    </template>
            </ListView>
    </main>
</template>
