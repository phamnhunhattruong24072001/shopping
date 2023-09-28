export interface State {
  adminUser: Object;
  isLoginInAdmin: boolean;
  isRegisterInAdmin: boolean;
  isRegisterAdminError: boolean;
  isLoginAdminError: boolean;
  authMessage: string;
}

export const state: State = {
  adminUser: {},
  isLoginInAdmin: false,
  isRegisterInAdmin: false,
  isRegisterAdminError: false,
  isLoginAdminError: false,
  authMessage: "",
};
