<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';

let props = defineProps({
    menu: Object,
    category: Object,
});

let form = useForm({
    name: props.category.data.name,
    discount: props.category.data.discount,
});

function submit() {
    form.put('/categories/' + props.category.data.id, { preserveScroll: true });
}
</script>
<template>
    <AuthenticatedLayout>
        <Head title="Menu Edit" />

        <div class="mx-auto w-96 bg-white p-10 mt-20">
            <form @submit.prevent="submit">
                <div>
                    <InputLabel for="name" value="Name" />

                    <TextInput
                        id="name"
                        type="name"
                        class="mt-1 block w-full py-1 outline outline-gray-100"
                        v-model="form.name"
                        required
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.name" />
                </div>
                <div>
                    <InputLabel for="discount" value="Discount" />

                    <TextInput
                        id="discount"
                        type="discount"
                        class="mt-1 block w-full py-1 outline outline-gray-100"
                        v-model="form.discount"
                        required
                        autocomplete="discount"
                    />

                    <InputError class="mt-2" :message="form.errors.discount" />
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
