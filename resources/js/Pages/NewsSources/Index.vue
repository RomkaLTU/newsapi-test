<template>
    <Head title="News sources" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                News sources
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <cards :sources="sources" />

                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head, usePage} from '@inertiajs/inertia-vue3';
import Cards from "@/Components/Cards";
import { computed } from "vue";

export default {
    props: {
        sources: Object,
    },

    components: {
        Cards,
        BreezeAuthenticatedLayout,
        Head,
    },

    setup() {
        const sources = computed(() => usePage().props.value.sources)

        return {
            sources,
        }
    }
}
</script>
