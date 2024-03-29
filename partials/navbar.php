<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

    <div class="container-fluid">
        <a href="/Learn-PHP-SQL" class="navbar-brand">Learn-PHP-SQL</a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link <?php if($_SERVER['SCRIPT_NAME']=="/Learn-PHP-SQL/index.php") { echo 'active'; }; ?>" 
                    href="/Learn-PHP-SQL/">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php if($_SERVER['SCRIPT_NAME']=="/Learn-PHP-SQL/customers/search-customers.php" || 
                    $_SERVER['SCRIPT_NAME']=="/Learn-PHP-SQL/customers/view-customer.php" || 
                    $_SERVER['SCRIPT_NAME']=="/Learn-PHP-SQL/customers/edit-customer.php") { echo 'active'; }; ?>" 
                    href="/Learn-PHP-SQL/customers/search-customers.php">Customers</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php if($_SERVER['SCRIPT_NAME']=="/Learn-PHP-SQL/games/show-games.php" || 
                    $_SERVER['SCRIPT_NAME']=="/Learn-PHP-SQL/games/edit-game.php") { echo 'active'; }; ?>" 
                    href="/Learn-PHP-SQL/games/show-games.php">Games</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link disabled">Accounts</a>
                </li>
            </ul>


            <form action="/Learn-PHP-SQL/customers/search-customers.php" method="get" class="d-flex">
                <input class="form-control me-2" name="searchBox" type="search" id="myNavSearch" placeholder="Search Customers..." aria-label="Search">
                <button class="btn btn-outline-success" type="submit" id="submit">Search</button>
            </form>
        </div>
    </div>

</nav>