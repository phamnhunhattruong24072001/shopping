<script setup lang="ts">
import { PropType, computed } from "vue";
import { useField } from "vee-validate";

type InputTypes =
  | "text"
  | "password"
  | "checkbox"
  | "radio"
  | "number"
  | "email"
  | "url"
  | "tel"
  | "date"
  | "time"
  | "datetime-local"
  | "month"
  | "week"
  | "color"
  | "file"
  | "range"
  | "search"
  | "hidden"
  | "button"
  | "submit"
  | "reset"
  | undefined;

const props = defineProps({
  type: {
    type: String as PropType<InputTypes>,
    required: false,
    default: "text",
    validator: (value: string) => {
      const _inputTypes = [
        "text",
        "password",
        "number",
        "email",
        "tel",
        "url",
        "search",
        "date",
        "time",
        "datetime-local",
        "month",
        "week",
        "color",
        "range",
        "file",
        "checkbox",
        "radio",
        "submit",
        "reset",
        "button",
        "hidden",
      ];

      return _inputTypes.includes(value);
    },
  },
  id: {
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
  classes: {
    type: String,
    required: false,
  },
  placeholder: {
    type: String,
    required: false,
  },
  name: {
    type: String,
    required: false,
  },
  ref: {
    type: String,
    required: false,
  },
  modelValue: {
    type: String,
    required: false,
  },
  autocomplete: {
    type: String,
    required: false,
    default: "off",
  },
  label: {
    type: String,
    required: false,
  },
  class_label: {
    type: String,
    required: false,
    default: "block uppercase text-blueGray-600 text-xs font-bold mb-2",
  },
  validate: {
    type: Boolean,
    default: true,
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
  <input
    :id="id"
    :class="{ [classes]: true, 'is-valid': errorMessage }"
    :type="type"
    :name="name"
    :readonly="readonly"
    :placeholder="placeholder"
    :disabled="disabled"
    :ref="ref"
    :autocomplete="autocomplete"
    v-model="value"
  />
  <span class="text-red-500 pt-0.5 text-sm">{{ errorMessage }}</span>
</template>

<style scoped>
.is-valid {
  border: 2px solid red;
}
</style>
