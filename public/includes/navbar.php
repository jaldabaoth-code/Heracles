<?php
    
$uri = $_SERVER['REQUEST_URI'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= ($uri=='/index.php' || $uri=='/index' || $uri=='/') ? 'active' : '' ?>" aria-current="page" href="../">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($uri=='/heracles1/heracles1.php') ? 'active' : '' ?>" href="../heracles1/heracles1.php">Heracles 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($uri=='/heracles2/heracles2.php') ? 'active' : '' ?>" href="../heracles2/heracles2.php">Heracles 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($uri=='/heracles3/heracles3.php') ? 'active' : '' ?>" href="../heracles3/heracles3.php">Heracles 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($uri=='/heracles4/heracles4.php') ? 'active' : '' ?>" href="../heracles4/heracles4.php">Heracles 4</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
