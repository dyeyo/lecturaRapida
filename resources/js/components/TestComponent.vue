<template>
    <section>
        <div class="container">
            <div class="row">
                <div v-for="(test , t) in data_test">
                    <div class="col-md-4 m-1" v-if="test.rango === 1">
                        <div class="card" style="width: 18rem;">
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title">Prueba para niños de 8 a 15 años</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                <a class="btn btn-primary" @click="irRuta(test.id)" >Mirar Prueba</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 m-1" v-if="test.rango === 2">
                        <div class="card" style="width: 18rem;">
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title">Prueba para Jovenes de 16 a 25 años</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                <a class="btn btn-primary">Mirar Prueba</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 m-1" v-if="test.rango === 3">
                        <div class="card" style="width: 18rem;">
                            <!-- <img src="..." class="card-img-top" alt="..."> -->
                            <div class="card-body">
                                <h5 class="card-title">Prueba para Adultos 26 años en adelante</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the cards content.</p>
                                <a class="btn btn-primary">Mirar Prueba</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    data() {
        return {
            data_test: [],
        }
    },
    mounted() {
        this.getDataTest();
    },
    methods: {
        async getDataTest() {
            const URL = `mostrar-test`
            try {
                let { data } = await axios(URL)
                this.data_test = data
            } catch (e) {
                console.log(e);
            }
        },
    }
}

</script>
