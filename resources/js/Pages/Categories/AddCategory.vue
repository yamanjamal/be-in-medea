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
    subCategories : [],
});

function submit() {
    form.subCategories =state.subCategories
    form.post('/menu/'+ props.menu.data.id +'/categories');
}

function addField() {
    state.subCategories.push({
        name: '',
        discount: '',
    })
}

function removeField(index) {
    state.subCategories.splice(index, 1)
}
</script>
<template>
    <AuthenticatedLayout>
        <Head title="Menu Create" />
        <div class="mx-auto w-96 bg-white p-10 mt-20">
            <form @submit.prevent="submit">
                <h2>Add Category</h2>
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
                <div class="mb-10">
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
                    <h2>add SubCategories</h2>
                    <div v-if="state.subCategories.length ==0">
                        <div @click="addField" class="mx-2 bg-green-500 px-2 rounded hover:cursor-pointer my-2">
                            <span class="flex flex-row space-x-2.5">
                                <span class="font-bold text-center uppercase">add</span>
                            </span>
                        </div>
                    </div>
                </div>
                <div>
                    <div v-for="(field, index) in state.subCategories" :key="index" class="border border-b-blue-300">
                        <div class="flex justify-around">
                            <div @click="addField" class="mx-2 bg-green-500 px-2 rounded hover:cursor-pointer  my-2">
                                <span class="flex flex-row space-x-2.5">
                                    <span class="font-bold text-center uppercase">+</span>
                                </span>
                            </div>
                            <div @click="removeField(index)" class="mx-2 bg-red-500 px-2 rounded hover:cursor-pointerrounded my-2">
                                <span class="flex flex-row space-x-2.5">
                                    <span class="font-bold text-center uppercase">-</span>
                                </span>
                            </div>
                        </div>
                        <div>
                            <div>
                                <InputLabel for="name" value="Name" />
                                
                                <TextInput
                                    type="discount"
                                    class="mt-1 block w-full py-1 outline outline-gray-100"
                                    v-model="state.subCategories[index].name"
                                    required
                                    autocomplete="username"
                                    />
                                    
                                <InputError class="mt-2" :message="form.errors.discount" />
                            </div>
                            <div>
                                <InputLabel for="discount" value="Discount" />
    
                                <TextInput
                                    type="discount"
                                    class="mt-1 block w-full py-1 outline outline-gray-100"
                                    v-model="state.subCategories[index].discount"
                                    autocomplete="username"
                                />
    
                                <InputError class="mt-2" :message="form.errors.discount" />
                            </div>
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