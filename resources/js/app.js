require('./bootstrap');

import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { Link } from '@inertiajs/inertia-vue3';

const el = document.getElementById('app');

const app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => import(`@/Pages/${name}`).then(module => module.default),
        }),
    })
    .mixin({ methods: { route } })
    .component('InertiaLink', Link)
    .use(InertiaPlugin);

app.mount(el);

InertiaProgress.init({ color: '#4B5563' });
