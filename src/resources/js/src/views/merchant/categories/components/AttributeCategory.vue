<script setup lang="ts">
import { computed, ref, watch } from "vue";

const attributes = ref([
  {
    name: "Chon kich thuoc man hinh",
    key: "chon-kich-thuoc-man-hinh",
    attr: [
      {
        name: "laptop 12 inch",
        slug: "laptop-12-inch",
      },
    ],
  },
]);

const addAttribute = () => {
  attributes.value.push({
    name: "",
    key: "",
    attr: [
      {
        name: "",
        slug: "",
      },
    ],
  });
};

const addAttributeChild = (key) => {
  attributes.value[key].attr.push({
    name: "",
    slug: "",
  });
};

const removeAttribute = (key) => {
  attributes.value.splice(key, 1);
};

const removeAttributeChild = (key, keyChild) => {
  attributes.value[key].attr.splice(keyChild, 1);
};

const checkRemoveAttributeChild = (key) => {
  return attributes.value[key].attr.length === 1;
};

// watch(
//   attributes,
//   (Val, oldVal) => {
//     console.log(Val);
//   },
//   { deep: true },
// );
</script>

<template>
  <div class="w-full lg:w-12/12 px-4 mb-5">
    <h3 class="block uppercase text-blueGray-600 text-md font-bold mb-2">
      Attribute
    </h3>
    <div
      class="content-attr w-full flex items-center flex-wrap mb-4"
      v-for="(item, index) in attributes"
    >
      <div class="relative w-10/12 mb-3">
        <ShInput
          type="text"
          :name="`attributes[${index}].name`"
          classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
          :sh_value="item.name"
        />
      </div>
      <div
        class="attr-child w-full flex items-center gap-1"
        v-for="(attr, idx) in item.attr"
      >
        <div class="relative w-5/12 mb-3">
          <ShInput
            type="text"
            :name="`attributes[${index}].attr[${idx}].name`"
            classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            :sh_value="attr.name"
          />
        </div>
        <div class="relative w-5/12 mb-3">
          <ShInput
            type="text"
            :name="`attributes[${index}].attr[${idx}].slug`"
            classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
            :sh_value="attr.slug"
          />
        </div>
        <div class="relative w-2/12 mb-3">
          <ShButton
            classes="ml-3 bg-red-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150"
            type="button"
            @click="removeAttributeChild(index, idx)"
            :disabled="checkRemoveAttributeChild(index)"
          >
            <template v-slot:icon>
              <i class="fa fa-minus-circle" aria-hidden="true"></i>
            </template>
          </ShButton>
        </div>
      </div>
      <div class="w-full flex gap-2">
        <ShButton
          classes="bg-red-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150"
          type="button"
          @click="removeAttribute(index)"
        >
          <template v-slot:icon>
            <i class="fa fa-trash" aria-hidden="true"></i>
          </template>
        </ShButton>
        <ShButton
          classes="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150"
          type="button"
          @click="addAttributeChild(index)"
        >
          <template v-slot:icon>
            <i class="fa fa-plus-circle" aria-hidden="true"></i>
          </template>
        </ShButton>
      </div>
    </div>
    <ShButton
      classes="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none ease-linear transition-all duration-150"
      type="button"
      @click="addAttribute"
    >
      Add attribute
      <template v-slot:icon>
        <i class="fa fa-plus-circle" aria-hidden="true"></i>
      </template>
    </ShButton>
  </div>
</template>
