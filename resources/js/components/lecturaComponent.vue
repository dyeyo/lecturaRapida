<template>
    <section>
        <div class="container">
            <div class="row m-1">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Launch demo modal
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="titulo_completo">Titulo Completo</label>
                                                <input type="text" class="form-control" v-model="model.title" >
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="lectura_completa">Lectura Completa</label>
                                                <textarea class="form-control" id="lectura_completa" rows="3" v-model="model.lectura" ></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="titulo_completo">Tiempo Limite (en segundos)</label>
                                                <input type="text" class="form-control" v-model="model.tiempo">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="titulo_completo">Rango de aplicacion</label>
                                                <select class="form-control" v-model="model.rango">
                                                    <option>...</option>
                                                    <option value="1">niños de 8 a 15 años</option>
                                                    <option value="2">Jovenes de 16 a 25 años</option>
                                                    <option value="3">Adultos de 26 años en adelante</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12" v-for="(preguntas, p) in preguntas_data">
                                            <div class="form-group  m-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" @change="AgregarPreguntasAformulario(preguntas)">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                        {{preguntas.title_question}}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal" @click.prevent="crearLectura" >Crear</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row m-1">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo de la lectura</th>
                            <th scope="col">Tiempo Limite</th>
                            <th scope="col">Rango Edad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in readings" :key="index">
                            <th scope="row">{{index+1}}</th>
                            <td>{{item.title}}</td>
                            <td>{{item.tiempo_lectura}}seg</td>
                            <td>{{item.rango == '1' ? 'Niños' : item.rango == '2' ? 'Jovenes' : 'Adulto'}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</template>
<script>
export default {
    data() {
        return {
            readings: [],
            preguntas_data: [],
            total_de_preguntas: [],
            model: {
                title: '', 
                lectura: '', 
                tiempo: '', 
                rango: '',
                preguntas: [], 
            }
        }
    },
    created(){
        this.getLectura();
    },
    mounted() {
        this.getPreguntas();
    },
    methods: {
        async getLectura(){
            const URL = `get_readings`
            try {
                let { data } = await axios(URL)
                console.log(data);
                
                this.readings = data
            } catch (e) {
                console.log(e);
            }
        },
        async getPreguntas() {
            const URL = `preguntas-opciones`
            try {
                let { data } = await axios(URL)
                this.preguntas_data = data
            } catch (e) {
                console.log(e);
            }
        },
        AgregarPreguntasAformulario(item) {
            this.model.preguntas.push(item)
        },
        async crearLectura(){
            const URL = 'guardar-test'
            try {
                let {data} = await axios.post(URL, this.model)
                console.log(data);
                this.readings.push(data)
            } catch(e) {
                console.log(e);
            } 
        }
    }
}

</script>
