import {GetterTree} from 'vuex'
import {State} from './state'
import {RootState} from '@/store'
import type {UserAuth} from "@/@types"

export type Getters = {
  user(state: State): UserAuth
  isLoginIn(state: State): Boolean
}
export const getters: GetterTree<State, RootState> & Getters = {
  user: (state) => state.user,
  isLoginIn: (state) => state.isLoginIn,
}
