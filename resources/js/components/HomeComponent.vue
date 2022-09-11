<template>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="d-flex p-3">
            <b-button-group>
                <b-button @click="register()">Register</b-button>
                <b-button @click="login()">LogIn</b-button>
                <b-button @click="logout()">LogOut</b-button>
            </b-button-group>
        </div>
        <router-view></router-view>
    </div>
</template>
<script>
import { mapActions } from 'vuex';
export default {
    methods: {
        ...mapActions({
            signOut: 'auth/signOut'
        }),
        register() {
            this.$router.push('/register')
        },
        login() {
            this.$router.push('/login')
        },
        logout() {
            this.signOut();
            this.$router.push("/login")
        }
    }
}
</script>