<template>
    <h1>test boy {{id_test}} </h1>
</template>
<script>
    export default{
        props:{
            id_test: {
                type: Number,
            },
        },
        mounted(){
            this.getTest(this.id_test)
        },
        methods:{
            async getTest(id){
                const URL = `obtener-test-espesifico/${id}`
                try {
                    let {data} = await axios(URL)
                    console.log(data)
                } catch(e) {
                    console.log(e);
                } 

            }
        }
    }
</script>