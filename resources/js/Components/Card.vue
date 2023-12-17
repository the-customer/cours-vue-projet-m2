<template>
    <div class="
    border border-gray-200 
    dark:border-gray-800 
    rounded-md p-4 shadow-sm 
    dark:text-gray-300">
        <div class="text-gray-500 font-medium mb-1 text-xs">
            <slot name="header" />
        </div>
        <div class="flex justify-between flex-col gap-4 md:flex-row">
            <div class="w-full">
                <slot />
            </div>
            <div>
                <slot name="buttons" />
            </div>
        </div>
        
    </div>
</template>