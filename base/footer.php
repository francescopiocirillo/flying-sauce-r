<link rel="stylesheet" href="base/footer.css" type="text/css"> <!--collegamento al foglio di stile del footer-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat"> <!--collegamento al font Montserrat-->
<footer>
    <?php /* questo script php serve a ricevere ed elaborare il form per la newsletter */
        if(isset($_POST['email_newsletter'])) { /* tutta la logica viene eseguita solo se si è ricevuta la variabile 'email_newsletter' tramite POST */
            $email_newsletter = $_POST['email_newsletter'];
            /*connessione al database*/
            $host="localhost";
            $db='gruppo08';
            $user="www";
            $password="tw2024";
            $connection_string = "host=$host dbname=$db user=$user password=$password"; /* viene inizializzata una stringa di connessione */
            $db = pg_connect($connection_string) or die('Impossibile connettersi al database: '.pg_last_error()); /* inizializza la connessione */

            /* viene effettuata una query per cercare l'email inserita dall'utente nella tabella newsletter */
            $newsletter_search = "SELECT email FROM newsletter WHERE email = '$email_newsletter'";
            $newsletter_search_query = pg_query($db, $newsletter_search);
            if(pg_num_rows($newsletter_search_query) > 0) { /* se l'email è già presente nel database viene mostrato un alert con JS */
                echo "<script>alert("."'Sei già iscritto, grazie di far parte di questa grande famiglia!'".");</script>";
            }
            else { /* se l'email non è presente nel database allora bisogna fare una query per aggiungere la mail alla newsletter */
                $newsletter_add = "INSERT INTO newsletter (email) VALUES ($1)"; /* si presta attenzione a prevenire la SQL Injection */
                $newsletter_add_prepare = pg_prepare($db, "newsletter_add", $newsletter_add);
                $newsletter_add_query = pg_execute($db, "newsletter_add", array($email_newsletter));
                if(!$newsletter_add_query) { /* se la query per qualche ragione fallisce viene mostrato un alert con JS */
                    echo "<script>alert("."'Impossibile completare iscrizione'".");</script>";
                }
                else { /* se la query va a buon fine viene mostrato un messaggio di conferma via un alert con JS */
                    echo "<script>alert("."'Iscrizione completata con successo'".");</script>";
                }
            }
            pg_close($db); /* chiusura della connessione al database */
        }
    ?>
    <div id="footer_container"> <!--container del footer-->
        <div id="upper_footer_container"> <!--container della parte alta del footer-->
            <div id="newsletter_text"> <!--container del testo relativo alla newsletter-->
                <h1>Iscriviti alla nostra newsletter!</h1>
                <p id="margin_less">Riceverai sconti, regali e inviti ad eventi!</p>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="newsletter_form"> <!--form per l'inserimento della propria mail-->
                <label for="newsletter_field">e-mail: <input type="email" id="newsletter_field" name="email_newsletter" placeholder="Inserisci qui la tua e-mail" required></label> <!--la scelta di non rendere il form sticky è puramente estetica-->
                <input type="submit" value="REGISTRAMI" id="submit_newsletter_footer">
            </form>
        </div>
        <div id="lower_footer_container"> <!--container della parte bassa del footer-->
            <div id="trademark_footer"> <!--container della sezione che mostra il trademark-->
                <p>
                    FLYING SAUCE&reg;<br/>
                    <span>2023-2024</span>
                </p>
            </div>
            <div id="policies_footer"> <!--container della sezione che mostra i link alle varie informative-->
                <p>
                    LINK UTILI<br/>
                    <span><a href="informative/infoPrivacy.php" title="Info privacy">Privacy Policy</a></span><br/>
                    <span><a href="informative/condizioni.php" title="Condizioni iscrizione">Membership Policy</a></span>
                </p>
            </div>
            <div>
                <p id=follow>SEGUICI SU</p>
                <a class="social_footer" href="https://www.facebook.com/profile.php?id=61555762993624" title="Fb account"><i class="fa fa-facebook-square"></i></a> <!--bottone per andare alla pagina facebook-->
                <a class="social_footer" href="https://www.instagram.com/flying.sauce/" title="Ig account"><i class="fa fa-instagram"></i></a> <!--bottone per andare alla pagina instagram-->
            </div>
        </div>
    </div>
</footer>