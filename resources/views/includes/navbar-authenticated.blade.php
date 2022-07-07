<!--navbar open-->
    <nav
      class="
        navbar navbar-expand-lg navbar-light navbar-store
        fixed-top
        navbar-fixed-top
      "
      data-aos="fade-down"
    >
      <div class="container">
        <a href="#" class="navbar-brand">
          <img src="/images/logo.svg" alt="logo" />
        </a>
        <!--menu humburger open-->
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarResponsive"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <!--menu humburger close-->
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Categories</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Reward</a>
            </li>
          </ul>

          <!--dekstop menu open loggin-->
          <ul class="navbar-nav d-none d-lg-flex">
            <li class="nav-item dropdown">
              <a
                href="#"
                class="nav-link"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
              >
                <img
                  src="/images/icon-user.png"
                  alt=""
                  class="rounded-circle mr-2 profile-picture"
                />
                Hi, Shana
              </a>
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Dashboard</a>
                <a href="#" class="dropdown-item"
                  >Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">Logout</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link d-inline-block mt-2">
                <img src="/images/icon-cart-empty.svg" alt="" />
              </a>
            </li>
          </ul>
          <!--dekstop menu close loggin-->

          <!--mobile menu open login-->
          <ul class="navbar-nav d-block d-lg-none">
            <li class="nav-item">
              <a href="#" class="nav-link"> Hi, Shana </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link d-inline-block"> Cart </a>
            </li>
          </ul>
          <!--mobile menu close login-->
        </div>
      </div>
    </nav>
    <!--navbar close-->
