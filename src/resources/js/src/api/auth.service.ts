import axiosService from "@/utils/axios"

export const loginAdmin = async (params: object) => {
  return await axiosService.post('/admin/login', params)
}
