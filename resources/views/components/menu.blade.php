
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">CRUD</a>
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbars"
                aria-controls="navbars"
                aria-expanded="false"
                aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbars">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('users.index')}}">Users</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Sobre</a>
            </li>
        </ul>
        <form id="formSearch" method="GET" action="{{route('users.search')}}">
            <div class="input-group">
                <input id="search" name="search" class="form-control" type="text" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                <button class="btn btn-outline-info" type="submit">Search</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</nav>

