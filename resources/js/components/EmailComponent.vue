<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Send email</div>
                    <div class="card-body">
                        <b-form @submit.prevent="submit">
                            <b-form-group>
                                <b-form-input v-model="form.email" placeholder="Email"></b-form-input>
                            </b-form-group>
                            <b-form-group>
                                <b-form-textarea v-model="form.message" placeholder="Message...">
                                </b-form-textarea>
                            </b-form-group>
                            <b-form-group class="text-right">
                                <Timer v-if="isSubmitting"/>
                                <b-button type="submit">Send</b-button>
                            </b-form-group>
                        </b-form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import Timer from "./Timer.vue";
import axios from "axios";
export default {
    components:{Timer},
    data: () => ({
        isSubmitting:false,
        form: {
            email: null,
            message: null
        }
    }),
    methods: {
        submit() {
            this.isSubmitting=true

            axios.post("send", this.form).then(res => {
                console.log("sent:‌", res.data)
                this.isSubmitting=false;
            }).catch(err => console.log(err.response))
        }
    },
 
}
</script>
<style>
    .container{
        height: 100vh;
    }
    .col-md-12{
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
</style>
