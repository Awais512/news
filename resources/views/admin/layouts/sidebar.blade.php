<aside id="left-panel" class="left-panel">
    <nav class="navbar navbar-expand-sm navbar-default">

        <div class="navbar-header">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
        <a class="navbar-brand" href="./"><img src="{{asset('admin/images/logo.png')}}" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="{{asset('admin/images/log2.png')}}" alt="Logo"></a>
        </div>

        <div id="main-menu" class="main-menu collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="{{route('admin.dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                </li>
                @permission(['Permission Update', 'All','Permission'])
                <li>
                <a href="{{route('admin.permission.index')}}"> <i class="menu-icon fa fa-laptop"></i>Permissions </a>
                </li>
                @endpermission

                @permission(['Permission Update', 'All'])
                <li>
                    <a href="{{route('admin.role.list')}}"> <i class="menu-icon fa fa-laptop"></i>Roles </a>
                </li>
                @endpermission

                @permission(['Permission Update', 'All'])
                <li>
                    <a href="{{route('author.index')}}"> <i class="menu-icon fa fa-laptop"></i>Authors</a>
                </li>
                @endpermission

                 @permission(['Category List', 'All'])
                <li>
                    <a href="{{route('admin.category.list')}}"> <i class="menu-icon fa fa-laptop"></i>Categories</a>
                </li>
                @endpermission

                @permission(['Post List', 'All'])
                <li>
                    <a href="{{route('admin.post.list')}}"> <i class="menu-icon fa fa-laptop"></i>Posts</a>
                </li>
                @endpermission

                @permission(['System Settings', 'All'])
                <li>
                    <a href="{{route('admin.settings.update')}}"> <i class="menu-icon fa fa-laptop"></i>Settings</a>
                </li>
                @endpermission
    </nav>
</aside><!-- /#left-panel -->