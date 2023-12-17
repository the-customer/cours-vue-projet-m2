<template>
    <header
      class="border-b border-red-600 bg-gray-200 dark:border-red-700 dark:bg-gray-900"
    >
      <div class="container mx-auto">
        <nav class="p-4 flex items-center justify-between">
          <div class="text-lg font-medium">
            <Link :href="route('eleves.index')">Eleves</Link>
          </div>
          <div
            class="text-xl text-red-600 dark:text-red-300 font-bold text-center"
          >
            <Link :href="route('eleves.index')">Breukh-School</Link>
          </div>
          <div class="flex items-center gap-4">
            <Link class="text-sm text-gray-500" :href="route('eleves.index')">{{ 'Aly Niang (ADMIN)' }}</Link>
            <Link
              :href="route('eleves.create')"
              class="btn-primary"
              >+ Nouvel Eleve</Link>
            <div class="border-2 text-red-600 border-red-600 px-2 rounded-md">
              <Link href="#">Logout</Link>
            </div>
          </div>
        </nav>
      </div>
    </header>
  
    <main class="container mx-auto p-4 w-full">
      <div 
        v-if="messageFlash" 
        class="mb-4 border shadow-sm bg-green-50 p-2 dark:bg-green-800
        border-green-300 
        rounded-md
        ">
        {{ messageFlash }}
        I am a flash
      </div>
      <slot></slot>
    </main>
  </template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed, ref } from 'vue';


const page = usePage();
//page.props.value.flash.success

const messageFlash = computed(
    ()  => page.props.flash.success
)

</script>
