<script setup>
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Modal from "@/Components/Modal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { Head, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

import "https://platform.twitter.com/widgets.js";

const props = defineProps({
    datos: { type: Object },
});



let fondo = "bg-[#0D0D0D] text-[#FAFAFA] ";
let fondo2 = "bg-[#FAFAFA] text-[#0D0D0D] ";
const h1ana = "text-[#8159D9]";
const h1com = " text-[#B4F24B]";
const h1mon = " text-[#CE4BF2]";

const h2ana = "text-[#5127bc]";
const h2com = "text-[#DE69FF]";
const h2mon = "text-[#E095F4]";

const buttana = "bg-[#8159D9]";
const buttcom = "bg-[#B4F24B]";
const buttmon = "bg-[#622473]";

let primario = "text-[#CE4BF2]";

let color1 = "#CE4BF2";
let color2 = "#8946A6";
let color3 = "#5127bc";
let color4 = "#8159D9";

let comple1 = "#CE4BF2";
let comple2 = "#DE69FF";
let comple3 = "#6FA612";
let comple4 = "#B4F24B";

let mono1 = "#CE4BF2";
let mono2 = "#E095F4";
let mono3 = "#622473";
let mono4 = "#694673";

function change(e, x) {
    e.preventDefault();
    num.value = x;
}
const num = ref(0);

const modal = ref(false);

const openModal = () => {
    modal.value = true;
}
const save = () => {
    form.post(route('contacto.store'), { onError: (e) => console.log(e) });
    closeModal();
}

const form = useForm({
    nombre: "",
    telefono: "",
    mensage: "",
});








const closeModal = () => {
    modal.value = false;
    form.reset();
}



</script>

