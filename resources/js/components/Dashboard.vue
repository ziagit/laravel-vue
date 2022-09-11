<template>
    <div>
        <h1>Dashboard</h1>
        <div v-if="authenticated">
            <p>Name: {{ user.name }}</p>
            <p>Email: {{ user.email }}</p>
        </div>
        <div v-else>You are not loged in</div>
        <MessageComponent />
    </div>
</template>
<script>
    import MessageComponent from './MessageComponent.vue';
import { mapGetters } from 'vuex';
export default {
    components:{
        MessageComponent
    },
    computed: {
        ...mapGetters({
            authenticated: 'auth/authenticated',
            user: 'auth/user'
        })
    }
}
</script>