import { InjectionKey } from 'vue'
import { createStore, Store } from 'vuex'
import auth from './modules/auth';

const store = createStore({
  modules: {
    auth,
  }
});
export default store;
