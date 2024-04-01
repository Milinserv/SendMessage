<script setup>
import ModalWindowComponent from "../components/ModalWindowComponent.vue";
import TableComponent from "../components/TableComponent.vue";
import {reactive} from "vue";
import {router} from "@inertiajs/vue3";

const form = reactive({
    name: null,
    tel: null,
    email: null,
    birthday: null
})

const onSubmit = () => {
    return router.post('/client/store', form);
}

let props = defineProps({
    clients: {
        type: Array
    },
    errors: {
        type: Object
    }
});

let tableHeaders = [
    {
        id: 1,
        name: 'Название'
    },
    {
        id: 2,
        name: 'Телефон'
    },
    {
        id: 3,
        name: 'Email'
    },
    {
        id: 4,
        name: 'День рождения'
    },
];

</script>

<template>
    <div class="flex pl-72 pt-5">
        <div class="grid grid-4 w-11/12">
            <span class="font-bold">Клиенты</span>
            <div class="grid grid-cols-4 w-full pt-4">
                <span class="pr-5 text-lg">Сегменты</span>
                <span class="pr-10 text-lg">Список клиентов</span>
                <span class="text-lg">Покупки</span>
                <div class="flex justify-end">
                    <ModalWindowComponent :onSubmit="onSubmit"
                                          :form="form"
                                          :eventError="props.errors"/>
                </div>
            </div>
            <div class="pt-5">
                <div class="relative mb-8">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-2 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none"
                             stroke="#9b9b9b" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </div>
                    <input type="text"
                           id="input-group-1"
                           class="bg-white border border-gray-300 text-gray-900 text-sm rounded-xl focus:ring-gray-500
                           focus:border-gray-500 block w-full ps-10 p-1.5"
                           placeholder="Поиск и фильтр">
                </div>
            </div>
            <TableComponent :clients="clients" :table-headers="tableHeaders" />
        </div>
    </div>
</template>
