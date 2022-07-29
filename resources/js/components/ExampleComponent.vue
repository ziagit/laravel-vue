<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Send email</div>

                    <div class="card-body">
                        <b-form @submit.prevent="submit">
                            <b-form-group>
                                <b-form-input v-model="form.name" placeholder="Name"></b-form-input>

                            </b-form-group>
                            <b-form-group>
                                <b-form-input v-model="form.email" placeholder="Email"></b-form-input>

                            </b-form-group>
                            <b-form-group>
                                <b-form-textarea v-model="form.message" placeholder="Message"></b-form-textarea>

                            </b-form-group>
                            <b-form-group>
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
import axios from "axios";
export default {
    data: () => ({
        form: {
            name: null,
            email: null,
            message: null
        }
    }),

    methods: {
        submit() {
            axios.post("http://localhost:8000/api/send", this.form).then(res => {
                console.log("res:‌", res.data)
            }).catch(err => console.log(err.response))
        }
    },
    mounted() {
        console.log('Component mounted.')
    }
}
</script>
