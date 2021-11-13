<template>
    <div class="flex flex-col rounded-lg shadow-lg overflow-hidden">
        <div class="flex-shrink-0">
            <a :href="post.url" target="_blank">
                <img class="h-48 w-full object-cover" :src="post.urlToImage" alt="" />
            </a>
        </div>
        <div class="flex-1 bg-white p-6 flex flex-col justify-between">
            <div class="flex-1">
                <p class="text-sm font-medium text-indigo-600">
                    <a :href="post.url" target="_blank" class="hover:underline">
                        {{ post.name }}
                    </a>
                </p>
                <a :href="post.url" target="_blank" class="block mt-2">
                    <p class="text-xl font-semibold text-gray-900">
                        {{ post.title }}
                    </p>
                    <p class="mt-3 text-base text-gray-500">
                        {{ post.description }}
                    </p>
                </a>
            </div>
            <div class="mt-6 flex items-center">
                <div class="flex-shrink-0">
                    <span class="sr-only">{{ post.author }}</span>
                    <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="" />
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-gray-900">
                        {{ post.author }}
                    </p>
                    <div class="flex space-x-1 text-sm text-gray-500">
                        <time :datetime="post.publishedAt">
                            {{ post.publishedAt }}
                        </time>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    setup(context, props) {
        const post = props.attrs.post;

        return {
            post,
        }
    },
}
</script>
