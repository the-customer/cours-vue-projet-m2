<template>
    <h1 class="text-2xl font-semibold mb-4">Liste des Classes</h1>
    <div class="grid gap-3 grid-cols-1 md:grid-cols-3">
        <Card v-if="!addNew" class="bg-sky-100 hover:bg-sky-300 hover:cursor-pointer" @click="addNew=true">
            <template #header>
                Ajout de Classe
            </template>
            <div class="flex items-center justify-center text-lg text-center">
                <span>➕</span>
            </div>
        </Card>
        <Card class="bg-sky-100" v-else>
            <template #header>
               <span class="text-lg">Nouvelle Classe : <span @click="cycleSelected = false" class="hover:cursor-pointer hover:text-sky-400" v-if="cycleSelected">{{ libelleSelectedCycle }}</span></span>
                <p v-if="form.errors.libelle" class="text-red-500">
                    {{ form.errors.libelle }}
                </p>
            </template>
            <div class="flex items-center">
                <input v-if="cycleSelected" type="text" v-model="form.libelle" class="input mr-2" placeholder="Ex: CM2">
                <select v-model="form.cycle" v-if="!cycleSelected" class="input" @change="onCycleChanged">
                    <option :value="null">Choisir un cycle</option>
                    <option v-for="cycle in cycles" :key="cycle.id" :value="cycle">{{ cycle.libelle }}</option>
                </select>
                <button v-if="cycleSelected" class="btn-primary text-xs mt-1" @click="save">OK</button>
            </div>
        </Card>

        <Card v-for="classe in classes.data" :key="classe.id">
            <template #header>
                {{ classe.inscriptions.length }} inscrit(s)
            </template>
            {{ classe.libelle }}
            <template #buttons>
                <Link class="btn-primary text-xs" :href="route('classes.show',classe.id)">Details</Link>&nbsp;
            </template>
        </Card>
    </div>
    <Pagination class="mt-4" :links=" classes.links"/>
</template>


<script setup>
import Card from "@/Components/Card.vue";
import Pagination from "@/Components/Pagination.vue";
import { Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

const addNew = ref(false);
const cycleSelected = ref(false);
const libelleSelectedCycle = ref('');

const p = defineProps({
    classes: Object,
    cycles: Array
});

const form = useForm({
    libelle: null,
    cycle:null
})

const save = ()=>{
    form.cycle = form.cycle.id;
    form.post(route('classes.store'));
    form.reset();
    addNew.value= !form.errors.libelle;
}
//
const onCycleChanged = ()=>{
    cycleSelected.value = true;
    libelleSelectedCycle.value = form.cycle.libelle;
}

</script>