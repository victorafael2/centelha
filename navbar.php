<!--
    <?php
    // Query to retrieve the data from the database
$query = "SELECT * FROM menu";
$result = mysqli_query($conn, $query);

?> -->


<?php
date_default_timezone_set('America/Fortaleza');

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// 2. Recuperar os dados do menu e submenu do banco de dados
$menuQuery = "SELECT * FROM menu where menu_name <> 'ADM'";
$menuResult = $conn->query($menuQuery);

$menuData = array(); // Array para armazenar os dados do menu

if ($menuResult->num_rows > 0) {
    while ($menuRow = $menuResult->fetch_assoc()) {
        $menuId = $menuRow['menu_id'];
        $submenuQuery = "SELECT * FROM submenu WHERE menu_id = $menuId and mostrar = 's' and tipo ='NAV'";
        $submenuResult = $conn->query($submenuQuery);

        $submenuData = array(); // Array para armazenar os dados do submenu

        if ($submenuResult->num_rows > 0) {
            while ($submenuRow = $submenuResult->fetch_assoc()) {
                $submenuData[] = $submenuRow;
            }
        }

        $menuRow['submenu'] = $submenuData; // Adicionar os dados do submenu ao menu
        $menuData[] = $menuRow; // Adicionar o menu ao array de dados do menu
    }
}

// 3. Gerar o código HTML dinamicamente
function generateMenuHTML($data)
{
    $html = '';

    foreach ($data as $menu) {
        $html .= '<div class="nav-item-wrapper">';
        $html .= '<a class="nav-link dropdown-indicator label-1" href="#' . $menu['menu_name'] . '" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="' . $menu['menu_name'] . '">';
        $html .= '<div class="d-flex align-items-center">';
        $html .= '<div class="dropdown-indicator-icon"><span class="fas fa-caret-right"></span></div>';
        $html .= '<span class="nav-link-icon">' . $menu['icone'] . '</span>';
        $html .= '<span class="nav-link-text">' . $menu['menu_name'] . '</span>';
        $html .= '</div>';
        $html .= '</a>';
        $html .= '<div class="parent-wrapper label-1">';
        $html .= '<ul class="nav collapse parent" data-bs-parent="#navbarVerticalCollapse" id="' . $menu['menu_name'] . '">';
        $html .= '<li class="collapsed-nav-item-title d-none">' . $menu['menu_name'] . '</li>';

        foreach ($menu['submenu'] as $submenu) {
            $html .= '<li class="nav-item"><a class="nav-link" href="content_pages.php?id=' . $submenu['submenu_id'] . '" data-bs-toggle="" aria-expanded="false">';
            $html .= '<div class="d-flex align-items-center"><span class="nav-link-text">' . $submenu['submenu_name'] . '</span></div>';
            $html .= '</a></li>';
        }

        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';
    }

    return $html;
}

// Exibir o menu dinâmico no HTML
echo generateMenuHTML($menuData);

// Fechar a conexão com o banco de dados
// $conn->close();
?>






<style>
.avatar-letter {
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: lighter;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #708090;
    color: #fff;
    border: 1px solid #ccc;
    /* define a largura, estilo e cor da borda */
    border-color: #d3d3d3;
    /* define a cor da borda */
}

/* .avatar-letter:hover {
  background-color: #fff;
  color: #007bff;
} */
</style>


