<script setup>
import {reactive} from "vue";
import Textarea from 'primevue/textarea';
import Dropdown from 'primevue/dropdown';
import FloatLabel from 'primevue/floatlabel';
import RadioButton from 'primevue/radiobutton';
import Tag from 'primevue/tag';
import {router} from "@inertiajs/vue3";
import { defineProps } from 'vue';

const props = defineProps({
    clients: {
        type: Array
    }
});

const form = reactive({
    mailingName: null,
    mailingText: null,
    clientsForMailing: null,
    selectedPeriod: null,
    regularity: {
        frequency: null,
        selectedTime: null
    },
    selectAllRecipient: false
});

const options = [
    {
        name: '2',
        value: 'Каждый день'
    },
    {
        name: '5',
        value: 'Каждую неделю'
    },
    {
        name: '6',
        value: 'Каждый месяц'
    },
    {
        name: '7',
        value: 'Каждый год'
    }
];

const onSubmit = () => {
    return router.post('/mailing/add', form);
}
</script>

<template>
    <div class="flex pl-72 pt-5">
        <div class="grid grid-4 w-6/12">
            <span class="font-bold">Создать рассылку</span>
            <div class="pt-10">
                <form @submit.prevent="onSubmit">
                    <div class="pb-5 pb-8">
                        <FloatLabel>
                            <InputText class="w-full" v-model="form.mailingName" rows="5" cols="30"/>
                            <label>Название рассылки</label>
                        </FloatLabel>
                        <!--                        <Message v-if="eventError.tel" severity="error">{{ eventError.tel }}</Message>-->
                    </div>
                    <div class="pb-8">
                        <FloatLabel>
                            <Textarea class="w-full" v-model="form.mailingText" rows="5" cols="30"/>
                            <label>Текст рассылки</label>
                        </FloatLabel>
                    </div>

                    <div class="pb-10">
                        <span class="pb-8">Выберите получателей</span>
                        <p class="text-sm pt-5 pb-2">Выберите тех кому хотите отправить рассылку. Можете выбрать всех
                            или определенные сегменты.</p>
                        <MultiSelect v-model="form.clientsForMailing"
                                     :options="clients"
                                     optionLabel="name"
                                     :maxSelectedLabels="3" class="w-full"/>

                        <div class="flex align-items-center pt-2">
                            <RadioButton input-id="rb1" v-model="form.selectAllRecipient" variant="filled" binary/>
                            <label for="rb1" class="ml-2 text-sm">Все клиенты</label>
                        </div>
                    </div>

                    <div class="pb-5">
                        <div class="pb-5">
                            <span>Запустить рассылку</span>
                        </div>
                        <div class="flex grid gap-3 grid-cols-1">
                            <div class="flex align-items-center">
                                <RadioButton v-model="form.selectedPeriod" inputId="ingredient1" value="now"/>
                                <label for="ingredient1" class="ml-2 text-sm">Отправить сейчас</label>
                            </div>
                            <!--                            <div class="flex align-items-center">-->
                            <!--                                <RadioButton v-model="form.selectedPeriod" inputId="ingredient2" value="auto" />-->
                            <!--                                <label for="ingredient2" class="ml-2 text-sm mr-1">Автоматически</label>-->
                            <!--                                <div class="pl-10">-->
                            <!--                                    <Dropdown v-model="selectedCity"-->
                            <!--                                              :options="cities"-->
                            <!--                                              class="w-32 h-5 rounded-md" />-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="flex align-items-center">
                                <RadioButton v-model="form.selectedPeriod" inputId="ingredient3" value="regularly"/>
                                <label for="ingredient3" class="ml-2 text-sm">Регулярно</label>
                                <div class="pl-20">
                                    <div class="card flex flex-wrap gap-3 p-fluid">
                                        <div class="flex-auto">
                                            <Dropdown v-model="form.regularity.frequency"
                                                      :options="options"
                                                      optionLabel="value"
                                                      class="w-45 h-7 rounded-md text-xs"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-2 flex align-items-center">
                                    <span class="ml-2 text-md">в</span>
                                </div>
                                <div class="pl-5">
                                    <div class="card flex flex-wrap gap-3 p-fluid">
                                        <div class="flex-auto">
                                            <Calendar class="w-20 h-7 rounded-md" id="calendar-timeonly"
                                                      v-model="form.regularity.selectedTime"
                                                      timeOnly/>
                                        </div>
                                    </div>
                                </div>
                                <div class="pl-5">
                                    <Tag class="" severity="secondary" value="за 7 дней до дня рождения"></Tag>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-content-end gap-2 pt-3">
                        <Button type="submit" label="Save" severity="info">Сохранить</Button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
