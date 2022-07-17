<div class="d-flex flex-md-row flex-column align-items-center justify-content-center justify-content-md-start">
    <div class="tab-number me-md-3 mb-md-0 mb-2">2</div>
    <h6 class="smartmentor-dark-blue mb-0">
        Selecione os segmentos que mais estão relacionados com sua área de atuação:
    </h6>
</div>

<div class="my-md-5 my-2">
    <div class="row mx-0 px-0">
        <div class="col-md-10 col-sm-10 col-12">
            {{-- <div class="dropdown smartmentor-dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-mdb-toggle="dropdown" aria-expanded="false">
                    Selecione
                </button>
                <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton">
                    @foreach ($segments as $slug => $name)
                        <li class="dropdown-item">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="{{ $slug }}" id="checkbox-segments-{{$slug}}" />
                                <label class="form-check-label w-100" for="checkbox-segments-{{$slug}}">{{ $name }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div> --}}
            <div class="smartmentor-select">
                <select class="select" multiple data-mdb-clear-button="true" data-mdb-filter="true" data-mdb-no-result-text="Nenhum resultado" data-mdb-options-selected-label="segmentos selecionados" data-mdb-select-all-label="Selecionar todos" data-mdb-search-placeholder="Buscar..." data-mdb-placeholder="Selecione" data-mdb-size="lg">
                    @foreach ($segments as $slug => $name)
                        <option value="{{ $slug }}">{{ $name }}</option>
                    @endforeach
                </select>
                <div class="select-custom-content">
                    <div class="chip" data-mdb-close="true">Text</div>
                    <div class="chips chips-placeholder" data-mdb-close="true"></div>
                    <div class="chips chips-initial" data-mdb-close="true"></div>
                </div>
            </div>
        </div>
    </div>
</div>