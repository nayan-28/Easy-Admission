<nav  class="navbar navbar-expand-lg" class="navbar navbar-expand-lg" >
  <div class="container-fluid">
    <a href="{{ route('home') }}" class="nav-link active " aria-current="page">
        <img src="/images/logo.png" alt width="45" height="45" style="margin:-7;">
    </a>
    <b class="navbar-brand">Easy Admission</b>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('admin.login') }}">Log in</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
