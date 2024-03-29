<script setup>
const props = defineProps({
    clients: {
        type: Array
    },
    tableHeaders: {
        type: Array
    }
});
</script>

<template>
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
                <tr v-for="client in clients" :key="client.id" class="bg-white">
                    <th scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        {{ client.name }}
                    </th>
                    <td class="px-6 py-4">
                        {{ client.tel }}
                    </td>
                    <td class="px-6 py-4">
                        {{ client.email }}
                    </td>
                    <td class="px-6 py-4">
                        {{ client.birthday }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
