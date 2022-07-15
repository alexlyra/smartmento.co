const mentorBtn = document.querySelectorAll('button.mentorBtn');

mentorBtn.forEach((btn) => {
    btn.addEventListener('click', event => {
        if ((btn as HTMLElement).dataset.action) {
            if ((btn as HTMLElement).dataset.action === 'login') {

            } else if ((btn as HTMLElement).dataset.action === 'register') {
                window.location.href = '/cadastrar/mentor';
            }
        }
    });
});