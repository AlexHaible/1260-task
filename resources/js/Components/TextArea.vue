<template>
    <textarea
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        class="block w-full px-4 py-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" />
</template>

<script>
export default {
    props: {
        modelValue: {
            type: String,
            default: '',
        },
    }
}
</script>
