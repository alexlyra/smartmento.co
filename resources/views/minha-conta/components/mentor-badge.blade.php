<div class="mentor-badge">
    <div class="badge-holder"></div>
    <div id="displayPhoto">
        @if (auth()->user()->photo)
            <img src="{{ auth()->user()->photo }}" style="width:6em;height:6em;" />
        @else
            <i class="fa-light fa-circle-user smartmentor-light-blue"></i>
        @endif

        <i class="{{ auth()->user()->status_icon }} status-icon" data-mdb-toggle="tooltip" title="{{ auth()->user()->status_label }}"></i>
    </div>

    <div class="user-informations">
        <div id="displayFullName" class="font-weight-bold mt-3">
            <span>{{ auth()->user()->first_name }}</span> <span>{{ auth()->user()->last_name }}</span>
        </div>
        <div id="displayEmailContainer" class="d-flex flex-column justify-content-center">
            <div id="displayEmail" class="d-flex justify-content-between">
                <small class="font-weight-bold">Email:</small>
                <small>{{ auth()->user()->email }}</small>
            </div>
        </div>
        <div id="displaySegmentsContainer" class="d-flex flex-column justify-content-center">
            <div id="displaySegments" class="d-flex justify-content-between">
                <small class="font-weight-bold">Whatsapp:</small>
                <small>@if(auth()->user()->mobile) {{ auth()->user()->mobile }} @else não informado @endif</small>
            </div>
        </div>
        <div id="displayInterestsContainer" class="d-flex flex-column justify-content-center">
            <div id="displayInterests" class="d-flex justify-content-between">
                <small class="font-weight-bold">Aniversário:</small>
                <small>@if(auth()->user()->birthday) {{ auth()->user()->birthday }} @else não informado @endif</small>
            </div>
        </div>
    </div>
</div>