<nav class="navbar">
    <div class="logo">paketmu.</div>

    <!-- HAMBURGER ICON -->
    <div class="hamburger" onclick="toggleMenu()">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <!-- NAV LINKS -->
    <ul class="nav-links" id="navMenu">
        <li><a href="login.php">Login</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav>

<script>
function toggleMenu() {
    document.getElementById("navMenu").classList.toggle("active");
}
</script>






