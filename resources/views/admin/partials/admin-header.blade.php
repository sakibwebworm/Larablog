<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Lara-blog</title>
    <!-- Bootstrap core CSS-->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Start Bootstrap</a>
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
                        <a href="/users">Management</a>
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
                        <a href="/posts">Management</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="comments">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsecomments" data-parent="#exampleAccordion">
                    <i class="fa fa-comments"></i>
                    <span class="nav-link-text">Comments</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapsecomments">
                    <li>
                        <a href="/comments">Management</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="category">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsecomments" data-parent="#exampleAccordion">
                    <i class="fa fa-tags"></i>
                    <span class="nav-link-text">Categories</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapsecategory">
                    <li>
                        <a href="/categories">Management</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="profile">
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseprofile" data-parent="#exampleAccordion">
                    <i class="fa fa-info"></i>
                    <span class="nav-link-text">Categories</span>
                </a>
                <ul class="sidenav-second-level collapse" id="collapseprofile">
                    <li>
                        <a href="/profiles">Management</a>
                    </li>
                </ul>
            </li>
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
