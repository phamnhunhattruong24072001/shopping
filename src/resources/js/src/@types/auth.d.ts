export type UserAuth = { [key: string]: string }
export interface AuthFormLoginAdmin {
  email: string;
  password: string;
}

export interface AuthFormRegisterAdmin {
  first_name: string,
  last_name: string,
  username: string,
  email: string,
  password: string,
  password_confirm: string,
}
