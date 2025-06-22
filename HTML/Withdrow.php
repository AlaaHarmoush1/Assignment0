<?php
include '../php/connection.php';
include './layouts/nav.php';
include '../php/HelperFunctions/handleError.php';


?>

<h1 class='Greetings'>Withdrow Money</h1>
<p class='Greetings'>You can Withdrow money from your balance account here.</p>


<form action="../php/Withdrow.php" method="POST">
    <input type="number" name="amount" step="0.01" min="0" placeholder="Enter amount to withdraw" required />
    <button type="submit">Withdrow</button>
</form>