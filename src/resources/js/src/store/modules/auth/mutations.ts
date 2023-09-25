import {MutationTree} from 'vuex'
import {State} from './state'
import {AuthMutationTypes} from "./types"

export type Mutations<S = State> = {
  [AuthMutationTypes.SET_USER](state: S, payload: []): void
  [AuthMutationTypes.SET_LOGIN](state: S, payload: boolean): boolean
}

export const mutations: MutationTree<State> = {
  [AuthMutationTypes.SET_USER](state: State, user) {
    state.user = user
  },
  [AuthMutationTypes.SET_LOGIN](state: State, isLoginIn) {
    state.isLoginIn = isLoginIn
  },
}
