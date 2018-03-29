@if(Auth::guard('web')->check())
    <p class="text-success">
        Вы вошли, как <strong>ПОЛЬЗОВАТЕЛЬ</strong>
    </p>
    @else
    <p class="text-danger" style="display: none">
        Вы вышли, как <strong>ПОЛЬЗОВАТЕЛЬ</strong>
    </p>
    @endif

@if(Auth::guard('admin')->check())
    <p class="text-success">
        Вы вошли, как <strong>АДМИНИСТРАТОР</strong>
    </p>
@else
    <p class="text-danger" style="display: none">
        Вы вышли, как <strong>АДМИНИСТРАТОР</strong>
    </p>
@endif