<nav class="navbar navbar-vertical navbar-expand-lg">
    <script>
    var navbarStyle = window.config.config.phoenixNavbarStyle;
    if (navbarStyle && navbarStyle !== 'transparent') {
        document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
    }
    </script>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <!-- scrollbar removed-->
        <div class="navbar-vertical-content">
            <ul class="navbar-nav flex-column" id="navbarVerticalNav">


                <li class="nav-item">
                    <!-- label-->
                    <p class="navbar-vertical-label">Apps
                    </p>
                    <hr class="navbar-vertical-line" />




                    <!-- <?php
                                            // Generate the HTML code dynamically
                          while ($row = mysqli_fetch_assoc($result)) {
                            // $idFuncionario = $row['idFuncionario'];
                            $nome_menu = $row['nome'];
                            $id_menu = $row['id'];
                            $caminho = 'content_pages.php?id=' . $id_menu ;

                            // Modify the following line to include the appropriate URL or link destination
                            // $link = 'pages/cadastro/cadastro_funcionario.php?id=' . $idFuncionario;


                            $html = '<div class="nav-item-wrapper">
                                        <a class="nav-link label-1" href="' . $caminho . '" role="button" data-bs-toggle="" aria-expanded="false">
                                            <div class="d-flex align-items-center">
                                                <span class="nav-link-icon"><span data-feather="edit"></span></span>
                                                <span class="nav-link-text-wrapper">
                                                    <span class="nav-link-text">' . $nome_menu . '</span>
                                                </span>
                                            </div>
                                        </a>
                                    </div>';

                            echo $html;
                          }

                  ?> -->

                            <?php // Exibir o menu cascata no HTML
                            echo generateMenuHTML($menuData);
                            ?>





                </li>




            </ul>
        </div>
    </div>
    <div class="navbar-vertical-footer">
        <button
            class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span
                class="uil uil-left-arrow-to-left fs-0"></span><span class="uil uil-arrow-from-right fs-0"></span><span
                class="navbar-vertical-footer-text ms-2">Encolher</span></button>
        <!-- <p><?php
$dataHoraAtual = date('Y-m-d H:i:s');
echo $dataHoraAtual;
?></p> -->

    </div>
