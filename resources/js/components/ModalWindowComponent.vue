<script setup>
import Dialog from 'primevue/dialog';
import {ref} from "vue";

const visible = ref();

const props = defineProps({
    form: {
        type: null
    },
    onSubmit: {
        type: Function
    },
    eventError: {
        type: Object
    }
});
</script>

<template>
    <button @click="visible = true"
            type="button"
            class="text-gray-900 bg-white border border-gray-300
                            focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium
                            rounded-lg text-sm px-14 py-1.5 me-2 mb-2">
        <span class="">Добавить</span>
    </button>

    <Dialog v-model:visible="visible" modal header="Добавить клиента" :style="{ width: '30rem' }">
        <form @submit.prevent="onSubmit">
            <div class="pb-5">
                <InputText type="text" v-model="form.name" variant="filled" placeholder="ФИО"/>
                <Message v-if="eventError.name" severity="error">{{ eventError.name }}</Message>
            </div>
            <div class="pb-5">
                <InputMask v-model="form.tel" mask="8(999)999-99-99" placeholder="Введите номер телефона"/>
                <Message v-if="eventError.tel" severity="error">{{ eventError.tel }}</Message>
            </div>
            <div class="pb-5">
                <InputText type="text" v-model="form.email" placeholder="Email"/>
                <Message v-if="eventError.email" severity="error">{{ eventError.email }}</Message>
            </div>
            <div class="pb-5">
                <InputMask v-model="form.birthday" mask="99/99/9999" placeholder="День рождения"/>
                <Message v-if="eventError.birthday" severity="error">{{ eventError.birthday }}</Message>
            </div>

            <div class="flex justify-content-end gap-2">
                <Button type="submit" label="Save" severity="secondary">Save</Button>
            </div>
        </form>
    </Dialog>
</template>
