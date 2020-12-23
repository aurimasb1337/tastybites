<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top " style="background-color:#f8f9fa !important">
        <div class="container" style="max-width: 80vw">
            <a class="navbar-brand" href="index.php" >tastybites`</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item ">
                    <a class="nav-link" href="index.php" ><i class="fas fa-home"></i> Namai <span class="sr-only">(current)</span></a>
                    </li>
                    <?php
                    if(isset($_SESSION['user'])){
                        ?>
                        <li class="nav-item"><a  class="nav-link" href="./logout.php">Logout</a></li>
                        <li class="nav-item"><a class="nav-link" href="./index.php#duk"><i class="far fa-question-circle"></i>D.U.K</a></li>
                        <?php
                    }else{
                    ?>
                     <li class="nav-item"><a class="nav-link" href="./login.php">Prisijungti</a></li>
                     <li class="nav-item"><a class="nav-link" href="./register.php">Registruotis</a></li>
                     <li class="nav-item"><a class="nav-link" href="./index.php#duk"><i class="far fa-question-circle"></i>D.U.K</a></li>
               
                    <?php

                    }
                    ?>
                  
                </ul>
                <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="tel:+37062339421"><i class="fas fa-phone"></i>+37062339421</a></li>
                     <li class="nav-item"><a class="nav-link" href="mailto:support@tastybites.com"><i class="far fa-paper-plane"></i>support@tastybites.com</a></li>
            </ul>
            </div>
        </div>
    </nav>