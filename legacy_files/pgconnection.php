<?php
    $host="localhost";
    $db='GruppoXX';
    $user="www";
    $password="password";
    $connection_string = "host=$host dbname=$db user=$user password=$password";
    $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error());
    if( $db == false )
        echo "not ok";
    else
        echo "tutto ok";
    $sql = "SELECT nome, descrizione_breve, foto FROM menu WHERE categoria = 'classici'";
    $ret = pg_query($db, $sql);
    
    while( $row = pg_fetch_array($ret) ) {
        
        $nome = $row[0];
        $descrizione_breve = $row[1];
        $foto = $row[2];
?>
        <div>
            <img src="<?php echo $foto ?>" alt="foto del piatto di pasta">
        </div>
<?php        
    }
    
    /*
    $row = pg_fetch_row($ret);
    $nome = $row[0];
    $descrizione_breve = $row[1];
    $foto = $row[2];
    echo $nome;
    */
?>