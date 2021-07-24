<?php





?>

<body class="<?= $_SESSION['nav'] ?>">

  <div class="container-scroller" style='zoom:95%'>

    <!-- partial:partials/_navbar.html -->

    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row <?= $_SESSION['c_barra'] ?>">
      <!--color barra  class="sidebar-icon-only"-->

      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">



        <a class="navbar-brand brand-logo" href="<?php echo $raiz; ?>../index.php">

          <img src="<?php echo $raiz; ?>images/logoGoreHori.png" alt="logo" /></a>

        <a class="navbar-brand brand-logo-mini" href="<?php echo $raiz; ?>../index.php">

          <img src="<?php echo $raiz; ?>images/logoGoreHori.png" alt="logo" /></a>

      </div>

      <div class="navbar-menu-wrapper d-flex align-items-center">

        <!--ocultar menu-->

        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">

          <span class="icon-menu"></span>

        </button>

        <ul class="navbar-nav">

          <li class="nav-item dropdown d-none d-lg-flex">

            <a class="nav-link dropdown-toggle nav-btn" id="actionDropdown" href="#" data-toggle="dropdown">



            </a>

            <div class="dropdown-menu navbar-dropdown dropdown-left" aria-labelledby="actionDropdown">

              <a class="dropdown-item" href="#">

                <i class="icon-user text-primary"></i>

                User Account

              </a>

              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="#">

                <i class="icon-user-following text-warning"></i>

                Admin User

              </a>

              <div class="dropdown-divider"></div>

              <a class="dropdown-item" href="#">

                <i class="icon-docs text-success"></i>

                Sales report

              </a>

            </div>

          </li>

        </ul>

        <ul class="navbar-nav navbar-nav-right">





          <li class="nav-item dropdown">

            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">

              <i class="icon-envelope mx-0"></i>

              <span class="count"></span>

            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">

              <div class="dropdown-item">

                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails

                </p>

                <span class="badge badge-info badge-pill float-right">View all</span>

              </div>

              <div class="dropdown-divider"></div>

              <a class="dropdown-item preview-item">

                <div class="preview-thumbnail">

                  <img src="<?php echo $raiz; ?>images/faces/<?php echo $_SESSION['img_user'] ?>" alt="image" class="profile-pic">

                </div>

                <div class="preview-item-content flex-grow">

                  <h6 class="preview-subject ellipsis font-weight-medium">David Grey

                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>

                  </h6>

                  <p class="font-weight-light small-text">

                    The meeting is cancelled

                  </p>

                </div>

              </a>

              <div class="dropdown-divider"></div>

              <a class="dropdown-item preview-item">

                <div class="preview-thumbnail">

                  <img src="<?php echo $raiz; ?>images/faces/face2.jpg" alt="image" class="profile-pic">

                </div>

                <div class="preview-item-content flex-grow">

                  <h6 class="preview-subject ellipsis font-weight-medium">Tim Cook

                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>

                  </h6>

                  <p class="font-weight-light small-text">

                    New product launch

                  </p>

                </div>

              </a>

              <div class="dropdown-divider"></div>

              <a class="dropdown-item preview-item">

                <div class="preview-thumbnail">

                  <img src="<?php echo $raiz; ?>images/faces/face3.jpg" alt="image" class="profile-pic">

                </div>

                <div class="preview-item-content flex-grow">

                  <h6 class="preview-subject ellipsis font-weight-medium"> Johnson

                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>

                  </h6>

                  <p class="font-weight-light small-text">

                    Upcoming board meeting

                  </p>

                </div>

              </a>

            </div>

          </li>

          <li class="nav-item dropdown">

            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">

              <i class="icon-user"></i>



            </a>

            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">



              <div class="dropdown-divider"></div>

              <a class="dropdown-item preview-item" href="<?php echo $raiz; ?>../profile">

                <div class="preview-thumbnail">

                  <div class="preview-icon bg-primary">

                    <i class="fa fa-pencil mx-0"></i>

                  </div>

                </div>

                <div class="preview-item-content">

                  <h6 class="preview-subject font-weight-medium">Editar Perfil</h6>



                </div>

              </a>

              <div class="dropdown-divider"></div>

              <a class="dropdown-item preview-item" href="<?php echo $raiz; ?>../logout.php">

                <div class="preview-thumbnail">

                  <div class="preview-icon bg-warning">

                    <i class="fa fa-window-close mx-0"></i>

                  </div>

                </div>

                <div class="preview-item-content">

                  <h6 class="preview-subject font-weight-medium">Cerrar Sesión</h6>



                </div>

              </a>

              <div class="dropdown-divider"></div>



            </div>

          </li>

          <!--<li class="nav-item nav-settings d-none d-lg-block">

            <a class="nav-link" href="#">

              <i class="icon-grid"></i>

            </a>

          </li>-->

        </ul>

        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">

          <span class="icon-menu"></span>

        </button>

      </div>

    </nav>

    <!-- partial -->

    <div class="container-fluid page-body-wrapper">

      <div class="row row-offcanvas row-offcanvas-right">

        <!-- partial:partials/_settings-panel.html -->

        <div class="theme-setting-wrapper">

          <div id="settings-trigger"><i class="mdi mdi-settings"></i></div>

          <div id="theme-settings" class="settings-panel">

            <i class="settings-close mdi mdi-close"></i>

            <p class="settings-heading">COLOR BARRA</p>

            <div class="sidebar-bg-options selected" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>Luz
            </div>

            <div class="sidebar-bg-options" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>Oscuro
            </div>

            <p class="settings-heading mt-2">COLOR CABECERA</p>

            <div class="color-tiles mx-0 px-4">

              <div class="tiles primary"></div>

              <div class="tiles success"></div>

              <div class="tiles warning"></div>

              <div class="tiles danger"></div>

              <div class="tiles pink"></div>

              <div class="tiles info"></div>

              <div class="tiles dark"></div>

              <div class="tiles default"></div>

            </div>

          </div>

        </div>

        <div id="right-sidebar" class="settings-panel">

          <i class="settings-close mdi mdi-close"></i>

          <ul class="nav nav-tabs" id="setting-panel" role="tablist">

            <li class="nav-item">

              <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>

            </li>

            <li class="nav-item">

              <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>

            </li>

          </ul>

          <div class="tab-content" id="setting-content">

            <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">



            </div>



          </div>

        </div>