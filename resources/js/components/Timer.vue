<template>
    <div>
        <label id="minutes">Seconds: {{totalSeconds}}</label>
    </div>
</template>
<script>
export default{
    data: () => ({
        totalSeconds : 0,
    }),
    created(){
        setInterval(this.setTime, 1000);
    },
    methods: {
      setTime() {
            ++this.totalSeconds;
        },
        pad(val) {
            var valString = val + "";
            if (valString.length < 2) {
                return "0" + valString;
            } else {
                return valString;
            }
        },
    }
}
</script>