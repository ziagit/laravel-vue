<template>
    <div>
        <b-button @click="send()">Message</b-button>
    </div>
</template>
<script>
import Axios from 'axios';
import { mapGetters } from 'vuex';
window.Laravel = {
            csrfToken: "{{ csrf_token() }}"
        };
export default{
    data:()=>({
        form:{
            message:"hi from vue.",
            id:2
        }
    }),
    created(){
        this.connect()
    },
    computed:{
        ...mapGetters({
            authenticated:"auth/authenticated",
            user: "auth/user",
        })
    },
    methods:{
        connect(){
            Echo.private("chat." + 2).listen(".chat-event", (e) => {
                console.log("message event: ", e);
            });
        },
        send(){
            Axios.post("message",this.form).then(res=>{
                console.log("message sent: ", res.data)
            })
        }
    }
}
</script>