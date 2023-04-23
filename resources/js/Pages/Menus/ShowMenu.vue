<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { defineProps } from 'vue';

let props = defineProps({
    menu: Object,
});
</script>
<template>
    <AuthenticatedLayout>
        <div class="text-center mt-20">
            <p>{{ menu.data.title }}</p>
        </div>
    </AuthenticatedLayout>
</template>
