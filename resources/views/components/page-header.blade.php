@props(['pageTitle', 'link1Url', 'link1Name', 'link2Url', 'link2Name'])

<div class="page-header">
    <h4 class="page-title">{{ $pageTitle }}</h4>
    <ul class="breadcrumbs">
        <li class="nav-home">
            <a href="{{ route('dashboard') }}">
                <i class="flaticon-home"></i>
            </a>
        </li>
        <li class="separator">
            <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
            <a href="{{ url($link1Url) }}">{{ $link1Name }}</a>
        </li>
        @if ($link2Url != '')
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{ url($link2Url) }}">{{ $link2Name }}</a>
            </li>
        @endif
    </ul>
</div>
