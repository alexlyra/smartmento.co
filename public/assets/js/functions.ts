import axios, { AxiosResponse } from 'axios';

const api = axios.create({
    baseURL: `${location.origin}/api`,
    timeout: 360000,
    headers: {
        'X-CSRF-TOKEN': `${document.getElementsByTagName('meta')['csrf-token'].content}`,
    },
});

api.interceptors.response.use((response:AxiosResponse) => {
    return response;
}, error => {
    return error.response;
});

export default api;

export const segmentos = async () => {
    return api.get('/segmentos');
}

export const interesses = async (data:any = null) => {
    return api.get('/interesses', {
        params: data,
    });
}