<script setup>
import { Head, Link } from "@inertiajs/inertia-vue3";
import { onMounted, ref } from "vue";
import { useForm } from "@inertiajs/inertia-vue3";

import QuestionModal from "@/Components/QuestionModal.vue";
import axios from "axios";

const form = useForm({
    question_form: "",
});

function submit() {
    form.post("/update-question");
}

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <QuestionModal></QuestionModal>
</template>
