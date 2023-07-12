<script setup>
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import SelectInput from '@/Components/SelectInput.vue';
import TextArea from '@/Components/TextArea.vue';
import venezuela from 'venezuela';
import Dropzone from "@/Components/Dropzone.vue";
import { ref } from 'vue';

const props = defineProps({
    perfil: { type: Object },
});



const form = useForm({
    imagen: null,
    nombre: '',
    apellido: '',
    correo: '',
    telefono: '',
    nacimiento: '',
    pais: '',
    estado: '',
    ciudad: '',
    direccion: '',
    descripcion: '',
});

const paises = [{ name: "Venezuela" }]
const estados = venezuela.pais.map((item) => {
    return { name: item.estado };
});

let dropzoneFile = ref("");
const drop = (e) => {
    dropzoneFile.value = e.dataTransfer.files[0];
    form.imagen = dropzoneFile.value;
};

const selectedFile = () => {
    dropzoneFile.value = document.querySelector(".dropzoneFile").files[0];
};




const submit = () => {

    form.post(route('perfil.store'), { onError: (e) => console.log(e) });
};
const probar = () => {
    if (dropzoneFile !== '') {
        form.imagen = dropzoneFile;
    }
    console.log(form.data());
};
</script>


<template>
    <Head title="Perfil" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800  leading-tight">Perfil</h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto h-full sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 h-full bg-white  shadow sm:rounded-lg">

                    <form @submit.prevent="submit" enctype="multipart/form-data">

                        <div class=" flex flex-col h-full w-full">
                            <!-- Parte 1 -->
                            <div class=" h-1/3 flex p-4 ">
                                <div class=" w-1/3 ">

                                    <div class="   m-2">


                                        <InputLabel for="imagen" value="Foto de Perfil" />
                                        <Dropzone @drop.prevent="drop" @change="selectedFile" />
                                        <span class="file-info">File: {{ dropzoneFile.name }}</span>

                                    </div>

                                </div>
                                <div class=" w-1/3  p-4 ">
                                    <div>
                                        <InputLabel for="nombre" value="Nombre :" />

                                        <TextInput required id="nombre" type="text" class="mt-1 block w-full"
                                            v-model="form.nombre" autocomplete="nombre" />

                                        <InputError class="mt-2" :message="form.errors.nombre" />
                                    </div>
                                    <div>
                                        <InputLabel for="correo" value="Correo :" />

                                        <TextInput required id="correo" type="email" class="mt-1 block w-full"
                                            v-model="form.correo" autocomplete="email" />

                                        <InputError class="mt-2" :message="form.errors.correo" />
                                    </div>


                                </div>
                                <div class=" w-1/3  p-4">
                                    <div>
                                        <InputLabel for="apellido" value="Apellido :" />

                                        <TextInput required id="apellido" type="text" class="mt-1 block w-full"
                                            v-model="form.apellido" autocomplete="lastname" />

                                        <InputError class="mt-2" :message="form.errors.apellido" />
                                    </div>
                                    <div>
                                        <InputLabel for="telefono" value="Telefono :" />

                                        <TextInput required id="telefono" type="text" class="mt-1 block w-full"
                                            v-model="form.telefono" autocomplete="phone" />

                                        <InputError class="mt-2" :message="form.errors.telefono" />
                                    </div>

                                </div>
                            </div>

                            <!-- Parte 2 -->
                            <div class=" h-1/3 flex flex-row p-4">
                                <div class=" w-1/3 flex flex-row  ">

                                    <div class=" p-2 w-52 ">

                                        <InputLabel for="nacimiento" value="Fecha de nacimiento" />
                                        <input required type="date" id="nacimiento" class="mt-1 block w-full "
                                            v-model="form.nacimiento" />

                                    </div>





                                </div>
                                <div class=" w-2/3 flex flex-row ">

                                    <div class=" p-2 w-48">

                                        <InputLabel for="pais" value="Pais :" />
                                        <SelectInput required id="pais " :options="paises" class="mt-1 block w-full "
                                            v-model="form.pais" />

                                    </div>
                                    <div class=" p-2 w-48">

                                        <InputLabel for="estado" value="Estado :" />
                                        <SelectInput required id="estado" :options="estados" class="mt-1 block w-full "
                                            v-model="form.estado" />

                                    </div>
                                    <div class=" p-2 w-48">
                                        <InputLabel for="ciudad" value="Ciudades" />
                                        <SelectInput required id="ciudad"
                                            :options="form.estado ? venezuela.estado(form.estado, { municipios: true }).municipios.map((item) => { return { name: item } }) : []"
                                            class="mt-1 block w-full " v-model="form.ciudad" />

                                    </div>



                                </div>



                            </div>
                            <!-- Parte 3 -->
                            <div class=" h-1/3 flex flex-row gap-4 p-4">
                                <div class=" w-full">
                                    <InputLabel for="direccion" value="Direccion :" />
                                    <TextArea id="direccion" class="mt-1 block w-full " v-model="form.direccion" />
                                </div>
                                <div class=" w-full">
                                    <InputLabel for="descripcion" value="Description :" />
                                    <TextArea id="descripcion" class="mt-1 block w-full " v-model="form.descripcion" />
                                </div>
                            </div>
                            <div class=" flex justify-end pt-4">

                                <PrimaryButton :disabled="form.processing"> Enviar</PrimaryButton>
                            </div>
                        </div>
                    </form>



                </div>

            </div>
        </div>
    </AuthenticatedLayout>
</template>
