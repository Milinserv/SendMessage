<script setup>
import TableComponent from "../components/TableComponent.vue";

const props = defineProps({
   clients: {
       type: Array
   }
});

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
            <TableComponent :clients="clients" :table-headers="tableHeaders"  />
        </div>
    </div>
</template>
