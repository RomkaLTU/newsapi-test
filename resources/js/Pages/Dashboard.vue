<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Your favorite sources</h2>
                        <cards v-if="sources.length" :sources="sources" />
                        <div v-else class="rounded-md bg-blue-50 p-4 mt-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <InformationCircleIcon class="h-5 w-5 text-blue-400" aria-hidden="true" />
                                </div>
                                <div class="ml-3 flex-1 md:flex md:justify-between">
                                    <p class="text-sm text-blue-700">
                                        You don't have any favorite sources
                                    </p>
                                    <p class="mt-3 text-sm md:mt-0 md:ml-6">
                                        <inertia-link :href="route('sources')" class="whitespace-nowrap font-medium text-blue-700 hover:text-blue-600">Add some now <span aria-hidden="true">&rarr;</span></inertia-link>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import { Head } from '@inertiajs/inertia-vue3';
import Cards from "@/Components/NewsSourceCards";
import { InformationCircleIcon } from '@heroicons/vue/solid';

export default {
    props: {
        sources: {
            type: Object,
            default: [],
        },
    },

    components: {
        BreezeAuthenticatedLayout,
        InformationCircleIcon,
        Head,
        Cards,
    },
}
</script>
