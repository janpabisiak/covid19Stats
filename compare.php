/**
* A simple script written in PHP that displays COVID-19 stats.
* @license GNU General Public License
* @author Jan Pabisiak
* @copyright 2021 Jan Pabisiak
*/
<?php include_once("partial/header.php"); ?>
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
                    <form action="comparison" method="get" style="width: 50%;">
                        <input type="text" class="form-control" name="country1" required placeholder="Enter 1st Country Name (ex. Poland) or Country ID (ex. PL)">
                        <input type="text" class="form-control mt-3" name="country2" required placeholder="Enter 2nd Country Name (ex. Germany) or Country ID (ex. DE)">
                        <button class="btn btn-purple btn-lg mt-3" type="submit">
                            Compare <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M14 15V22H16V15H19L15 11L11 15H14M13 9H10V2H8V9H5L9 13L13 9Z" /></svg>
                        </button>
                    </form>
                </div>
            </div>
        </header>
<?php include_once("partial/footer.php"); ?>
