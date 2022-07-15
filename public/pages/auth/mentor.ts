import { InputmaskInterface, InputmaskOptions, HTMLElementWithValue } from '../../../resources/js/app';
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
nextAction?.addEventListener('click', (event:Event) => {
    const next = nextAction.dataset?.next;
    if (next && ['segments', 'interests', 'challenge', 'price', 'finish'].includes(next)) {
        switch (next) {
            case 'segments': 
            (new mdb.Tab(tabs.segments)).show();
            nextAction.setAttribute('data-next', 'interests');
            break;
            case 'interests': 
            (new mdb.Tab(tabs.interests)).show();
            nextAction.setAttribute('data-next', 'challenge');
            break;
            case 'challenge': 
            (new mdb.Tab(tabs.challenge)).show();
            nextAction.setAttribute('data-next', 'price');
            break;
            case 'price': 
            (new mdb.Tab(tabs.price)).show();
            nextAction.setAttribute('data-next', 'finish');
            break;
        }
    }
});

const birthdayInput:HTMLElementWithValue|null = document.getElementById('birthday');
const birthday = new Inputmask<InputmaskInterface>(birthdayInput, {
    inputMask: '99/99/9999',
    charPlaceholder: "-",
    maskPlaceholder: true,
    inputPlaceholder: false,
} as InputmaskOptions);
const firstName:HTMLElementWithValue|null = document.getElementById('first_name');
const lastName:HTMLElementWithValue|null = document.getElementById('last_name');
const email:HTMLElementWithValue|null = document.getElementById('email');
const whatsappInput:HTMLElementWithValue|null = document.getElementById('whatsapp');
const whatsapp = new Inputmask<InputmaskInterface>(whatsappInput, {
    inputMask: '(99) 99999-9999',
    charPlaceholder: '-',
    maskPlaceholder: true,
    inputPlaceholder: false,
} as InputmaskOptions);
firstName?.addEventListener('input', (event:Event) => {
    badge.fullName.children[0].innerHTML = firstName.value;
});
lastName?.addEventListener('input', (event:Event) => {
    badge.fullName.children[1].innerHTML = lastName.value;
});
email?.addEventListener('input', (event:Event) => {
    badge.email.children[1].innerHTML = email.value;
});