<?php
    include_once("partial/header.php");

    $country1 = $_GET['country1'];
    $country2 = $_GET['country2'];

    $response1 = file_get_contents('https://disease.sh/v3/covid-19/countries/'.$country1.'?yesterday=true&twoDaysAgo=true&strict=false');
    $response1 = json_decode($response1, true);
    if ($response1 == null) {
        redirect("404");
    } else if ($country1 == null) {
        redirect("404");
    } else {
        $updatedDate1 = $response1['updated'];
        $seconds1 = $updatedDate1 / 1000;
        $countryName1 = $response1['country'];
        $countryContinent1 = $response1['continent'];
        $countryPopulation1 = $response1['population'];
        $cases1 = $response1['cases'];
        $todayCases1 = $response1['todayCases'];
        $recovered1 = $response1['recovered'];
        $todayRecovered1 = $response1['todayRecovered'];
        $deaths1 = $response1['deaths'];
        $todayDeaths1 = $response1['todayDeaths'];
        $tests1 = $response1['tests'];
        $mortality1 = number_format(($deaths1 / $cases1) * 100, 1);
        $recoveredPercentage1 = number_format(($recovered1 / $cases1) * 100, 1);
    }

    $response2 = file_get_contents('https://disease.sh/v3/covid-19/countries/'.$country2.'?yesterday=true&twoDaysAgo=true&strict=false');
    $response2 = json_decode($response2, true);
    if ($response2 == null) {
        redirect("404");
    } else if ($country2 == null) {
        redirect("404");
    } else {
        $updatedDate2 = $response2['updated'];
        $seconds2 = $updatedDate2 / 1000;
        $countryName2 = $response2['country'];
        $countryContinent2 = $response2['continent'];
        $countryPopulation2 = $response2['population'];
        $cases2 = $response2['cases'];
        $todayCases2 = $response2['todayCases'];
        $recovered2 = $response2['recovered'];
        $todayRecovered2 = $response2['todayRecovered'];
        $deaths2 = $response2['deaths'];
        $todayDeaths2 = $response2['todayDeaths'];
        $tests2 = $response2['tests'];
        $mortality2 = number_format(($deaths2 / $cases2) * 100, 1);
        $recoveredPercentage2 = number_format(($recovered2 / $cases2) * 100, 1);
    }
