import { useI18n } from "vue-i18n";
import { ref } from "vue";
export default function () {
  const { locale } = useI18n();

  let languageUse = ref<string>(locale.value);
  const changeLanguage = () => {
    if (locale.value === "en") {
      locale.value = "vi";
      languageUse.value = "vi";
    } else {
      locale.value = "en";
      languageUse.value = "en";
    }
  };

  return { languageUse, changeLanguage };
}
