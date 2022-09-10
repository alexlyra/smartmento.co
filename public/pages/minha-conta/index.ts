import Swal from "sweetalert2";

const container = document.getElementById('myAccountContainer');

if (container && container.dataset && container.dataset.userStatus && container.dataset.userStatus === 'pending') {
    Swal.fire({
        iconHtml: '<i class="fa-light fa-clock-rotate-left smartmentor-dark-blue"></i>',
        iconColor: 'var(--smartmentor-dark-blue)',
        title: 'Aviso',
        text: 'Sua conta ainda está pendente de análise!!!',
        customClass: {
            confirmButton: 'smartmentor-btn smartmentor-btn-dark-pink',
        },
    });
}