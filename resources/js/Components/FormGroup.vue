<template>
    <div>
        <label class="block text-sm font-medium text-gray-700">{{ label }}</label>
        <div class="mt-1">
            <slot />
        </div>
        <div class="mt-1 text-red-500" v-if="error">
            {{ error }}
        </div>
    </div>
</template>

<script>
export default {
    props: {
        label: String,
        error: [String, null],
    },
}
</script>
