import axiosInstance from "@/App/Http/AxiosInstance";

export async function LoginUser({value}) {
    const {email, password} = value;
    const result = await axiosInstance.post('api/auth/login', {
        email, password
    });

    console.log(result.data)
}
