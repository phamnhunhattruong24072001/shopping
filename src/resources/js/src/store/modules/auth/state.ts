export type State = {
  adminUser: Object,
  isLoginInAdmin: boolean,
  isRegisterAdminError: boolean,
}

export const state: State = {
  adminUser: {},
  isLoginInAdmin: false,
  isRegisterAdminError: false,
}
