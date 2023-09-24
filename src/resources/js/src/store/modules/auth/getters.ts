import { GetterTree } from 'vuex';
import { State } from './state';
import { RootState } from '@/store';

export type Getters = {
  user(state: State): Object;
}
export const getters: GetterTree<State, RootState> & Getters = {
  user: (state) => state.user,
};
