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
export interface EventWithValue extends Event {
    value?: any,
    files?: FileList,
}

export type SelectOptions = {
    autoSelect?:Boolean,
    container?:String,
    clearButton?:Boolean,
    disabled?:Boolean,
    displayedLabels?:Number,
    filter?:Boolean,
    filterDebounce?:Number,
    formWhite?:Boolean,
    invalidFeedback?:String,
    noResultText?:String,
    placeholder?:String,
    size?:'default'|'sm'|'lg',
    optionsSelectedLabel?:String,
    optionHeight?:Number,
    selectAll?:Boolean,
    selectAllLabel?:String,
    searchPlaceholder?:String,
    validation?:Boolean,
    validFeedback?:String,
    visibleOptions?:Number,
}

export const baseURL:String = `${location.origin}/test`;