import { createStore } from "vuex";
import {
  store as auth,
  AuthStore,
  State as AuthState,
} from "@/store/modules/auth";
import { useStore as baseUseStore } from "vuex";

export type RootState = {
  auth: AuthState;
};

export type Store = AuthStore<Pick<RootState, "auth">>;
export const store = createStore({
  modules: {
    auth,
  },
});

export function customStore(namespaced: string): Store {
  return baseUseStore();
}
