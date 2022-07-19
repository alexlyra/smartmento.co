import axios, { AxiosResponse } from 'axios';
import Swal from "sweetalert2";
import { baseURL } from '../../../resources/js/app';

const api = axios.create({
    baseURL: `${baseURL}/api`,
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

export const Error = (message:String, isHTML:Boolean = false, title:String = 'Aviso') => {
    Swal.close();
    if (isHTML) {
        return Swal.fire({
            icon: 'error',
            title: `${title}`,
            html: `${message}`,
            customClass: {
                confirmButton: `bg-smartmentor-dark-blue text-white`,
            }
        });
    } else {
        return Swal.fire({
            icon: 'error',
            title: `${title}`,
            text: `${message}`,
            customClass: {
                confirmButton: `bg-smartmentor-dark-blue text-white`,
            }
        });
    }
}

export const LoadingMessage = (message:String) => {
    Swal.close();
    return Swal.fire({
        icon: 'info',
        iconHtml: `<i class="fa-regular fa-spinner fa-spin"></i>`,
        title: 'Aguarde',
        text: `${message}`,
        customClass: {
            icon: 'p-2',
        },
        allowOutsideClick: false,
        showCancelButton: false,
        showConfirmButton: false,
    });
}

export const SwalUnprocessableContent = (defaultMessage:String, response:any) => {
    if (response.data) {
        if (response.data.errors) {
            const errors:any = response.data.errors;

            if (Object.keys(errors).length > 0) {
                const ers:String[] = [];
                Object.keys(errors).forEach((parameter:String) => {
                    const paramErrors:String[] = errors[`${parameter}`];
                    paramErrors.forEach((error:String) =>  {
                        ers.push(error);
                    });
                });

                if (ers.length > 0) {
                    return Error(`${ers.join('<br/>')}`, true);
                } else {
                    return Error(`${defaultMessage}`);
                }
            } else {
                return Error(`${defaultMessage}`);
            }
        } else {
            return Error(`${defaultMessage}`);
        }
    } else {
        return Error(`${defaultMessage}`);
    }
}