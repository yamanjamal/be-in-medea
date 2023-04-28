<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 flex items-center justify-around">
                        <h2 class=" font-grota text-2xl font-extrabold uppercase text-wgh-gray-6">you can edit your menu title:</h2>
                        <Link :href="`menu/${$page.props.auth.menu.id}/edit`">
                            <button class="mx-2 bg-green-500 py-3 px-5 rounded my-2">
                                <span class="flex flex-row space-x-2.5">
                                    <span class="font-bold uppercase">Edit</span>
                                </span>
                            </button>
                        </Link>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
