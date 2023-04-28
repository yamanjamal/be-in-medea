<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';


let props = defineProps({
    menu: Object,
});

let form = useForm({
    name: '',
    discount: '',
    subCategories: [],
});

let state = reactive({
    addSubCategory : false,
    subCategories : [],
});

function submit() {
    form.post('/menu/'+ props.menu.data.id +'/categories');
}

function addInput() {
    form.addSubCategory.push({
        'name':'',
        'discount':''
    })    
}
</script>
<template>
    <AuthenticatedLayout>
        <Head title="Menu Create" />
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
                        autocomplete="username"
                    />

                    <InputError class="mt-2" :message="form.errors.discount" />
                </div>
                <div>
                    <div @click="addInput" class="mx-2 hover:cursor-pointer bg-blue-700 py-2 px-4 rounded my-2">
                        <span class="flex flex-row space-x-2.5">
                            <span class="font-bold text-center uppercase">Add SubCategory</span>
                        </span>
                    </div>
                    <div v-for="SubCategories in state.subCategories" :key="SubCategories.id">
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
                                autocomplete="username"
                            />

                            <InputError class="mt-2" :message="form.errors.discount" />
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                        Add
                    </PrimaryButton>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>