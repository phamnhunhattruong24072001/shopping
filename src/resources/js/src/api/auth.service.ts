import axiosService from "@/utils/axios"

const loginAdmin = async ({params}: { params: any }) => {
  return await axiosService.post('/admin/login', params)
}

export { loginAdmin }
