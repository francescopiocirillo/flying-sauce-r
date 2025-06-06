<?php
    /* questa pagina era originariamente il ricevente della richiesta AJAX fatta da ordina_ora.js, si è rilevato poi inutile
    spedire la richiesta ad un'altra pagina piuttosto che direttamente a ordina_ora.php e quindi per ridurre il numero
    complessivo di pagine dinamiche questo codice è stato integrato in ordina_ora.php */
    session_start();
    if(isset($_SESSION['loggato']) && $_SESSION['loggato']) {
        $logged = $_SESSION['loggato'];
        $email_user = $_SESSION['email'];

        /*connessione al database*/
        $host="localhost";
        $db='GruppoXX';
        $user="www";
        $password="password";
        $connection_string = "host=$host dbname=$db user=$user password=$password"; /* viene inizializzata una stringa di connessione */
        $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error()); /* inizializza la connessione */

        $alert="";
        if(isset($_POST['name_piatto'])) {
            $piatto = $_POST['name_piatto'];
            $name_piatto = pg_escape_string($db, $piatto);
            
            //logica per aumentare il numero
            $check = "SELECT quantita FROM carrello WHERE piatto = '$name_piatto' AND email = '$email_user'"; //manca il modo per far arrivare l'email qui
            $ret_select = pg_query($db, $check);

            if(isset($_POST['delete'])) {
                //if the dish quantity is more than one then we must update the entry in the database, otherwise
                //it would be the case to removerlo.
                $row = pg_fetch_array($ret_select);
                if($row['quantita'] == 1) {
                    //deletion
                    $deletionQuery = "DELETE FROM carrello WHERE piatto = '$name_piatto' AND email = '$email_user'";
                    pg_query($db, $deletionQuery);
                }
                else {
                    //update
                    $quantita = $row['quantita'] - 1;
                    $updateQuery = "UPDATE carrello SET quantita = '$quantita' WHERE piatto = '$name_piatto' AND email = '$email_user'";
                    pg_query($db, $updateQuery);
                }
            }
            else {
                if(pg_num_rows($ret_select) > 0) {
                    //update logic
                    $row = pg_fetch_array($ret_select);
                    if($row['quantita'] < 99) {
                        $quantita = $row['quantita'] + 1;
                        $updateQuery = "UPDATE carrello SET quantita = '$quantita' WHERE piatto = '$name_piatto' AND email = '$email_user'";
                        pg_query($db, $updateQuery);
                    }
                    else {
                        $alert = "<p>Siamo italiani, amiamo la pasta... ma sei sicuro di non stare esagerando?<br>Hai già aggiunto al carrello 99 piatti come questo!</p>";
                    }
                }
                else {
                    //add logic
                    $sql = "INSERT INTO carrello (piatto, email, quantita) VALUES ('$name_piatto', '$email_user', 1)";
                    $ret_insert = pg_query($db, $sql); /* viene eseguita la query */
                }
            }
        }
        
        //questa parte serve a ricaricare la lista visibile all'utente, la parte precedente deve aggiornare la lista stessa
        $list = "";
        $list_fetch = "SELECT piatto, quantita FROM carrello WHERE email = '$email_user'";
        $ret_list_fetch = pg_query($db, $list_fetch);
        while($row = pg_fetch_array($ret_list_fetch)) {
            $list .=  "<li><img src='media/remove_from_cart.png' alt='remove item from cart button' class='remover' height=20px width=auto/>" . $row[1] . "x " . $row[0] . "</li>";
        }
        pg_close($db);
        echo $alert . $list;
    }
    else {
        echo "NOT LOGGED";
    }
?>