<?php
    require_once("functions.php");

    $response = file_get_contents('https://coronavirus-19-api.herokuapp.com/all');
    $response = json_decode($response, true);
    if ($response == null) {
        covid::redirect("google.com");
    } else {
        $cases = $response['cases'];
        $recovered = $response['recovered'];
        $deaths = $response['deaths'];
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>COVID-19 Stats</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="COVID-19 Stats" />
        <meta name="author" content="Jan Pabisiak" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.min.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" type="image/png" href="assets/favicon.png"/>
        <style>

div.form {
            display: block;
            text-align: center;
        }
form {
            display: inline-block;
            margin-left: auto;
            margin-right: auto;
            text-align: left;
        }

input {
  height: 26px;
  padding: 0 16px;
  border: 2px solid #ddd;
  border-radius: 4px;
  outline: 0;
  margin-top: 20px;
}
        </style>
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
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                    <div class="form">
                                        <form action="stats.php" method="get">
                                            Country: <input type="text" name="country" /><br />
                                            <input type="submit" value="Select Country" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-box">
                                <h5 class="mt-0 font-17">Global Stats</h5>
                                    <div class="table-responsive">
                                        <table class="table table-centered">
                                            <tbody>
                                                <tr>
                                                    <td><svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.47 2 2 6.5 2 12S6.47 22 12 22C17.5 22 22 17.5 22 12S17.5 2 12 2M12 20C7.58 20 4 16.42 4 12S7.58 4 12 4 20 7.58 20 12 16.42 20 12 20M15.5 11C16.33 11 17 10.33 17 9.5S16.33 8 15.5 8 14 8.67 14 9.5 14.67 11 15.5 11M8.5 11C9.33 11 10 10.33 10 9.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11M12 13.5C9.67 13.5 7.69 14.96 6.89 17H17.11C16.31 14.96 14.33 13.5 12 13.5Z" /></svg> All cases</td>
                                                    <td>
                                                        <?php echo $cases; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg> All recovered</td>
                                                    <td>
                                                        <?php echo $recovered; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg> All deaths</td>
                                                    <td>
                                                        <?php echo $deaths; ?>
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