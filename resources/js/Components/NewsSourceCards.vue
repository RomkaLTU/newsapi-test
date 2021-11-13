<template>
    <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <li v-for="source in sources" :key="source.name" class="col-span-1 shadow-sm rounded-md">
            <inertia-link :href="route('sources.newslist', source.id)" class="flex">
                <div class="flex-shrink-0 flex items-center justify-center bg-gray-200 w-16 text-black text-sm font-semibold rounded-l-md">
                    {{ getInitials(source.name) }}
                </div>
                <div class="flex-1 flex items-center justify-between bg-gray-100 border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <div class="text-gray-900 font-medium hover:text-gray-600">{{ source.name }}</div>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <button
                            @click.prevent="bookmarkSource(source.id)"
                            type="button"
                            :class="{'text-red-500': favorites && favorites.includes(source.id)}"
                            class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <BookmarkIcon class="w-5 h-5" aria-hidden="true" />
                        </button>
                    </div>
                </div>
            </inertia-link>
        </li>
    </ul>
</template>

<script>
import { BookmarkIcon } from '@heroicons/vue/solid';
import { Inertia } from '@inertiajs/inertia';
import {computed} from "vue";
import {usePage} from "@inertiajs/inertia-vue3";

export default {
    components: {
        BookmarkIcon,
    },

    setup(context, props) {
        const sources = props.attrs.sources;
        const favorites = computed(() => usePage().props.value.auth.user.favorites);

        function getInitials(name) {
            return name[0] + name[1];
        }

        function bookmarkSource(id) {
            Inertia.put(route('users.favorites'), {
                id
            });
        }

        return {
            sources,
            getInitials,
            bookmarkSource,
            favorites,
        }
    },
}
</script>
