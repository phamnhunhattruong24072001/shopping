import {ActionContext, ActionTree} from 'vuex'
import {State} from './state'
import {RootState} from '@/store'
import {AuthActionTypes} from "./types"
import {loginAdmin} from "@/api/auth.service"
import {AuthMutationTypes} from "./types"
import {Mutations} from "./mutations"
import router from '@/router';

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
  async [AuthActionTypes.LOGIN_ADMIN]({commit}, formData: object) {
    try {
      const data = await loginAdmin(formData)
      commit(AuthMutationTypes.SET_USER_ADMIN, data.user)
      commit(AuthMutationTypes.SET_IS_LOGIN_ADMIN, true)
      localStorage.setItem('admin_access_token', data.token)
      await router.push({ name: 'admin.dashboard' })
    } catch (error) {
      console.log(error)
    }
  },
  [AuthActionTypes.LOGOUT_ADMIN]({commit}) {
    commit(AuthMutationTypes.SET_USER_ADMIN, {})
    commit(AuthMutationTypes.SET_IS_LOGIN_ADMIN, false)
    localStorage.removeItem('admin_access_token')
    localStorage.removeItem('admin')
    router.push({ name: 'admin.login' })
  }
}
