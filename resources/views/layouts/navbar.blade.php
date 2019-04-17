<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">SimpleCMS</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        @auth
            <li><a href="/home">Home</a></li>
            <li><a href="/logout">Logout</a></li>
        @endauth
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    @auth
        <li><a href="/home">Home</a></li>
        <li><a href="/logout">Logout</a></li>
    @endauth
  </ul>
