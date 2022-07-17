import { InputmaskInterface, InputmaskOptions, HTMLElementWithValue } from '../../../resources/js/app';
import { slugify } from '../../assets/js/app';
import * as Inputmask from 'mdb-ui-kit/plugins/js/inputmask.min.js';
import * as mdb from 'mdb-ui-kit';

type badgeType = {
    photo: HTMLElement,
    fullName: HTMLElement,
    email: HTMLElement,
    segments: HTMLElement,
    interests: HTMLElement,
}

const badge:badgeType = {
    photo: document.getElementById('displayPhoto') as HTMLElement,
    fullName: document.getElementById('displayFullName') as HTMLElement,
    email: document.getElementById('displayEmail') as HTMLElement,
    segments: document.getElementById('displaySegments') as HTMLElement,
    interests: document.getElementById('displayInterests') as HTMLElement,
}
const tabs = {
    personalData: document.getElementById('tabs-personal-data') as HTMLElement,
    segments: document.getElementById('tabs-segments') as HTMLElement,
    interests: document.getElementById('tabs-interests') as HTMLElement,
    challenge: document.getElementById('tabs-challenge') as HTMLElement,
    price: document.getElementById('tabs-price') as HTMLElement,
}
const nextAction:HTMLElement|null = document.getElementById('nextAction');
const previousAction:HTMLElement|null = document.getElementById('previousAction');

const birthdayInput:HTMLElementWithValue|null = document.getElementById('birthday');
const firstName:HTMLElementWithValue|null = document.getElementById('first_name');
const lastName:HTMLElementWithValue|null = document.getElementById('last_name');
const email:HTMLElementWithValue|null = document.getElementById('email');
const whatsappInput:HTMLElementWithValue|null = document.getElementById('whatsapp');
const photo:HTMLElementWithValue|null = document.getElementById('photo');

const showTab = (elem:HTMLElement|null, called:String, next:String, prev:String): void => {
    nextAction?.setAttribute('data-next', `${next}`);
    previousAction?.setAttribute('data-previous', `${prev}`);

    if (!prev) {
        previousAction?.classList.add('d-none');
    } else {
        previousAction?.classList.remove('d-none');
    }

    if (called === 'price' && nextAction) {
        nextAction.innerHTML = 'Finalizar';
    } else if (nextAction) {
        nextAction.innerHTML = 'Próxima página';
    }

    (new mdb.Tab(elem)).show();
}
const whichTab = (tab:String|null): void => {
    if (tab && ['personalData', 'segments', 'interests', 'challenge', 'price', 'finish'].includes(`${tab}`)) {
        switch (tab) {
            case 'personalData': showTab(tabs.personalData, 'personalData', 'segments', ''); break;
            case 'segments': showTab(tabs.segments, 'segments', 'interests', 'personalData'); break;
            case 'interests': showTab(tabs.interests, 'interests', 'challenge', 'segments'); break;
            case 'challenge': showTab(tabs.challenge, 'challenge', 'price', 'interests'); break;
            case 'price': showTab(tabs.price, 'price', 'finish', 'challenge'); break;
            case 'finish': break;
            default: showTab(tabs.personalData, 'personalData', 'segments', '');
        }
    }
}

whichTab('personalData');

nextAction?.addEventListener('click', (event:Event) => {
    whichTab(`${nextAction.dataset?.next ? nextAction.dataset.next : ''}`);
});
previousAction?.addEventListener('click', (event:Event) => {
    whichTab(`${previousAction.dataset?.previous ? previousAction.dataset.previous : ''}`);
});

const birthday = new Inputmask(birthdayInput, {
    inputMask: '99/99/9999',
    charPlaceholder: "-",
    maskPlaceholder: true,
    inputPlaceholder: false,
} as InputmaskOptions);
const whatsapp = new Inputmask(whatsappInput, {
    inputMask: '(99) 99999-9999',
    charPlaceholder: '-',
    maskPlaceholder: true,
    inputPlaceholder: false,
} as InputmaskOptions);
firstName?.addEventListener('input', (event:Event) => {
    badge.fullName.children[0].innerHTML = firstName.value ? firstName.value : 'Nome';
});
lastName?.addEventListener('input', (event:Event) => {
    badge.fullName.children[1].innerHTML = lastName.value ? lastName.value : 'Sobrenome';
});
email?.addEventListener('input', (event:Event) => {
    badge.email.children[1].innerHTML = email.value;
});
photo?.addEventListener('change', (event:Event) => {
    if (photo.files && photo.files.length > 0) {
        const file = photo.files[0];
        const reader = new FileReader();

        reader.onload = (e:any) => {
            const base64 = `${e.target.result}`;
            badge.photo.innerHTML = `<img src="${base64}" style="width:6em;height:6em;" />`;
        }

        reader.readAsDataURL(file);
    } else {
        badge.photo.innerHTML = `<i class="fa-light fa-circle-user smartmentor-light-blue"></i>`;
    }
});