<template>
    <Head title="Index"></Head>

    <main class="antialiased overflow-x-hidden">

        <a href="#header">
            <div class="fixed-button go-to-top">
                <svg xmlns="http://www.w3.org/2000/svg" width="70%" height="70%" viewBox="0 0 24 24" fill="none"
                    stroke="#fff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 19V5M5 12l7-7 7 7" />
                </svg>
            </div>
        </a>
        <button @click="$event => openModal()">

            <div class="fixed-button left go-to-top">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="60%" height="60%" fill="none"
                    stroke="#fff" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M20 2H4C2.89543 2 2 2.89543 2 4V20C2 21.1046 2.89543 22 4 22H20C21.1046 22 22 21.1046 22 20V4C22 2.89543 21.1046 2 20 2Z" />
                    <path d="M16 2V6H20" />
                    <path d="M6 2V6H10" />
                    <path d="M16 18H8" />
                    <path d="M16 14H8" />
                    <path d="M16 10H8" />
                </svg>
            </div>
        </button>

        <Modal :show="modal" @close="closeModal">
            <div class="bg-gray-300 ">

                <h2 class="p-3 text-lg font-medium text-hray-900 ">Formulario de contacto</h2>
                <div class="p-3  ">
                    <InputLabel for="nombre" value="Nombre"></InputLabel>
                    <TextInput id="nombre " ref="nombreInput" v-model="form.nombre" type="text" class="mt-1 block w-3/4"
                        placeholder="Fernando"></TextInput>
                    <InputError :message="form.errors.nombre" class="mt-2"></InputError>
                </div>
                <div class="p-3  ">
                    <InputLabel for="telefono" value="telefono "></InputLabel>
                    <TextInput id="telefono " ref="telefonoinput" v-model="form.telefono" type="text"
                        class="mt-1 block w-3/4" placeholder="+58 0412"></TextInput>
                    <InputError :message="form.errors.name" class="mt-2"></InputError>
                </div>
                <div class="p-3  ">
                    <InputLabel for="mensage" value="Mensaje"></InputLabel>
                    <TextInput id="mensage " ref="mensajeinput" v-model="form.mensage" type="text" class="mt-1 block w-3/4"
                        placeholder="... ..."></TextInput>
                    <InputError :message="form.errors.name" class="mt-2"></InputError>
                </div>
                <div class="p-3 mt-6 flex  justify-between ">
                    <div class="p-3 mt-6">
                        <SecondaryButton :disabled="form.processing" @click="save()">
                            <i class="fa-solid fa-save"></i> Guardar
                        </SecondaryButton>
                    </div>
                    <div class="p-3 mt-6">

                        <PrimaryButton :disabled="form.processing" @click="closeModal()">
                            Cancel
                        </PrimaryButton>
                    </div>
                </div>
            </div>
        </Modal>

        <!-- Header Section -->
        <header id="header" :class="['h-24 w-full relative z-50 -mt-6 ', fondo]">
            <div
                class="container max-w-6xl mx-auto h-full flex justify-center sm:justify-between items-center px-8 xl:px-0">
                <a href="/" class="h-full flex items-center relative font-black leading-none">
                    <img src="/Logo.png" alt="Logo" class="h-11" />
                    <span class="text-xl ml-3">Symtem<span class="text-pink-500">.</span></span>
                </a>

                <nav id="nav"
                    class="absolute left-0 w-full md:w-auto flex-col md:flex-row h-64 md:h-24 justify-between text-sm lg:text-base bg-white md:bg-transparent top-0 mt-24 md:mt-0 border-t md:border-none border-gray-200 pt-5 md:py-0 z-50 flex  md:flex items-center md:relative">
                    <button @click="(e) => change(e, 0)"
                        class="font-bold ml-0 md:ml-12 mr-0 md:mr-3 lg:mr-8 transition-color duration-100 hover:text-indigo-600">
                        Analogo
                    </button>



                    <button @click="(e) => change(e, 1)"
                        class="font-bold mr-0 md:mr-3 lg:mr-8 transition-color duration-100 hover:text-indigo-600">
                        Complemetario
                    </button>

                    <button @click="(e) => change(e, 2)"
                        class="font-bold mr-0 md:mr-3 lg:mr-8 transition-color duration-100 hover:text-indigo-600">
                        Monocromatico
                    </button>

                    <div class="md:hidden border-t border-gray-200 font-medium flex flex-col w-full">
                        <a href="#_"
                            class="px-5 py-3 fold-bold text-sm leading-none bg-indigo-700 text-white w-full inline-block text-center relative">
                            Comencemos
                        </a>
                    </div>
                </nav>

                <div
                    class="absolute left-0 md:relative w-full md:w-auto md:bg-transparent border-b md:border-none borde r-gray-200 mt-48 md:mt-0 flex-col md:flex-row pb-8 md:p-0 justify-center items-center md:items-end hidden md:flex md:justify-between">
                    <a
                        class="px-5 py-3 rounded fold-bold text-sm transition-all leading-none bg-indigo-700 lg:bg-white text-white lg:text-indigo-700 w-auto sm:w-full h-full inline-block font-bold relative shadow-md lg:shadow-none hover:shadow-xl duration-100 z-40">Comenzemos
                    </a>
                    <svg class="hidden lg:block absolute w-screen max-w-3xl -mt-64 -ml-12 left-0 top-0"
                        viewBox="0 0 818 815" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="c">
                                <stop :stop-color="num == 2
                                    ? mono1
                                    : num == 0
                                        ? primario
                                        : comple1
                                " offset="0%" />
                                <stop :stop-color="num == 2
                                    ? mono3
                                    : num == 0
                                        ? color3
                                        : comple3
                                " offset="100%" />
                            </linearGradient>
                            <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="f">
                                <stop :stop-color="num == 2
                                    ? mono2
                                    : num == 0
                                        ? color2
                                        : comple2
                                " offset="0%" />
                                <stop :stop-color="num == 2
                                    ? mono3
                                    : num == 0
                                        ? color3
                                        : comple3
                                " offset="100%" />
                            </linearGradient>
                            <filter x="-4.7%" y="-3.3%" width="109.3%" height="109.3%" filterUnits="objectBoundingBox"
                                id="a">
                                <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1" />
                                <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0" in="shadowBlurOuter1" />
                            </filter>
                            <filter x="-4.7%" y="-3.3%" width="109.3%" height="109.3%" filterUnits="objectBoundingBox"
                                id="d">
                                <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1" />
                                <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.2 0" in="shadowBlurOuter1" />
                            </filter>
                            <path
                                d="M160.52 108.243h497.445c17.83 0 24.296 1.856 30.814 5.342 6.519 3.486 11.635 8.602 15.12 15.12 3.487 6.52 5.344 12.985 5.344 30.815v497.445c0 17.83-1.857 24.296-5.343 30.814-3.486 6.519-8.602 11.635-15.12 15.12-6.52 3.487-12.985 5.344-30.815 5.344H160.52c-17.83 0-24.296-1.857-30.814-5.343-6.519-3.486-11.635-8.602-15.12-15.12-3.487-6.52-5.343-12.985-5.343-30.815V159.52c0-17.83 1.856-24.296 5.342-30.814 3.486-6.519 8.602-11.635 15.12-15.12 6.52-3.487 12.985-5.343 30.815-5.343z"
                                id="b" />
                            <path
                                d="M159.107 107.829H656.55c17.83 0 24.296 1.856 30.815 5.342 6.518 3.487 11.634 8.602 15.12 15.12 3.486 6.52 5.343 12.985 5.343 30.816V656.55c0 17.83-1.857 24.296-5.343 30.815-3.486 6.518-8.602 11.634-15.12 15.12-6.519 3.486-12.985 5.343-30.815 5.343H159.107c-17.83 0-24.297-1.857-30.815-5.343-6.519-3.486-11.634-8.602-15.12-15.12-3.487-6.519-5.343-12.985-5.343-30.815V159.107c0-17.83 1.856-24.297 5.342-30.815 3.487-6.519 8.602-11.634 15.12-15.12 6.52-3.487 12.985-5.343 30.816-5.343z"
                                id="e" />
                        </defs>
                        <g fill="none" fill-rule="evenodd" opacity=".9">
                            <g transform="rotate(65 416.452 409.167)">
                                <use fill="#000" filter="url(#a)" xlink:href="#b" />
                                <use fill="url(#c)" xlink:href="#b" />
                            </g>
                            <g transform="rotate(29 421.929 414.496)">
                                <use fill="#000" filter="url(#d)" xlink:href="#e" />
                                <use fill="url(#f)" xlink:href="#e" />
                            </g>
                        </g>
                    </svg>
                </div>

                <div id="nav-mobile-btn"
                    class="w-6 absolute block md:hidden right-0 top-0 mr-10 mt-8 sm:mt-10 z-50 cursor-pointer select-none">
                    <span class="w-full h-1 mt-2 sm:mt-1 bg-gray-800 rounded-full block transform duration-200"></span>
                    <span class="w-full h-1 mt-1 bg-gray-800 rounded-full block transform duration-200"></span>
                </div>
            </div>
        </header>
        <!-- End Header Section-->

        <!-- BEGIN HERO SECTION -->
        <div :class="[
            'w-full justify-center items-center relative  overflow-x-hidden lg:pt-40 lg:pb-40 xl:pt-40 xl:pb-64',
            fondo,
        ]">
            <div
                class="container max-w-6xl mx-auto h-full flex flex-col lg:flex-row justify-between items-center -mt-32 px-8 xl:px-0">
                <div
                    class="flex flex-col items-center lg:items-start w-full max-w-xl lg:w-1/2 pt-48 lg:pt-20 xl:pt-40 text-center lg:text-left z-30">
                    <h1 :class="[
                        'font-semibold text-3xl sm:text-6xl leading-tight relative mb-4 xl:mb-8',
                        num == 2 ? h1mon : num == 0 ? h1ana : h1com,
                    ]">
                        Contruimos tus nuevos proyectos
                    </h1>
                    <p class="text-base sm:text-lg xl:text-xl mb-8 pr-0 lg:pr-20">
                        Estas listo para aventurarte en la creacion de app
                        propias
                    </p>
                    <a :class="[
                        'mt-0 sm:mt-1 px-8 py-4 rounded-md fold-bold text-base  shadow-xl text-white border-t border-gray-200 w-auto font-bold relative self-start inline-block lg:mx-0 mx-auto',
                        num == 2 ? buttmon : num == 0 ? buttana : buttcom,
                    ]">
                        Contactar
                    </a>
                    <!-- Integrates with section -->

                    <svg class="absolute left-0 max-w-md -ml-64 mt-24 left-svg" viewBox="0 0 423 423"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <linearGradient x1="100%" y1="0%" x2="4.48%" y2="0%" id="linearGradient-1">
                                <stop :stop-color="num == 2
                                    ? mono4
                                    : num == 0
                                        ? color4
                                        : comple4
                                " offset="0%" />
                                <stop :stop-color="num == 2
                                    ? mono2
                                    : num == 0
                                        ? color2
                                        : comple2
                                " offset="100%" />
                            </linearGradient>
                            <filter x="-9.3%" y="-6.7%" width="118.7%" height="118.7%" filterUnits="objectBoundingBox"
                                id="filter-3">
                                <feOffset dy="8" in="SourceAlpha" result="shadowOffsetOuter1" />
                                <feGaussianBlur stdDeviation="8" in="shadowOffsetOuter1" result="shadowBlurOuter1" />
                                <feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.1 0" in="shadowBlurOuter1" />
                            </filter>
                            <rect id="path-2" x="63" y="504" width="300" height="300" rx="40" />
                        </defs>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" opacity=".9">
                            <g id="Desktop-HD" transform="translate(-39 -531)">
                                <g id="Hero" transform="translate(43 83)">
                                    <g id="Rectangle-6" transform="rotate(45 213 654)">
                                        <use fill="#000" filter="url(#filter-3)" xlink:href="#path-2" />
                                        <use fill="url(#linearGradient-1)" xlink:href="#path-2" />
                                    </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div class="flex flex-col items-end justify-center h-full w-full lg:w-1/2 ms:pl-10 relative z-50">
                    <div class="relative lg:absolute max-w-4xl xl:max-w-6xl left-0 container lg:w-screen w-full">
                        <img src="./../../../public/Logo.png" alt="Logo"
                            class="hidden h-28 lg:block absolute -z-10 bottom-72 left-[28rem]" />
                        <img src="./../../../public/laptop.png"
                            class="mt-20 lg:mt-24 xl:mt-40 w-full h-auto mb-20 lg:mb-0 lg:h-full ml-0 lg:-ml-12" />
                    </div>
                </div>
            </div>
        </div>
        <!-- HERO SECTION END -->

        <!-- BEGIN FEATURES SECTION -->
        <div :class="[
            'w-full relative py-10 md:py-16 lg:py-24 xl:py-24 border-t border-[#5127bc] px-8 xl:px-0',
            fondo,
        ]">
            <div class="container max-w-6xl mx-auto h-full flex flex-col justify-between items-center">
                <h2 :class="[
                    'uppercase text-base font-medium tracking-tight my-5',
                    num == 2 ? h2mon : num == 0 ? h2ana : h2com,
                ]">
                    Otros servicios
                </h2>
                <h3 :class="[
                    'font-black text-3xl mt-2 sm:mt-0 px-5 sm:px-0 sm:text-6xl max-w-2xl leading-tight  text-center ',
                    num == 2 ? h1mon : num == 0 ? h1ana : h1com,
                ]">
                    Contruimos y diseñamos con tus ideas
                </h3>
                <div class="flex flex-col lg:flex-row w-full mt-0 sm:mt-10 lg:mt-20">
                    <div class="w-full max-w-md mx-auto mb-0 sm:mb-16 lg:mb-0 lg:w-1/3 p-4">
                        <div class="flex flex-col justify-center items-center w-full h-full mr-5 p-20 rounded-lg relative">
                            <svg class="w-full h-full absolute fill-current text-gray-100" viewBox="0 0 377 340"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path
                                            d="M342.8 3.7c24.7 14 18.1 75 22.1 124s18.6 85.8 8.7 114.2c-9.9 28.4-44.4 48.3-76.4 62.4-32 14.1-61.6 22.4-95.9 28.9-34.3 6.5-73.3 11.1-95.5-6.2-22.2-17.2-27.6-56.5-47.2-96C38.9 191.4 5 151.5.9 108.2-3.1 64.8 22.7 18 61.8 8.7c39.2-9.2 91.7 19 146 16.6 54.2-2.4 110.3-35.6 135-21.6z" />
                                    </g>
                                </g>
                            </svg>
                            <!-- FEATURE Icon 1 -->
                            <svg class="w-20 h-20 relative" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-1TriangleIcon1">
                                        <stop :stop-color="num == 2
                                            ? mono2
                                            : num == 0
                                                ? color2
                                                : comple2
                                        " offset="0%" />
                                        <stop :stop-color="num == 2
                                            ? mono1
                                            : num == 0
                                                ? color1
                                                : comple1
                                        " offset="100%" />
                                    </linearGradient>
                                    <filter x="-14%" y="-10%" width="128%" height="128%" filterUnits="objectBoundingBox"
                                        id="filter-3TriangleIcon1">
                                        <feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
                                        <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1"
                                            result="shadowBlurOuter1" />
                                        <feColorMatrix
                                            values="0 0 0 0 0.141176471 0 0 0 0 0.031372549 0 0 0 0 0.501960784 0 0 0 0.15 0"
                                            in="shadowBlurOuter1" />
                                    </filter>
                                    <path
                                        d="M17.947 0h14.106c6.24 0 8.503.65 10.785 1.87a12.721 12.721 0 015.292 5.292C49.35 9.444 50 11.707 50 17.947v14.106c0 6.24-.65 8.503-1.87 10.785a12.721 12.721 0 01-5.292 5.292C40.556 49.35 38.293 50 32.053 50H17.947c-6.24 0-8.503-.65-10.785-1.87a12.721 12.721 0 01-5.292-5.292C.65 40.556 0 38.293 0 32.053V17.947c0-6.24.65-8.503 1.87-10.785A12.721 12.721 0 017.162 1.87C9.444.65 11.707 0 17.947 0z"
                                        id="path-2TriangleIcon1" />
                                </defs>
                                <g id="Page-1TriangleIcon1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Desktop-HDTriangleIcon1" transform="translate(-291 -1278)">
                                        <g id="FeaturesTriangleIcon1" transform="translate(170 915)">
                                            <g id="Group-9TriangleIcon1" transform="translate(0 365)">
                                                <g id="Group-8TriangleIcon1" transform="translate(125)">
                                                    <g id="Rectangle-9TriangleIcon1">
                                                        <use fill="#000" filter="url(#filter-3TriangleIcon1)"
                                                            xlink:href="#path-2TriangleIcon1" />
                                                        <use fill="url(#linearGradient-1TriangleIcon1)"
                                                            xlink:href="#path-2TriangleIcon1" />
                                                    </g>
                                                    <g id="playTriangleIcon1" transform="translate(18 15)" fill="#FFF"
                                                        fill-rule="nonzero">
                                                        <path
                                                            d="M9.432 2.023l8.919 14.879a1.05 1.05 0 01-.384 1.452 1.097 1.097 0 01-.548.146H-.42A1.07 1.07 0 01-1.5 17.44c0-.19.052-.375.15-.538L7.567 2.023a1.092 1.092 0 011.864 0z"
                                                            id="TriangleIcon1" transform="rotate(90 8.5 10)" />
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <h4 class="font-bold text-gray-900 text-lg mt-4 relative">
                                Automatización de tareas
                            </h4>
                            <p class="text-base text-gray-700 text-center mt-2 relative">
                                Diminuye tus carga de trabajo con la tareas
                                automaticas
                            </p>
                        </div>
                    </div>

                    <div class="w-full max-w-md mx-auto mb-0 sm:mb-16 lg:mb-0 lg:w-1/3 p-4">
                        <div class="flex flex-col justify-center items-center w-full h-full mr-5 p-20 rounded-lg relative">
                            <svg class="w-full h-full absolute fill-current text-gray-100" viewBox="0 0 358 372"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path
                                            d="M315.7 6.5c30.2 15.1 42.6 61.8 41.5 102.5-1.1 40.6-15.7 75.2-24.3 114.8-8.7 39.7-11.3 84.3-34.3 107.2-23 22.9-66.3 23.9-114.5 30.7-48.2 6.7-101.3 19.1-123.2-4.1-21.8-23.2-12.5-82.1-21.6-130.2C30.2 179.3 2.6 141.9.7 102c-2-39.9 21.7-82.2 57.4-95.6 35.7-13.5 83.3 2.1 131.2 1.7 47.9-.4 96.1-16.8 126.4-1.6z" />
                                    </g>
                                </g>
                            </svg>
                            <!-- FEATURE Icon 2 -->
                            <svg class="w-20 h-20 relative" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-1Icon2">
                                        <stop :stop-color="num == 2
                                            ? mono2
                                            : num == 0
                                                ? color2
                                                : comple2
                                        " offset="0%" />
                                        <stop :stop-color="num == 2
                                            ? mono4
                                            : num == 0
                                                ? color4
                                                : comple4
                                        " offset="100%" />
                                    </linearGradient>
                                    <filter x="-14%" y="-10%" width="128%" height="128%" filterUnits="objectBoundingBox"
                                        id="filter-3Icon2">
                                        <feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
                                        <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1"
                                            result="shadowBlurOuter1" />
                                        <feColorMatrix
                                            values="0 0 0 0 0.501960784 0 0 0 0 0.125490196 0 0 0 0 0 0 0 0 0.15 0"
                                            in="shadowBlurOuter1" />
                                    </filter>
                                    <path
                                        d="M17.947 0h14.106c6.24 0 8.503.65 10.785 1.87a12.721 12.721 0 015.292 5.292C49.35 9.444 50 11.707 50 17.947v14.106c0 6.24-.65 8.503-1.87 10.785a12.721 12.721 0 01-5.292 5.292C40.556 49.35 38.293 50 32.053 50H17.947c-6.24 0-8.503-.65-10.785-1.87a12.721 12.721 0 01-5.292-5.292C.65 40.556 0 38.293 0 32.053V17.947c0-6.24.65-8.503 1.87-10.785A12.721 12.721 0 017.162 1.87C9.444.65 11.707 0 17.947 0z"
                                        id="path-2Icon2" />
                                </defs>
                                <g id="Page-1Icon2" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Desktop-HDIcon2" transform="translate(-691 -1278)">
                                        <g id="FeaturesIcon2" transform="translate(170 915)">
                                            <g id="Group-9-CopyIcon2" transform="translate(400 365)">
                                                <g id="Group-8Icon2" transform="translate(125)">
                                                    <g id="Rectangle-9Icon2">
                                                        <use fill="#000" filter="url(#filter-3Icon2)"
                                                            xlink:href="#path-2Icon2" />
                                                        <use fill="url(#linearGradient-1Icon2)" xlink:href="#path-2Icon2" />
                                                    </g>
                                                    <g id="machine-learningIcon2" transform="translate(14 12)" fill="#FFF"
                                                        fill-rule="nonzero">
                                                        <path
                                                            d="M10.554 21.418v-2.68c-1.1-.204-1.932-1.143-1.932-2.271 0-.468.143-.903.388-1.267l-2.32-1.662L4.367 15.2a2.254 2.254 0 01-.005 2.541l5.28 4.05c.268-.182.577-.311.911-.373zm.892 0c.334.062.643.191.912.373l5.28-4.05a2.254 2.254 0 01-.006-2.54l-2.321-1.663L12.99 15.2c.245.364.388.8.388 1.267 0 1.128-.832 2.067-1.932 2.27v2.681zm1.538.997c.25.365.394.803.394 1.274C13.378 24.965 12.314 26 11 26s-2.378-1.035-2.378-2.311c0-.471.145-.91.394-1.274l-5.28-4.05c-.385.26-.853.413-1.358.413C1.065 18.778 0 17.743 0 16.467c0-1.129.832-2.068 1.932-2.27v-2.393C.832 11.6 0 10.662 0 9.534c0-1.277 1.065-2.312 2.378-2.312.505 0 .973.153 1.358.414l5.28-4.05a2.254 2.254 0 01-.394-1.275C8.622 1.035 9.686 0 11 0s2.378 1.035 2.378 2.311c0 .471-.145.91-.394 1.274l5.28 4.05c.385-.26.853-.413 1.358-.413C20.935 7.222 22 8.257 22 9.533c0 1.129-.832 2.068-1.932 2.27v2.393c1.1.203 1.932 1.142 1.932 2.27 0 1.277-1.065 2.312-2.378 2.312-.505 0-.973-.153-1.358-.414l-5.28 4.05zm-9.243-7.843L5.937 13l-2.196-1.572c-.27.183-.58.314-.917.376v2.392c.336.062.647.193.917.376zm.627-3.772l2.321 1.662L9.01 10.8a2.254 2.254 0 01-.388-1.267c0-1.128.832-2.067 1.932-2.27V4.582a2.403 2.403 0 01-.912-.373l-5.28 4.05a2.254 2.254 0 01.006 2.54zm13.89 3.772c.27-.183.582-.314.918-.376v-2.392a2.403 2.403 0 01-.917-.376L16.063 13l2.196 1.572zm-.62-6.313l-5.28-4.05a2.403 2.403 0 01-.912.373v2.68c1.1.204 1.932 1.143 1.932 2.271 0 .468-.143.903-.388 1.267l2.32 1.662 2.322-1.662a2.254 2.254 0 01.005-2.541zm-8 6.313A2.415 2.415 0 0111 14.156c.507 0 .977.154 1.363.416L14.559 13l-2.196-1.572a2.415 2.415 0 01-1.363.416c-.507 0-.977-.154-1.363-.416L7.441 13l2.196 1.572zM11 10.978c.821 0 1.486-.647 1.486-1.445 0-.797-.665-1.444-1.486-1.444s-1.486.647-1.486 1.444c0 .798.665 1.445 1.486 1.445zm0 6.933c.821 0 1.486-.647 1.486-1.444 0-.798-.665-1.445-1.486-1.445s-1.486.647-1.486 1.445c0 .797.665 1.444 1.486 1.444zm8.622-6.933c.82 0 1.486-.647 1.486-1.445 0-.797-.665-1.444-1.486-1.444s-1.487.647-1.487 1.444c0 .798.666 1.445 1.487 1.445zm0 6.933c.82 0 1.486-.647 1.486-1.444 0-.798-.665-1.445-1.486-1.445s-1.487.647-1.487 1.445c0 .797.666 1.444 1.487 1.444zM2.378 10.978c.821 0 1.487-.647 1.487-1.445 0-.797-.666-1.444-1.487-1.444-.82 0-1.486.647-1.486 1.444 0 .798.665 1.445 1.486 1.445zm0 6.933c.821 0 1.487-.647 1.487-1.444 0-.798-.666-1.445-1.487-1.445-.82 0-1.486.647-1.486 1.445 0 .797.665 1.444 1.486 1.444zM11 25.133c.821 0 1.486-.646 1.486-1.444 0-.798-.665-1.445-1.486-1.445s-1.486.647-1.486 1.445.665 1.444 1.486 1.444zm0-21.377c.821 0 1.486-.647 1.486-1.445S11.821.867 11 .867s-1.486.646-1.486 1.444c0 .798.665 1.445 1.486 1.445z"
                                                            id="ShapeIcon2" />
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <h4 class="font-bold text-gray-900 text-lg mt-6 relative">
                                Red de infromacion
                            </h4>
                            <p class="text-base text-gray-700 text-center mt-2 relative">
                                Acede a la informacion desde tu negocion donde
                                quieras y cuando la necesites .
                            </p>
                        </div>
                    </div>

                    <div class="w-full max-w-md mx-auto mb-16 lg:mb-0 lg:w-1/3 p-4">
                        <div class="flex flex-col justify-center items-center w-full h-full mr-5 p-20 rounded-lg relative">
                            <svg class="w-full h-full absolute fill-current text-gray-100" viewBox="0 0 378 410"
                                xmlns="http://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <path
                                            d="M305.9 14.4c23.8 24.6 16.3 84.9 26.6 135.1 10.4 50.2 38.6 90.3 43.7 137.8 5.1 47.5-12.8 102.4-50.7 117.4-37.9 15.1-95.7-9.8-151.7-12.2-56.1-2.5-110.3 17.6-130-3.4-19.7-20.9-4.7-82.9-11.5-131.2C25.5 209.5-3 174.7 1.2 147c4.2-27.7 41-48.3 75-69.6C110.1 56.1 141 34.1 184 17.5c43.1-16.6 98.1-27.7 121.9-3.1z" />
                                    </g>
                                </g>
                            </svg>
                            <!-- FEATURE Icon 3 -->
                            <svg class="relative h-20 w-20" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <linearGradient x1="0%" y1="0%" x2="100%" y2="100%" id="linearGradient-1Icon3">
                                        <stop :stop-color="num == 2
                                            ? mono4
                                            : num == 0
                                                ? color4
                                                : comple4
                                        " offset="0%" />
                                        <stop :stop-color="num == 2
                                            ? mono3
                                            : num == 0
                                                ? color3
                                                : comple3
                                        " offset="100%" />
                                    </linearGradient>
                                    <filter x="-14%" y="-10%" width="128%" height="128%" filterUnits="objectBoundingBox"
                                        id="filter-3Icon3">
                                        <feOffset dy="2" in="SourceAlpha" result="shadowOffsetOuter1" />
                                        <feGaussianBlur stdDeviation="2" in="shadowOffsetOuter1"
                                            result="shadowBlurOuter1" />
                                        <feColorMatrix
                                            values="0 0 0 0 0.031372549 0 0 0 0 0.149019608 0 0 0 0 0.658823529 0 0 0 0.15 0"
                                            in="shadowBlurOuter1" />
                                    </filter>
                                    <path
                                        d="M17.947 0h14.106c6.24 0 8.503.65 10.785 1.87a12.721 12.721 0 015.292 5.292C49.35 9.444 50 11.707 50 17.947v14.106c0 6.24-.65 8.503-1.87 10.785a12.721 12.721 0 01-5.292 5.292C40.556 49.35 38.293 50 32.053 50H17.947c-6.24 0-8.503-.65-10.785-1.87a12.721 12.721 0 01-5.292-5.292C.65 40.556 0 38.293 0 32.053V17.947c0-6.24.65-8.503 1.87-10.785A12.721 12.721 0 017.162 1.87C9.444.65 11.707 0 17.947 0z"
                                        id="path-2Icon3" />
                                </defs>
                                <g id="Page-1Icon3" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Desktop-HDIcon3" transform="translate(-1091 -1278)">
                                        <g id="FeaturesIcon3" transform="translate(170 915)">
                                            <g id="Group-9-Copy-2Icon3" transform="translate(800 365)">
                                                <g id="Group-8Icon3" transform="translate(125)">
                                                    <g id="Rectangle-9Icon3">
                                                        <use fill="#000" filter="url(#filter-3Icon3)"
                                                            xlink:href="#path-2Icon3" />
                                                        <use fill="url(#linearGradient-1Icon3)" xlink:href="#path-2Icon3" />
                                                    </g>
                                                    <g id="smart-notificationsIcon3" transform="translate(15 11)"
                                                        fill="#FFF" fill-rule="nonzero">
                                                        <path
                                                            d="M12.519 3.243a6.808 6.808 0 00-.187 1.298h-8.44a2.595 2.595 0 00-2.595 2.594v12.973a2.595 2.595 0 002.595 2.595h12.973a2.595 2.595 0 002.594-2.595v-8.44c.445-.02.88-.084 1.298-.187v8.627A3.892 3.892 0 0116.865 24H3.892A3.892 3.892 0 010 20.108V7.135a3.892 3.892 0 013.892-3.892h8.627zm6.616 6.487a4.865 4.865 0 110-9.73 4.865 4.865 0 010 9.73z"
                                                            id="IconIcon3" />
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <h4 class="font-bold text-gray-900 text-lg mt-6 relative">
                                Notificaciones inteligentes
                            </h4>
                            <p class="text-base text-gray-700 text-center mt-2 relative">
                                Con nuestras notificaciones inteligentes matente
                                al pendiente de todo.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END FEATURES SECTION -->

        <!-- Begin Baner SECTION  -->
        <div :class="[' flex gap-2 p-4 w-full bg-white snap-x ', fondo]">
            <div class="w-2/4 shrink-0 snap-center overflow-hidden  " v-for="post in datos.filter((e)=>e.tipo=='Twitter')">
                
                    <blockquote class="twitter-tweet  ">
                        <p lang="es" dir="ltr">
                            {{ post.name }}
                            <a href="https://t.co/wLQ62gdRcU">pic.twitter.com/wLQ62gdRcU</a>
                        </p>&mdash; {{ post.name }}
                        <a :href="post.url"></a>
                    </blockquote>
           
            </div>
        </div>
        <div :class="[' flex gap-2 mt-5 p-4 w-full bg-white snap-x ', fondo]">
            <div class="w-2/6 shrink-0 snap-center overflow-hidden  " v-for="post in datos.filter((e)=>e.tipo=='Youtube')">
                <iframe width="560" height="315" :src="post.url" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            </div>
        </div>
        <div :class="[' flex gap-2 mt-5 p-4 w-full bg-white snap-x ', fondo]">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15705.248546593366!2d-67.9624233!3d10.23639!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e805d284797b2c9%3A0x792aeec9324d3695!2sUniversidad%20Jos%C3%A9%20Antonio%20P%C3%A1ez!5e0!3m2!1ses-419!2sve!4v1686090534810!5m2!1ses-419!2sve" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div :class="[' h-24', fondo]">
            <h1 :class="[
                'font-semibold text-3xl sm:text-6xl text-center leading-tight relative mb-4 xl:mb-8',
                num == 2 ? h1mon : num == 0 ? h1ana : h1com,
            ]">
                Portafolios de proyectos
            </h1>
        </div>
        <div :class="[
            'w-full justify-center items-center relative  overflow-x-hidden  lg:pt-20 lg:pb-20 xl:pt-20 xl:pb-20 border-t border-[#5127bc]',
            fondo,
        ]">
            <div :class="[' flex h-[90vh]', fondo]">
                <div class="bg-conver bg-center bg-no-repeat h-[80vh] rounded-3xl flex-[0.5] m-3 relative transition-all duration-700 ease-in hover:flex-[5]"
                    style="background-image: url('/based.png')">
                    <h3 :class="[
                        'absolute text-2xl bottom-5 left-5',
                        num == 2 ? h1mon : num == 0 ? h1ana : h1com,
                    ]">
                        Control de nomina
                    </h3>
                </div>

                <div class="bg-cover bg-center bg-no-repeat h-[80vh] rounded-3xl flex-[0.5] m-3 relative transition-all duration-700 ease-in hover:flex-[5]"
                    style="
                                background-image: url('https://images.unsplash.com/photo-1572276596237-5db2c3e16c5d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80');
                            ">
                    <h3 :class="[
                        'absolute text-2xl bottom-5 left-5',
                        num == 2 ? h1mon : num == 0 ? h1ana : h1com,
                    ]">
                        Wild Forest
                    </h3>
                </div>

                <div class="bg-cover bg-center bg-no-repeat h-[80vh] rounded-3xl flex-[0.5] m-3 relative transition-all duration-700 ease-in hover:flex-[5]"
                    style="
                                background-image: url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1353&q=80');
                            ">
                    <h3 :class="[
                        'absolute text-2xl bottom-5 left-5',
                        num == 2 ? h1mon : num == 0 ? h1ana : h1com,
                    ]">
                        Sunny Beach
                    </h3>
                </div>

                <div class="bg-cover bg-center bg-no-repeat h-[80vh] rounded-3xl flex-[0.5] m-3 relative transition-all duration-700 ease-in hover:flex-[5]"
                    style="
                                background-image: url('https://images.unsplash.com/photo-1551009175-8a68da93d5f9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1351&q=80');
                            ">
                    <h3 :class="[
                        'absolute text-2xl bottom-5 left-5',
                        num == 2 ? h1mon : num == 0 ? h1ana : h1com,
                    ]">
                        City on Winter
                    </h3>
                </div>
                <div class="bg-cover bg-center bg-no-repeat h-[80vh] rounded-3xl flex-[0.5] m-3 relative transition-all duration-700 ease-in hover:flex-[5]"
                    style="
                                background-image: url('https://images.unsplash.com/photo-1549880338-65ddcdfd017b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80');
                            ">
                    <h3 :class="[
                        'absolute text-2xl bottom-5 left-5',
                        num == 2 ? h1mon : num == 0 ? h1ana : h1com,
                    ]">
                        Mountains - Clouds
                    </h3>
                </div>
            </div>
        </div>
        <!--  Baner SECTION end  -->

        <footer class="bg-white border-t border-gray-200 text-white pt-12 pb-8 px-4">
            <div class="mx-auto px-4 container overflow-hidden max-w-6xl flex flex-col lg:flex-row justify-between">
                <div class="w-full lg:w-1/4 mr-4 text-left sm:text-center pl-12 sm:pl-0 lg:text-left">
                    <a href="/"
                        class=" text-left sm:text-center lg:text-left flex justify-start sm:justify-center lg:justify-start">
                        <img src="/Logo.png" alt="Logo" class="h-11" />
                    </a>
                </div>
                <div class="w-full lg:w-3/4 pl-10 block sm:flex text-sm mt-6 lg:mt-0">
                    <ul class="text-gray-700 list-none p-0 font-medium flex flex-col text-left w-full">
                        <li class="inline-block py-2 px-3 text-gray-800 uppercase font-bold tracking-wide mt-5 md:mt-0">
                            Productos
                        </li>
                        <li>
                            <a href="#_"
                                class="inline-block py-2 px-3 text-gray-500 hover:text-gray-600 no-underline">Servicios
                            </a>
                        </li>
                        <li>
                            <a href="#_"
                                class="inline-block py-2 px-3 text-gray-500 hover:text-gray-600 no-underline">Integracion</a>
                        </li>
                        <li>
                            <a href="#_"
                                class="inline-block py-2 px-3 text-gray-500 hover:text-gray-600 no-underline">Precios
                            </a>
                        </li>
                        <li>
                            <a href="#_"
                                class="inline-block py-2 px-3 text-gray-500 hover:text-gray-600 no-underline">FAQ</a>
                        </li>
                    </ul>
                    <ul class="text-gray-700 list-none p-0 font-medium flex flex-col text-left w-full">
                        <li>
                            <a href="#_"
                                class="inline-block py-2 px-3 text-gray-500 hover:text-gray-600 no-underline">Privacidad</a>
                        </li>
                        <li>
                            <a href="#_" class="inline-block py-2 px-3 text-gray-500 hover:text-gray-600 no-underline">
                                Terminos y condiciones
                            </a>
                        </li>
                    </ul>

                    <div class="text-gray-700 flex flex-col w-full">
                        <div class="inline-block py-2 px-3 text-gray-800 uppercase font-bold mt-5 md:mt-0">
                            Siguenos
                        </div>
                        <div class="flex pl-4 justify-start mt-2">
                            <a class=" flex items-center text-gray-400 hover:text-gray-600 mr-6 no-underline"
                                target="_blank" href="https://devdojo.com">
                                <svg viewBox="0 0 24 24" class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M23.998 12c0-6.628-5.372-12-11.999-12C5.372 0 0 5.372 0 12c0 5.988 4.388 10.952 10.124 11.852v-8.384H7.078v-3.469h3.046V9.356c0-3.008 1.792-4.669 4.532-4.669 1.313 0 2.686.234 2.686.234v2.953H15.83c-1.49 0-1.955.925-1.955 1.874V12h3.328l-.532 3.469h-2.796v8.384c5.736-.9 10.124-5.864 10.124-11.853z" />
                                </svg>
                            </a>
                            <a class=" flex items-center text-gray-400 hover:text-gray-600 mr-6 no-underline"
                                target="_blank" href="https://devdojo.com">
                                <svg viewBox="0 0 24 24" class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M23.954 4.569a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.691 8.094 4.066 6.13 1.64 3.161a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.061a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.937 4.937 0 004.604 3.417 9.868 9.868 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63a9.936 9.936 0 002.46-2.548l-.047-.02z" />
                                </svg>
                            </a>
                            <a class=" flex items-center text-gray-400 hover:text-gray-600 no-underline" target="_blank"
                                href="https://devdojo.com">
                                <svg viewBox="0 0 24 24" class="fill-current w-5 h-5" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" mt-10 pt-6 text-gray-400 border-t border-gray-100 text-center">
                Alejandro León y Fernando Calderón. Todos los derechos
                reservados
            </div>
        </footer>
    </main>
</template>

<style>
@media (max-width: 1520px) {
    .left-svg {
        display: none;
    }
}

/* small css for the mobile nav close */
#nav-mobile-btn.close span:first-child {
    transform: rotate(45deg);
    top: 4px;
    position: relative;
    background: #a0aec0;
}

#nav-mobile-btn.close span:nth-child(2) {
    transform: rotate(-45deg);
    margin-top: 0px;
    background: #a0aec0;
}

.dark {
    filter: invert(1);
    background: #252525;
}

.flip {
    filter: invert(1);
}

.theme-switch {
    cursor: pointer;
}
</style>
