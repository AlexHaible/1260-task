<template>
    <label :for="option">
        <input
            type="radio"
            :value="option"
            :id="option"
            @change="$emit('update:option', $event.target.value)"
            name="radio-input" />
        {{ option }}
    </label>
</template>

<script>
export default {
    props: {
        option: {
            type: String,
            required: true,
        },
    }
};
</script>

<style scoped>
label {
    cursor: pointer;
}
</style>
