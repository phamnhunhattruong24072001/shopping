<script setup lang="ts">
import { ref } from "vue";
import { useForm } from "vee-validate";
import { schemaCategory } from "@/validations";
import { CategoryForm } from "@/@types";
import ShButton from "@/components/Atoms/ShButton.vue";
import FormCategory from "@/views/admin/categories/components/FormCategory.vue";

const { handleSubmit, handleReset } = useForm<CategoryForm>(schemaCategory);

const submitForm = handleSubmit((values) => {
  console.log(values);
});
</script>

<template>
  <div class="flex flex-wrap mt-4">
    <div class="w-full mb-12 px-4">
      <div
        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
      >
        <div class="rounded-t bg-white mb-0 px-6 py-6">
          <div class="text-center flex justify-between">
            <h6 class="text-blueGray-700 text-xl font-bold"> {{ $t('category.create') }}</h6>
            <router-link
              :to="{ name: 'category' }"
              class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
            >
              {{ $t('global.list') }}
            </router-link>
          </div>
        </div>
        <div class="flex-auto px-4 lg:px-10 py-10 pt-5">
          <form @submit.prevent="submitForm" @reset="handleReset">
            <FormCategory>
              <template v-slot:handle>
                <div class="flex justify-end gap-2 px-4">
                  <ShButton
                    classes="bg-red-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150"
                    type="reset"
                  >
                    {{ $t('global.reset') }}
                  </ShButton>
                  <ShButton
                    classes="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150"
                    type="submit"
                  >
                    {{ $t('global.create') }}
                  </ShButton>
                </div>
              </template>
            </FormCategory>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>
