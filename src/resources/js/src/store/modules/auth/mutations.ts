import {MutationTree} from 'vuex'
import {State} from './state'
import {AuthMutationTypes} from "./types"

export type Mutations<S = State> = {
  [AuthMutationTypes.SET_USER_ADMIN](state: S, payload: string[]): void
  [AuthMutationTypes.SET_IS_LOGIN_ADMIN](state: S, payload: boolean): boolean
}

export const mutations: MutationTree<State> = {
  [AuthMutationTypes.SET_USER_ADMIN](state: State, payload) {
    state.adminUser = payload
    localStorage.setItem('admin', JSON.stringify(payload))
  },
  [AuthMutationTypes.SET_IS_LOGIN_ADMIN](state: State, payload) {
    state.isLoginInAdmin = payload
  },
}
