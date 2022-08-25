<template>
    <div class="container">
        <b-form @submit.prevent="submit">
            <b-form-group>
                <b-form-input v-model="form.email" type="email" placeholder="Email"></b-form-input>
            </b-form-group>

            <b-form-group>
                <b-form-input v-model="form.password" type="password" placeholder="Password"></b-form-input>
            </b-form-group>

            <div class="mt-3">
                <b-button type="submit">Submit</b-button>
            </div>

        </b-form>
    </div>
</template>
<script>
import Axios from 'axios';


export default {
    data: () => ({
        form: {
            email: null,
            password: null,
        }
    }),
    created() {
    },
    methods: {
        submit() {
            Axios.post('api/login', this.form).then(res => {
                console.log("res ", res.data)
            }).catch(err => {
                console.log(err.response);
            })
        }
    }
}
</script>