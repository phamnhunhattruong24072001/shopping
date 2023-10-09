import * as yup from "yup";

export const schemaCategory = {
  validationSchema: yup.object().shape({
    name: yup.string().required(),
    slug: yup.string().required(),
    image: yup.string().required(),
    desc: yup.string(),
    attributes: yup.array().of(
      yup.object({
        name: yup.string().required().label("Attribute"),
        attr: yup.array().of(
          yup.object({
            name: yup
              .string()
              .required()
              .label("Attribute name child")
              .test(
                "is-unique",
                "Attribute name child must be unique",
                function (value) {
                  if (Array.isArray(this.parent.attr)) {
                    return !this.parent.attr.some(
                      (attr) => attr.name === value,
                    );
                  }
                  return true;
                },
              ),
            slug: yup
              .string()
              .required()
              .label("Attribute slug child")
              .test(
                "is-unique",
                "Attribute slug child must be unique",
                function (value) {
                  console.log(this);
                  if (Array.isArray(this.parent.attr)) {
                    return !this.parent.attr.some(
                      (attr) => attr.slug === value,
                    );
                  }
                  return true;
                },
              ),
          }),
        ),
      }),
    ),
  }),
};

yup.addMethod(yup.array, "unique", function (message, mapper = (a) => a) {
  return this.test("unique", message, function (list) {
    const uniqueSet = new Set(list.map(mapper));
    if (uniqueSet.size !== list.length) {
      throw this.createError({
        path: this.path,
        message: message,
      });
    }
    return true;
  });
});
