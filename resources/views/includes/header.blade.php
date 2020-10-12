<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/">JobMasterTask</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ request()->route()->named('resumes.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('resumes.index') }}">Search resumes</a>
            </li>
            <li class="nav-item {{ request()->route()->named('resumes.create') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('resumes.create') }}">Add Resume</a>
            </li>
        </ul>
    </div>
</nav>
