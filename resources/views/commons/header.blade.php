<nav class="navbar navbar-expand navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('index') }}"><i class="fas fa-home fa-2x"></i>
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-md-auto align-items-center">
            <li>
                <a class="btn btn-info" href="{{ route('post.create') }}"><i class="fas fa-pencil-alt"></i>
                εΊεγγ
                </a>
            </li>
            <li>
                <a class="nav-link far fa-user fa-lg" href="{{ route('users.show',Auth::id() ) }}">
                </a>
            </li>
        </ul>
    </div>
</nav>
