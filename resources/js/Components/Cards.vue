<template>
    <div>
        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">Available sources</h2>
        <ul role="list" class="mt-3 grid grid-cols-1 gap-5 sm:gap-6 sm:grid-cols-2 lg:grid-cols-4">
            <li v-for="source in sources" :key="source.name" class="col-span-1 flex shadow-sm rounded-md">
                <div class="flex-shrink-0 flex items-center justify-center bg-gray-200 w-16 text-black text-sm font-semibold rounded-l-md">
                    {{ getInitials(source.name) }}
                </div>
                <div class="flex-1 flex items-center justify-between bg-gray-100 border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                    <div class="flex-1 px-4 py-2 text-sm truncate">
                        <a :href="source.href" class="text-gray-900 font-medium hover:text-gray-600">{{ source.name }}</a>
                    </div>
                    <div class="flex-shrink-0 pr-2">
                        <button type="button" class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="sr-only">Open options</span>
                            <BookmarkIcon class="w-5 h-5" aria-hidden="true" />
                        </button>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</template>

<script>
import { BookmarkIcon } from '@heroicons/vue/solid';

export default {
    components: {
        BookmarkIcon,
    },

    setup(context, props) {
        const sources = props.attrs.sources;

        function getInitials(name) {
            return name[0] + name[1];
        }

        return {
            sources,
            getInitials,
        }
    },
}
</script>
