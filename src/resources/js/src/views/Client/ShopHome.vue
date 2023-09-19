<template>
  <div>
    <h1>This is Home</h1>
    <h2>{{ fullName }}</h2>
  </div>
  <div class="text-primary" v-for="number in numbers">
    <span class="class" v-for="n in formatNumber(number)" @click="clickEvent">{{ n }}</span>
  </div>
  <button @click.ctrl="handle" class="bg-primary ml-5">ctrl + click</button>
  <button @click.alt="handle" class="bg-primary ml-5">alt + click</button>
<!--  <button @click="handle" class="bg-primary ml-5">Right</button>-->
</template>

<script>
export default {
  data() {
    return {
      lastName: "Truong",
      firstName: "Nhat",
      numbers: [[1, 2, 3, 4, 5, 6], [1, 1, 2, 2, 3, 3, 7]],
    }
  },
  mounted() {
    this.increment()
    document.addEventListener("keydown", this.handleKeyDown);
  },
  computed: {
    fullName: {
      get() {
        return this.firstName + ' ' + this.lastName
      },
      set(newValue) {
        [this.firstName, this.lastName] = newValue.split(' ')
      }
    }
  },
  methods: {
    increment: () => {
      // BAD: no `this` access here!
      console.log('lastName')
    },
    formatNumber: (numbers) => {
      return numbers.filter((number) => number !== 2)
    },
    clickEvent(event) {
      if (event) {
        console.log(event.target.tagName, event.target.tagType)
      }
    },
    handle() {
      console.log('handle')
    },
    handleKeyDown(event) {
      if (event.key === "ArrowRight") {
        console.log("Right key pressed");
      }
    },
  }
}
</script>
