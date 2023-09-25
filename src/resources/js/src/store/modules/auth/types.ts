const auth = 'auth/'

export enum AuthActionTypes {
  LOGIN_ADMIN = 'LOGIN_ADMIN',
  REGISTER_ADMIN = 'REGISTER_ADMIN',
  LOGOUT_ADMIN = 'LOGOUT_ADMIN',
}

export enum AuthActionDispatchTypes {
  LOGIN_ADMIN = auth + 'LOGIN_ADMIN',
  REGISTER_ADMIN = auth + 'REGISTER_ADMIN',
  LOGOUT_ADMIN = auth + 'LOGOUT_ADMIN',
}

export enum AuthMutationTypes {
  SET_USER = 'SET_USER',
  SET_LOGIN = 'SET_LOGIN',
}
