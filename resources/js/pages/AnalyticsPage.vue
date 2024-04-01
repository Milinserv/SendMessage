<script setup>
import TableComponent from "../components/TableComponent.vue";

const props = defineProps({
    mailings: {
       type: Array
   }
});

console.log(props.mailings);

let tableHeaders = [
    {
        id: 1,
        name: 'ID'
    },
    {
        id: 2,
        name: 'Название'
    },
    {
        id: 3,
        name: 'Статус'
    },
    {
        id: 4,
        name: 'Отправлено'
    },
    {
        id: 5,
        name: 'Доставлено'
    },
];
</script>

<template>
    <div class="flex pl-72 pt-5">
        <div class="grid grid-4 w-11/12">
            <div class="pt-20">
                <div class="relative overflow-x-auto">
                    <table class="w-full divide-y-2 divide-gray-200 text-sm text-left rtl:text-right text-gray-500">
                        <thead class=" text-xs text-gray-900 uppercase">
                        <tr>
                            <th v-for="header in tableHeaders" :key="header.id" scope="col" class="px-6 py-3">
                                {{ header.name }}
                            </th>
                        </tr>
                        </thead>
                        <tbody class="divide-y-2 divide-gray-200">
                        <tr v-for="client in mailings" :key="client.id" class="bg-white">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ client.id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ client.mailing_name }}
                            </td>
                            <td class="px-6 py-4">
                                -
                            </td>
                            <td class="px-6 py-4">
                                {{ client.recipient_id.length }}
                            </td>
                            <td class="px-6 py-4">
                                -
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
