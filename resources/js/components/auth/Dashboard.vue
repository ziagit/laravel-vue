<template>
    <b-card title="Dashboard">
        <div>
            <p>Name: {{  user.name  }}</p>
            <p>Name: {{  user.email  }}</p>

        </div>
    </b-card>
</template>
<script>
import { mapGetters } from 'vuex';
export default {
    computed: {
        ...mapGetters({
            authenticated: 'auth/authenticated',
            user: 'auth/user'
        })
    }
}
</script>