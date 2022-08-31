<template>
    <div class="w-50 my-5 mx-auto">
        <b-form @submit.prevent="submit">
            <b-form-group>
                <b-form-input v-model="form.name" type="text" placeholder="Name"></b-form-input>
            </b-form-group>
            <b-form-group>
                <b-form-input v-model="form.email" type="email" placeholder="Email"></b-form-input>
            </b-form-group>

            <b-form-group>
                <b-form-input v-model="form.password" type="password" placeholder="Password"></b-form-input>
            </b-form-group>
            <b-form-group>
                <b-form-input v-model="form.password_confirm" type="password" placeholder="Password Confirmation">
                </b-form-input>
            </b-form-group>
            <div class="mt-3 text-right">
                <b-button type="submit">Register</b-button>
            </div>

        </b-form>
    </div>
</template>
<script>
import Axios from 'axios';

export default {
    data: () => ({
        form: {
            name: null,
            email: null,
            password: null,
            password_confirm: null,
        }
    }),
    created() {
    },
    methods: {

        submit() {
            if (this.form.password != this.form.password_confirm) {
                alert("Passwords not match.");
                return;
            }
            Axios.post('register', this.form).then(res => {
                this.$router.push('/login')
            }).catch(err => {
                console.log(err.response);
            })
        }
    }
}
</script>