<!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li>

@role('admin')
<li class="nav-item mt-3">
    <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin.users*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user"></i><i class="fa-solid "></i>
        <p>Users</p>
    </a>
</li>

<li class="nav-item mt-3">
    <a href="{{ route('admin.services.index') }}" class="nav-link {{ Request::is('admin.services*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-gear"></i>
        <p>Services</p>
    </a>
</li>

<li class="nav-item mt-3">
    <a href="{{ route('admin.transactions.index') }}" class="nav-link {{ Request::is('admin.transactions*') ? 'active' : '' }}">
        <i class="nav-icon fa-solid fa-handshake"></i>
        <p>Transactions</p>
    </a>
</li>


<li class="nav-item mt-3">
    <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Request::is('admin.roles*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>Roles</p>
    </a>
</li>

<li class="nav-item mt-3">
    <a href="{{ route('admin.servicePoints.index') }}" class="nav-link {{ Request::is('admin.servicePoints*') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Service Points</p>
    </a>
</li>
@endrole

{{-- <li class="nav-item">
    <a href="{{ route('admin.tickets.create') }}" class="nav-link {{ Request::is('admin.transactions*') ? 'active' : '' }}">
        <i class="nav-icon fa-solid fa-ticket"></i>
        <p>Get Ticket</p>
    </a>
</li> --}}


<li class="nav-item mt-3">
    <a href="{{ route('admin.tickets.index') }}" class="nav-link {{ Request::is('admin.tickets*') ? 'active' : '' }}">
        <i class="nav-icon fa-solid fa-ticket-simple"></i>
        <p>Tickets</p>
    </a>
</li>

<li class="nav-item mt-3">
    <a href="{{ route('adminDash') }}" class="nav-link">
        <i class="nav-icon fas fa-home"></i>
        <p>Admin dash</p>
    </a>
</li>

<li class="nav-item  mt-3">
    <a href="{{ route('teller.index') }}" class="nav-link {{ Request::is('admin.transactions*') ? 'active' : '' }}">
        <i class="nav-icon fa-solid fa-ticket"></i>
        <p>Teller point</p>
    </a>
</li>




