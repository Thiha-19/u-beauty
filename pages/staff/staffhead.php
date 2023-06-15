<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/fh-3.3.2/r-2.4.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.css"
          rel="stylesheet"/>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/fh-3.3.2/r-2.4.1/rr-1.3.3/sc-2.1.1/sb-1.4.2/sp-2.1.2/sl-1.6.2/datatables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../index.css">
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg">
    <div class="container-fluid">
        <h1 class="navbar-brand logo-text">U-Beauty</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="customertable.php">Customer</a>
                    <div class="nav-underline"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="btable.php">Booking</a>
                    <div class="nav-underline"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ptable.php">Procedure</a>
                    <div class="nav-underline"></div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php">Logout</a>
                    <div class="nav-underline"></div>
                </li>
                <?php
                $currentdate = date('Y-m-d');
                $count = "SELECT COUNT(nid) as nnum
                            FROM noti
                            WHERE createdDate = '$currentdate'
                            ";
                $ret = mysqli_query($connection, $count);
                $res = mysqli_fetch_array($ret);
                $notiCount = $res["nnum"]
                ?>
                <li>
                    <div id="noti-container">
                        <?php
                        if ($res["nnum"] > 0)
                            echo "<div id='noti-count'>$notiCount</div>";
                        ?>

                        <a href="notiListAdmin.php" id="bell-container">
                            <svg id="noti-bell" class="icon" viewBox="0 0 24 24" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g id="Communication / Bell_Ring">
                                        <path id="Vector"
                                              d="M15 17V18C15 19.6569 13.6569 21 12 21C10.3431 21 9 19.6569 9 18V17M15 17H9M15 17H18.5905C18.973 17 19.1652 17 19.3201 16.9478C19.616 16.848 19.8475 16.6156 19.9473 16.3198C19.9997 16.1643 19.9997 15.9715 19.9997 15.5859C19.9997 15.4172 19.9995 15.3329 19.9863 15.2524C19.9614 15.1004 19.9024 14.9563 19.8126 14.8312C19.7651 14.7651 19.7047 14.7048 19.5858 14.5858L19.1963 14.1963C19.0706 14.0706 19 13.9001 19 13.7224V10C19 6.134 15.866 2.99999 12 3C8.13401 3.00001 5 6.13401 5 10V13.7224C5 13.9002 4.92924 14.0706 4.80357 14.1963L4.41406 14.5858C4.29477 14.7051 4.23504 14.765 4.1875 14.8312C4.09766 14.9564 4.03815 15.1004 4.0132 15.2524C4 15.3329 4 15.4172 4 15.586C4 15.9715 4 16.1642 4.05245 16.3197C4.15225 16.6156 4.3848 16.848 4.68066 16.9478C4.83556 17 5.02701 17 5.40956 17H9M18.0186 2.01367C19.3978 3.05299 20.4843 4.43177 21.1724 6.01574M5.98197 2.01367C4.60275 3.05299 3.5162 4.43177 2.82812 6.01574"
                                              stroke="#ffbf00" stroke-width="2" stroke-linecap="round"
                                              stroke-linejoin="round"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- <div id="body-section">
        <div class="gold-line-container">
            <div class="left-gold-line"></div>
            <div class="left-gold-line"></div>
        </div>
    <div class="gold-line-container">
        <div class="left-gold-line"></div>
        <div class="left-gold-line"></div>
    </div> -->
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>