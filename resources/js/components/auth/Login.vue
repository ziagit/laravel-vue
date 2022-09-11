<template>
    <div class="w-50">
        <b-form @submit.prevent="submit()">

            <b-form-group>
                <b-form-input v-model="form.email" type="email" placeholder="Email"></b-form-input>
            </b-form-group>
            <b-form-group>
                <b-form-input v-model="form.password" type="password" placeholder="Password"></b-form-input>
            </b-form-group>

            <div class="text-right">
                <b-button type="submit">Login</b-button>
            </div>
        </b-form>
    </div>
</template>
<script>
import Axios from 'axios';
import { mapActions } from 'vuex';
export default {
    data: () => ({
        form: {
            email: null,
            password: null,
        }
    }),
    methods: {
        ...mapActions({
            signIn: "auth/singIn"
        }),
        submit() {
            this.signIn(this.form).then(() => {
                this.$router.push('/dashboard');
            }).catch(err => console.log(err))
        }
    }
}
</script>