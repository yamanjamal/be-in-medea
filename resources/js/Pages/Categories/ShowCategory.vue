<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';

let props = defineProps({
    menu: Object,
    category: Object,
});
</script>
<template>
    <AuthenticatedLayout>
        <div class="mx-auto w-96 bg-white p-10 mt-20">
            <div class="bg-gray-100 flex flex-row justify-around items-center ">
                <h2 class=" font-grota text-2xl font-extrabold uppercase text-wgh-gray-6">category:</h2>
            </div>
            <div class="my-5">
                <p>name :  {{ category.data.name }}</p>
                <p>discount : {{ category.data.discount }}</p>
            </div>
            <hr/>
            <div class="bg-gray-100 flex flex-row justify-around items-center ">
                <h2 class=" font-grota text-2xl font-extrabold uppercase text-wgh-gray-6">SubCategories:</h2>
                <Link :href="`menu/${menu.data.id}/categories/create`" v-if="category.data.SubCategories.length < 4">
                    <button class="mx-2 py-2 px-4 rounded my-2">
                        <span class="flex flex-row space-x-2.5">
                            <span class="font-bold uppercase">Add</span>
                        </span>
                    </button>
                </Link>
            </div>
            <div v-for="SubCategories in category.data.SubCategories" :key="SubCategories.id">
                <div class="mb-5">
                    <div class="whitespace-nowrap mb-4 mt-2 text-sm text-gray-500">
                        name : {{ SubCategories.name }}
                    </div>
                    <div class="whitespace-nowrap mb-4 text-sm text-gray-500">
                        discount : {{ SubCategories.discount }}
                    </div>
                    <div class="bg-gray-200 flex justify-around space-x-4 items-center whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                        <Link :href="`/categories/${SubCategories.id}/edit`">
                            <span class="flex flex-row space-x-2.5">
                                <span class="font-bold uppercase">Edit</span>
                            </span>
                        </Link>
                        <button @click="$event => deleteLobby(SubCategories)" class="rounded-lg border-b-6 divansition-all duration-100 active:mt-1.5 active:border-b-0">
                            <span class="flex flex-row space-x-2.5">
                                <span class="font-bold uppercase">Delete</span>
                            </span>
                        </button>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