?>
        <header>
            <div class="bg">
                <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
                    <div class="collapse navbar-collapse justify-content-left">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="/">EN</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/pl">PL</a>
                            </li>
                        </ul>
                    </div>
                </nav>
                <div class="container text-center">
                    <h1>TrackCovid.pl</h1>
                    <h5>Track Your Covid Way</h5>
                    <div class="buttons flex-row">
                        <a class="btn btn-purple btn-lg" href="https://TrackCovid.pl">
                            Global Stats
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M17.9,17.39C17.64,16.59 16.89,16 16,16H15V13A1,1 0 0,0 14,12H8V10H10A1,1 0 0,0 11,9V7H13A2,2 0 0,0 15,5V4.59C17.93,5.77 20,8.64 20,12C20,14.08 19.2,15.97 17.9,17.39M11,19.93C7.05,19.44 4,16.08 4,12C4,11.38 4.08,10.78 4.21,10.21L9,15V16A2,2 0 0,0 11,18M12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg>
                        </a>
                        <a class="btn btn-purple btn-lg" href="search">
                            Choose Country
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" /></svg>
                        </a>
                        <a class="btn btn-purple btn-lg" href="compare">
                            Compare Countries
                            <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M14 15V22H16V15H19L15 11L11 15H14M13 9H10V2H8V9H5L9 13L13 9Z" /></svg>
                        </a>
                    </div>
                    <p>You see statistics for <?php echo $countryName1; ?> vs <?php echo $countryName2; ?>!</p>
                </div>
            </div>
        </header>
        <div class="content">
            <main role="main">
                <section id="stats" class="pt-3">
                    <div class="container">
                        <h2 class="text-center mb-3 pt-2"><?php echo $countryName1; ?> vs <?php echo $countryName2; ?> | Stats</h2>
                        <center><p>Last updated: <?php echo date('m/d/Y H:i:s', $seconds1); ?></p></center>
                        <div class="row pb-5">
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($cases1); ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName1; ?> cases <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.47 2 2 6.5 2 12S6.47 22 12 22C17.5 22 22 17.5 22 12S17.5 2 12 2M12 20C7.58 20 4 16.42 4 12S7.58 4 12 4 20 7.58 20 12 16.42 20 12 20M15.5 11C16.33 11 17 10.33 17 9.5S16.33 8 15.5 8 14 8.67 14 9.5 14.67 11 15.5 11M8.5 11C9.33 11 10 10.33 10 9.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11M12 13.5C9.67 13.5 7.69 14.96 6.89 17H17.11C16.31 14.96 14.33 13.5 12 13.5Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($cases2); ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName2; ?> cases <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.47 2 2 6.5 2 12S6.47 22 12 22C17.5 22 22 17.5 22 12S17.5 2 12 2M12 20C7.58 20 4 16.42 4 12S7.58 4 12 4 20 7.58 20 12 16.42 20 12 20M15.5 11C16.33 11 17 10.33 17 9.5S16.33 8 15.5 8 14 8.67 14 9.5 14.67 11 15.5 11M8.5 11C9.33 11 10 10.33 10 9.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11M12 13.5C9.67 13.5 7.69 14.96 6.89 17H17.11C16.31 14.96 14.33 13.5 12 13.5Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($recovered1); ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName1; ?> recovered <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($recovered2); ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName2; ?> recovered <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,17.5C14.33,17.5 16.3,16.04 17.11,14H6.89C7.69,16.04 9.67,17.5 12,17.5M8.5,11A1.5,1.5 0 0,0 10,9.5A1.5,1.5 0 0,0 8.5,8A1.5,1.5 0 0,0 7,9.5A1.5,1.5 0 0,0 8.5,11M15.5,11A1.5,1.5 0 0,0 17,9.5A1.5,1.5 0 0,0 15.5,8A1.5,1.5 0 0,0 14,9.5A1.5,1.5 0 0,0 15.5,11M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M12,2C6.47,2 2,6.5 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12A10,10 0 0,0 12,2Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($deaths1); ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName1; ?> deaths <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($deaths2); ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName2; ?> deaths <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($tests1); ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName1; ?> tests <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M7,2V4H8V18A4,4 0 0,0 12,22A4,4 0 0,0 16,18V4H17V2H7M11,16C10.4,16 10,15.6 10,15C10,14.4 10.4,14 11,14C11.6,14 12,14.4 12,15C12,15.6 11.6,16 11,16M13,12C12.4,12 12,11.6 12,11C12,10.4 12.4,10 13,10C13.6,10 14,10.4 14,11C14,11.6 13.6,12 13,12M14,7H10V4H14V7Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($tests2); ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName2; ?> tests <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M7,2V4H8V18A4,4 0 0,0 12,22A4,4 0 0,0 16,18V4H17V2H7M11,16C10.4,16 10,15.6 10,15C10,14.4 10.4,14 11,14C11.6,14 12,14.4 12,15C12,15.6 11.6,16 11,16M13,12C12.4,12 12,11.6 12,11C12,10.4 12.4,10 13,10C13.6,10 14,10.4 14,11C14,11.6 13.6,12 13,12M14,7H10V4H14V7Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <h2 class="text-center mb-3 pt-2"><?php echo $countryName1; ?>, <?php echo $countryContinent1; ?> | Stats - only Today</h2>
                        <center><p>Last updated: <?php echo date('m/d/Y H:i:s', $seconds1); ?></p></center>
                        <div class="row pb-5">
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($todayCases1); ?>
                                    </div>
                                    <div class="stats-footer">
                                    <p><?php echo $countryName1; ?> cases today <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.47 2 2 6.5 2 12S6.47 22 12 22C17.5 22 22 17.5 22 12S17.5 2 12 2M12 20C7.58 20 4 16.42 4 12S7.58 4 12 4 20 7.58 20 12 16.42 20 12 20M15.5 11C16.33 11 17 10.33 17 9.5S16.33 8 15.5 8 14 8.67 14 9.5 14.67 11 15.5 11M8.5 11C9.33 11 10 10.33 10 9.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11M12 13.5C9.67 13.5 7.69 14.96 6.89 17H17.11C16.31 14.96 14.33 13.5 12 13.5Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($todayCases2); ?>
                                    </div>
                                    <div class="stats-footer">
                                    <p><?php echo $countryName2; ?> cases today <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12 2C6.47 2 2 6.5 2 12S6.47 22 12 22C17.5 22 22 17.5 22 12S17.5 2 12 2M12 20C7.58 20 4 16.42 4 12S7.58 4 12 4 20 7.58 20 12 16.42 20 12 20M15.5 11C16.33 11 17 10.33 17 9.5S16.33 8 15.5 8 14 8.67 14 9.5 14.67 11 15.5 11M8.5 11C9.33 11 10 10.33 10 9.5S9.33 8 8.5 8 7 8.67 7 9.5 7.67 11 8.5 11M12 13.5C9.67 13.5 7.69 14.96 6.89 17H17.11C16.31 14.96 14.33 13.5 12 13.5Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($todayRecovered1); ?>
                                    </div>
                                    <div class="stats-footer">
                                    <p><?php echo $countryName1; ?> recovered today <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($todayRecovered2); ?>
                                    </div>
                                    <div class="stats-footer">
                                    <p><?php echo $countryName2; ?> recovered today <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($todayDeaths1); ?>
                                    </div>
                                    <div class="stats-footer">
                                    <p><?php echo $countryName1; ?> deaths today <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($todayDeaths2); ?>
                                    </div>
                                    <div class="stats-footer">
                                    <p><?php echo $countryName2; ?> deaths today <svg style="width:20px;height:20px" viewBox="0 0 24 24"><path fill="currentColor" d="M12,2C6.47,2 2,6.47 2,12C2,17.53 6.47,22 12,22A10,10 0 0,0 22,12C22,6.47 17.5,2 12,2M12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4A8,8 0 0,1 20,12A8,8 0 0,1 12,20M16.18,7.76L15.12,8.82L14.06,7.76L13,8.82L14.06,9.88L13,10.94L14.06,12L15.12,10.94L16.18,12L17.24,10.94L16.18,9.88L17.24,8.82L16.18,7.76M7.82,12L8.88,10.94L9.94,12L11,10.94L9.94,9.88L11,8.82L9.94,7.76L8.88,8.82L7.82,7.76L6.76,8.82L7.82,9.88L6.76,10.94L7.82,12M12,14C9.67,14 7.69,15.46 6.89,17.5H17.11C16.31,15.46 14.33,14 12,14Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($countryPopulation1); ?>
                                    </div>
                                    <div class="stats-footer">
                                    <p><?php echo $countryName1; ?> population <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M13.07 10.41A5 5 0 0 0 13.07 4.59A3.39 3.39 0 0 1 15 4A3.5 3.5 0 0 1 15 11A3.39 3.39 0 0 1 13.07 10.41M5.5 7.5A3.5 3.5 0 1 1 9 11A3.5 3.5 0 0 1 5.5 7.5M7.5 7.5A1.5 1.5 0 1 0 9 6A1.5 1.5 0 0 0 7.5 7.5M16 17V19H2V17S2 13 9 13 16 17 16 17M14 17C13.86 16.22 12.67 15 9 15S4.07 16.31 4 17M15.95 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo number_format($countryPopulation2); ?>
                                    </div>
                                    <div class="stats-footer">
                                    <p><?php echo $countryName2; ?> population <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M13.07 10.41A5 5 0 0 0 13.07 4.59A3.39 3.39 0 0 1 15 4A3.5 3.5 0 0 1 15 11A3.39 3.39 0 0 1 13.07 10.41M5.5 7.5A3.5 3.5 0 1 1 9 11A3.5 3.5 0 0 1 5.5 7.5M7.5 7.5A1.5 1.5 0 1 0 9 6A1.5 1.5 0 0 0 7.5 7.5M16 17V19H2V17S2 13 9 13 16 17 16 17M14 17C13.86 16.22 12.67 15 9 15S4.07 16.31 4 17M15.95 13A5.32 5.32 0 0 1 18 17V19H22V17S22 13.37 15.94 13Z" /></svg></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <h2 class="text-center mb-3 pt-2"><?php echo $countryName1; ?> vs <?php echo $countryName2; ?> | numbers as percentage</h2>
                        <center><p>Last updated: <?php echo date('m/d/Y H:i:s', $seconds1); ?></p></center>
                        <div class="row pb-5">
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo $mortality1 . "%"; ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName1; ?> Mortality percentage</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo $mortality2 . "%"; ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName2; ?> Mortality percentage</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo $recoveredPercentage1 . "%"; ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName1; ?> Recovered percentage</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="stats-box">
                                    <div class="stats-body">
                                        <?php echo $recoveredPercentage2 . "%"; ?>
                                    </div>
                                    <div class="stats-footer">
                                        <p><?php echo $countryName2; ?> Recovered percentage</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <h2 class="text-center mb-3 pt-2">Comments</h2>
                        <div class="row pb-5">
                            <div class="col-md-12">
                            <div id="disqus_thread"></div>
<script>
    /**
    *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
    *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
    /*
    var disqus_config = function () {
    this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
    this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
    };
    */
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://trackcovid.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
<?php include_once("partial/footer.php"); ?>