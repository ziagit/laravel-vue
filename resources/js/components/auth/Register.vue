<template>
    <div class="w-50">
        <b-form @submit.prevent="submit()">
            <b-form-group>
                <b-form-input v-model="form.name" placeholder="Name"></b-form-input>
            </b-form-group>
            <b-form-group>
                <b-form-input v-model="form.email" type="email" placeholder="Email"></b-form-input>
            </b-form-group>
            <b-form-group>
                <b-form-input v-model="form.password" type="password" placeholder="Password"></b-form-input>
            </b-form-group>
            <b-form-group>
                <b-form-input v-model="form.comfirm_password" type="password" placeholder="Confirm password">
                </b-form-input>
            </b-form-group>
            <div class="text-right">
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
            comfirm_password: null,
        }
    }),
    methods: {
        submit() {
            if (this.form.password != this.form.comfirm_password) {
                alert("Passwords not match.")
                return;
            }
            Axios.post("register", this.form).then(res => {
                console.log("registered: ", res.data)
                this.$router.push("/login")
            }).catch(err => console.log(err.response))
        }
    }
}
</script>