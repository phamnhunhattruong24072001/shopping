<script setup lang="ts">
import { useField } from "vee-validate";

const props = defineProps({
  classes: {
    type: String,
    required: false,
  },
  validate: {
    type: Boolean,
    default: true,
  },
  name: {
    type: String,
    required: false,
  },
  disabled: {
    type: Boolean,
    required: false,
  },
  multiple: {
    type: Boolean,
    default: false,
  },
  label: {
    type: String,
    required: false,
  },
  class_label: {
    type: String,
    default: "block uppercase text-blueGray-600 text-xs font-bold mb-2",
  },
  selectedVal: {
    type: String,
    required: false,
  },
});

const { value, errorMessage } = useField(() =>
  props.validate ? props.name : "",
);

if (props.selectedVal) {
  value.value = props.selectedVal;
}
</script>

<template>
  <label v-show="label" :class="class_label">
    {{ label }}
  </label>
  <select
    :class="{ [classes]: true, 'is-valid': errorMessage }"
    :name="name"
    :disabled="disabled"
    :multiple="multiple"
    v-model="value"
  >
    <slot></slot>
  </select>
  <span class="text-red-500 pt-0.5 text-sm">{{ errorMessage }}</span>
</template>

<style scoped>
.is-valid {
  border: 2px solid red;
}
</style>
