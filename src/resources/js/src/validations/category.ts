import * as yup from "yup";

export const schemaCategory = {
  validationSchema: yup.object({
    name: yup.string().required(),
    slug: yup.string().required(),
    image: yup.string().required(),
    desc: yup.string(),
    parent_id: yup.string().required().label("Category"),
  }),
};
