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

                <FormGroup label="E-mail" :error="form.errors.email">
                    <Input name="email" type="email" v-model="form.email" />
                </FormGroup>

                <FormGroup label="Vaffel eller bæger">
                    <RadioGroup :options="options" v-model="form.container" :error="form.errors.container" />
                </FormGroup>

                <FormGroup label="Antal kugler" :error="form.errors.amount">
                    <Select name="amount" v-model="form.amount">
                        <option value="notSelected" disabled selected>Vælg antal</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                    </Select>
                </FormGroup>

                <FormGroup label="Ønskede varianter" :error="form.errors.details">
                    <TextArea name="details" v-model="form.details" />
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
import RadioGroup from "../Components/RadioGroup";
import Select from "../Components/Select";
import TextArea from "../Components/TextArea";
import FormGroup from "../Components/FormGroup";
import Input from "../Components/Input";

export default {
    components: {
        Input,
        FormGroup,
        Button,
        Select,
        TextArea,
        RadioGroup,
        DefaultLayout
    },
    data () {
        return {
            form: this.$inertia.form({
                name: null,
                email: null,
                container: null,
                amount: null,
                details: null,
            }),
            options: ['Vaffel', 'Bæger']
        };
    },
    methods: {
        submit () {
            this.form.post('/order');
        },
    }
}
</script>
