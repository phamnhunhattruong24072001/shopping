import * as yup from "yup";

export const schemaCategory = {
  validationSchema: yup.object().shape({
    name: yup.string().required(),
    slug: yup.string().required(),
    image: yup.string().required(),
    desc: yup.string(),
    attributes: yup.array().of(
      yup.object({
        name: yup
          .string()
          .required()
          .test(
            "is-unique",
            "Attribute name child must be unique",
            function (value) {
              const attributes = this.from[1].value.attributes;
              if (Array.isArray(attributes)) {
                return (
                  !attributes.some((attr) => attr.name === value) ||
                  attributes.filter((attr) => attr.name === value).length === 1
                );
              }
              return true;
            },
          )
          .label("Attribute"),
        attr: yup.array().of(
          yup.object({
            name: yup
              .string()
              .required()
              .test(
                "is-unique",
                "Attribute name child must be unique",
                function (value) {
                  const attributes = this.from[2].value.attributes;
                  return checkUniqueChildAttribute(attributes, value, "name");
                },
              )
              .label("Attribute name child"),
            slug: yup
              .string()
              .required()
              .test(
                "is-unique",
                "Attribute slug child must be unique",
                function (value) {
                  const attributes = this.from[2].value.attributes;
                  return checkUniqueChildAttribute(attributes, value, "slug");
                },
              )
              .label("Attribute slug child"),
          }),
        ),
      }),
    ),
  }),
};

const checkUniqueChildAttribute = (data, value, name_attr) => {
  if (Array.isArray(data)) {
    let child_attrs = [];
    data.forEach((item) => {
      item.attr.forEach((child) => {
        child_attrs.push(child[name_attr]);
      });
    });
    return (
      !child_attrs.some((attr) => attr === value) ||
      child_attrs.filter((attr) => attr === value).length === 1
    );
  }
  return true;
};
