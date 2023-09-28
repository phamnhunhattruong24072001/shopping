import * as yup from "yup";

export const schemaRegisterAdmin = {
  validationSchema: yup.object({
    name: yup.string().required("Name is required"),
    username: yup.string().required("Username is required"),
    email: yup.string().required("Email is required").email(),
    password: yup.string().required("Password is required").min(8).max(12),
    password_confirm: yup
      .string()
      .required("Password confirm is required")
      .min(8)
      .max(12)
      .oneOf([yup.ref("password")], "Passwords do not match"),
  }),
};

export const schemaLoginAdmin = {
  validationSchema: yup.object({
    email: yup.string().required("Email is required").email(),
    password: yup.string().required("Password is required").min(8).max(12),
  }),
};
