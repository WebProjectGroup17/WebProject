<div id="header">
    <div class="logo">
        <div class="img" >
            <h1><a href="index.php">Home</a></h1>
        </div>
        <div class="tools">
            <div style="float:right">
            <br/>
                <div class="user_form">
                    <form action="search.php" method="get">
                        <input type="text" name="kw" style="width:140px;" placeholder="Search products" />
                        <input type="submit" value="Search" />&nbsp;&nbsp;
                    </form>
                    <?php
                    if(empty($_SESSION['id'])) {?>
                        <a href="reg.php" class="item">Register</a>
                        <a href="login.php" class="item">Login</a>
                    <?php } else { ?>
                        Welcome,<?php echo $_SESSION['name']; ?>！
                        <a href="goods.php" class="item">Products</a>
                        <a href='exit.php'>Logout</a>&nbsp;&nbsp;
                    <?php } ?>
                </div>
                
            </div>
        </div>

    </div>
</div>