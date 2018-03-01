<div class="action">

    <div class="date">
        <div class="day">
            {{$action->start->format('d')}}
        </div>
        <div class="month">
            {{$action->start->format('M')}}
        </div>
    </div>

    <div class="content">
        <a href="{{ route('groups.actions.show', [$action->group_id, $action->id]) }}">
            <div class="name">
                {{ $action->name }}
            </div>
            <div class="meta">
                {{$action->start->format('H:i')}} - {{$action->location}}
            </div>
            <span class="summary">{{ summary($action->body) }}</span>
        </a>
        <br/>
        <div class="group-name">
            <a href="{{ route('groups.show', [$action->group_id]) }}">
                <span class="badge badge-secondary badge-group">
                    @if ( $action->group->isPublic())
                        <i class="fa fa-globe" title="{{trans('group.open')}}"></i>
                    @else
                        <i class="fa fa-lock" title="{{trans('group.closed')}}"></i>
                    @endif
                    {{ $action->group->name }}
                </span>
            </a>
        </div>



        <div class="d-inline-flex align-items-center">
            <div class="users mt-2 mb-2">
                @foreach($action->users as $user)
                    @include('users.user-avatar')
                @endforeach
            </div>

            <div class="mt-2 mb-2">
                @if (Auth::user() && Auth::user()->isAttending($action))
                    <a class="btn btn-outline-primary btn-sm" up-modal=".main" href="{{route('groups.actions.unattend', [$action->group, $action])}}">{{trans('messages.unattend')}}</a>
                @elseif (Auth::user() && !Auth::user()->isAttending($action))
                    <a class="btn btn-outline-primary btn-sm" up-modal=".main" href="{{route('groups.actions.attend', [$action->group, $action])}}">{{trans('messages.attend')}}</a>
                @endif
            </div>
        </div>


    </div>


</div>
