<template>
    <div>
        <h3>Edition</h3>
        <form @submit.prevent="save">
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" v-model="form.nom">
                <div>{{ form.errors.nom }}</div>
            </div>
            <div>
                <label for="prenom">Prenom</label>
                <input type="text" id="prenom" v-model="form.prenom">
                <div>{{ form.errors.prenom }}</div>
            </div>
            <div>
                <label for="sexe">Sexe</label>
                <select id="sexe" v-model="form.sexe">
                    <option value="M">Masculin</option>
                    <option value="F">Feminin</option>
                </select>
                <div>{{ form.errors.sexe }}</div>
            </div>
            <div>
                <label for="naissance">Naissance</label>
                <input type="date" id="naissance" v-model="form.naissance">
                <div>{{ form.errors.naissance }}</div>
            </div>
            <div>
                <label for="lieu">Lieu</label>
                <input type="text" id="lieu" v-model="form.lieu">
                <div>{{ form.errors.lieu }}</div>
            </div>
            <div>
                <input type="submit" value="Enregistrer">
            </div>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    eleve: Object
})

const form = useForm({
    nom: props.eleve.nom,
    prenom: props.eleve.prenom,
    sexe: props.eleve.sexe,
    naissance: props.eleve.naissance,
    lieu: props.eleve.lieu,
})
const save = () => form.put(`/eleves/${props.eleve.id}`);
</script>