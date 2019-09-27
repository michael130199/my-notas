<template>
    
    <div class="card mb-3">

        <div class="card-header">Mi Nota</div>

        <div class="card-body">

            <form v-on:submit.prevent="newNota()">

                <div class="form-group">

                    <label for="my-notas">Nota Numero #</label>

                    <textarea 
                        name="nota" 
                        class="form-control" 
                        placeholder="texto..."
                        v-model="descrip">
                    </textarea>

                </div>

                <button class="btn btn-success">
                    Guardar Nota
                </button>

            </form>

        </div>

    </div>

</template>

<script>

    export default {

        data(){
            return {
                descrip: '',

            }
        },
        formNota() {
            console.log('Component Form Nota.')
        },
        methods:{
            newNota(){
                const params  = {
                    descrip: this.descrip
                };

                this.descrip;

                axios.post('notas', params)
                    .then((response) => {
                        const nota = response.data;
                        this.$emit('new', nota);
                    });

            }
        }
    }

</script>