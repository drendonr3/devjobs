<template>
    <div class="">
    <ul class="flex flex-wrap justify-center">
            <li
                class="border border-gray-500 px-10 py-3 mb-3 rounded mr-4"
                :class = "verificarClaseActiva(skill)"
                v-for="(skill,i) in this.skills"
                v-bind:key="i"
                v-on:click = "activar"
            >{{skill}}</li>
    </ul>
    <input 
        type="hidden"
        name="skills"
        id="skills"
        >
    </div>
</template>

<script>
    export default {
        props: ['skills','oldskills'],
        mounted: function() {
            document.querySelector('#skills').value = this.oldskills;
            
        },
        created: function() {
            if (this.oldskills) {
                const skillsArray = this.oldskills.split(',');
                skillsArray.forEach(skill => this.habilidades.add(skill));
            }
        },
        data: function()  {
            return {
                habilidades:new Set(),
                classActive:'bg-red-800'
            }
        },
        methods: {
            activar(e) {
                if (e.target.classList.contains(this.classActive)){
                    e.target.classList.remove(this.classActive);
                    // Eliminar del se de habilidades
                    this.habilidades.delete(e.target.textContent);
                } else {
                    e.target.classList.add(this.classActive);
                    // Agregar al set de habilidades
                    this.habilidades.add(e.target.textContent);
                }
                // Agregar las habilidades al input hidden
                const stringHAbilidades = [... this.habilidades];
                document.querySelector('#skills').value = stringHAbilidades;
            },
            verificarClaseActiva(skill) {
                return this.habilidades.has(skill) ? this.classActive:'';
            }
        }
    }
</script>
