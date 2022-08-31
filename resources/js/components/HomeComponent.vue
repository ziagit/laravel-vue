<template>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100">
        <div class="d-flex p-3">
            <b-button-group>
                <b-button @click="$router.push('/register')">Register</b-button>
                <b-button @click="$router.push('/login')">LogIn</b-button>
                <b-button @click="logOut()">logOut</b-button>

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
            signOut: 'auth/signOut',
        }),
        logOut() {
            this.signOut();
            this.$router.push('/login');
        }
    }
}
</script>