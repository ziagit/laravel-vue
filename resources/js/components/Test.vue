<template>
    <div>
        <h1>HI</h1>
        <b-button @click="test()">Test</b-button>
    </div>
</template>
<script>
import Axios from 'axios';

export default {
    methods: {
        test() {
            Axios.post("api/test", { x: 'hi' }).then(res => {
                console.log("res: ", res.data)
            })
        }
    }
}
</script>