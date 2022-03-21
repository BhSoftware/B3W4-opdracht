<?php 
include_once './head.php';
include_once './db-conect.php';
?>
<body>
<div class="container">
    <?php 
        $query = "SELECT * FROM characters";
        $characters = $db->query($query); 
    ?>
    <header>
        <h2><?php 
            $query = "SELECT COUNT(*) FROM characters";
            $number = $db->query($query);
            $amount = $number->fetchAll();
            echo 'Alle ' .$amount[0][0] .' characters uit de database';
        ?></h2>
    </header>

    <div class="main">
        <?php 
            
        
            foreach($characters as $character){
                ?>
                <a class="item" href="./details.php?id=<?php echo $character['id']; ?>">
                    <img src="./img/<?php echo $character['avatar']?>" alt="">
                    <div class="content">
                        <h2><?php echo $character['name']; ?></h2>
                        <ul>
                            <li><i class="fas fa-heart"></i> <?php echo $character['health'];?></li>
                            <li><i class="fas fa-fist-raised"></i> <?php echo $character['attack'];?></li>
                            <li><i class="fas fa-shield-alt"></i> <?php echo $character['defense'];?></li>
                        </ul>

                    </div>
                </a>
                <?php
            }
        ?>
    </div>

    <?php 
        include_once './footer.php';
    ?>
</div>
    
</body>
</html>