import axiosInstance from "@/App/Http/AxiosInstance";

export default async function RegisterUser({ value }) {
    const result = await axiosInstance.post('api/auth/register', {
        name: value.name,
        email: value.email,
        password: value.password,
    });

    console.log(result);
}
