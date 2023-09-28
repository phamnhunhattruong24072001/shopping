export type UserAuth = { [key: string]: string };
export interface AuthFormLoginAdmin {
  email: string;
  password: string;
}

export interface AuthFormRegisterAdmin {
  name: string;
  username: string;
  email: string;
  password: string;
  password_confirm: string;
}
