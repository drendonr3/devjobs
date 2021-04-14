<template>
    <buton class="text-red-600 hover:text-red-900  mr-5"
        @click='eliminarVacante'
        >
        Eliminar
        </buton>
    
</template>

<script>
export default {
    props: ['vacanteId'],
    methods: {
        eliminarVacante(){
            this.$swal.fire({
                title: '¿Deseas elimianr esta vacante?',
                text: "¡Una Vez eliminada no se puede recuperar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si',
                cancelButtonText:'No'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Enviar Peticion a Axios
                        const params = {
                            id : this.vacanteId,
                            _method: 'delete'
                        }
                        axios.post(`/vacantes/${this.vacanteId}`,params)
                            .then(respuesta=>{
                                //console.log(respuesta.data.mensaje);
                                this.$swal.fire(
                                    '¡Vacante Eliminada!',
                                    respuesta.data.mesaje,
                                    'success'
                                );
                                // Eliminar del DOM
                                this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                            })
                            .catch(error=>{
                                console.log(error);
                            });
                    }
                });
        }
    }
}
</script>