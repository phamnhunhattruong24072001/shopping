<script setup lang="ts">
import AttributeCategory from "@/views/merchant/categories/components/AttributeCategory.vue";

const props = defineProps({
  items: {
    type: Object,
    default: {
      name: "",
      slug: "",
      image: "",
      parent_id: "",
      desc: "",
    }
  },
  categories: {
    type: Object,
    required: false
  }
})
</script>

<template>
  <div class="flex flex-wrap">
    <div class="w-full lg:w-6/12 px-4">
      <div class="relative w-full mb-3">
        <ShInput
          type="text"
          name="name"
          classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
          label="Name"
          class_label="block uppercase text-blueGray-600 text-xs font-bold mb-2"
          :sh_value="items.name"
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
          :sh_value="items.slug"
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
          :sh_value="items.image"
        />
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
          :sh_value="items.desc"
        />
      </div>
    </div>
    <AttributeCategory></AttributeCategory>
  </div>
  <slot name="handle"></slot>
</template>
