<template>
    <Loader v-if="isLoading"/>
    <div>
        <h3 class="text-2xl">Inscription</h3>
        <form @submit.prevent="save" class="w-1/2 m-auto">
            <div>
                <label for="nom">Nom</label>
                <input class="input" type="text" id="nom" v-model="form.nom">
                <div class="text-xs text-red-800 pt-2">{{ form.errors.nom }}</div>
            </div>
            <div>
                <label for="prenom">Prenom</label>
                <input class="input" type="text" id="prenom" v-model="form.prenom">
                <div class="text-xs text-red-800 pt-2">{{ form.errors.prenom }}</div>
            </div>
            <div>
                <label for="sexe">Sexe</label>
                <select class="input" id="sexe" v-model="form.sexe">
                    <option value="M">Masculin</option>
                    <option value="F">Feminin</option>
                </select>
                <div class="text-xs text-red-800 pt-2">{{ form.errors.sexe }}</div>
            </div>
            <div>
                <label for="naissance">Naissance</label>
                <input class="input" type="date" id="naissance" v-model="form.naissance">
                <div class="text-xs text-red-800 pt-2">{{ form.errors.naissance }}</div>
            </div>
            <div>
                <label for="lieu">Lieu</label>
                <input class="input" type="text" id="lieu" v-model="form.lieu">
                <div class="text-xs text-red-800 pt-2">{{ form.errors.lieu }}</div>
            </div>
            <br>
            <p class="text-lg">Information de la classe:</p>
            <div class="flex gap-2 w-full">
                <div class="flex-1">
                    <label for="sexe">Cycle</label>
                    <select @change="getClasses" class="input" id="sexe" v-model="form.cycle">
                        <option :value="null">Choisir un cycle</option>
                        <option 
                            v-for="cycle in cycles" 
                            :key="cycle.id" 
                            :value="cycle.id">{{ cycle.libelle }}</option>
                    </select>
                    <div class="text-xs text-red-800 pt-2">{{ form.errors.cycle }}</div>
                </div>
                <div class="flex-1">
                    <label for="sexe">Classe</label>
                    <select class="input" id="sexe" v-model="form.classe">
                        <option :value="null">Choisir une classe</option>
                        <option 
                            v-for="classe in classes" 
                            :key="classe.id" 
                            :value="classe.id">{{ classe.libelle }}</option>
                    </select>
                    <div class="text-xs text-red-800 pt-2">{{ form.errors.classe }}</div>
                </div>
            </div>
            <div>
                <input class="btn-primary mt-6" type="submit" value="Inscrire">
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';
import Loader from '@/components/Loader.vue';


const isLoading = ref(false)

const props = defineProps({
    cycles: Array
})



//1ere methode
// import { reactive } from "vue";
// import { router } from '@inertiajs/vue3'
// const form = reactive({
//     nom: null,
//     prenom: null,
//     sexe: 'M',
//     naissance: null,
//     lieu: null,
// })
//
// const save = () => router.post('/eleves',form);
//2ieme methode

const form = useForm({
    nom: null,
    prenom: null,
    sexe: 'M',
    naissance: null,
    lieu: null,
    cycle: null,
    classe: null
})

const classes = ref([])


const save = () => form.post('/eleves');
//
const getClasses = () => {
    isLoading.value = true;
    if(!form.cycle){
        return;
    }
    setTimeout(() => {
        axios.get(`/api/cycles/${form.cycle}/classes`).then(response => {
        classes.value = [...response.data];
        isLoading.value = false;
    })
    }, 3000);
}
</script>
