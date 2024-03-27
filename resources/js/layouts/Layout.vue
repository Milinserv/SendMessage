<script setup>
import logo from '../../../public/assets/logo.png';
import { Link } from '@inertiajs/vue3'


const dropdown = () => {
    document.querySelector("#submenu").classList.toggle("hidden");
    document.querySelector("#arrow").classList.toggle("rotate-0");
}

</script>

<template>
    <main>
        <aside id="default-sidebar"
               class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0"
               aria-label="Sidebar">
            <div class="h-full px-3 py-4 overflow-y-auto bg-gray-100">
                <div class="py-4 pl-3">
                    <img v-bind:src="logo" alt="">
                </div>
                <div>
                    <span class="text-slate-500">Название аккаунта</span>
                </div>

                <hr class="h-px mt-8 mb-2 bg-gray-300 border-0 dark:bg-gray-700">

                <span v-on:click="dropdown()"
                    class="p-2.5 flex items-center rounded-md  duration-300 cursor-pointer bg-white ">
                    <svg class=" text-gray-300"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                         stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z"/>
                        <path d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6-6a6 6 0 0 1 -8 -8l3.5 3.5" />
                    </svg>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] my-1 ml-1">Рассылки</span>
                    </div>
                </span>
                <div class="text-left text-sm mt-2 mx-auto text-left" id="submenu">
                    <Link class="" href="/">
                        <div class="cursor-pointer hover:bg-white rounded-md mt-1">
                            <span class="pl-10">Аналитика</span>
                        </div>
                    </Link>
                    <Link class="" href="/clients">
                        <div class="cursor-pointer hover:bg-white rounded-md mt-1">
                            <span class="pl-10">Клиенты</span>
                        </div>
                    </Link>
                    <Link class="" href="/mailings">
                        <div class="cursor-pointer hover:bg-white rounded-md mt-1">
                            <span class="pl-10">Рассылка</span>
                        </div>
                    </Link>
                </div>
            </div>
        </aside>
        <div class="pl-72 h-20 border border-bottom content-center">
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <button type="button" class="text-gray-900 bg-white border border-gray-300
                 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium
                 rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white
                 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Дома под ключ</button>
            </div>
        </div>
        <article>
            <slot />
        </article>
    </main>
</template>
