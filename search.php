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
                    <form action="stats" method="get" style="width: 50%;">
                        <input type="text" class="form-control" name="country" required placeholder="Enter Country Name (ex. Poland) or Country ID (ex. PL)">
                        <button class="btn btn-purple btn-lg mt-3" type="submit">
                            Search <svg style="width:24px;height:24px" viewBox="0 0 24 24"><path fill="currentColor" d="M9.5,3A6.5,6.5 0 0,1 16,9.5C16,11.11 15.41,12.59 14.44,13.73L14.71,14H15.5L20.5,19L19,20.5L14,15.5V14.71L13.73,14.44C12.59,15.41 11.11,16 9.5,16A6.5,6.5 0 0,1 3,9.5A6.5,6.5 0 0,1 9.5,3M9.5,5C7,5 5,7 5,9.5C5,12 7,14 9.5,14C12,14 14,12 14,9.5C14,7 12,5 9.5,5Z" /></svg>
                        </button>
                    </form>
                </div>
            </div>
        </header>
<?php include_once("partial/footer.php"); ?>