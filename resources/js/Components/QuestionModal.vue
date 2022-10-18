<template>
    <div class="fixed inset-0 flex items-center justify-center">
        <QuestionCard>
            <template #title>
                <div class="text-center">{{ questionDisplayText }}</div>
            </template>
            <template #body>
                <div class="flex justify-center">
                    <button
                        type="button"
                        @click="openModal"
                        class="rounded-md bg-black bg-opacity-20 px-4 py-2 text-sm font-medium text-white hover:bg-opacity-30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
                    >
                        View Question
                    </button>
                </div>
            </template>
        </QuestionCard>
    </div>
    <TransitionRoot appear :show="isOpen" as="template">
        <Dialog as="div" @close="closeModal" class="relative z-10">
            <TransitionChild
                as="template"
                enter="duration-300 ease-out"
                enter-from="opacity-0"
                enter-to="opacity-100"
                leave="duration-200 ease-in"
                leave-from="opacity-100"
                leave-to="opacity-0"
            >
                <div class="fixed inset-0 bg-black bg-opacity-25" />
            </TransitionChild>

            <div class="fixed inset-0 overflow-y-auto">
                <div
                    class="flex min-h-full items-center justify-center p-4 text-center"
                >
                    <TransitionChild
                        as="template"
                        enter="duration-300 ease-out"
                        enter-from="opacity-0 scale-95"
                        enter-to="opacity-100 scale-100"
                        leave="duration-200 ease-in"
                        leave-from="opacity-100 scale-100"
                        leave-to="opacity-0 scale-95"
                    >
                        <DialogPanel
                            class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-xl transition-all"
                        >
                            <DialogTitle
                                as="h3"
                                class="text-lg font-medium leading-6 text-gray-900"
                            >
                                {{ question }}
                            </DialogTitle>
                            <div class="mt-2">
                                <form @submit.prevent="submit">
                                    <input
                                        id="question_form"
                                        v-model="form.question_form"
                                        placeholder="Update question here"
                                    />
                                    <button
                                        class="rounded bg-blue-100 py-1 px-2 ml-5"
                                        type="submit"
                                    >
                                        Update
                                    </button>
                                </form>
                            </div>
                            <div class="mt-2">
                                <ul v-for="(answer, key) in answers" :key="key">
                                    <div class="flex flex-row mt-2">
                                        <li>{{ answer }}</li>
                                        <button
                                            class="bg-red-400 ml-2 rounded px-2"
                                            @click="deleteAnswer(answer, key)"
                                        >
                                            Delete
                                        </button>
                                    </div>
                                </ul>
                            </div>
                        </DialogPanel>
                    </TransitionChild>
                </div>
            </div>
        </Dialog>
    </TransitionRoot>
</template>

<script setup>
import { onMounted, ref } from "vue";
import {
    TransitionRoot,
    TransitionChild,
    Dialog,
    DialogPanel,
    DialogTitle,
} from "@headlessui/vue";
import QuestionCard from "@/Components/QuestionCard.vue";
import { useForm } from "@inertiajs/inertia-vue3";

const isOpen = ref(false);
const question = ref("");
const questionDisplayText = ref("");
const answers = ref([]);

function closeModal() {
    isOpen.value = false;
}
function openModal() {
    isOpen.value = true;
}

const form = useForm({
    question_form: "",
});

function submit() {
    form.post("/update-question", {
        preserveScroll: true,
        onSuccess: (resp) => console.log(resp),
    });
}

const setup = async function () {
    const response = await axios.get("/load-questions");
    const data = response.data[0];
    questionDisplayText.value = data.question_display_text;
    question.value = data.question;
    answers.value = data.answers;
};

onMounted(() => {
    setup();
});

function deleteAnswer(answer, key) {
    array.value = array.value.filter((value, index, arr) => {
        return;
    });
}
</script>
