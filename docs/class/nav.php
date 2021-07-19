        <!-- partial -->

        <!-- partial:partials/_sidebar.html sidebar sidebar-offcanvas -->

        <nav class="sidebar sidebar-offcanvas" id="sidebar">

              <ul class="nav">

                    <li class="nav-item nav-profile">

                          <div class="nav-link">

                                <div class="profile-image">

                                      <img src="<?php echo $raiz; ?>images/faces/<?php echo $_SESSION['img_user'] ?>" alt="image" />

                                      <span class="online-status online"></span>
                                      <!--change class online to offline or busy as needed-->

                                </div>

                                <div class="profile-name">

                                      <p class="name">

                                            Hola, <?= $_SESSION['apellidos'] ?>

                                      </p>

                                      <p class="designation">

                                            <?= $_SESSION['nickname'] ?>

                                      </p>

                                </div>

                          </div>

                    </li>





                    <li class="nav-item ">

                          <a class="nav-link" href="#submenu-3" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fa fa-tags menu-icon"></i> <span class="menu-title">&nbsp;&nbsp;Generalidades</span> </a>
                          <div id="submenu-3" class="collapse " style="">

                                <ul class="nav flex-column sub-menu">


                                      <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $nav; ?>ugipress">Ugipress</a>
                                      </li>
                                      <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $nav; ?>red">Red</a>
                                      </li>
                                      <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $nav; ?>microred">Micro Red</a>
                                      </li>
                                      <li class="nav-item  ">
                                            <a class="nav-link" href="<?php echo $nav; ?>establecimientos">Establecimientos</a>
                                      </li>
                                      <li class="nav-item  ">
                                            <a class="nav-link" href="<?php echo $nav; ?>pacientes">Pacientes</a>
                                      </li>






                                </ul>

                          </div>

                    </li>



                    <li class="nav-item ">

                          <a class="nav-link" href="#submenu-1" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-tags menu-icon"></i> <span class="menu-title">&nbsp;&nbsp;Registros de Casos</span> </a>



                          <div id="submenu-1" class="collapse " style="">

                                <ul class="nav flex-column sub-menu">

                                      <li class="nav-item">

                                            <a class="nav-link" href="<?php echo $nav; ?>covid">Casos de Covid</a>

                                      </li>
                                      <li class="nav-item">

                                            <a class="nav-link" href="<?php echo $nav; ?>dengue">Casos de Dengue</a>

                                      </li>
                                </ul>









                          </div>

                    </li>


                    <li class="nav-item ">
                          <a class="nav-link" href="#submenu-2" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-tags menu-icon"></i> <span class="menu-title">&nbsp;&nbsp;Reportes</span> </a>
                          <div id="submenu-2" class="collapse " style="">
                                <ul class="nav flex-column sub-menu">
                                      <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $nav; ?>mapascovid">Mapa de Casos Covid</a>
                                      </li>
                                      <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $nav; ?>mapasdengue">Mapa de Casos Dengue </a>
                                      </li>
                                </ul>
                          </div>
                    </li>
                    <li class="nav-item ">

                          <a class="nav-link" href="#submenu-4" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fa fa-tags menu-icon"></i> <span class="menu-title">&nbsp;&nbsp;Administrar Usuario</span> </a>
                          <div id="submenu-4" class="collapse " style="">
                                <ul class="nav flex-column sub-menu">
                                      <li class="nav-item">
                                            <a class="nav-link" href="<?php echo $nav; ?>usuario">Usuarios</a>
                                      </li>
                                </ul>
                          </div>
                    </li>










              </ul>



        </nav>