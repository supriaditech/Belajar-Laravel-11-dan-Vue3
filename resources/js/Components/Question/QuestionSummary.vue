<script setup>
defineProps({
  question: {
    type: Object,
    required: true,
  },
})
</script>

<template>
  <div class="">
    <div class="flex flex-row px-10 py-4 border-b gap-4">
      <div class="w-40 flex flex-col gap-2">
        <p class="text-right font-semibold">{{ question.votes_count }} vote</p>
        <p
          class="border font-semibold border-green-500 text-center text-green-500"
        >
          {{ question.answers_count }} Answers
        </p>
        <p class="text-right font-semibold">{{ question.views_count }} Views</p>
      </div>
      <div class="bg-white flex flex-col gap-2">
        <p class="font-bold text-xl text-blue-500">{{ question.title }}</p>
        <p>{{ question.summary }}</p>
        <div class="flex flex-row justify-between items-center">
          <div class="flex flex-row gap-4">
            <p
              class="border text-center w-auto px-4 font-semibold bg-gray-200 text-sm"
            >
              PHP
            </p>
            <p
              class="border text-center w-auto px-4 font-semibold bg-gray-200 text-sm"
            >
              Laravel
            </p>
            <p
              class="border text-center w-auto px-4 font-semibold bg-gray-200 text-sm"
            >
              Vue
            </p>
          </div>
          <div class="flex flex-row items-center gap-2">
            <img
              :src="question.user.avatarUrl"
              alt="User Avatar"
              class="w-6 h-6 rounded-full"
            />
            <p class="text-blue-500">{{ question.user.name }}</p>
            <p>asked {{ question.created_at.human }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
