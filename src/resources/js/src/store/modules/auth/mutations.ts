export default {
  setUser(state, user) {
    state.user = user;
  },
  setLoggingIn(state, isLoggingIn) {
    state.isLoggingIn = isLoggingIn;
  },
  setLoggingError(state, error) {
    state.loginError = error;
  },
  setRegisterError(state, error) {
    state.registerError = error;
  }
}
