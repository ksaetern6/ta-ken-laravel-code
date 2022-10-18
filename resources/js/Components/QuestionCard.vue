<script setup></script>

<template>
    <div class="flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5">
        <h3 class="text-lg font-bold text-gray-800">
            <slot name="title"></slot>
        </h3>

        <p class="mt-2"><slot name="body"></slot></p>
    </div>
</template>
