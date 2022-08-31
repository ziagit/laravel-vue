<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Send email</div>

                    <div class="card-body">
                        <b-form @submit.prevent="submit">
                            <b-form-group>
                                <b-form-input v-model="form.email" placeholder="Email"></b-form-input>

                            </b-form-group>
                            <b-form-group>
                                <b-form-input v-model="form.password" placeholder="Password" type="password">
                                </b-form-input>

                            </b-form-group>
                            <b-form-group>
                                <b-button type="submit">Login</b-button>
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
            email: null,
            password: null
        }
    }),
    created() {
        this.get();
    },
    methods: {
        get() {
            axios.get("http://localhost:8000/api/users", this.form).then(res => {
                console.log("res:‌", res.data)
            }).catch(err => console.log(err.response))
        },
        submit() {
            axios.post("api/test", this.form).then(res => {
                console.log("token:‌", res.data)
            }).catch(err => console.log(err.response))
        }
    },
    mounted() {
        //console.log('Component mounted.')
    }
}
</script>
