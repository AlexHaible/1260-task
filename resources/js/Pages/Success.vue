<template>
    <DefaultLayout>

        <div class="text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Ordre #{{ orderId }}</h2>
            <p class="mt-4 text-lg leading-6 text-gray-500">Tak for din bestilling!</p>
        </div>

    </DefaultLayout>
</template>

<script>
import DefaultLayout from "../Layouts/DefaultLayout";

export default {
    components: {
        DefaultLayout
    },
    props: {
        orderId: Number,
    },
}
</script>
