<script setup lang="ts">
import {ref} from "vue"
import { useForm } from "vee-validate";
import { schemaCategory } from "@/validations";
import { CategoryForm } from "@/@types";
import ShInput from "@/components/Atoms/ShInput.vue";
import ShButton from "@/components/Atoms/ShButton.vue";
import ShTextarea from "@/components/Atoms/ShTextarea.vue";
import ShSelect from "@/components/Atoms/ShSelect.vue";

const { handleSubmit } = useForm<CategoryForm>(schemaCategory);

const parent_ids = ref([
  {
    name: "Điện thoại",
    slug: "dien-thoai",
  },
  {
    name: "Laptop",
    slug: "laptop",
  },
  {
    name: "Tablet",
    slug: "tablet",
  },
])

const submitForm = handleSubmit((values) => {
  console.log(values);
});
</script>

<template>
  <div
    class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0"
  >
    <div class="rounded-t bg-white mb-0 px-6 py-6">
      <div class="text-center flex justify-between">
        <h6 class="text-blueGray-700 text-xl font-bold">Create category</h6>
        <button
          class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
          type="button"
        >
          Settings
        </button>
      </div>
    </div>
    <div class="flex-auto px-4 lg:px-10 py-10 pt-5">
      <form @submit.prevent="submitForm">
        <div class="flex flex-wrap">
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <ShInput
                type="text"
                name="name"
                classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                label="Name"
                class_label="block uppercase text-blueGray-600 text-xs font-bold mb-2"
              />
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <ShInput
                type="text"
                name="slug"
                classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                label="slug"
                class_label="block uppercase text-blueGray-600 text-xs font-bold mb-2"
              />
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <ShInput
                type="text"
                name="image"
                classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                label="image"
                class_label="block uppercase text-blueGray-600 text-xs font-bold mb-2"
              />
            </div>
          </div>
          <div class="w-full lg:w-6/12 px-4">
            <div class="relative w-full mb-3">
              <ShSelect
                name="parent_id"
                classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                label="parent_id"
                class_label="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                :selected-val="'laptop'"
              >
                <option v-for="option in parent_ids" :value="option.slug">{{ option.name }}</option>
              </ShSelect>
            </div>
          </div>
          <div class="w-full lg:w-12/12 px-4">
            <div class="relative w-full mb-3">
              <ShTextarea
                name="desc"
                classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                label="desc"
                class_label="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                rows="4"
              />
            </div>
          </div>
        </div>
        <div class="flex justify-end px-4">
          <ShButton
            classes="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150"
            type="submit"
          >
            Create
          </ShButton>
        </div>
      </form>
    </div>
  </div>
</template>
