import {GetterTree} from 'vuex'
import {State} from './state'
import {RootState} from '@/store'
import type {UserAuth} from "@/@types"

export type Getters = {
  adminUser(state: State): UserAuth
  isLoginInAdmin(state: State): Boolean
}
export const getters: GetterTree<State, RootState> & Getters = {
  adminUser: (state) => state.adminUser,
  isLoginInAdmin: (state) => state.isLoginInAdmin,
}
