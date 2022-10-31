import axios, {AxiosInstance} from 'axios';

const api: AxiosInstance = axios.create({
    baseURL: "http://localhost/api/"
})

export default api;