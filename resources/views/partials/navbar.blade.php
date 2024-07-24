<nav class="navbar fixed-top navbar-expand-md bg-primary mb-3">
    <div class="container">
      <a class="navbar-brand text-white border border-0 " href="/" style="font-family: 'Times New Roman', Times, serif">DiaryKita</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item px-2">
            <a class="nav-link text-white text-uppercase fs-6" style="--bs-link-hover-color" aria-current="page" href="/Main">Home</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link text-white text-uppercase fs-6" style="--bs-link-hover-color"  href="/profil">Profil</a>
          </li>
          @role('admin')
          <li class="nav-item px-2">
            <a class="nav-link text-white text-uppercase fs-6" style="--bs-link-hover-color"  href="/Main/admin">Admin</a>
          </li>
          @endrole

          @auth()
          <form action="/logout" method="post">
            @csrf
            <button type="submit" class="nav-item text-white btn fs-6 text-uppercase icon-link icon-link-hover" style="--bs-link-hover-color"><i
                    class="bi bi-box-arrow-in-right"></i>Logout</button>
            </form>
          @else
          <li class="nav-item px-2">
            <a class="nav-link text-white text-uppercase fs-6 icon-link icon-link-hover" style="--bs-link-hover-color" href="/Login">Login</a>
          </li>
          @endauth
        </ul>
      </div>
    </div>
  </nav>
