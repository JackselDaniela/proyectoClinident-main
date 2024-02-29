
@php
  use App\Models\User;
  // TODO -> aqui va el usuario autenticado
  $notificaciones = User::first()->unreadNotifications;
@endphp

<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
  <i class="fa fa-bell-o"></i>
  @if ($notificaciones->count() > 0)
    <span class="badge badge-pill bg-danger float-right">
      {{ $notificaciones->count() }}
    </span>
  @endif
</a>

<div class="dropdown-menu notifications">
  <div class="topnav-dropdown-header">
    <span>Notificaciones</span>
  </div>
  <div class="drop-scroll">
    <ul class="notification-list">
      @forelse ($notificaciones as $notif)
        <li class="notification-message">
          <a>
            <div class="media">
              <span class="avatar bg-primary" style="font-size: 1.8rem">!</span>
              <div class="media-body">
                <p class="noti-details">
                  {{ __("notifications.{$notif->type}", $notif->data) }}
                </p>
                <p class="noti-time">
                  <span class="notification-time">
                    {{ $notif->created_at->diffForHumans(now()) }}
                  </span>
                </p>
              </div>
            </div>
          </a>
        </li>
      @empty
        <h4 class="text-center text-muted" style="padding: 6rem">
          No tienes notificaciones por leer.
        </h4>
      @endforelse
    </ul>
  </div>
  <div class="topnav-dropdown-footer">
    <form method="POST" action="{{ route('notifications.read') }}">
      @csrf
      <button type="submit" class="btn btn-link text-primary btn-block">
        Marcar todas como leídas
      </button>
    </form>
  </div>
</div>
