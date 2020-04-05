<template>
    <section>
        <div class="container">
            <div class="row text-center justify-content-center ">
                <div class="col-sm-12  m-1">
                    <div class="form-group">
                        <label for="enunciado"> Agregar Enunciado</label>
                        <input id="enunciado" type="text" class="form-control" placeholder="Escriba un enunciado aqui" v-model="title_question">
                    </div>
                    <div class="form-group">
                        <button class="btn  btn-success" @click.prevent="addEnunciado">Agregar</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-sm text-center">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Enunciado</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody v-if="data_enunciado">
                        <tr v-for="(pregunta, p) in data_enunciado">
                            <th scope="row">{{p+1}}</th>
                            <td>{{pregunta.title_question}}</td>
                            <td><button class="btn-small btn-info dark text-white" @click.prevent="showModalOpciones(pregunta.id)">Agregar Opciones</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" ref="exampleModal" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{data_opcion.title_question}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Opciones</p>
                        <ul class="list-group" v-for="opciones in data_opcion.preguntas_asociadas">
                            <li class="list-group-item">{{opciones.option}}</li>
                        </ul>
                        <div class="form-group">
                            <label for="enunciado">Agregar opcion</label>
                            <input id="enunciado" type="text" class="form-control" placeholder="Escriba la opcion aqui" v-model="opcion_pregunta">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" @click.prevent="agregarOpciones(data_opcion.id)">Guardar opcion</button>
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
            data_enunciado: [],
            title_question: '',
            data_opcion: [],
            opcion_pregunta: '',
        }
    },
    mounted() {
        this.getEnunciado();
    },
    methods: {
        async getEnunciado() {
            const URL = `preguntas-opciones`
            try {
                let { data } = await axios(URL)
                this.data_enunciado = data


            } catch (e) {
                console.log(e);
            }
        },
        async addEnunciado() {
            const URL = `preguntas/crear`
            var title_question;
            title_question = this.title_question
            try {
                let { data } = await axios.post(URL, { title_question })
                this.getEnunciado()
                this.limpiar()

            } catch (e) {
                console.log(e);
            }
        },
        limpiar() {
            this.title_question = ''
            this.opcion_pregunta = ''
        },
        async showModalOpciones(id) {
            const URL = `${id}/preguntas-opciones-espesifica`
            try {
                let { data } = await axios(URL)
                this.data_opcion = data
                $('#exampleModal').modal('show')
            } catch (e) {
                console.log(e);
            }
        },
        async agregarOpciones(id_pregunta) {
            const URL = `${id_pregunta}/guardar-opcion`
            var opcion_pregunta;
            opcion_pregunta = this.opcion_pregunta
            try {
                let { data } = await axios.post(URL, { opcion_pregunta })
                this.limpiar();
                $('#exampleModal').modal('hide')
            } catch (e) {
                console.log(e);
            }
        }
    }
}

</script>
