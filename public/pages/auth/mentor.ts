import { InputmaskInterface, InputmaskOptions, HTMLElementWithValue, SelectOptions, EventWithValue, baseURL } from '../../../resources/js/app';
import { slugify } from '../../assets/js/app';
import * as Inputmask from 'mdb-ui-kit/plugins/js/inputmask.min.js';
import * as mdb from 'mdb-ui-kit';
import api, { Error, interesses, LoadingMessage, segmentos, SwalUnprocessableContent } from '../../assets/js/functions';
import axios, { AxiosResponse } from 'axios';
import Swal from 'sweetalert2';

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
const segmentsInput:HTMLElementWithValue|null = document.getElementById('segments');
const segmentsChips:HTMLElementWithValue|null = document.getElementById('segmentsChips');
const segmentsChipsContainer:HTMLElementWithValue|null = document.querySelector(`div.showSegmentsChips`);
const InterestsContainer:HTMLElementWithValue|null = document.getElementById('InterestsContainer');
const challenge:HTMLElementWithValue|null = document.getElementById('challenge');
const solution:HTMLElementWithValue|null = document.getElementById('solution');
const free:HTMLElementWithValue|null = document.getElementById('free');
const paid:HTMLElementWithValue|null = document.getElementById('paid');
const price:HTMLElementWithValue|null = document.getElementById('price');
const pricePer:HTMLElementWithValue|null = document.getElementById('price_per');
const inPerson:HTMLElementWithValue|null = document.getElementById('in_person');
const address:HTMLElementWithValue|null = document.getElementById('location');
const password:HTMLElementWithValue|null = document.getElementById('password');
const passwordConfirm:HTMLElementWithValue|null = document.getElementById('password_confirmation');

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
            case 'finish': submitMentor(); break;
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
const segments = new mdb.Select(segmentsInput, {
    clearButton: true,
    filter: true,
    noResultText: 'Nenhum resultado encontrado',
    optionsSelectedLabel: 'segmentos selecionados',
    selectAll: true,
    selectAllLabel: 'Selecionar todos',
    searchPlaceholder: 'Buscar...',
    placeholder: 'Selecione',
    size: 'lg',
} as SelectOptions);
if (segmentsInput) {
    segmentos().then((response:AxiosResponse) => {
        if (response.status !== 200) {
            Swal.fire({
                icon: 'error',
                text: 'Não foi possível pegar os segmentos',
            }).then(result => {
                if (result.isConfirmed) {
                    location.reload();
                }
            });
        } else {
            if (response.data && response.data.segments) {
                const sgs:any = response.data.segments;
                if (sgs.length > 0 || Object.keys(sgs).length > 0) {
                    Object.keys(sgs as Object).forEach((slug:String) => {
                        const option = document.createElement('option');
                        option.value = `${slug}`;
                        option.innerHTML = `${sgs[`${slug}`]}`;
                        segmentsInput?.appendChild(option);
                    });
                }
            } else {
                Swal.fire({
                    icon: 'warning',
                    text: 'Nenhum segmento encontrado',
                }).then(result => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
            }
        }
    }).catch(error => {
    
    });
}

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

const addSegmentInterests = (value:String, text:String, selected:Boolean = false) => {
    const container = document.createElement('div');
    container.classList.add('smartmentor-select', 'mb-4', 'smartmentor-select-interests');
    container.setAttribute('data-value', `${value}`);
    container.setAttribute('data-text', `${text}`);
    container.setAttribute('data-selected', `${selected === true ? 'true' : 'false'}`);
    InterestsContainer?.appendChild(container);
    
    const select = document.createElement('select');
    select.setAttribute('multiple', '');
    select.name = `interests-${value}`;
    select.id = `interests-${value}`;
    container.appendChild(select);
    const selectinterests = new mdb.Select(select, {
        clearButton: true,
        filter: true,
        noResultText: 'Nenhum resultado encontrado',
        optionsSelectedLabel: 'interesses selecionados',
        selectAll: true,
        selectAllLabel: 'Selecionar todos',
        searchPlaceholder: 'Buscar...',
        placeholder: `Selecione as áreas de interesse do segmento ${text}`,
        size: 'lg',
    } as SelectOptions);
    interesses({ segmentSlug: `${value}` }).then((response:AxiosResponse) => {
        if (response.status === 200 && response.data.interests) {
            const interests:any = response.data.interests;
            if (interests.length > 0 || Object.keys(interests).length > 0) {
                Object.keys(interests as Object).forEach((slug:String) => {
                    const option = document.createElement('option');
                    option.value = `${slug}`;
                    option.innerHTML = `${interests[`${slug}`]}`;
                    select?.appendChild(option);
                });
            }
        }
    }).catch(error => {});

    const chips = document.createElement('div');
    chips.classList.add('chips', 'chips-placeholder', 'mt-2');
    chips.id = `interestsChips-${value}`;
    container.appendChild(chips);
    const chipsinput = new mdb.ChipsInput(chips, {
        parentSelector: `div.showInterestsChips-${value}`,
        labelText: `<i class='fa-solid fa-plus me-3'></i>Clique aqui para adicionar uma área de interesse no segmento ${text}`,
    });
    const query = document.querySelector(`div#InterestsContainer div.chips.chips-placeholder#interestsChips-${value} div.form-outline input.form-control`);
    query?.classList.add('form-control-lg');

    const chipsContainer = document.createElement('div');
    chipsContainer.classList.add(`showInterestsChips-${value}`, 'd-flex', 'align-items-center', 'flex-wrap');
    container.appendChild(chipsContainer);

    select.addEventListener('valueChange.mdb.select', (event:EventWithValue) => {
        const addChip = (v:String) => {
            if (document.querySelectorAll(`div.smartmentor-select-interests[data-value="${value}"] div.chip.btn[data-value="${v}"][data-selected="true"]`).length <= 0) {
                const chip = document.createElement('div');
                chip.classList.add('chip', 'btn');
                chip.setAttribute('data-value', `${v}`);
                chip.setAttribute('data-selected', 'true');
                chip.setAttribute('data-segment', `${value}`);
                const span = document.createElement('span');
                span.classList.add('text-chip');
                span.innerHTML = `${document.querySelector(`option[value="${v}"]`)?.innerHTML}`;
                chip.appendChild(span);
                chipsContainer?.appendChild(chip);
            }
        }

        document.querySelectorAll(`div.smartmentor-select-interests[data-value="${value}"] div.chip.btn[data-selected="true"]`).forEach(elem => {
            elem.remove();
        });
        if (event.value !== null) {
            event.value.forEach((v:String) => {
                addChip(v);
            });
        }
        runThroughChips();
    });

    const runThroughChips = () => {
        const chips:Array<String> = [];
        document.querySelectorAll(`div#InterestsContainer div.chip.btn`).forEach(elem => {
            const element:HTMLElementWithValue = elem as HTMLElementWithValue;
            const data = element.dataset;
            chips.push(`${(element.children[0] as HTMLElement).innerText}`);
        });
        badge.interests.children[1].innerHTML = `${chips.join(', ')}`;
    }

    chips.addEventListener('add.mdb.chips', (event:Event) => {
        document.querySelectorAll(`div.chip.btn`).forEach((elem) => {
            const element:HTMLElementWithValue = elem as HTMLElementWithValue;
            const data = element.dataset;
            if (!data.selected) {
                element.setAttribute('data-selected', 'false');
            }
    
            if (!data.value) {
                element.setAttribute('data-value', `${slugify(`${(element.children[0] as HTMLElement).innerText}`)}`);
            }

            if (!data.segment) {
                element.setAttribute('data-segment', `${value}`);
            }
        });
        runThroughChips();
    });
    chips.addEventListener('delete.mdb.chips', (event:Event) => {
        runThroughChips();
    });
}
const runThroughInterestsChips = (): void => {
    const chips:Array<String> = [];

    document.querySelectorAll('div.smartmentor-select.smartmentor-select-interests').forEach(elem => {
        elem.remove();
    });
    document.querySelectorAll(`div.showSegmentsChips div.chip.btn`).forEach(elem => {
        const element:HTMLElementWithValue = elem as HTMLElementWithValue;
        const data = element.dataset;
        addSegmentInterests(`${slugify(`${(element.children[0] as HTMLElement).innerText}`)}`, `${(element.children[0] as HTMLElement).innerText}`, data.selected === 'true' ? true : false);

        chips.push(`${(element.children[0] as HTMLElement).innerText}`);
    });
    badge.segments.children[1].innerHTML = `${chips.join(', ')}`;
}

segmentsInput?.addEventListener('valueChange.mdb.select', (event:EventWithValue) => {
    const addChip = (value:String) => {
        if (document.querySelectorAll(`div.chip.btn[data-value="${value}"][data-selected="true"]`).length <= 0) {
            const chip = document.createElement('div');
            chip.classList.add('chip', 'btn');
            chip.setAttribute('data-value', `${value}`);
            chip.setAttribute('data-selected', 'true');
            const span = document.createElement('span');
            span.classList.add('text-chip');
            span.innerHTML = `${document.querySelector(`option[value="${value}"]`)?.innerHTML}`;
            chip.appendChild(span);
            segmentsChipsContainer?.appendChild(chip);
        }
    }
    document.querySelectorAll('div.chip.btn[data-selected="true"]').forEach(elem => {
        elem.remove();
    });
    
    if (event.value !== null) {
        event.value.forEach((value:String) => {
            addChip(value);
        });
    }

    runThroughInterestsChips();
});

segmentsChips?.addEventListener('add.mdb.chips', (event:Event) => {
    document.querySelectorAll(`div.chip.btn`).forEach((elem) => {
        const element:HTMLElementWithValue = elem as HTMLElementWithValue;
        const data = element.dataset;
        if (!data.selected) {
            element.setAttribute('data-selected', 'false');
        }

        if (!data.value) {
            element.setAttribute('data-value', `${slugify(`${(element.children[0] as HTMLElement).innerText}`)}`);
        }
    });
    runThroughInterestsChips();
});

segmentsChips?.addEventListener('delete.mdb.chips', (event:Event) => {
    runThroughInterestsChips();
});

window.addEventListener('load', (event:Event) => {
    if (document.readyState === 'complete' || document.readyState === 'interactive') {
        const chipSegmentInput = document.querySelector(`div#segmentsChips div.form-outline input.form-control.chips-input`);
        if (chipSegmentInput) {
            chipSegmentInput.classList.add('form-control-lg');
            chipSegmentInput.id = `segmentsChipsInput`;
        }
    }
});

const submitMentor = async () => {
    type SEGMENT = {
        name: String,
        slug: String,
        interests: any,
    }
    const data = {
        firstName: firstName?.value,
        lastName: lastName?.value,
        email: email?.value,
        birthday: birthdayInput?.value,
        whatsapp: whatsappInput?.value,
        photo: (badge.photo.children[0].tagName === 'IMG') ? (badge.photo.children[0] as HTMLElementWithValue).src : null,
        segments: [] as Array<SEGMENT>,
        challenge: challenge?.value,
        solution: solution?.value,
        price: price?.value,
        pricePer: pricePer?.value,
        priceType: paid?.checked ? 'paid' : 'free',
        inPerson: inPerson?.checked ? true : false,
        address: address?.value,
        password: password?.value,
        password_confirmation: passwordConfirm?.value,
    }

    const segments = document.querySelectorAll(`div.smartmentor-select-interests`);
    segments.forEach(elm => {
        const elem:HTMLElementWithValue = elm as HTMLElementWithValue;
        const interests = {};

        document.querySelectorAll(`div.smartmentor-select-interests[data-value="${elem.dataset.value}"] div.showInterestsChips-${elem.dataset.value} div.chip.btn`).forEach(e => {
            const el:HTMLElementWithValue = e as HTMLElementWithValue;
            interests[`${el.dataset.value}`] = `${(el.children[0] as HTMLElementWithValue).innerText}`;
        });

        data.segments.push({
            name: `${elem.dataset.text}`,
            slug: `${elem.dataset.value}`,
            interests: interests,
        });
    });

    console.log(data);

    const submit = axios.create({
        baseURL: `${baseURL}`,
        timeout: 360000,
        headers: {
            'X-CSRF-TOKEN': `${document.getElementsByTagName('meta')['csrf-token'].content}`,
        },
    });
    
    submit.interceptors.response.use((response:AxiosResponse) => {
        return response;
    }, error => {
        return error.response;
    });
    
    LoadingMessage('Cadastrando...');

    const response = await submit.post(`/cadastrar/mentor`, data);
    
    if (response.status === 422) {
        SwalUnprocessableContent('Ocorreu um erro inesperado durante o cadastro.', response);
    } else if (response.status === 200) {
        Swal.fire({
            icon: 'success',
            title: `Cadastro realizado com sucesso!`,
            customClass: {
                confirmButton: `bg-smartmentor-dark-blue text-white`,
            }
        });
    } else {
        Error('Ocorreu um erro inesperado durante o cadastro.');
    }
}