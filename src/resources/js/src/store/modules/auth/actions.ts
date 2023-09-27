import {ActionContext, ActionTree} from 'vuex'
import {State} from './state'
import {RootState} from '@/store'
import {AuthActionTypes} from "./types"
import {loginAdmin, registerAdmin} from "@/api/auth.service"
import {AuthMutationTypes} from "./types"
import {Mutations} from "./mutations"
import router from '@/router'

type AugmentedActionContext = {
  commit<K extends keyof Mutations>(
    key: K,
    payload: Parameters<Mutations[K]>[1],
  ): ReturnType<Mutations[K]>;
} & Omit<ActionContext<State, RootState>, 'commit'>

export interface Actions {
  [AuthActionTypes.LOGIN_ADMIN]({commit}: AugmentedActionContext, formData: object): void
}

export const actions: ActionTree<State, RootState> & Actions = {
  async [AuthActionTypes.LOGIN_ADMIN]({commit}, formData: string[]): Promise<void> {
    try {
      const data: any = await loginAdmin(formData)
      commit(AuthMutationTypes.SET_USER_ADMIN, data.user)
      commit(AuthMutationTypes.SET_IS_LOGIN_ADMIN, true)
      localStorage.setItem('admin_access_token', data.token)
      await router.push({ name: 'admin.dashboard' })
    } catch (error) {
      console.log(error)
      commit(AuthMutationTypes.SET_LOGIN_ADMIN_ERROR, true)
      setTimeout(() => {
        commit(AuthMutationTypes.SET_LOGIN_ADMIN_ERROR, false)
      }, 3000)
    }
  },
  async [AuthActionTypes.REGISTER_ADMIN]({commit}, formData: string[]): Promise<void> {
    try {
      const data: any = await registerAdmin(formData)
      commit(AuthMutationTypes.SET_MESSAGE, data.message)
      commit(AuthMutationTypes.SET_IS_REGISTER_ADMIN, true)
      setTimeout(async () => {
        commit(AuthMutationTypes.SET_IS_REGISTER_ADMIN, false)
        await router.push({ name: 'admin.login' })
      }, 2000)
    } catch (error) {
      commit(AuthMutationTypes.SET_MESSAGE, error.message)
      commit(AuthMutationTypes.SET_REGISTER_ADMIN_ERROR, true)
      setTimeout(() => {
        commit(AuthMutationTypes.SET_REGISTER_ADMIN_ERROR, false)
      }, 3000)
    }
  },
  async [AuthActionTypes.LOGOUT_ADMIN]({commit}): Promise<void> {
    commit(AuthMutationTypes.SET_USER_ADMIN, {})
    commit(AuthMutationTypes.SET_IS_LOGIN_ADMIN, false)
    localStorage.removeItem('admin_access_token', 'admin')
    await router.push({ name: 'admin.login' })
  }
}
