<template>
    <div>
        <h1>Liste des élèves de la classe de : {{ classe.libelle }}</h1>
       

        <div class="flex mb-2">
            <input v-model="params.search" type="text" class="input w-1/2" placeholder="Recherche...">
        </div>
        <div class="overflow-hidden shadow-md sm:rounded-lg bg-gray-100 mt-5">
            <div class="flex flex-col">
                <table class="min-w-full border-gray-200 shadow sm:rounded-lg">
                    <thead class="bg-slate-500">
                        <tr>
                            <th>Numéro</th>
                            <th>
                               <span class="inline-flex py-3 px-6 w-full justify-between hover:cursor-pointer"
                               @click="sort('prenom')"
                               >
                                Prénom
                                <svg
                                    v-if="params.field === 'prenom' && params.direction === 'asc'"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                  >
                                    <path
                                      d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"
                                    />
                                  </svg>
                                  <svg
                                    v-if="params.field === 'prenom' && params.direction === 'desc'"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                  >
                                    <path
                                      d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"
                                    />
                                  </svg>
                               </span>
                            </th>
                            <th>
                               <span class="inline-flex py-3 px-6 w-full justify-between hover:cursor-pointer"
                               @click="sort('nom')"
                               >
                                Nom
                                <svg
                                v-if="params.field === 'nom' && params.direction === 'asc'"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                  >
                                    <path
                                      d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z"
                                    />
                                  </svg>
                                  <svg
                                  v-if="params.field === 'nom' && params.direction === 'desc'"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-4 w-4"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                  >
                                    <path
                                      d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h7a1 1 0 100-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM15 8a1 1 0 10-2 0v5.586l-1.293-1.293a1 1 0 00-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L15 13.586V8z"
                                    />
                                  </svg>
                               </span>
                            </th>
                            <th>Sexe</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="eleve in eleves" :key="eleve.id">
                            <td>123</td>
                            <td>{{ eleve.prenom }}</td>
                            <td>{{eleve.nom}}</td>
                            <td>{{eleve.sexe}}</td>
                            <td>{{eleve.naissance}}</td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</template>


<script setup>
import { router } from "@inertiajs/vue3";
import { reactive, watch } from "vue";

const p = defineProps({
    classe: Object,
    eleves:Array
});

const params =  reactive({
    search: null,
    field:null,
    direction: null,
})

watch(params,()=>{
    if(!params.field && !params.direction && params.search.length <3){
        return;
    }
    router.get(route('classes.show',p.classe.id));
})

const sort = (champ) => {
    params.field = champ;
    params.direction = params.direction === 'asc' ? 'desc' : 'asc';
    console.log(params)
}
</script>