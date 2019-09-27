<template>
    


    <div class="row justify-content-center">

        <div class="col-md-8">

            <form-nota-component 
                @new="addNota">
                
            </form-nota-component>

            <notas-component 
                v-for="(nota, index) in notas" 
                :key="nota.id"
                :nota="nota"
                @update="updateNota(index)"
                @delete="deleteNota(index)">

            </notas-component>

        </div>

    </div>



</template>

<script>
    export default {
        data(){
            return {
                notas: []
            }
        },

        mounted() {
            console.log('Component Home');

            axios.get('/notas').then( (response) => {
                this.notas = response.data;
            });
        },

        methods: {
            addNota(nota){
                this.notas.push(nota);
                this.notas.sort(function(a,b){
                    return new Date(b.updated_at) - new Date(a.updated_at);
                });
            },

            deleteNota(index) {
                this.notas.splice(index, 1);
            },

            updateNota(index, nota) {
                this.notas[index] = nota;
            }
        }
    }
</script>