import axiosService from "@/utils/axios"

const login = async ({params}: { params: any }) => {
  return await axiosService.post('/admin/login', params)
}

export { login }
