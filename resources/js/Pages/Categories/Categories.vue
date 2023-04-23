<script setup>
import { ChevronDownIcon } from '@heroicons/vue/24/solid';
import BorderedContainer from '@/Components/BorderedContainer.vue';
import { Link, router } from '@inertiajs/vue3';
import { defineProps, reactive, watch } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

let props = defineProps({
    menu: Object,
    categories: Object,
    filters: Object,
    current_url: String,
});

let filters = reactive({ ...props.filters });
let currentUrl = window.location.toString();
let pagination = reactive( props.categories );

function deleteLobby(category) {
    router.delete('/categories/' + category.id);
}
</script>
<template>
    <AuthenticatedLayout>
        <div>
            <div class="bg-gray-100 flex flex-row justify-around items-center ">
                <h2 class=" font-grota text-2xl font-extrabold uppercase text-wgh-gray-6">Menu: {{menu.data.title}}</h2>
                <Link :href="`menu/${menu.data.id}/categories/create`">
                    <button class="mx-2 bg-blue-700 py-2 px-4 rounded my-2">
                        <span class="flex flex-row space-x-2.5">
                            <span class="font-bold uppercase">Add</span>
                        </span>
                    </button>
                </Link>
            </div>
            <BorderedContainer class="mb-2 overflow-hidden bg-wgh-gray-1.5">
                <div class="rounded-lg bg-white px-4 sm:px-0 lg:px-0">
                    <div class="flex flex-col">
                        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th
                                                    scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                                >
                                                <Link
                                                        class="group inline-flex"
                                                        :href="currentUrl"
                                                        :data="{
                                                            sort_by: 'name',
                                                            sort_order: filters.sort_order === 'desc' ? 'asc' : 'desc',
                                                            q: filters.q,
                                                        }"
                                                    >
                                                        Name
                                                        <span
                                                            :class="{
                                                                'invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible':
                                                                    filters.sort_by !== 'name',
                                                                'ml-2 flex-none rounded bg-gray-200 text-gray-900 group-hover:bg-gray-300':
                                                                    filters.sort_by === 'name',
                                                                'rotate-180':
                                                                    filters.sort_by === 'name' &&
                                                                    filters.sort_order === 'asc',
                                                            }"
                                                        >
                                                            <ChevronDownIcon class="h-5 w-5" aria-hidden="true" />
                                                        </span>
                                                    </Link>
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                                >
                                                <Link
                                                        class="group inline-flex"
                                                        :href="currentUrl"
                                                        :data="{
                                                            sort_by: 'discount',
                                                            sort_order: filters.sort_order === 'desc' ? 'asc' : 'desc',
                                                            q: filters.q,
                                                        }"
                                                    >
                                                        Discount
                                                        <span
                                                            :class="{
                                                                'invisible ml-2 flex-none rounded text-gray-400 group-hover:visible group-focus:visible':
                                                                    filters.sort_by !== 'discount',
                                                                'ml-2 flex-none rounded bg-gray-200 text-gray-900 group-hover:bg-gray-300':
                                                                    filters.sort_by === 'discount',
                                                                'rotate-180':
                                                                    filters.sort_by === 'discount' &&
                                                                    filters.sort_order === 'asc',
                                                            }"
                                                        >
                                                            <ChevronDownIcon class="h-5 w-5" aria-hidden="true" />
                                                        </span>
                                                    </Link>
                                                </th>
                                                <th
                                                    scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                                                >
                                                    <span class="group inline-flex">Controles</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-200 bg-white">
                                            <tr v-for="category in categories.data" :key="category.id">
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ category.name }}
                                                </td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    {{ category.discount }}
                                                </td>
                                                <td
                                                    class="flex space-x-4 items-center whitespace-nowrap px-3 py-4 text-sm text-gray-500"
                                                >
                                                    <Link :href="`/categories/${category.id}/edit`">
                                                        <span class="flex flex-row space-x-2.5">
                                                            <span class="font-bold uppercase">Edit</span>
                                                        </span>
                                                    </Link>
                                                    <Link :href="`/categories/${category.id}`">
                                                        <span class="flex flex-row space-x-2.5">
                                                            <span class="font-bold uppercase">Show</span>
                                                        </span>
                                                    </Link>
                                                    <button @click="$event => deleteLobby(category)" class="rounded-lg border-b-6 transition-all duration-100 active:mt-1.5 active:border-b-0">
                                                        <span class="flex flex-row space-x-2.5">
                                                            <span class="font-bold uppercase">Delete</span>
                                                        </span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </BorderedContainer>
            <BorderedContainer class="pb-8 bg-wgh-gray-1.5 ">
                <nav
                    class="flex w-full items-center justify-between rounded-lg border-t border-gray-200 bg-white px-4 py-3 sm:px-6"
                    aria-label="Pagination"
                >
                    <div class="hidden sm:block">
                        <p class="font-inter text-sm text-gray-700">
                            Showing
                            {{ ' ' }}
                            <span class="font-medium">{{ pagination.meta.from }}</span>
                            {{ ' ' }}
                            to
                            {{ ' ' }}
                            <span class="font-medium">{{ pagination.meta.to }}</span>
                            {{ ' ' }}
                            of
                            {{ ' ' }}
                            <span class="font-medium">{{ pagination.meta.total }}</span>
                            {{ ' ' }}
                            results
                        </p>
                    </div>
                    <div class="flex flex-1 justify-between space-x-4 sm:justify-end">
                        <Link :href="pagination.links.prev" preserve-scroll v-if="pagination.links.prev">
                            <button> Previous</button>
                        </Link>
                        <Link :href="pagination.links.next" preserve-scroll v-if="pagination.links.next">
                            <button type="gray"> Next</button>
                        </Link>
                    </div>
                </nav>
            </BorderedContainer>
        </div>
    </AuthenticatedLayout>
</template>
