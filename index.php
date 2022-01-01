<?php
date_default_timezone_set('America/Argentina/Buenos_Aires');
$apiKey = "8564a2ab2e52e9902b500b154043d572";
$cityId = "3435261";
$googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=es&units=metric&APPID=" . $apiKey;


$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);

$data = json_decode($response);
$currentTime = time();

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- The above 2 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Aplicación desarrollada a base de ArgenMap para ubicar cuarteles de policia, bomberos y hospitales en la ciudad de Concordia." />
        <meta name="author" content="Joaquin Centurión & ArgenMap" />

        <meta id="og-type" property="og:type" content="website" />
        <meta id="og-title" property="og:title" content="" />
        <meta id="og-description" property="og:description" content="" />
        <meta id="og-image" property="og:image" content="" />

        <title>Concordia Urgencias - ArgenMap</title>

        <link rel="icon" href="src/styles/images/favicon.ico" />
        <!-- Bootstrap core CSS -->
        <link href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="https://getbootstrap.com/docs/3.3/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet" />

        <link rel="stylesheet" href="src/js/plugins/jquery/ui/jquery-ui.min.css" />

        <!-- Plugins -->
        <!-- jQuery -->
        <script src="src/js/plugins/jquery/jquery-3.3.1.min.js"></script>
        <script src="src/js/plugins/jquery/ui/jquery-ui.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.6.0/leaflet.css" />
        <!-- Better scale css -->
        <link rel="stylesheet" href="https://daniellsu.github.io/leaflet-betterscale/L.Control.BetterScale.css" />
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
        <!-- Awesome Markers -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Leaflet.awesome-markers/2.0.1/leaflet.awesome-markers.css" />
        <!-- Leaflet Zoomhome plugin -->
        <link rel="stylesheet" href="src/js/map/plugins/leaflet/leaflet-zoomhome/dist/leaflet.zoomhome.css" />
        <!-- Leaflet Minimap plugin -->
        <link rel="stylesheet" href="src/js/map/plugins/leaflet/leaflet-minimap/Control.MiniMap.css" />
        <!-- Leaflet Locate plugin -->
        <link rel="stylesheet" href="src/js/map/plugins/leaflet/leaflet-locate/L.Control.Locate.css" />
        <!-- Leaflet Mouse Position plugin -->
        <link rel="stylesheet" href="src/js/map/plugins/leaflet/leaflet-mouseposition/src/L.Control.MousePosition.css" />
        <!-- Leaflet Measure plugin -->
        <link rel="stylesheet" href="src/js/map/plugins/leaflet/leaflet-measure/leadflet-measure.css" />
        <!-- Leaflet Control.FullScreen plugin -->
        <link rel="stylesheet" href="src/js/map/plugins/leaflet/leaflet-fullscreen/Control.FullScreen.css" />
        <!-- Leaflet Draw From CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
        <!-- Leaflet SimpleGraticule -->
        <link rel="stylesheet" href="src/js/map/plugins/leaflet/leaflet-simplegraticule/L.SimpleGraticule.css" />
        <!-- fancybox files -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

        <script src="https://getbootstrap.com/docs/3.3/assets/js/ie-emulation-modes-warning.js"></script>

        <!-- Bootstrap core JavaScript placed at the end of the document so the pages load faster -->
        <script src="https://getbootstrap.com/docs/3.3/dist/js/bootstrap.min.js"></script>
        <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
        <script src="https://getbootstrap.com/docs/3.3/assets/js/vendor/holder.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="https://getbootstrap.com/docs/3.3/assets/js/ie10-viewport-bug-workaround.js"></script>

        <!-- Argenmap basic libraries  -->
        <script src="src/js/utils/analytics/analytics.js"></script>
        <script src="src/js/utils/constants/constants.js"></script>
        <script src="src/js/entities.js"></script>
        <script src="src/js/utils/functions/functions.js"></script>
        <script src="src/js/components/url-interaction/URLInteraction.js"></script>
        <script src="src/js/components/meta-tags-interaction/MetaTagsInteraction.js"></script>
        <script src="src/js/components/zoomLevel/ZoomLevel.js"></script>
        <script src="src/js/components/screenshot/screenshot.js"></script>
        <script src="src/js/components/openfiles/openfiles.js"></script>
        <script src="src/js/components/context-menu/context-menu.js"></script>
        <script src="src/js/components/user-message/user-message.js"></script>
        <script src="src/js/app.js"></script>
        <script src="src/js/components/login/login.js"></script>
        <script src="src/js/components/sidebar/sidebar.js"></script>

        <!--tabulator-->
        <link rel="stylesheet" href="src/js/plugins/tabulator/tabulator.min.css" />
        <script type="text/javascript" src="src/js/plugins/tabulator/tabulator.min.js"></script>
        <script src="src/js/components/table/Datatable.js"></script>
        <script src="src/js/components/table/UI.js"></script>
        <script src="src/js/components/table/table.js"></script>
        <script src="src/js/components/table/TouchPunch.js"></script>
        <link rel="stylesheet" href="src/js/components/table/table.css" />

        <!--html2canvas-->
        <script src="src/js/plugins/html2canvas/html2canvas.min.js"></script>

        <!-- Main Styles -->
        <link rel="stylesheet" href="src/styles/css/main.css" />
        <link href="src/styles/css/dashboard.css" rel="stylesheet" />
        <link href="src/js/components/zoomLevel/ZoomLevel.css" rel="stylesheet" />
        <link href="src/js/components/screenshot/screenshot.css" rel="stylesheet" />
        <link href="src/js/components/openfiles/openfiles.css" rel="stylesheet" />
        <link href="src/js/components/sidebar/sidebar.css" rel="stylesheet" />
        <link href="src/js/components/context-menu/context-menu.css" rel="stylesheet" />
        <link href="src/js/components/user-message/user-message.css" rel="stylesheet" />
        <style>
            body.modal {
                font-family: Arial;
                font-size: 0.95em;
                color: #929292;
            }

            .report-container {
                border: #e0e0e0 1px solid;
                padding: 20px 40px 40px 40px;
                border-radius: 2px;
                width: 550px;
                margin: 0 auto;
            }

            .weather-icon {
                vertical-align: middle;
                margin-right: 20px;
            }

            .weather-forecast {
                color: #212121;
                font-size: 1.2em;
                font-weight: bold;
                margin: 20px 0px;
            }

            span.min-temperature {
                margin-left: 15px;
                color: #929292;
            }

            .time {
                line-height: 25px;
            }
        </style>
    </head>
    <body>
        <nav class="navbar _navbar-inverse navbar-fixed-top">
            <div class="container-fluid col-12 col-xs-12 col-sm-12 col-md-12" style="height: 100%;">
                <div class="navbar-header">
                    <button type="button" class="hidden-lg hidden-md navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#sidebar-container" aria-expanded="false" aria-controls="sidebar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand navbar-right">
                        <span class="xxsmall-hide">
                            <a id="top-left-logo-link" href="#" target="_blank">
                                <img id="top-left-logo" src="src/styles/images/noimage.gif" alt="" title="" />
                            </a>
                        </span>
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse"></div>
                <span class="xxsmall-hide">
                    <a id="top-right-logo-link" href="#" target="_blank">
                        <img id="top-right-logo" src="https://mapa.ign.gob.ar/src/styles/images/noimage.gif" alt="" title="" style="top: 11px; position: absolute; right: 10px; width: 144px; float: right;" />
                    </a>
                    <a id="top-right-logo-link" href="https://www.concordia.gob.ar/" target="_blank">
                        <img id="top-right-logo" src="https://www.concordia.gob.ar/sites/default/files/logo-muni.png" alt="" title="Municipalidad de Concordia" style="top: 8px; position: absolute; right: 157px; width: 90px; float: right;" />
                    </a>
                </span>
            </div>
        </nav>
        <div class="container-fluid" style="height: 100%;">
            <div class="row" style="height: 100%;">
                <nav id="sidebar-container" class="col-12 col-xs-12 col-sm-12 col-md-2 collapse sidebar _panel-group" aria-expanded="false">
                    <div class="loading"><img src="src/styles/images/loading.svg" /></div>
                    <h2 style="color: #fff; text-align: center;">BETA</h2>
                    <p style="text-align: center;"><button type="button" class="btn btn-dark" data-toggle="modal" data-target="#climaModal">
                      Ver Clima
                    </button></p>
                    <div id="sidebar" class="nav nav-sidebar panel panel-default"></div>
                </nav>
                <div class="map-container">
                    <div id="mapa" class="col-xs-12 col-sm-12 col-md-10 col-md-offset-2 main"></div>
                </div>
            </div>
        </div>
        <div id="basemap-selector"></div>

        <div id="template"></div>
            <div class="modal fade" id="climaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 1600;">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-body">
                    <div class="report-container">
                        <h2>
                            Clima en <?php echo $data->name; ?>
                        </h2>
                        <div class="time">
                            <div><?php echo date("l g:i a", $currentTime); ?></div>
                            <div><?php echo date("jS F, Y",$currentTime); ?></div>
                            <div><?php echo ucwords($data->weather[0]->description); ?></div>
                        </div>
                        <div class="weather-forecast">
                            <img src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png" class="weather-icon" />
                            <?php echo $data->main->temp_max; ?>&deg;C<span class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
                            <span class="min-temperature"></span>
                        </div>
                        <div class="time">
                            <div>
                                Sens Termica:
                                <?php echo $data->main->feels_like; ?>&deg;C
                            </div>
                            <div>
                                Humedad:
                                <?php echo $data->main->humidity; ?> %
                            </div>
                            <div>
                                Viento:
                                <?php echo $data->wind->speed; ?> km/h
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                  </div>
                </div>
              </div>
            </div>
    </body>
</html>


