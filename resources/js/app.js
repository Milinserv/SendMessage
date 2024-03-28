import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import Layout from './layouts/Layout.vue'
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/aura-light-blue/theme.css'

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./pages/**/*.vue', { eager: true })
        let page = pages[`./pages/${name}.vue`];
        page.default.layout = page.default.layout || Layout
        return page
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(PrimeVue)
            .mount(el)
    },
})
