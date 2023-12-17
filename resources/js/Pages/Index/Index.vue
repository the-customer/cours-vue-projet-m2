<template>
        <h1>Index Page</h1>
        <br>
        <p>
            Message : {{ message }}
        </p>
        <p>
            Nom : {{ name }}
        </p>
        <p>
            Age : {{ age }}
        </p>
        <p>
            Sexe : {{ sexe }}
        </p>
        <p>
            Job : {{ job }}
        </p>
        <p>
            Programm : {{ program }}
        </p>
        <br>
</template>

<script setup>
import BaseLayout from '../../Layouts/BaseLayout.vue'
// defineProps(['message','name'])
defineProps({
    message: String,
    name:{
        type: String,
        required: true
    },
    age: Number,
    sexe: [String,Number,Boolean],
    job:{
        type: String,
        default: "FullStack"
    },
    program:{
        type: Object,
        default(){ return { language: "JS", framework: "Vue" } }
    }
})
</script>
