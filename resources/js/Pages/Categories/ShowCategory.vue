<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps } from 'vue';

let props = defineProps({
    menu: Object,
    category: Object,
});
</script>
<template>
    <AuthenticatedLayout>
        <div class="text-center mt-20">
            <p>{{ category.data.name }}</p>
            <p>{{ category.data.discount }}</p>
        </div>
    </AuthenticatedLayout>
</template>
