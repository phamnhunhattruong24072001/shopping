import { MutationTree } from 'vuex'
import { State } from './state';

export type Mutations<S = State> = {
  SET_DATA(state: S, payload: []): void;
}

export const mutations: MutationTree<State> = {
  SET_DATA(state: State, user) {
    state.user = user
  },
}
