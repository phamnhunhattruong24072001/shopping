<script setup lang="ts">
import {PropType} from "vue"

type ButtonTypes = "button" | "submit" | "reset" | undefined

defineProps({
  type: {
    type: String as PropType<ButtonTypes>,
    required: false,
    default: 'button',
    validator: (value: string) => {
      const _buttonTypes = ["button", "submit", "reset"]
      return _buttonTypes.includes(value)
    }
  },
  disabled: {
    type: Boolean,
    required: false,
  },
  classes: {
    type: String,
    required: false,
  }
})
</script>

<template>
  <button :class="classes" :type="type" :disabled="disabled">
    <slot name="icon"></slot>
    <span>
      <slot></slot>
    </span>
  </button>
</template>
