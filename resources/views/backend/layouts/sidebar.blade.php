<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">
        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/home"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                </li>
                <li>
                    <a href="{{route('position.index')}}"><i class="menu-icon fa fa-tripadvisor"></i>Position</a>
                </li>
                <li><a href="{{route('affiliation.index')}}"><i class="menu-icon fa fa-server"></i>Affiliation</a></li>
                <li><a href="{{route('location.index')}}"><i class="menu-icon fa fa-server"></i>Location</a></li>
                <li>
                    <a href="{{route('employee.index')}}"><i class="menu-icon fa fa-tripadvisor"></i>Employee</a>
                </li>
                <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Users</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-fort-awesome"></i><a href="">Users</a></li>
                        <li><i class="menu-icon ti-themify-logo"></i><a href="">Roles</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>
</aside><!-- /#left-panel -->
