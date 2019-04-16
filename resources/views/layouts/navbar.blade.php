<nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">Logo</a>
      <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
      <ul class="right hide-on-med-and-down">
        @auth
        <li><a href="sass.html">Companies</a></li>
        <li><a href="badges.html">Employees</a></li>
            <li><a href="/logout">Logout</a></li>
        @endauth
      </ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    @auth
        <li><a href="sass.html">Companies</a></li>
        <li><a href="badges.html">Employees</a></li>
        <li><a href="/logout">Logout</a></li>
    @endauth
  </ul>
