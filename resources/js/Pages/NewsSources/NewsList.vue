<template>
    <Head title="News list" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                News list
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <div class="relative bg-gray-50">
                            <div class="absolute inset-0">
                                <div class="bg-white h-1/3 sm:h-2/3" />
                            </div>
                            <div class="relative max-w-7xl mx-auto">
                                <div class="max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                                    <template v-for="(post,index) in headlines" :key="`post_${index}`">
                                        <news-item :post="post" />
                                    </template>
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
import {Head, usePage} from '@inertiajs/inertia-vue3';
import NewsItem from "@/Components/NewsItem";
import {computed} from "vue";

export default {
    components: {
        NewsItem,
        BreezeAuthenticatedLayout,
        Head,
    },

    setup() {
        const headlines = computed(() => usePage().props.value.headlines)

        return {
            headlines,
        }
    }
}
</script>
