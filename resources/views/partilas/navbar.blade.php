<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
    <a class="navbar-brand" href="/">Sword Of Death</a>
   
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active) ? 'post' : '' }}" href="/blog">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Category</a>
        </li>

      </ul>
          <ul class="navbar-nav ml-auto">
            @auth
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                Welcome Back, {{ auth()->user()->name }}
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-window-reverse"></i> My Dashboard</a>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
                
              </div>
            </li>
            @else
            <li class="nav-item">
              <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}""><i class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            @endauth
          </ul>  
    </div>
  </div>
  </nav>