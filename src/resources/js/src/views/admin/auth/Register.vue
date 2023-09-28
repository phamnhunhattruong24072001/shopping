<script setup lang="ts">
import { computed } from "vue";
import github from "@/assets/img/github.svg";
import google from "@/assets/img/google.svg";
import { useStore } from "vuex";
import { AuthActionDispatchTypes as AuthActionTypes } from "@/store/modules/auth/types";
import { schemaRegisterAdmin } from "@/validations";
import { useForm } from "vee-validate";
import { AuthFormRegisterAdmin } from "@/@types";

const store = useStore();

const { handleSubmit } = useForm<AuthFormRegisterAdmin>(schemaRegisterAdmin);

const stateAuth = computed(() => {
  return store.state.auth;
});

const submitFormRegister = handleSubmit((values) => {
  store.dispatch(AuthActionTypes.REGISTER_ADMIN, values);
});
</script>

<template>
  <div class="container mx-auto px-4 h-full">
    <div class="flex content-center items-center justify-center h-full">
      <div class="w-full lg:w-6/12 px-4">
        <div
          class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-200 border-0"
        >
          <div
            class="bg-red-400 p-4 text-center text-gray-50"
            v-show="stateAuth.isRegisterAdminError"
          >
            {{ stateAuth.authMessage }}
          </div>
          <div
            class="bg-green-400 p-4 text-center text-gray-50"
            v-show="stateAuth.isRegisterInAdmin"
          >
            {{ stateAuth.authMessage }}
          </div>
          <div class="rounded-t mb-0 px-6 py-6">
            <div class="text-center mb-3">
              <h6 class="text-blueGray-500 text-sm font-bold">Sign up with</h6>
            </div>
            <div class="btn-wrapper text-center">
              <ShButton
                classes="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-2 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                type="button"
              >
                <template v-slot:icon>
                  <img alt="..." class="w-5 mr-1" :src="github" />
                </template>
                Github
              </ShButton>
              <ShButton
                classes="bg-white active:bg-blueGray-50 text-blueGray-700 font-normal px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 uppercase shadow hover:shadow-md inline-flex items-center font-bold text-xs ease-linear transition-all duration-150"
                type="button"
              >
                <template v-slot:icon>
                  <img alt="..." class="w-5 mr-1" :src="google" />
                </template>
                Google
              </ShButton>
            </div>
            <hr class="mt-6 border-b-1 border-blueGray-300" />
          </div>
          <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
            <div class="text-blueGray-400 text-center mb-3 font-bold">
              <small>Or sign up with credentials</small>
            </div>
            <form @submit.prevent="submitFormRegister">
              <div class="relative w-full mb-3">
                <ShInput
                  type="text"
                  name="name"
                  classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                  placeholder="Name"
                  label="Name"
                />
              </div>

              <div class="relative w-full mb-3">
                <ShInput
                  type="text"
                  name="username"
                  classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                  placeholder="Username"
                  label="Username"
                />
              </div>

              <div class="relative w-full mb-3">
                <ShInput
                  type="email"
                  name="email"
                  classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                  placeholder="Email"
                  label="Email"
                />
              </div>

              <div class="relative w-full mb-3">
                <ShInput
                  type="password"
                  name="password"
                  classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                  placeholder="Password"
                  label="Password"
                />
              </div>

              <div class="relative w-full mb-3">
                <ShInput
                  type="password"
                  name="password_confirm"
                  classes="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                  placeholder="Password Confirm"
                  label="Password Confirm"
                />
              </div>

              <div>
                <label class="inline-flex items-center cursor-pointer">
                  <ShInput
                    id="customCheckLogin"
                    type="checkbox"
                    name="customCheckLogin"
                    classes="form-checkbox border-0 rounded text-blueGray-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                  />
                  <span class="ml-2 text-sm font-semibold text-blueGray-600">
                    I agree with the
                    <a href="javascript:void(0)" class="text-emerald-500">
                      Privacy Policy
                    </a>
                  </span>
                </label>
              </div>

              <div class="text-center mt-6">
                <ShButton
                  classes="bg-blueGray-800 text-white active:bg-blueGray-600 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150"
                  type="submit"
                >
                  Create Account
                </ShButton>
              </div>
            </form>
          </div>
        </div>
        <div class="flex flex-wrap mt-6 relative">
          <div class="w-1/2"></div>
          <div class="w-1/2 text-right">
            <router-link
              :to="{ name: 'admin.login' }"
              class="text-blueGray-200"
            >
              <small>Login now</small>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
