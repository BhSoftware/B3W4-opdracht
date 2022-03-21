<?php 
    include_once './head.php';
    include_once './db-conect.php';

    $url = $_SERVER['REQUEST_URI'];
    $urlid = explode("=", $url);
    $urlid = $urlid[1];
?>

<body>
    <div class="container">
        <?php
            $query = 'SELECT * FROM characters WHERE id = '.$urlid . ' LIMIT 1';
            $characters = $db->query($query);
            foreach ($characters as $character){
                ?>
    <header>
        <h2> <?php echo $character['name']; ?></h2>
        <a href="./index.php" class="button__back">terug</a>
    </header>
        <div class="detail">
            <div class="left">
                <div class="top">
                    <img src="./img/<?php echo $character['avatar']?>" alt="afbeelding voor <?php echo $character['name']; ?>">
                </div>
                    <div class="bottom">
                        <ul>
                            <li><i class="fas fa-heart"></i> <?php echo $character['health'];?></li>
                            <li><i class="fas fa-fist-raised"></i> <?php echo $character['attack'];?></li>
                            <li><i class="fas fa-shield-alt"></i> <?php echo $character['defense'];?></li>
                        </ul>
                        <ul>
                            <?php
                                if($character['weapon'] != null){
                            ?>
                            <li><b>Weapon: </b><?php echo $character['weapon']?></li>
                            <?php
                                }
                            ?>
                            <?php 
                                if($character['armor'] != null){
                            ?>
                                <li><b>Armor: </b><?php echo $character['armor'] ?></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="right">
                    <p>
                        <?php echo $character['bio']; ?>
                    </p>
                </div>
            </div>
            <?php
            }
        ?>

        <?php include_once './footer.php'; ?>
    </div>
</body>
</html>