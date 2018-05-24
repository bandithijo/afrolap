<!-- menu  -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="assets/img/site/logo_brand.png" style="width:135px;position:relative;top:-10px;"></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="index.php"><i class="glyphicon glyphicon-home"></i>&nbsp;Home</a></li>
                <li><a href="index.php?page=analysis"><i class="glyphicon glyphicon-check"></i>&nbsp;Analysis</a></li>

                <?php
                session_start();
                if(isset($_SESSION['username']) && isset($_SESSION['password'])){
                ?>
                <li><a href="index.php?page=import"><i class="glyphicon glyphicon-edit"></i>&nbsp;Import</a></li>
                <li><a href="index.php?page=export"><i class="glyphicon glyphicon-share"></i>&nbsp;Export</a></li>
                <?php
                }
                else {
                    echo "";
                }
                ?>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php
                if(isset($_SESSION['username']) && isset($_SESSION['password'])){
                    echo "<li><a href='index.php?page=logout'><i class='glyphicon glyphicon-log-out'></i> Logout</a></li>";
                } else {
                ?>
                <li><a href="index.php?page=login"><i class="glyphicon glyphicon-log-in"></i> Login</a></li><?php } ?>
            </ul>
        </div>
    </div>
</nav>
