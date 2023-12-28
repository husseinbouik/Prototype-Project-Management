{{-- <!-- need to remove -->
<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>Home</p>
    </a>
</li> --}}
<!-- added menu items -->
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="{{ route('projects.index') }}" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>Projects</p>
        </a>
    </li>
        
    <li class="nav-item">
        <a href="{{ route('tasks.index') }}" class="nav-link">
            <i class="nav-icon fas fa-users pl-1 pr-1"></i>
            <p>Tasks</p>
        </a>
    </li>
    @can('manage members')
    <li class="nav-item">
        <a href="{{ route('users.index') }}" class="nav-link">
            <i class="nav-icon fas fa-users pl-1 pr-1"></i>
            <p>Members</p>
        </a>
    </li>   
    @endcan

</ul>
<!-- Add the following JavaScript code -->
<script>
    $(document).ready(function() {
        $('.nav-link').click(function() {
            $(this).toggleClass('active');
        });
    });
</script>
