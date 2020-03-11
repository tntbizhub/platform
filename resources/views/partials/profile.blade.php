<div class="wrapper v-center">
    <div class="dropdown col no-padder">
        <a href="#" class="nav-link p-0 v-center" data-toggle="dropdown">
                    <span class="thumb-sm avatar mr-3">
                        <img src="{{Auth::user()->presenter()->image()}}" class="b b-dark bg-light">
                    </span>
            <span style="width:11em;font-size: 0.85em;">
                <span class="text-ellipsis">{{Auth::user()->presenter()->title()}}</span>
                <span class="text-muted d-block text-ellipsis">{{Auth::user()->presenter()->subTitle()}}</span>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow bg-white">

            {!! Dashboard::menu()->render('Profile','platform::partials.dropdownMenu') !!}

            @if(Dashboard::menu()->container->where('location','Profile')->isNotEmpty())
                <div class="dropdown-divider"></div>
            @endif

            @if(Auth::user()->hasAccess('platform.systems.index'))
                <a href="{{ route('platform.systems.index') }}" class="dropdown-item">
                    {!! \Orchid\Support\Facades\Dashboard::icon('settings') !!}
                    <span>{{ __('Systems') }}</span>
                </a>
            @endif

            @if(\Orchid\Access\UserSwitch::isSwitch())
                <a href="#"
                   class="dropdown-item"
                   data-controller="layouts--form"
                   data-action="layouts--form#submitByForm"
                   data-layouts--form-id="return-original-user"
                >
                    {!! \Orchid\Support\Facades\Dashboard::icon('logout') !!}
                    <span>{{ __('Back to my account') }}</span>
                </a>
                <form id="return-original-user"
                      class="hidden"
                      data-controller="layouts--form"
                      data-action="layouts--form#submit"
                      action="{{ route('platform.switch.logout') }}"
                      method="POST">
                    @csrf
                </form>
            @else
                <a href="{{ route('platform.logout') }}"
                   class="dropdown-item"
                   data-controller="layouts--form"
                   data-action="layouts--form#submitByForm"
                   data-layouts--form-id="logout-form"
                   dusk="logout-button">
                    {!! \Orchid\Support\Facades\Dashboard::icon('logout') !!}
                    <span>{{ __('Sign out') }}</span>
                </a>
                <form id="logout-form"
                      class="hidden"
                      action="{{ route('platform.logout') }}"
                      method="POST"
                      data-controller="layouts--form"
                      data-action="layouts--form#submit"
                >
                    @csrf
                </form>
            @endif

        </div>
    </div>

    @include('platform::partials.notificationProfile')
</div>
