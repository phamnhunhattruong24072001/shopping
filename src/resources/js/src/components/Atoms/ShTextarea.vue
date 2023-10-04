<script setup lang="ts">
import { useField } from "vee-validate";

const props = defineProps({
  rows: {
    type: String,
    default: '4',
  },
  cols: {
    type: String,
    required: false,
  },
  classes: {
    type: String,
    required: false,
  },
  validate: {
    type: Boolean,
    default: true,
  },
  placeholder: {
    type: String,
    required: false,
  },
  name: {
    type: String,
    required: false,
  },
  disabled: {
    type: Boolean,
    required: false,
  },
  readonly: {
    type: Boolean,
    required: false,
  },
  label: {
    type: String,
    required: false,
  },
  class_label: {
    type: String,
    default: "block uppercase text-blueGray-600 text-xs font-bold mb-2",
  },
  sh_value: {
    type: String,
    required: false,
  },
});

const { value, errorMessage } = useField(() =>
  props.validate ? props.name : "",
);

if (props.sh_value) {
  value.value = props.sh_value;
}
</script>

<template>
  <label v-show="label" :class="class_label">
    {{ label }}
  </label>
  <textarea
    :class="{ [classes]: true, 'is-valid': errorMessage }"
    :rows="rows"
    :cols="cols"
    :placeholder="placeholder"
    :disabled="disabled"
    :readonly="readonly"
    v-model="value"
  >
  </textarea>
  <span class="text-red-500 pt-0.5 text-sm">{{ errorMessage }}</span>
</template>

<style scoped>
.is-valid {
  border: 2px solid red;
}
</style>
