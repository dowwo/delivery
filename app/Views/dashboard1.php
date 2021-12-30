<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Delivery Chile</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Con esta versión de bootstrap funcionan bien las tarjetas, pero la barra de navegacion pierde la configuración-->
    <!--
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    -->
    <!-- Este es el que usaremos con bootstrap 3.3.0-->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link href="https://fonts.googleapis.com/css?family=Oleo+Script:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Teko:400,700" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Resources para amcharts 5 -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script>
        $(document).ready( function () {
            $('#users-list').DataTable( {
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "Lo sentimos, no se ha encontrado el registro",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros",

                    "infoFiltered": "(filtered from _MAX_ total records)",
                    "search": "Buscar",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            } )

            ;
        } );
    </script>

    <style>
        body {
            background-color: #AB3E5B;
        }
        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
        body {
            font-family: 'Poppins', sans-serif;
            background: #fafafa;
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1.1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #999;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .line {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #ddd;
            margin: 40px 0;
        }

        /* ---------------------------------------------------
            SIDEBAR STYLE
        ----------------------------------------------------- */

        .wrapper {
            display: flex;
            width: 100%;
            align-items: stretch;
        }

        #sidebar {
            min-width: 250px;
            max-width: 250px;
            background: #7386D5;
            color: #fff;
            transition: all 0.3s;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #6d7fcc;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1.1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #7386D5;
            background: #fff;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #fff;
            background: #6d7fcc;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        .dropdown-toggle::after {
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #6d7fcc;
        }

        ul.CTAs {
            padding: 20px;
        }

        ul.CTAs a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        a.download {
            background: #fff;
            color: #7386D5;
        }

        a.article,
        a.article:hover {
            background: #6d7fcc !important;
            color: #fff !important;
        }

        /* ---------------------------------------------------
            CONTENT STYLE
        ----------------------------------------------------- */

        #content {
            width: 100%;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s;
        }

        /* ---------------------------------------------------
            MEDIAQUERIES
        ----------------------------------------------------- */

        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #sidebarCollapse span {
                display: none;
            }
        }
    </style>
    <style>
        #chartdiv {
            width: 100%;
            height: 500px;
        }
    </style>

    <!-- Chart code -->
    <script>
        am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv");

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

// Create chart
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
            var chart = root.container.children.push(
                am5percent.PieChart.new(root, {
                    startAngle: 160, endAngle: 380
                })
            );

// Create series
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series

            var series0 = chart.series.push(
                am5percent.PieSeries.new(root, {
                    valueField: "litres",
                    categoryField: "country",
                    startAngle: 160,
                    endAngle: 380,
                    radius: am5.percent(70),
                    innerRadius: am5.percent(65)
                })
            );

            var colorSet = am5.ColorSet.new(root, {
                colors: [series0.get("colors").getIndex(0)],
                passOptions: {
                    lightness: -0.05,
                    hue: 0
                }
            });

            series0.set("colors", colorSet);

            series0.ticks.template.set("forceHidden", true);
            series0.labels.template.set("forceHidden", true);

            var series1 = chart.series.push(
                am5percent.PieSeries.new(root, {
                    startAngle: 160,
                    endAngle: 380,
                    valueField: "bottles",
                    innerRadius: am5.percent(80),
                    categoryField: "country"
                })
            );

            series1.ticks.template.set("forceHidden", true);
            series1.labels.template.set("forceHidden", true);

            var label = chart.seriesContainer.children.push(
                am5.Label.new(root, {
                    textAlign: "center",
                    centerY: am5.p100,
                    centerX: am5.p50,
                    text: "[fontSize:18px]total[/]:\n[bold fontSize:30px]1647.9[/]"
                })
            );

            var data = [
                {
                    country: "Lithuania",
                    litres: 501.9,
                    bottles: 1500
                },
                {
                    country: "Czech Republic",
                    litres: 301.9,
                    bottles: 990
                },
                {
                    country: "Ireland",
                    litres: 201.1,
                    bottles: 785
                },
                {
                    country: "Germany",
                    litres: 165.8,
                    bottles: 255
                },
                {
                    country: "Australia",
                    litres: 139.9,
                    bottles: 452
                },
                {
                    country: "Austria",
                    litres: 128.3,
                    bottles: 332
                },
                {
                    country: "UK",
                    litres: 99,
                    bottles: 150
                },
                {
                    country: "Belgium",
                    litres: 60,
                    bottles: 178
                },
                {
                    country: "The Netherlands",
                    litres: 50,
                    bottles: 50
                }
            ];

// Set data
// https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
            series0.data.setAll(data);
            series1.data.setAll(data);
    </script>

</head>

<body>

<?php
if(isset($_SESSION['msg'])){
    echo $_SESSION['msg'];
}
?>
<div>
    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Bienvenido <?php echo $_SESSION['nombre'] ?>
                </h3>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <?php if($_SESSION['rol_id_rol'] == 47174): ?>
                        <a href="dashboard3" class="card-link">Administrador</a>
                    <?php else: ?>
                        <!-- Admin link goes here -->
                    <?php endif; ?>
                </li>
                <li>
                    <a href="/dashboard1">Inicio</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Tienda</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <!--Redireccionar al agregar_tienda-->
                            <a href="agregar_tienda" class="card-link">Agregar tienda</a>
                        </li>
                        <li>
                            <!--Redireccionar al listar_tienda-->
                            <a href="lista_tienda" class="card-link">Listar Tienda</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pedidos</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu2">
                        <li>
                            <!--Redireccionar al agregar_tienda-->
                            <a href="seleccionar_tienda" class="card-link">Agregar Pedido</a>
                        </li>
                        <li>
                            <!--Redireccionar al listar_tienda-->
                            <a href="lista_pedidos" class="card-link">Ver Pedidos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a class="btn btn-outline-danger my-2 my-sm-0" href="../login/logout">Cerrar sesión</a>
                </li>
            </ul>
        </nav>


        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Ver/Ocultar Menu</span>
                    </button>

                </div>
            </nav>
            <div id="chartdiv"></div>

        </div>
    </div>
</div>

</body>
</html>
