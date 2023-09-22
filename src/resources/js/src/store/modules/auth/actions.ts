import {actionsName} from './types'
import { login } from '@/api/auth.service'
export default {
  [actionsName.LOGIN]: async ({commit}, formData) => {
    try {
      const response = await login(formData);
      console.log(response)
    } catch (error) {
      console.log(error)
    }
  },
}
