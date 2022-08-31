<template>
    <div class="w-50 my-5 mx-auto">
        <b-form @submit.prevent="submit">
            <b-form-group>
                <b-form-input v-model="form.email" type="email" placeholder="Email"></b-form-input>
            </b-form-group>

            <b-form-group>
                <b-form-input v-model="form.password" type="password" placeholder="Password"></b-form-input>
            </b-form-group>

            <div class="mt-3 text-right">
                <b-spinner v-if="isSubmitting"></b-spinner>
                <b-button v-else type="submit">Login</b-button>
            </div>

        </b-form>
    </div>
</template>
<script>
import Axios from 'axios';
import { mapActions } from 'vuex';
export default {
    data: () => ({
        isSubmitting: false,
        form: {
            email: null,
            password: null,
        }
    }),
    created() {
    },
    methods: {
        ...mapActions({
            signIn: 'auth/signIn'
        }),
        submit() {
            this.isSubmitting = true;
            this.signIn(this.form).then(res => {
                this.isSubmitting = false;
                this.$router.push("/dashboard")
            })
        }
    }
}
</script>