<template>
    
    <div class="card mb-3">

        <div class="card-header">
            <p>
                Publicado en {{ nota.created_at }}
                <strong v-if="!(nota.created_at == nota.updated_at)">
                    Actualizado en {{ nota.updated_at }}
                </strong> 
            </p> 
        </div>

        <div class="card-body">

            <p v-if="!editMode">
               {{nota.descrip}}
            </p>

            <textarea 
                v-else
                name="nota" 
                class="form-control" 
                placeholder="texto..."
                v-model="nota.descrip">
            </textarea>
            
        </div>

        <div class="card-footer">

            <button 
                v-if="!editMode"
                class="btn btn-primary"
                v-on:click="onClickUpdate(true)">
                Editar
            </button>

            <button 
                v-else
                class="btn btn-success"
                v-on:click="onClickUpdate(false)">
                Guardar Nota
            </button>

            <button 
                class="btn btn-danger"
                v-on:click="onClickDelete()">
                Eliminar
            </button>

        </div>

    </div>
    
</template>

<script>

    export default {

        props: ['nota'],
        data(){
            return {
                editMode: false
            }
        },
        
        mounted() {
            //console.log('Component Nota.')
        },

        methods: {
            onClickDelete() {
                axios.delete(`/notas/${this.nota.id}`).then(() => {
                    this.$emit('delete');
                });
                
            },

            onClickUpdate(value) {
                this.editMode = value;

                if(this.editMode == false){
                    const params = {
                        descrip: this.nota.descrip
                    };

                    axios.put(`/notas/${this.nota.id}`, params)
                        .then( (response) => {
                            
                            const nota = response.data;
                            this.$emit('update', nota);
                    });
                }
            }
        }
    }

</script>