</nav>
<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">

            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span
                    class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3"
                href="content_pages.php?id=<?php echo $_SESSION['destinationPage']; ?>">

                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center"><img src="assets/png/logo.png" alt="crm"
                            width="80" />
                        <!-- <p class="logo-text ms-2 d-none d-sm-block">CRM</p> -->
                    </div>
                </div>
            </a>
        </div>
        <!-- <div class="search-box navbar-top-search-box d-none d-lg-block" data-list='{"valueNames":["title"]}' style="width:25rem;">
              <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                <input class="form-control search-input fuzzy-search rounded-pill form-control-sm" type="search" placeholder="Search..." aria-label="Search" />
                <span class="fas fa-search search-box-icon"></span>

              </form>
              <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search">
                <button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button>
              </div>
              <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                <div class="scrollbar-overlay" style="max-height: 30rem;">
                  <div class="list pb-3">
                    <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span class="text-500">results</span></h6>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently Searched </h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> Store Macbook</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-clock-rotate-left" data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Products</h6>
                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="apps/e-commerce/landing/product-details.html">
                        <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3" src="assets/img/products/60x60/3.png" alt="" /></div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                          <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB Memory - 1.6GHz - 128GB Storage</span></p>
                        </div>
                      </a>
                      <a class="dropdown-item py-2 d-flex align-items-center" href="apps/e-commerce/landing/product-details.html">
                        <div class="file-thumbnail me-2"><img class="img-fluid" src="assets/img/products/60x60/3.png" alt="" /></div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                          <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick Links</h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Support MacBook House</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-link text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Files</h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-solid fa-file-zipper text-900" data-fa-transform="shrink-2"></span> Library MacBook folder.rar</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-file-lines text-900" data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-solid fa-image text-900" data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Members</h6>
                    <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center" href="pages/members.html">
                        <div class="avatar avatar-l status-online  me-2 text-900">
                          <img class="rounded-circle " src="assets/img/team/40x40/10.webp" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                          <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                        </div>
                      </a>
                      <a class="dropdown-item py-2 d-flex align-items-center" href="pages/members.html">
                        <div class="avatar avatar-l  me-2 text-900">
                          <img class="rounded-circle " src="assets/img/team/40x40/12.webp" alt="" />

                        </div>
                        <div class="flex-1">
                          <h6 class="mb-0 text-1000 title">John Smith</h6>
                          <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                        </div>
                      </a>

                    </div>
                    <hr class="text-200 my-0" />
                    <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Related Searches</h6>
                    <div class="py-2"><a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"><span class="fa-brands fa-firefox-browser text-900" data-fa-transform="shrink-2"></span> Search in the Web MacBook</div>
                        </div>
                      </a>
                      <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                        <div class="d-flex align-items-center">

                          <div class="fw-normal text-1000 title"> <span class="fa-brands fa-chrome text-900" data-fa-transform="shrink-2"></span> Store MacBook″</div>
                        </div>
                      </a>

                    </div>
                  </div>
                  <div class="text-center">
                    <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                  </div>
                </div>
              </div>
            </div> -->
        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                    <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Dark Mode"><span class="icon"
                            data-feather="moon"></span></label>
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Dark Mode"><span class="icon"
                            data-feather="sun"></span></label>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" data-bs-auto-close="outside"><span data-feather="bell"
                        style="height:20px;width:20px;"></span></a>

                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-black mb-0">Notificações</h5>
                                <!-- <button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button> -->
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <!-- <div class="scrollbar-overlay" style="height: 27rem;">
                        <div class="border-300">
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read border-bottom">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="assets/img/team/40x40/30.webp" alt="" />
                                </div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Jessie Samson</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2">10m</span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:41 AM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block">
                                <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3">
                                  <div class="avatar-name rounded-circle"><span>J</span></div>
                                </div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Jane Foster</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>📅</span>Created an event.<span class="ms-2 text-400 fw-bold fs--2">20m</span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:20 AM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block">
                                <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3"><img class="rounded-circle avatar-placeholder" src="assets/img/team/40x40/avatar.webp" alt="" />
                                </div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Jessie Samson</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2">1h</span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:30 AM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block">
                                <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="border-300">
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="assets/img/team/40x40/57.webp" alt="" />
                                </div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Kiera Anderson</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>💬</span>Mentioned you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">9:11 AM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block">
                                <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative unread border-bottom">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="assets/img/team/40x40/59.webp" alt="" />
                                </div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Herman Carter</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👤</span>Tagged you in a comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:58 PM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block">
                                <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                          <div class="px-2 px-sm-3 py-3 border-300 notification-card position-relative read ">
                            <div class="d-flex align-items-center justify-content-between position-relative">
                              <div class="d-flex">
                                <div class="avatar avatar-m status-online me-3"><img class="rounded-circle" src="assets/img/team/40x40/58.webp" alt="" />
                                </div>
                                <div class="flex-1 me-sm-3">
                                  <h4 class="fs--1 text-black">Benjamin Button</h4>
                                  <p class="fs--1 text-1000 mb-2 mb-sm-3 fw-normal"><span class='me-1 fs--2'>👍</span>Liked your comment.<span class="ms-2 text-400 fw-bold fs--2"></span></p>
                                  <p class="text-800 fs--1 mb-0"><span class="me-1 fas fa-clock"></span><span class="fw-bold">10:18 AM </span>August 7,2021</p>
                                </div>
                              </div>
                              <div class="font-sans-serif d-none d-sm-block">
                                <button class="btn fs--2 btn-sm dropdown-toggle dropdown-caret-none transition-none notification-dropdown-toggle" type="button" data-stop-propagation="data-stop-propagation" data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true" aria-expanded="false" data-bs-reference="parent"><span class="fas fa-ellipsis-h fs--2 text-900"></span></button>
                                <div class="dropdown-menu dropdown-menu-end py-2"><a class="dropdown-item" href="#!">Mark as unread</a></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                        </div>
                        <div class="card-footer p-0 border-top border-0">
                            <div class="my-2 text-center fw-bold fs--2 text-600"></div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">
                    <svg width="16" height="16" viewbox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                    </svg></a>

                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300"
                    aria-labelledby="navbarDropdownNindeDots">
                    <!-- <div class="card bg-white position-relative border-0">
                        <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                            <div class="row text-center align-items-center gx-0 gy-0">
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/behance.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Behance</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/google-cloud.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Cloud</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/slack.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Slack</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/gitlab.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Gitlab</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/bitbucket.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">BitBucket</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/google-drive.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Drive</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/trello.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Trello</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/figma.webp" alt="" width="20" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Figma</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/twitter.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Twitter</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/pinterest.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Pinterest</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/ln.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Linkedin</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/google-maps.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Maps</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/google-photos.webp" alt=""
                                            width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Photos</p>
                                    </a></div>
                                <div class="col-4"><a
                                        class="d-block hover-bg-200 p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="#!"><img src="assets/img/nav-icons/spotify.webp" alt="" width="30" />
                                        <p class="mb-0 text-black text-truncate fs--2 mt-1 pt-1">Spotify</p>
                                    </a></div>
                            </div>
                        </div>
                    </div> -->
                </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button"
                    data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                    <div class="avatar avatar-l ">
                        <!-- <img class="rounded-circle " src="assets/img/team/40x40/57.webp" alt="" /> -->
                        <?php
                            function getInitialLetter($name) {
                              return strtoupper(substr($name, 0, 1));
                            }

                            // $name = 'João';

                            echo '<div class="avatar-letter">' . getInitialLetter($name) . '</div>';


                            ?>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                <div class="avatar avatar-xl ">
                                    <!-- <img class="rounded-circle " src="assets/img/team/72x72/57.webp" alt="" />
                         -->
                                    <?php


                            echo '<div class="avatar-letter">' . getInitialLetter($name) . '</div>';

                            ?>
                                </div>
                                <h6 class="mt-2 text-black"><?php echo $name ?></h6>
                            </div>
                            <!-- <div class="mb-3 mx-3">
                        <input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" />
                      </div> -->
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">

                            <?php

                                                                // Consulta para obter os itens do menu
                                        $sql_menu_adm = "SELECT * FROM submenu WHERE  mostrar = 's' and tipo ='ADM' ";
                                        $result_menu_adm = $conn->query($sql_menu_adm);

                                        // Verifica se a consulta retornou resultados
                                        if ($result_menu_adm->num_rows > 0) {
                                            // Inicia a construção da lista de itens do menu
                                            echo '<ul class="nav d-flex flex-column mb-2 pb-1">';

                                            // Loop através dos resultados da consulta
                                            while ($row = $result_menu_adm->fetch_assoc()) {
                                                // Obtém os valores das colunas "texto" e "icone" para cada item
                                                $texto_menu_adm = $row["submenu_name"];
                                                $icone_menu_adm = $row["icone"];
                                                $url_menu_adm = $row["submenu_id"];

                                                // Cria o item do menu
                                                echo '<li class="nav-item"><a class="nav-link px-3" href="content_pages.php?id=' . $url_menu_adm . '">';
                                                echo '<span class="me-2 text-900" data-feather="' . $icone_menu_adm . '"></span>';
                                                echo '<span>' . $texto_menu_adm . '</span></a></li>';
                                            }

                                            // Fecha a lista de itens do menu
                                            echo '</ul>';
                                        } else {
                                            echo "Nenhum item encontrado.";
                                        }
                            ?>



                        </div>
                        <div class="card-footer p-0 border-top">
                            <ul class="nav d-flex flex-column my-3">
                                <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900"
                                            data-feather="user-plus"></span>Add another account</a></li>
                            </ul>
                            <hr />
                            <div class="px-3"> <a class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                    href="database/logout.php">
                                    <span class="me-2" data-feather="log-out"> </span>Sign out</a></div>
                            <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1"
                                    href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1"
                                    href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="modal fade" id="searchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true"
    data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
    <div class="modal-dialog">
        <div class="modal-content mt-15 rounded-pill">
            <div class="modal-body p-0">
                <div class="search-box navbar-top-search-box" data-list='{"valueNames":["title"]}' style="width: auto;">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input fuzzy-search rounded-pill form-control-lg" type="search"
                            placeholder="Search..." aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>

                    </form>
                    <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none"
                        data-bs-dismiss="search">
                        <button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button>
                    </div>
                    <div class="dropdown-menu border border-300 font-base start-0 py-0 overflow-hidden w-100">
                        <div class="scrollbar-overlay" style="max-height: 30rem;">
                            <div class="list pb-3">
                                <h6 class="dropdown-header text-1000 fs--2 py-2">24 <span
                                        class="text-500">results</span></h6>
                                <hr class="text-200 my-0" />
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Recently
                                    Searched </h6>
                                <div class="py-2"><a class="dropdown-item"
                                        href="apps/e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">

                                            <div class="fw-normal text-1000 title"><span
                                                    class="fa-solid fa-clock-rotate-left"
                                                    data-fa-transform="shrink-2"></span> Store Macbook</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">

                                            <div class="fw-normal text-1000 title"> <span
                                                    class="fa-solid fa-clock-rotate-left"
                                                    data-fa-transform="shrink-2"></span> MacBook Air - 13″</div>
                                        </div>
                                    </a>

                                </div>
                                <hr class="text-200 my-0" />
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Products
                                </h6>
                                <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                        href="apps/e-commerce/landing/product-details.html">
                                        <div class="file-thumbnail me-2"><img class="h-100 w-100 fit-cover rounded-3"
                                                src="assets/img/products/60x60/3.png" alt="" /></div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-1000 title">MacBook Air - 13″</h6>
                                            <p class="fs--2 mb-0 d-flex text-700"><span class="fw-medium text-600">8GB
                                                    Memory - 1.6GHz - 128GB Storage</span></p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item py-2 d-flex align-items-center"
                                        href="apps/e-commerce/landing/product-details.html">
                                        <div class="file-thumbnail me-2"><img class="img-fluid"
                                                src="assets/img/products/60x60/3.png" alt="" /></div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-1000 title">MacBook Pro - 13″</h6>
                                            <p class="fs--2 mb-0 d-flex text-700"><span
                                                    class="fw-medium text-600 ms-2">30 Sep at 12:30 PM</span></p>
                                        </div>
                                    </a>

                                </div>
                                <hr class="text-200 my-0" />
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Quick
                                    Links</h6>
                                <div class="py-2"><a class="dropdown-item"
                                        href="apps/e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">

                                            <div class="fw-normal text-1000 title"><span
                                                    class="fa-solid fa-link text-900"
                                                    data-fa-transform="shrink-2"></span> Support MacBook House</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">

                                            <div class="fw-normal text-1000 title"> <span
                                                    class="fa-solid fa-link text-900"
                                                    data-fa-transform="shrink-2"></span> Store MacBook″</div>
                                        </div>
                                    </a>

                                </div>
                                <hr class="text-200 my-0" />
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Files
                                </h6>
                                <div class="py-2"><a class="dropdown-item"
                                        href="apps/e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">

                                            <div class="fw-normal text-1000 title"><span
                                                    class="fa-solid fa-file-zipper text-900"
                                                    data-fa-transform="shrink-2"></span> Library MacBook folder.rar
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">

                                            <div class="fw-normal text-1000 title"> <span
                                                    class="fa-solid fa-file-lines text-900"
                                                    data-fa-transform="shrink-2"></span> Feature MacBook extensions.txt
                                            </div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">

                                            <div class="fw-normal text-1000 title"> <span
                                                    class="fa-solid fa-image text-900"
                                                    data-fa-transform="shrink-2"></span> MacBook Pro_13.jpg</div>
                                        </div>
                                    </a>

                                </div>
                                <hr class="text-200 my-0" />
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Members
                                </h6>
                                <div class="py-2"><a class="dropdown-item py-2 d-flex align-items-center"
                                        href="pages/members.html">
                                        <div class="avatar avatar-l status-online  me-2 text-900">
                                            <img class="rounded-circle " src="assets/img/team/40x40/10.webp" alt="" />

                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-1000 title">Carry Anna</h6>
                                            <p class="fs--2 mb-0 d-flex text-700">anna@technext.it</p>
                                        </div>
                                    </a>
                                    <a class="dropdown-item py-2 d-flex align-items-center" href="pages/members.html">
                                        <div class="avatar avatar-l  me-2 text-900">
                                            <img class="rounded-circle " src="assets/img/team/40x40/12.webp" alt="" />

                                        </div>
                                        <div class="flex-1">
                                            <h6 class="mb-0 text-1000 title">John Smith</h6>
                                            <p class="fs--2 mb-0 d-flex text-700">smith@technext.it</p>
                                        </div>
                                    </a>

                                </div>
                                <hr class="text-200 my-0" />
                                <h6 class="dropdown-header text-1000 fs--1 border-bottom border-200 py-2 lh-sm">Related
                                    Searches</h6>
                                <div class="py-2"><a class="dropdown-item"
                                        href="apps/e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">

                                            <div class="fw-normal text-1000 title"><span
                                                    class="fa-brands fa-firefox-browser text-900"
                                                    data-fa-transform="shrink-2"></span> Search in the Web MacBook</div>
                                        </div>
                                    </a>
                                    <a class="dropdown-item" href="apps/e-commerce/landing/product-details.html">
                                        <div class="d-flex align-items-center">

                                            <div class="fw-normal text-1000 title"> <span
                                                    class="fa-brands fa-chrome text-900"
                                                    data-fa-transform="shrink-2"></span> Store MacBook″</div>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="text-center">
                                <p class="fallback fw-bold fs-1 d-none">No Result Found.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>