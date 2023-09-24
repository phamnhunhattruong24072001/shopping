<script setup lang="ts">
import {PropType} from "vue"

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
  | undefined

defineProps({
  type: {
    type: String as PropType<InputTypes>,
    required: false,
    default: 'text',
    validator: (value: string) => {
      const _inputTypes = [
        "text", "password", "number", "email", "tel", "url", "search", "date", "time", "datetime-local", "month", "week", "color", "range", "file", "checkbox", "radio", "submit", "reset", "button", "hidden"
      ];

      return _inputTypes.includes(value)
    }
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
  }
})
</script>

<template>
  <input
    :id="id"
    :class="classes"
    :type="type"
    :name="name"
    :readonly="readonly"
    :placeholder="placeholder"
    :disabled="disabled" :ref="ref"
    :value="modelValue"
    @input="$emit('update:modelValue', ($event?.target as HTMLInputElement).value)"
  />
</template>
