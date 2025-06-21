<style>
    nav {
    background-color: #011099;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px
}

img {
    height: 50px;
}

.nav-links ul {
    list-style: none;
    display: flex;
    gap: 1.5rem;
    margin: 0;
    padding: 0;
}

.nav-links a {
    color: white;
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem;
    transition: color 0.3s ease, border-bottom 0.3s ease;
    padding-bottom: 4px;
}

.nav-links a:hover {
    color: #ffd700;
    border-bottom: 2px solid #ffd700;
}

</style>

<nav>
  <div class="logo-section">
    <a href="./Home.php"><img src="../assets/Images/logo.jpeg" alt="Logo"></a>
  </div>
  <div class="nav-links">
    <ul>
      <li><a href="./Home.php">Home</a></li>
      <li><a href="./Profile.php">Profile</a></li>
      <li><a href="./Deposite.php">Deposite</a></li>
      <li><a href="./Withdorw.php">Withdorw</a></li>
      <li><a href="./Transactons.php">Transacton History</a></li>
      <li><a href="../php/Logout.php">Logout</a></li>
    </ul>
  </div>
</nav>