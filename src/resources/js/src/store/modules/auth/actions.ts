import { ActionTree } from 'vuex'
import { State } from './state';
import { RootState } from '@/store';
export interface Actions {
  login(): void;
}
export const actions: ActionTree<State, RootState> & Actions= {
  async login() {
    return 1
  }
}
