<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>@yield('title')</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="{{ asset('img/icons/icon-48x48.png') }}"/>
    <link href="{{ asset('/plugins/datatables/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.css">

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="{{ asset('/js/code.jquery.com_jquery-3.7.1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/plugins/datatables/datatables.js')}}"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script>(g => {
            var h, a, k, p = "The Google Maps JavaScript API", c = "google", l = "importLibrary", q = "__ib__",
                m = document, b = window;
            b = b[c] || (b[c] = {});
            var d = b.maps || (b.maps = {}), r = new Set, e = new URLSearchParams,
                u = () => h || (h = new Promise(async (f, n) => {
                    await (a = m.createElement("script"));
                    e.set("libraries", [...r] + "");
                    for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                    e.set("callback", c + ".maps." + q);
                    a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                    d[q] = f;
                    a.onerror = () => h = n(Error(p + " could not load."));
                    a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                    m.head.append(a)
                }));
            d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
        })
        ({key: "AIzaSyBg4qWmpGs4fnYJGsgfGqTiIgdsj_xoSTQ", v: "beta"});</script>

</head>

<body>
<div class="wrapper" id="corpo">

    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="{{route('inicio')}}">

                <span class="align-middle">v2.0.0.1</span>

            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <li class="sidebar-item <?php echo $local == 'inicio' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="{{route('inicio')}}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo $local == 'pedidos' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="{{route('pedidos')}}">
                        <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Pedidos</span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo $local == 'pontos' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="{{route('pontos')}}">
                        <i class="align-middle" data-feather="map-pin"></i> <span
                            class="align-middle">Pontos de Venda</span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo $local == 'clientes' ? 'active' : '' ?>">
                    <a class="sidebar-link" href="{{route('clientes')}}">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Clientes</span>
                    </a>
                </li>
                <li class="sidebar-header">
                    Relatórios
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-buttons.html">
                        <i class="align-middle" data-feather="book"></i><span class="align-middle">Calendário de embarque</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-forms.html">
                        <i class="align-middle" data-feather="book"></i><span class="align-middle">Calendário de embalagem</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-cards.html">
                        <i class="align-middle" data-feather="book"></i> <span
                            class="align-middle">Pedidos por data</span>
                    </a>
                </li>
                <li class="sidebar-header">
                    Pedidos
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-cards.html">
                        <i class="align-middle" data-feather="corner-down-right"></i> <span class="align-middle">Por situação</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-cards.html">
                        <i class="align-middle" data-feather="corner-down-right"></i> <span class="align-middle">Fechados</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-cards.html">
                        <i class="align-middle" data-feather="corner-down-right"></i> <span class="align-middle">Fechados lojas próprias</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="ui-cards.html">
                        <i class="align-middle" data-feather="corner-down-right"></i> <span class="align-middle">Faturados</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="charts-chartjs.html">
                        <i class="align-middle" data-feather="corner-down-right"></i> <span class="align-middle">Soma fechados clientes</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="mapsgoogle.html">
                        <i class="align-middle" data-feather="corner-down-right"></i> <span class="align-middle">Soma faturados clientes</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="mapsgoogle.html">
                        <i class="align-middle" data-feather="truck"></i> <span class="align-middle">Entrega</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>

            <div class="navbar-collapse collapse">
                <ul class="navbar-nav navbar-align">
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
                            <div class="position-relative">
                                <i class="align-middle" data-feather="bell"></i>
                                <span class="indicator">4</span>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                             aria-labelledby="alertsDropdown">
                            <div class="dropdown-menu-header">
                                4 New Notifications
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-2">
                                            <i class="text-danger" data-feather="alert-circle"></i>
                                        </div>
                                        <div class="col-10">
                                            <div class="text-dark">Update completed</div>
                                            <div class="text-muted small mt-1">Restart server 12 to complete the
                                                update.
                                            </div>
                                            <div class="text-muted small mt-1">30m ago</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-menu-footer">
                                <a href="#" class="text-muted">Show all notifications</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
                            <div class="position-relative">
                                <i class="align-middle" data-feather="message-square"></i>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0"
                             aria-labelledby="messagesDropdown">
                            <div class="dropdown-menu-header">
                                <div class="position-relative">
                                    4 New Messages
                                </div>
                            </div>
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <div class="row g-0 align-items-center">
                                        <div class="col-2">
                                            <img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle"
                                                 alt="Vanessa Tucker">
                                        </div>
                                        <div class="col-10 ps-2">
                                            <div class="text-dark">Vanessa Tucker</div>
                                            <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu
                                                tortor.
                                            </div>
                                            <div class="text-muted small mt-1">15m ago</div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="dropdown-menu-footer">
                                <a href="#" class="text-muted">Show all messages</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        </a>
                        <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                            <img src="{{ asset('img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1"
                                 alt="Charles Hall"/>
                            <span class="text-dark">Charles Hall</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="content">

            @yield('main-section')

        </main>

        <footer class="footer">
            <p>Meubles v2.0.0.1</p>
        </footer>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>

@yield('scripts')

</body>

</html>
