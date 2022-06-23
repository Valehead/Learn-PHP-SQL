<?php 
require_once($_SERVER['DOCUMENT_ROOT'] .'/Learn-PHP-SQL/src/bootstrap.php');
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

    <div class="container-fluid py-1 ms-2 me-5">
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
                </li>d
            </ul>
            

                


            <form action="/Learn-PHP-SQL/customers/search-customers.php" method="get" class="d-flex">
                <input class="form-control <?php echo is_user_logged_in() ? "me-2" : "me-4"; ?>" name="searchBox" type="search" id="myNavSearch" placeholder="Search Customers..." aria-label="Search">
            </form>

            <?php if(!is_user_logged_in()){ ?>
                <div class="mt-3 mt-lg-0">
                    <a href="/Learn-PHP-SQL/accounts/login.php"><button class="btn btn-outline-light me-3">Login</button></a>
                    <a href="/Learn-PHP-SQL/accounts/register.php"><button class="btn btn-warning">Sign Up</button></a>
                </div>
            <?php }; ?>

            <?php if(is_user_logged_in()){?>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown2" 
                            role="button" data-bs-toggle="dropdown" aria-expanded="false"
                            href="">My Account</a>

                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown2">
                                <li><a href="/Learn-PHP-SQL/accounts/my-account.php" class="dropdown-item disabled"><?= $_SESSION['username']; ?></a></li>
                                <li><hr class="dropdown-divider"></li>
                                <?php if(is_user_an_admin()){?><li><a href="/Learn-PHP-SQL/manage/admin.php" class="dropdown-item">Admin</a></li><?php };?>
                                <li><a href="/Learn-PHP-SQL/manage/dashboard.php" class="dropdown-item">Dashboard</a></li>
                                <li><a href="" class="dropdown-item disabled">Edit Profile</a></li>
                                <li><a href="" class="dropdown-item disabled">Settings</a></li>
                                <li><a href="/Learn-PHP-SQL/accounts/logout.php" class="dropdown-item">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php };?>
            
        </div>
    </div>

</nav>