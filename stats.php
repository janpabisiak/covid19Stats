<?php
    require_once("functions.php");

    $country = $_GET['country'];
    $response = file_get_contents('https://coronavirus-19-api.herokuapp.com/countries/'.$country);
    $response = json_decode($response, true);
    if ($response == null) {
        covid::redirect("404.php");
    } else if ($country == null) {
        covid::redirect("404.php");
    } else {
        $cases = $response['cases'];
        $recovered = $response['recovered'];
        $deaths = $response['deaths'];
        $tests = $response['totalTests'];
        $todayCases = $response['todayCases'];
        $todayDeaths = $response['todayDeaths'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title><?php echo $country; ?> - COVID-19 Stats</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="COVID-19 Stats" />
        <meta name="author" content="Jan Pabisiak" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" type="image/png" href="assets/favicon.png"/>
    </head>
    <body data-layout="horizontal">
        <div id="wrapper">
            <div class="content-page">
                <div class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h4 class="header-title mb-3">Welcome in COVID-19 Stats!</h4>
                                    <p><b>Warning! </b>You see statistics for <b><?php echo $country; ?></b>.</br><a href="index.php">Click here to change selected country.</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <div class="card-box widget-inline">
                                        <div class="row">
                                            <div class="col-xl-3 col-sm-6 widget-inline-box">
                                                <div class="text-center p-3">
                                                    <h2 class="mt-2"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.47 2 2 6.5 2 12S6.47 22 12 22C17.5 22 22 17.5 22 12S17.5 2 12 2M12 20C7.58 20 4 16.42 4 12S7.58 4 12 4 20 7.58 20 12 16.42 20 12 20M15.5 11C16.33 11 17 10.33 17 9.5S16.33 8 15.5 8 14 8.67 14 9.5 14.67 11 15.5 11M8.5 11C9.33 11 10 10.33 10 9.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11M12 13.5C9.67 13.5 7.69 14.96 6.89 17H17.11C16.31 14.96 14.33 13.5 12 13.5Z" /></svg> <b><?php echo $cases; ?></b></h2>
                                                    <p class="text-muted mb-0">All cases</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6 widget-inline-box">
                                                <div class="text-center p-3">
                                                    <h2 class="mt-2"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> <b><?php echo $recovered; ?></b></h2>
                                                    <p class="text-muted mb-0">All recovered</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6 widget-inline-box">
                                                <div class="text-center p-3">
                                                    <h2 class="mt-2"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg> <b><?php echo $deaths; ?></b></h2>
                                                    <p class="text-muted mb-0">All deaths</p>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6">
                                                <div class="text-center p-3">
                                                    <h2 class="mt-2"><svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M7,2V4H8V18A4,4 0 0,0 12,22A4,4 0 0,0 16,18V4H17V2H7M11,16C10.4,16 10,15.6 10,15C10,14.4 10.4,14 11,14C11.6,14 12,14.4 12,15C12,15.6 11.6,16 11,16M13,12C12.4,12 12,11.6 12,11C12,10.4 12.4,10 13,10C13.6,10 14,10.4 14,11C14,11.6 13.6,12 13,12M14,7H10V4H14V7Z" /></svg> <b><?php echo $tests; ?></b></h2>
                                                        <p class="text-muted mb-0">All tests</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                <h5 class="mt-0 font-17">Today Stats</h5>
                                    <div class="table-responsive">
                                        <table class="table table-centered">
                                            <tbody>
                                                <tr>
                                                    <td>Number of cases</td>
                                                    <td>
                                                        <?php echo $todayCases; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Number of deaths</td>
                                                    <td>
                                                        <?php echo $todayDeaths; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                <h5 class="mt-0 font-17">Numbers as a percentage</h5>
                                    <div class="table-responsive">
                                        <table class="table table-centered">
                                            <tbody>
                                                <tr>
                                                    <td>Mortality percentage</td>
                                                    <td>
                                                        <?php echo number_format(($deaths / $cases) * 100, 1) . "%"; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Recovered percentage</td>
                                                    <td>
                                                        <?php echo number_format(($recovered / $cases) * 100, 1) . "%"; ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="footer">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo date("Y"); ?> Copyright &copy; | <a href="https://github.com/janpabisiak">Jan Pabisiak</a> | COVID-19 Stats v1.0
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>