<li class="list-group-item padder-v admin-element-item {{$class ?? ''}}">
    <a href="{{$route}}" class="d-block padder">
        @isset($badge)
            <b class="badge bg-{{$badge['class']}} pull-right">{{$badge['data']()}}</b>
        @endisset
        <span class="text-muted  pull-right m-t-sm text-lg">  {!! \Orchid\Support\Facades\Dashboard::icon($icon) !!}</span>
        <div class="clear">
            <div>{{ __($label) }}</div>
            <small class="text-muted">{{ __($title ?? '') }}</small>
        </div>
    </a>
</li>
