import {ref} from 'vue'

export default function () {
  const categories = ref({})

  const getAllCategory = async () => {
    categories.value = {
      name: 'category get all',
      data: 'this is category data'
    }
  }

  return { categories, getAllCategory }
}
