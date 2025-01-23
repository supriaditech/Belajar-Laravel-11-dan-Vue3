<script setup>
import QuestionSummary from '@/Components/Question/QuestionSummary.vue'
import AppLayout from '@/Layouts/AppLayout.vue'

defineProps({
  Question: {
    type: Object,
    required: true,
  },
})
</script>

<template>
  <AppLayout title="Welcome Page">
    <h1 class="font-bold text-4xl">All Questions</h1>
    <div class="border rounded-md mt-4">
      <QuestionSummary
        v-for="question in Question.data"
        :key="question.id"
        :question="question"
      />
    </div>
  </AppLayout>
</template>
