<template>
    <div class="input-group"
        :value="modelValue"
        @change="$emit('update:modelValue', $event.target.value)">
        <Radio v-for="option in options" :option="option" :key="option" />
    </div>
    <div class="mt-1 text-red-500" v-if="error">
        {{ error }}
    </div>
</template>

<script>
import Radio from "./Radio.vue";

export default {
    name: "RadioGroup",
    components: {
        Radio,
    },
    props: {
        options: {
            required: true,
            type: Array,
        },
        modelValue: null,
        error: [String, null],
    },
};
</script>

<style scoped>
.input-group {
    width: 35%;
    margin: 20px auto;
    padding: 15px 20px;
    border: 1px solid black;
    border-radius: 8px;

    display: flex;
    justify-content: space-between;
}

label {
    cursor: pointer;
}
</style>
