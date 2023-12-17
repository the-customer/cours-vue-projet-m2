<template>
    <div class="detail">
            <strong class="text-lg font-bold">{{ eleve.prenom }} {{ eleve.nom }}</strong>
            <p>
                {{ eleve.naissance }} - {{ eleve.lieu }}
                <br>
                {{ eleve.sexe }} - {{ eleve.numero }}
                <br>
                <Link :href="route('eleves.edit',eleve.id)" as="button">Edit</Link> &nbsp;
                <!-- <Link :href="route('eleves.edit',[eleve.id])" as="button">Edit</Link> &nbsp; -->
                <!-- <Link :href="route('eleves.edit',{elefe:eleve.id})" as="button">Edit</Link> &nbsp; -->
                <Link :href="route('eleves.destroy',eleve.id)" method="DELETE" as="button">Delete</Link>
            </p>
        </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3"

defineProps({
    eleve: Object
})
</script>

<style scoped>
.detail{
    border: 2px solid gray;
    padding: 4px;
    border-radius: 5px;
    width: fit-content;
    margin-bottom: 3px;
}
</style>