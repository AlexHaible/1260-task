<template>
    <DefaultLayout>

        <div class="text-center">
            <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Bestil din is</h2>
            <p class="mt-4 text-lg leading-6 text-gray-500">Undgå kø - bestil din is hurtigt og nemt, lige her!</p>
        </div>

        <div class="mt-12">

            <form method="POST" @submit.prevent="submit">

                <FormGroup label="Navn" :error="form.errors.name">
                    <Input name="name" type="text" v-model="form.name" />
                </FormGroup>

                <div class="mt-8">
                    <Button type="submit">
                        Bestil nu
                    </Button>
                </div>

            </form>
        </div>

    </DefaultLayout>
</template>

<script>
import DefaultLayout from "../Layouts/DefaultLayout";
import Button from "../Components/Button";
import FormGroup from "../Components/FormGroup";
import Input from "../Components/Input";

export default {
    components: {
        Input,
        FormGroup,
        Button,
        DefaultLayout
    },
    data() {
        return {
            form: this.$inertia.form({
                name: null,
            }),
        };
    },
    methods: {
        submit() {
            this.form.post('/order');
        },
    }
}
</script>
