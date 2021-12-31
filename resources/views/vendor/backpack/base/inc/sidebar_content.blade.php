<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('category') }}">
        <i class="la la-tags nav-icon"></i> Categories
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('client') }}">
        <i class="la la-user nav-icon"></i> Clients
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('balanceRequest') }}">
        <i class="la la-money nav-icon"></i> Balance Requests
    </a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('card') }}">
        <i class="la la-credit-card nav-icon"></i> Cards
    </a>
</li>
@if(backpack_user()->hasRole('SuperAdmin'))
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
        </ul>
    </li>
@endif<!-- Users, Roles, Permissions -->
