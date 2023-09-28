import axiosService from "@/utils/axios";

export const loginAdmin = async (params: object): Promise<any> => {
  return await axiosService.post("/admin/login", params);
};

export const registerAdmin = async (params: object): Promise<any> => {
  return await axiosService.post("/admin/register", params);
};
