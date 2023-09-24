import {
  Store as VuexStore,
  DispatchOptions,
  CommitOptions,
  Module, Store,
} from 'vuex';

import {state} from './state';
import type {State} from './state';
import {actions, Actions} from './actions';
import {getters, Getters} from './getters';
import {mutations, Mutations} from './mutations';
import { InjectionKey } from "vue";
import { RootState } from '@/store';

export {State};

export type AuthStore<S = State> = Omit<VuexStore<S>, 'getters' | 'commit' | 'dispatch'> & {
  commit<K extends keyof Mutations, P extends Parameters<Mutations[K]>[1]>(
    key: K,
    payload: P,
    options?: CommitOptions
  ): ReturnType<Mutations[K]>;
} & {
  dispatch<K extends keyof Actions>(
    key: K,
    payload: Parameters<Actions[K]>[1],
    options?: DispatchOptions
  ): ReturnType<Actions[K]>;
} & {
  getters: {
    [K in keyof Getters]: ReturnType<Getters[K]>
  };
};

export const authKey: InjectionKey<Store<State>> = Symbol('auth')

export const store: Module<State, RootState> = {
  state,
  actions,
  getters,
  mutations,
  namespaced: true,
};

