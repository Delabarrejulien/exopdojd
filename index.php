<?php 



$dsn = 'mysql:jost=localhost;dbname=colyseum;charset=utf8';
$user = 'colyseum';
$pass = 'aysqIJUDwB8im3Mi';

try{

$bddcolyseum = new PDO($dsn,$user,$pass);
} 

catch(Exception $e)
{
    die('erreur :'. $e->getMessage());
}

//afficher tous les clients.

try{

$result = $bddcolyseum->query("select * FROM `clients`");
}catch(PDOException $e){
    die('erreur :'. $e->getMessage());
}

print_r($result->fetchall(PDO::FETCH_OBJ));

//afficher tous types de spectecles.

try{

    $result = $bddcolyseum->query('select * FROM `showtypes`');
    }catch(PDOException $e){
        die('erreur :'. $e->getMessage());
    }
    
    print_r($result->fetchall(PDO::FETCH_OBJ));

//affiche 20 1er clients.

try {
    $result = $bddcolyseum->query('SELECT * FROM `clients` LIMIT 20');
    $first20Clients = $result->fetchAll();

} catch (PDOException $e) {
    die('erreur :'. $e->getMessage());
}

print_r($result->fetchall(PDO::FETCH_OBJ));

//clients avec carte 


try {
    $result = $bddcolyseum->query('SELECT * FROM `clients` WHERE `card` = 1');
    $vipCard = $result->fetchAll();

} catch (PDOException $e) {
    die('erreur :'. $e->getMessage());
    
}

print_r($result->fetchall(PDO::FETCH_OBJ));


//clients dont le nom commence par M et par ordre alphabetique

try {
    $result = $bddcolyseum->query('SELECT * FROM `clients` WHERE `lastName` LIKE "M%" ORDER BY `lastName`');
    $nameByOrder = $result->fetchAll();

} catch (PDOException $e) {
    die('erreur :'. $e->getMessage());
}

    print_r($result->fetchall(PDO::FETCH_OBJ));

// spectecle par heure date ect...

    try {
        $sql = 'SELECT `title`, `performer`, `date`, `startTime` FROM `shows` ORDER BY `title`';
        $result = $bddcolyseum->query($sql);
        $events = $result->fetchAll(PDO::FETCH_OBJ);

    } catch (PDOException $e) {
        die('erreur :'. $e->getMessage());
        
    }

    


 





include('views/header.php');

?>

<h1 class="col-12"> Exercice 6 </h1>

    <?php
        foreach($events as $event){
            $date = date('d.m.Y', strtotime($event->date));
    ?>
        <div><?= $event->title?> par <?= $event->performer?>, le <?= $date?> à <?= $event->startTime?></div>
    <?php }?>
    

          

<?php
               include('views/footer.php');    

                 
?>

