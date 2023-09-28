<!DOCTYPE html>
<!-- <html lang="en-US" dir="ltr"> -->

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Centelha</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/brand2/centelha.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/brand2/centelha.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/brand2/centelha.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/brand2/centelha.png">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="vendors/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="vendors/simplebar/simplebar.min.js"></script>
    <script src="assets/js/config.js"></script>
    <script>
      document.documentElement.classList.add('navbar-horizontal');
    </script>







    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link href="vendors/simplebar/simplebar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="assets/css/theme-rtl.min.css" type="text/css" rel="stylesheet" id="style-rtl">
    <link href="assets/css/theme.min.css" type="text/css" rel="stylesheet" id="style-default">
    <link href="assets/css/user-rtl.min.css" type="text/css" rel="stylesheet" id="user-style-rtl">
    <link href="assets/css/user.min.css" type="text/css" rel="stylesheet" id="user-style-default">
    <script>
      var phoenixIsRTL = window.config.config.phoenixIsRTL;
      if (phoenixIsRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid px-0">
        <nav class="navbar navbar-vertical navbar-expand-lg">
          <script>
            var navbarStyle = window.config.config.phoenixNavbarStyle;
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('body').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <!-- scrollbar removed-->

          </div>
          <div class="navbar-vertical-footer">
            <button class="btn navbar-vertical-toggle border-0 fw-semi-bold w-100 white-space-nowrap d-flex align-items-center"><span class="uil uil-left-arrow-to-left fs-0"></span><span class="uil uil-arrow-from-right fs-0"></span><span class="navbar-vertical-footer-text ms-2">Collapsed View</span></button>
          </div>
        </nav>
        <nav class="navbar navbar-top fixed-top navbar-expand-lg" id="navbarTop" style="display:none;">
          <div class="navbar-logo">

            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTopCollapse" aria-controls="navbarTopCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="index.php">
              <div class="d-flex align-items-center">
                <div class="d-flex align-items-center"><img src="assets/img/brand2/centelha.png" alt="phoenix" width="80" />
                  <!-- <p class="logo-text ms-2 d-none d-sm-block">Centelha</p> -->
                </div>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse navbar-top-collapse order-1 order-lg-0 justify-content-center" id="navbarTopCollapse">
<h2> Fazer Busca </h2>
          </div>
          <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
              <!-- <div class="theme-control-toggle fa-icon-wait px-2">
                <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox" data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="moon"></span></label>
                <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch theme"><span class="icon" data-feather="sun"></span></label>
              </div> -->
            </li>
            <!-- <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchBoxModal"><span data-feather="search" style="height:19px;width:19px;margin-bottom: 2px;"></span></a></li> -->
            <li class="nav-item dropdown">
              <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-bs-auto-close="outside"><span data-feather="bell" style="height:20px;width:20px;"></span></a>

              <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border border-300 navbar-dropdown-caret" id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                <div class="card position-relative border-0">
                  <div class="card-header p-2">
                    <div class="d-flex justify-content-between">
                      <h5 class="text-black mb-0">Notificatons</h5>
                      <button class="btn btn-link p-0 fs--1 fw-normal" type="button">Mark all as read</button>
                    </div>
                  </div>
                  <div class="card-body p-0">

                  </div>
                  <div class="card-footer p-0 border-top border-0">
                    <div class="my-2 text-center fw-bold fs--2 text-600"><a class="fw-bolder" href="pages/notifications.html">Notification history</a></div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside" aria-expanded="false">
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

              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nide-dots shadow border border-300" aria-labelledby="navbarDropdownNindeDots">
                <div class="card bg-white position-relative border-0">
                  <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">

                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-l ">
                  <img class="rounded-circle " src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="" />

                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border border-300" aria-labelledby="navbarDropdownUser">
                <div class="card position-relative border-0">
                  <div class="card-body p-0">
                    <div class="text-center pt-4 pb-3">
                      <div class="avatar avatar-xl ">
                        <img class="rounded-circle " src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png" alt="" />

                      </div>
                      <h6 class="mt-2 text-black nome-cognito">Jerry Seinfield</h6>
                    </div>
                    <div class="mb-3 mx-3">
                      <!-- <input class="form-control form-control-sm" id="statusUpdateInput" type="text" placeholder="Update your status" /> -->
                    </div>
                  </div>
                  <div class="overflow-auto scrollbar" style="height: 10rem;">
                    <ul class="nav d-flex flex-column mb-2 pb-1">

                    <li class="nav-item"><a class="nav-link px-3" href="buscas.php"><i class="fa-solid fa-list"></i> <span> Buscas Feitas</span></a></li>
                     <!--  <li class="nav-item"><a class="nav-link px-3" href="#!"><span class="me-2 text-900" data-feather="pie-chart"></span>Dashboard</a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="lock"></span>Posts &amp; Activity</a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="settings"></span>Settings &amp; Privacy </a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="help-circle"></span>Help Center</a></li>
                      <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="globe"></span>Language</a></li>
                    </ul> -->
                  </div>
                  <div class="card-footer p-0 border-top">
                    <ul class="nav d-flex flex-column my-3">
                      <!-- <li class="nav-item"><a class="nav-link px-3" href="#!"> <span class="me-2 text-900" data-feather="user-plus"></span>Add another account</a></li> -->
                    </ul>
                    <hr />

                    <div class="px-3">
                    <button id="logoutButton" class="btn btn-phoenix-secondary d-flex flex-center w-100"><span class="me-2" data-feather="log-out"> </span> Sair</button>
                    </div>
                    <div class="my-2 text-center fw-bold fs--2 text-600"><a class="text-600 me-1" href="#!">Privacy policy</a>&bull;<a class="text-600 mx-1" href="#!">Terms</a>&bull;<a class="text-600 ms-1" href="#!">Cookies</a></div>
                  </div>
                </div>
              </div>
            </li>
          </ul>
        </nav>
        <script>
          var navbarVertical = document.querySelector('.navbar-vertical');
          navbarVertical.remove();
          navbarTop.removeAttribute('style');
        </script>
        <div class="modal fade" id="searchBoxModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true" data-phoenix-modal="data-phoenix-modal" style="--phoenix-backdrop-opacity: 1;">
          <div class="modal-dialog">
            <div class="modal-content mt-15 rounded-pill">
              <div class="modal-body p-0">
                <div class="search-box navbar-top-search-box" data-list='{"valueNames":["title"]}' style="width: auto;">
                  <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                    <input class="form-control search-input fuzzy-search rounded-pill form-control-lg" type="search" placeholder="Search..." aria-label="Search" />
                    <span class="fas fa-search search-box-icon"></span>

                  </form>
                  <div class="btn-close position-absolute end-0 top-50 translate-middle cursor-pointer shadow-none" data-bs-dismiss="search">
                    <button class="btn btn-link btn-close-falcon p-0" aria-label="Close"></button>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="content">
          <div class="pb-5">
            <div class="row g-4">
              <div class="col-12 col-xxl-6">
                <div class="mb-3">
                  <h2 class="mb-2">Buscas Feitas</h2>
                  <!-- <h5 class="text-700 fw-semi-bold">Fazer uma nova busca</h5> -->
                  <p class="fs--1"> <a class="fw-semi-bold" href="adm.php"><i class="fa-solid fa-magnifying-glass"></i> Fazer uma nova busca</a></p>

                </div>

                <hr class="bg-200" />


                <?php include 'busca_realizadas.html' ?>


                <ul id="listGroup" class="list-group">
</ul>



              </div>



                </div>
              </div>





          <footer class="footer position-absolute">
            <div class="row g-0 justify-content-between align-items-center h-100">
              <div class="col-12 col-sm-auto text-center">
              <div class="col-xl-auto text-center"><a href="#"><img src="https://deployvr.online/define/assets/img/icons/logo-white.png" height="48" alt="" /></a></div>
                <p class="mb-0 mt-2 mt-sm-0 text-900">Matech © Matech</p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600">v1.11.0</p>
              </div>
            </div>
          </footer>
        </div>
      </div>
      <script>
        var navbarTopStyle = window.config.config.phoenixNavbarTopStyle;
        var navbarTop = document.querySelector('.navbar-top');
        if (navbarTopStyle === 'darker') {
          navbarTop.classList.add('navbar-darker');
        }

        var navbarVerticalStyle = window.config.config.phoenixNavbarVerticalStyle;
        var navbarVertical = document.querySelector('.navbar-vertical');
        if (navbarVertical && navbarVerticalStyle === 'darker') {
          navbarVertical.classList.add('navbar-darker');
        }
      </script>

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->





    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/anchorjs/anchor.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/list.js/list.min.js"></script>
    <script src="vendors/feather-icons/feather.min.js"></script>
    <script src="vendors/dayjs/dayjs.min.js"></script>
    <script src="assets/js/phoenix.js"></script>
    <script src="vendors/echarts/echarts.min.js"></script>
    <script src="https://unpkg.com/@googlemaps/markerclusterer/dist/index.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDbaQGvhe7Af-uOMJz68NWHnO34UjjE7Lo&callback=revenueMapInit" async></script>
    <script src="assets/js/ecommerce-dashboard.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/aws-sdk/2.395.0/aws-sdk.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/amazon-cognito-identity-js@4.5.3/dist/amazon-cognito-identity.min.js"></script>



    <script>
let loggedInUser = localStorage.getItem('loggedInUser');

if (loggedInUser) {
    // seleciona o elemento <h6> com a classe "mt-2 text-black"
    let h6Element = document.querySelector('.nome-cognito');

    if (h6Element) {
        // insere o valor de loggedInUser no elemento
        h6Element.textContent = loggedInUser;
    } else {
        console.log('Elemento <h6> com a classe "mt-2 text-black" não encontrado.');
    }
} else {
    console.log('Nenhum usuário logado.');
}

      </script>



<script>
  const poolData = {
      UserPoolId: 'us-east-1_BaiGmcUff', // Seu User Pool ID aqui
      ClientId: '26mu8coq65rn4pvl06eturijqh' // Seu Client ID aqui
  };
  const userPool = new AmazonCognitoIdentity.CognitoUserPool(poolData);

  function redirectToAuthenticatedPage(name) {
      document.getElementById('authenticatedContent').style.display = 'block';
      document.getElementById('loggedInUserName').textContent = name;
      document.getElementById('loginForm').style.display = 'none';
      checkAuthentication();
  }

  function displayErrorMessage(message) {
      const errorContainer = document.getElementById('errorContainer');
      errorContainer.innerHTML = '';
      const errorMessage = document.createElement('p');
      errorMessage.textContent = message;
      errorContainer.appendChild(errorMessage);
      errorContainer.style.display = 'block';
  }

  function checkAuthentication() {
      const loggedInUser = localStorage.getItem('loggedInUser');
      const searchForm = document.getElementById('searchForm');
      const signupMessage = document.getElementById('signupMessage');
      const tableLog = document.getElementById('authenticatedContent');
      const signupMessageonline = document.getElementById('signupMessageonline');

      if (!loggedInUser) {
          searchForm.style.display = 'none';
          signupMessage.style.display = 'block';
          signupMessageonline.style.display = 'none';
      } else {
          searchForm.style.display = 'block';
          signupMessage.style.display = 'none';
          tableLog.style.display = 'block';
          signupMessageonline.style.display = 'block';
      }
  }

  window.addEventListener('load', function () {
      checkAuthentication();
  });

  function logout() {
      const cognitoUser = userPool.getCurrentUser();
      if (cognitoUser) {
          cognitoUser.signOut();
      }
      localStorage.removeItem('loggedInUser');
      window.location.href = 'logout.html'; // Redirecionar para a página logout.html
  }

  function executeGraphQLQuery(authToken, searchTerms) {
      const query = `
      query MyQuery {
  searchHistory {
    doc_count
    key
  }
}

      `;
      const graphqlEndpoint = 'https://alprko6tgjdincp4yvnavge7cm.appsync-api.us-east-1.amazonaws.com/graphql'; // Substitua pelo URL do seu endpoint GraphQL

      const headers = {
          Authorization: authToken,
          'Content-Type': 'application/json'
      };

      fetch(graphqlEndpoint, {
          method: 'POST',
          headers: headers,
          body: JSON.stringify({
              query: query
          })
      })
          .then((response) => response.json())
          .then((data) => {
              const tableBody = document.querySelector('#table tbody');
              tableBody.innerHTML = '';

              data.data.search.forEach((item) => {
                  const row = document.createElement('tr');
                  row.innerHTML = `
                      <td>${item.name}</td>
                      <td>${item.institution}</td>
                      <td>${item.leaders}</td>
                      <td>${item.field}</td>
                      <td>${item.productivity}</td>
                      <td>${item.country}</td>
                      <td>${item.description}</td>
                      <td>${item.title}</td>
                      <td>${item.link}</td>
                  `;
                  tableBody.appendChild(row);
              });

              $('#table').bootstrapTable('refreshOptions', {
                  data: data.data.search
              }).bootstrapTable('refresh');
          })
          .catch((error) => {
              console.error('Error executing GraphQL query:', error);
          });
  }

  window.addEventListener('load', function () {
      const loggedInUser = localStorage.getItem('loggedInUser');
      if (loggedInUser) {
          redirectToAuthenticatedPage(loggedInUser);

          const cognitoUser = userPool.getCurrentUser();
          if (cognitoUser) {
              cognitoUser.getSession(function (err, session) {
                  if (err) {
                      displayErrorMessage(err.message || 'Ocorreu um erro durante o login.');
                      return;
                  }
                  const authToken = session.getIdToken().getJwtToken();

                  document.getElementById('searchForm').addEventListener('submit', function (e) {
                      e.preventDefault();
                      const searchTerm = document.getElementById('searchTerm').value;
                      executeGraphQLQuery(authToken, searchTerm);
                  });

                  executeGraphQLQuery(authToken, '');
              });
          }
      }
  });

  document.getElementById('loginForm').addEventListener('submit', function (e) {
      e.preventDefault();
      const username = document.getElementById('username').value;
      const password = document.getElementById('password').value;

      const authenticationData = {
          Username: username,
          Password: password
      };
      const authenticationDetails = new AmazonCognitoIdentity.AuthenticationDetails(authenticationData);

      const userData = {
          Username: username,
          Pool: userPool
      };
      const cognitoUser = new AmazonCognitoIdentity.CognitoUser(userData);

      cognitoUser.authenticateUser(authenticationDetails, {
          onSuccess: function (result) {
              const accessToken = result.getAccessToken().getJwtToken();
              const name = result.getIdToken().payload.name;

              localStorage.setItem('loggedInUser', name);

              redirectToAuthenticatedPage(name);
          },
          onFailure: function (err) {
              displayErrorMessage(err.message || 'Ocorreu um erro durante o login.');
          }
      });
  });

  document.getElementById('logoutButton').addEventListener('click', logout);
</script>


<script>
// Obtém a referência para o botão de busca
const searchButton = document.getElementById('searchButton');

// Adiciona um ouvinte de evento para o clique no botão de busca
searchButton.addEventListener('click', function() {
  // Obtém o valor do campo de busca
  const searchTerm = document.getElementById('searchField').value;

  // Verifica se já existe uma lista de buscas no localStorage
  let searches = localStorage.getItem('searches');
  if (!searches) {
    // Se não houver, cria uma nova lista vazia
    searches = [];
  } else {
    // Se houver, converte a lista de JSON para array
    searches = JSON.parse(searches);
  }

  // Adiciona a nova busca ao início da lista
  searches.unshift(searchTerm);

  // Limita o tamanho da lista a, por exemplo, 10 itens
  if (searches.length > 10) {
    searches = searches.slice(0, 10);
  }

  // Salva a lista atualizada no localStorage
  localStorage.setItem('searches', JSON.stringify(searches));
});


</script>


<script>
// Obtém a referência para o elemento de histórico de busca
const searchHistoryElement = document.getElementById('searchHistory');

// Obtém a lista de buscas do localStorage
let searches = localStorage.getItem('searches');
if (searches) {
  // Converte a lista de JSON para array
  searches = JSON.parse(searches);

  // Percorre a lista de buscas e cria elementos HTML para exibi-las
  searches.forEach(function(searchTerm) {
    const searchItem = document.createElement('p');
    searchItem.textContent = searchTerm;
    searchHistoryElement.appendChild(searchItem);
  });
}

  </script>

  </body>

</html>