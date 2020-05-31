<?php
    require"header.php";
    ?>

        <main>
            <?php
                if (isset($_SESSION['userID'])) {
                    echo'<p>You are logget in!</p>';
                }
                else{
                    echo'<p>You are logged out!</p>';
                }
            ?>
        
        </main>

<?php
    require "footer.php";
?>