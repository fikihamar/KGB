    <?php
    $con = mysqli_connect("localhost", "root", "", "kgb");
    if (mysqli_connect_errno()) {
        echo "The Connection isn't avaible" . mysqli_connect_error();
    }
