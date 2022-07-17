require('./bootstrap');

export type InputmaskOptions = {
    inputMask?: String,
    charPlaceholder?: String,
    maskPlaceholder?: Boolean,
    inputPlaceholder?: Boolean,
    clearIncomplete?: Boolean,
    customMask?: String,
    customValidator?: String,
}
export interface InputmaskInterface {
    element: HTMLElement,
    options: InputmaskOptions,
}

export interface HTMLElementWithValue extends HTMLElement {
    value?: any,
    files?: FileList,
}