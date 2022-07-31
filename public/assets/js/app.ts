import Swal from "sweetalert2";

export const slugify = (str:String): String => {
    const from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;"
    const to = "aaaaaeeeeeiiiiooooouuuunc------";
    const convert = (letter:String): number|null => {
        letter = letter.toLowerCase();
        let pos:number|null = null;
        from.split('').forEach((compare:String, index:number) => {
            if (compare === letter) {
                pos = index;
            }
        });
        return pos;
    }
    const convertCustom = (strings:String): String => {
        const custom = ['#', '+'];
        const conv = ['sharpe', 'plus'];
        custom.forEach((c:String, index:number) => {
            strings = strings.replaceAll(`${c}`, conv[index]);
        });
        return strings;
    }

    const newText = convertCustom(str).split('').map((letter, i) => {
        const pos = convert(letter);
        if (pos !== null) {
            return letter.toLowerCase().replace(new RegExp(from.charAt(pos), 'g'), to.charAt(pos));
        } else {
            return letter.toLowerCase();
        }
    });

    return newText
    .toString()                     // Cast to string
    .toLowerCase()                  // Convert the string to lowercase letters
    .trim()                         // Remove whitespace from both sides of a string
    .replace(/\s+/g, '-')           // Replace spaces with -
    .replace(/&/g, '-y-')           // Replace & with 'and'
    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
    .replace(/\-\-+/g, '-');        // Replace multiple - with single -
}

export const UserPending = (event:Event, button:HTMLElement) => {
    Swal.fire({
        icon: 'info',
        text: 'Usuário está pendente de aprovação em nosso sistema, você irá receber um e-mail avisando assim que seu perfil for aprovado!',
        customClass: {
            confirmButton: 'smartmentor-btn smartmentor-btn-dark-pink',
            icon: 'smartmentor-dark-blue border-smartmentor-dark-blue',
        },
    });
}

document.querySelectorAll(`[data-user="pending"]`).forEach(elem => {
    elem.addEventListener('click', event => {
        UserPending(event, elem as HTMLElement);
    });
});