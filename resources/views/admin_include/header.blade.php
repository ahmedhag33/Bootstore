<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item"><a class="nav-link" rel="alternate" hreflang="{{ $localeCode }}"
                            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a></li>
                @endforeach

                <li class="nav-item">
                    <a class="nav-link" rel="alternate">
                        {{ auth()->guard('admin')->user()->name }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" rel="alternate" href="{{ route('adminLogout') }}">
                        Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
