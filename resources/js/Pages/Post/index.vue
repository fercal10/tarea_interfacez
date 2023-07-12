<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
import language from 'datatables.net-plugins/i18n/es-ES.mjs';
import Modal from '@/Components/Modal.vue';
import { ref } from 'vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import SelectInput from '@/Components/SelectInput.vue';
import axios from 'axios';

DataTable.use(DataTablesCore);
const button = ['copy','print'];


const options = {
    responsive: true,
    // select: true,
    language,
    buttons:button
};

const props = defineProps({
    post: { type: Object },
});


const mostrar = ref(false);

const form = useForm({
    url: '',
    name: '',
    tipo: '',

});

const submit = () => {
   
    form.post(route('post.store'), {  onSuccess: () => cerrar() });
};
const eliminar = (post) => {
    axios.post(route("post.destroy"),{post:post});
};
const crear = () => {
    mostrar.value = true;
};
function Imprimir(){
window.print();
}
const cerrar = () => {
    mostrar.value = false;
    form.reset();
};
const tipos = [{ name: "Twitter"},{ name: "Youtube"}];


</script>
<template>
    <Head title="Post" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between print:hidden">

                <h2 class="font-semibold text-xl text-gray-800  leading-tight">Post</h2>
                <PrimaryButton @click="Imprimir"> Imprimir</PrimaryButton>
                <PrimaryButton @click="crear"> Crear Nuevo Post</PrimaryButton>
            </div>
        </template>
        <div class="w-full mt-10 px-5 ">

            <DataTable :options="options" class="display">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Url</th>
                        <th>Tipo</th>
                        <th>Acciones </th>
                    </tr>
                </thead>
                <tbody>

                    <tr v-for="pot in post">
                        <td class="text-lg ">{{ pot.name }}</td>
                        <td>{{ pot.url }}</td>
                        <td>{{ pot.tipo }}</td>
                        <td class="flex gap-2 text-blue-900 font-extrabold ">
                           
                            <button @click="eliminar(post)" class="hover:text-xl ">Elimina</button>
                        </td>
                    </tr>

                </tbody>
            </DataTable>


        </div>
        <Modal :show="mostrar">
            <form @submit.prevent="submit">

                <div class=" p-6 bg-gray-100 flex flex-col gap-8 ">

                    <div>
                        <InputLabel for="name" value="Nombre :" />

                        <TextInput required id="name" type="text" class="mt-1 block w-full" v-model="form.name"
                            autocomplete="name" />

                        <InputError class="mt-2" :message="form.errors.name" />
                    </div>
                    <div>
                        <InputLabel for="url" value="Url :" />

                        <TextInput  required id="url" type="text" class="mt-1 block w-full" v-model="form.url"
                            autocomplete="url" />

                        <InputError class="mt-2" :message="form.errors.url" />
                    </div>
                    <div>
                        <InputLabel for="Tipo" value="Tipo :" />
                        <SelectInput  required id="Tipo " :options="tipos" class="mt-1 block w-full " v-model="form.tipo" />
                    </div>
                    <div class=" flex justify-between pt-4">

                        <PrimaryButton class="bg-blue-900" @click="cerrar"> Cerrar</PrimaryButton>
                        <SecondaryButton type="submit" class="bg-blue-900" :disabled="form.processing"> Enviar</SecondaryButton>
                    </div>
                </div>

            </form>
        </Modal>

    </AuthenticatedLayout>
</template>
<style>
@import 'datatables.net-dt';
</style>

