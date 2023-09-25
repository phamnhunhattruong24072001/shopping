import {ActionContext, ActionTree} from 'vuex'
import {State} from './state'
import {RootState} from '@/store'
import {AuthActionTypes} from "./types"
import {loginAdmin} from "@/api/auth.service"
import {AuthMutationTypes} from "./types"
import {Mutations} from "./mutations"

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
      commit(AuthMutationTypes.SET_USER, data.user)
      commit(AuthMutationTypes.SET_LOGIN, true)
    } catch (error) {
      console.log(error)
    }
  }
}
