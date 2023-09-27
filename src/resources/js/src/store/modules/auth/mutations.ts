import {MutationTree} from 'vuex'
import {State} from './state'
import {AuthMutationTypes} from "./types"

export type Mutations<S = State> = {
  [AuthMutationTypes.SET_USER_ADMIN](state: S, payload: string[]): void
  [AuthMutationTypes.SET_IS_LOGIN_ADMIN](state: S, payload: boolean): boolean
  [AuthMutationTypes.SET_IS_REGISTER_ADMIN](state: S, payload: boolean): boolean
  [AuthMutationTypes.SET_REGISTER_ADMIN_ERROR](state: S, payload: boolean): boolean
  [AuthMutationTypes.SET_LOGIN_ADMIN_ERROR](state: S, payload: boolean): boolean
  [AuthMutationTypes.SET_LOGIN_ADMIN_ERROR](state: S, payload: string): string
}

export const mutations: MutationTree<State> = {
  [AuthMutationTypes.SET_USER_ADMIN](state: State, payload) {
    state.adminUser = payload
    localStorage.setItem('admin', JSON.stringify(payload))
  },
  [AuthMutationTypes.SET_IS_LOGIN_ADMIN](state: State, payload) {
    state.isLoginInAdmin = payload
  },
  [AuthMutationTypes.SET_IS_REGISTER_ADMIN](state: State, payload) {
    state.isRegisterInAdmin = payload
  },
  [AuthMutationTypes.SET_REGISTER_ADMIN_ERROR](state: State, payload) {
    state.isRegisterAdminError = payload
  },
  [AuthMutationTypes.SET_LOGIN_ADMIN_ERROR](state: State, payload) {
    state.isLoginAdminError = payload
  },
  [AuthMutationTypes.SET_MESSAGE](state: State, payload) {
    state.authMessage = payload
  },
}
