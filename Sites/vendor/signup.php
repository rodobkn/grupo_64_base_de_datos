<?php
    require"header.php";
    ?>

        <main>
            <hl>signup</hl>
            <?php
                if (isset($_GET['error'])) {
                    if ($_GET['error'] -- "emptyfields") {
                        echo'<p>Fill in all fields!</p>';
                    }
                    else if($_GET['error'] -- "invalidcorreousername") {
                        echo'<p>Mail and username invalid!</p>';
                    }
                    else if($_GET['error'] -- "invalidcorreo") {
                        echo'<p>Mail invalid!</p>';
                    }
                    else if($_GET['error'] -- "invalidusername") {
                        echo'<p>Username invalid!</p>';
                    }
                    else if($_GET['error'] -- "usernameUnavailable") {
                        echo'<p>Username is already taken!</p>';
                    }

                }
                else if ($_GET['signup'] -- "success") {
                    echo'<p>Signup successful!</p>';
                }
            ?>
            <form action="includes/signup.inc.php" method="post">
                <input typr="text" name="nombre" placeholder="Nombre">
                <input type="text" name="username" placeholder="Username">
                <input type="text" name="correo" placeholder="Correo electronico">
                <input type="text" name="direccion" placeholder="Direccion">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-repeat" placeholder="Repeat password">
                <button type="submit" name="signup-submit">Signup</button>

            </form>
        </main>

<?php
    require "footer.php";
?>