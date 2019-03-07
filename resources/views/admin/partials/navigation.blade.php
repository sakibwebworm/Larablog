<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/">Lara blog</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="users">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseusers" data-parent="#exampleAccordion">
                    <i class="fa fa-users"></i>
                    <span class="nav-link-text">Users</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseusers">
                    <li>
                        <a href="/admin/users">Management</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="posts">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseposts" data-parent="#exampleAccordion">
                    <i class="fa fa-pencil"></i>
                    <span class="nav-link-text">Posts</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseposts">
                    <li>
                        <a href="/admin/posts">Management</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="category">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsecategory" data-parent="#exampleAccordion">
                    <i class="fa fa-tags"></i>
                    <span class="nav-link-text">Categories</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapsecategory">
                    <li>
                        <a href="/admin/categories">Management</a>
                    </li>
                </ul>
            </li>
           {{-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="profile">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseprofile" data-parent="#exampleAccordion">
                    <i class="fa fa-info"></i>
                    <span class="nav-link-text">Categories</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseprofile">
                    <li>
                        <a href="/profiles">Management</a>
                    </li>
                </ul>
            </li>--}}
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>
    </div>
</nav>