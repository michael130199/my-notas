<template>
    
    <div class="card mb-3">

        <div class="card-header">Publicado en {{ nota.created_at }}</div>

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
        
        nota() {
            console.log('Component Nota.')
        },

        methods: {
            onClickDelete() {
                this.$emit('delete');
            },
            onClickUpdate(value) {
                this.editMode = value;

                if(this.editMode == false){
                    this.$emit('update', nota);
                }
            }
        }
    }

</script>
