import Swal from "sweetalert2";

const DATA = document.querySelector('json');
const errors:Array<String> = DATA ? JSON.parse(`${DATA.getAttribute('errors')}`) : JSON.parse('[]');

if (errors.length > 0) {
    Swal.fire({
        icon: 'error',
        title: 'Aviso',
        html: `
            ${errors.map(error => `<span class="text-danger d-block">${error}</span>`).join('')}
        `,
        customClass: {
            confirmButton: 'smartmentor-btn smartmentor-btn-dark-pink',
        },
    });
}