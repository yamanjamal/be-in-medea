<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';

let props = defineProps({
    menu: Object,
});

let form = useForm({
    title: props.menu.data.title,
});

function submit() {
    form.put('/menu/' + props.menu.data.id, { preserveScroll: true });
}
</script>
<template>
    <AuthenticatedLayout>
        <Head title="Menu Edit" />

        <div class="mx-auto w-96 bg-white p-10 mt-20">
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="title" value="Title" />

                    <TextInput
                        id="title"
                        type="title"
                        class="mt-1 block w-full py-1 outline outline-gray-100"
                        v-model="form.title"
                        required
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.title" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Edit
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>
