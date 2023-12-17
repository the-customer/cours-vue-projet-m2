<template>
    <h1 class="text-2xl font-semibold mb-4">Liste des eleves</h1>
    <div class="grid gap-3 grid-cols-3">
        <!-- <Eleve v-for="el in eleves.data" :key="el.id" :eleve="el" /> -->
        <Card v-for="el in eleves.data" :key="el.id">
            <template #header>
                CP
            </template>
            {{ el.prenom }} {{ el.nom }}
            <template #buttons>
                <Link class="btn-primary text-xs" :href="route('eleves.show',el.id)">Details</Link> &nbsp;
            </template>
        </Card>
    </div>
    <Pagination class="mt-4" :links=" eleves.links"/>
</template>


<script setup>
import Eleve from '@/Components/Eleve.vue';
import Card from '@/Components/Card.vue';
import Pagination from '@/Components/Pagination.vue';
import { Link } from '@inertiajs/vue3';


const props = defineProps({
    eleves: Object
})
</script>


