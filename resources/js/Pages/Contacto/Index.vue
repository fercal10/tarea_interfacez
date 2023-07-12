<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import DataTable from 'datatables.net-vue3';
import DataTablesCore from 'datatables.net';
import language from 'datatables.net-plugins/i18n/es-ES.mjs';

DataTable.use(DataTablesCore);
const options = {
  responsive: true,
  select: true,
  language,
};

const props= defineProps({
    contacto: { type: Object },
});

console.log(props.contacto[0]);

const columns = [
  { data: 'nombre', title: 'Nombre' },
  { data: 'telefono', title: 'Telefono' },
  { data: 'mensage', title: 'Mensage' },

];

</script>
<template>
    <Head title="Contacto" />
    <AuthenticatedLayout>
<h1>Contactos </h1>
<div class="w-full mt-10 px-5 ">

    <DataTable
    :options="options"
        :columns="columns"
        :data="contacto"

        class="display"
    />


</div>
    </AuthenticatedLayout>
</template>

<style>
@import 'datatables.net-dt';
</style>
