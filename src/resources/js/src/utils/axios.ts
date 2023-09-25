import axios from "axios";

const END_POINT = 'http://localhost:8000/api/';

const headers = {
  Accept: "application/json",
  "Accept-Language": "*",
  "Content-Type": "application/json",
  "Access-Control-Allow-Origin": "*",
};

const instance = axios.create({
  baseURL: END_POINT,
  timeout: 1000,
  headers
});

instance.interceptors.request.use(
  (config) => {
    let tokenKey = 'access_token'
    const requestUrl: string = config.url

    if (requestUrl.includes('/admin/') && requestUrl) {
      tokenKey = 'admin_access_token'
    }
    const token = localStorage.getItem(tokenKey)
    if (token) {
      config.headers.common['Authorization'] = `Bearer ${token}`
    }

    return config
  }
)

instance.interceptors.response.use(
  function (response) {
    return response.data;
  },
  function (error) {
    return Promise.reject(error.response.data)
  }
)
export default instance;
