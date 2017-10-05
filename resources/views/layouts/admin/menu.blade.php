<li class="{{ Request::is('dealerships*') ? 'active' : '' }}">
    <a href="{!! route('dealerships.index') !!}"><span>Concesionarios</span></a>
</li>

<li class="{{ Request::is('branches*') ? 'active' : '' }}">
    <a href="{!! route('branches.index') !!}"><span>Locales</span></a>
</li>

<li class="{{ Request::is('articles*') ? 'active' : '' }}">
    <a href="{!! route('articles.index') !!}"><span>Artículos</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><span>Usuarios</span></a>
</li>

<li class="{{ Request::is('media*') ? 'active' : '' }}">
    <a href="{!! route('media.index') !!}"><span>Media</span></a>
</li>

