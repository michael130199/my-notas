<template>
    


    <div class="row justify-content-center">

        <div class="col-md-8">

            <form-nota-component 
                @new="addNota">
                
            </form-nota-component>

            <notas-component 
                v-for="(nota, index) in notas" 
                :key="notas.id"
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
                notas: [{
                    'id':0,
                    'descrip':'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium ea voluptatem quae tenetur corporis ipsa cupiditate a facere repellat dignissimos. Magni, consectetur voluptates accusamus expedita nesciunt ut animi dolorem rem.',
                    'created_at': '17/07/2018'
                }]
            }
        },

        formNota() {
            console.log('Component Home');
        },
        methods: {
            addNota(nota){
                this.notas.push(nota);
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