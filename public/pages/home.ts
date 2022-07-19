import Swal from "sweetalert2";
import { baseURL } from '../../resources/js/app';

const mentorBtn = document.querySelectorAll('button.mentorBtn');

mentorBtn.forEach((btn) => {
    btn.addEventListener('click', event => {
        if ((btn as HTMLElement).dataset.action) {
            if ((btn as HTMLElement).dataset.action === 'login') {
                Swal.fire({
                    icon: 'info',
                    iconHtml: `<i class="fa-light fa-triangle-person-digging p-2"></i>`,
                    title: 'Em breve disponível',
                    customClass: {
                        confirmButton: 'bg-smartmentor-dark-blue rounded-9',
                        icon: 'border-smartmentor-dark-blue p-2',
                    },
                    confirmButtonText: 'Fechar',
                });
            } else if ((btn as HTMLElement).dataset.action === 'register') {
                window.location.href = `${baseURL}/cadastrar/mentor`;
            }
        }
    });
});

const ChallengeToday = document.getElementById('ChallengeToday');
ChallengeToday?.addEventListener('click', (event:Event) => {
    event.preventDefault();
    Swal.fire({
        icon: 'info',
        iconHtml: `<i class="fa-light fa-triangle-person-digging p-2"></i>`,
        title: 'Em breve disponível',
        customClass: {
            confirmButton: 'bg-smartmentor-dark-blue rounded-9',
            icon: 'border-smartmentor-dark-blue p-2',
        },
        confirmButtonText: 'Fechar',
    });
});