/**
 * Deve essere utilizzato window.onload anziché un listner su DOMContentLoaded perché è necessario che le variabili di sessione siano caricate
 */ 
window.onload = function () {
    var selectedDiv = sessionStorage.getItem("selected"); // questa variabile di sessione è l'ID del div che cliccato seleziona il div visibile;

    if(selectedDiv != null)
      document.getElementById("sel" + selectedDiv).click(); // clicca il div di selezione del div visibile
    else
      document.getElementById("selAnagrafica").click();  // se non è selezionato un div allora mostra l'anagrafica

    if(selectedDiv == "Spedizione") // se il div da visializzare è "Spedizione" allora è necessario capire quale form visualizzare
      visualizzaFormSpedizione();
}

  /**
   * Questa funzione viene chiamata all'onclick dei div di selezione. Cambia la visibilià dei div 
   * di informazioni rendnendo visibile il div selezionato dall'utente
   * @param {string} visibleDiv - l'id del div da mostrare
   */
  function switchDiv(visibleDiv) {
      var specialDiv = document.getElementById(visibleDiv);
      var allSections = document.getElementsByClassName("sezione");

    for(var i=0; i< allSections.length; i++){
      allSections[i].style.display= "none";     /*rendo invisibili prima tutti i div che appartengono alla classe sezione*/
    }

    sessionStorage.setItem("selected", visibleDiv); /* modifica la variabile di sessione che memorizza quale div è selezionato */

    specialDiv.style.display= "block";    /*procedo poi a rendere nuovamente visibile il div che è stato selezionato*/

    coloreSelezionato(visibleDiv);      /*per rendere più particolare il colore della sezione in cui ti trovi*/
}

/**
 * Questa funzione serve per cambiare il colore di backgroud dei div di selezione relativo al div che viene visualizzzato
 * @param {string} visibleDiv è il div che viene visualizzato
 */
function coloreSelezionato(visibleDiv) {
    var otherSel = document.getElementsByClassName('selezione');

    for(var i=0; i<otherSel.length; i++){
        otherSel[i].style.background= "#46666D";

        if(otherSel[i].id == "sel"+visibleDiv)
            otherSel[i].style.background="rgb(255, 174, 88)";
    }
}

/**
 * Questa funzione viene chiamata quando l'utente seleziona quale form di "Spedizione" visualizzare.
 * @param {string} idVisible è l'id del blocco da visualizzare, il suo valore verrà memorizzato nella variabile di sessione.
 * @param {string} idInvisible è l'id del blocco da nascondere.
 */
function visibleForm(idVisible, idInvisible) {
    document.getElementById(idInvisible).style.display = 'none';
    document.getElementById(idVisible).style.display = 'block';
    sessionStorage.setItem("visibleSpedizione", idVisible); /* memorizzo nella variabile di sessione quale form di "Spedizione" è selezionato (info o modifica) */
}

/**
 * funzione di utilità per visualizzare il form di "Spedizione"
 */
function visualizzaFormSpedizione() {
    // se è selezionato il div di "Spedizione" allora è necessario specificare se far apparire le info di spedizione o il form per modificare l'indirizzo.
    switch(sessionStorage.getItem("visibleSpedizione")) { // valore della variabile di sessione che memorizza quale form visualizzare
      case 'info-indirizzo': /* caso in cui il form visibile è quello delle info */
        document.getElementById("changeToInfo").click();
        break;
      case 'aggiorna-indirizzo': /* caso in cui il fomr visibile è quello per la modifica delle informazioni */
        document.getElementById("changeToAggiorna").click();
        break;
      default: /* di default mostra le informazioni */
        document.getElementById("changeToInfo").click();
        break;
    }
}

/**
 * Questa funzione valida la nuova password inserita nel form per cambiare la password utente.
 * @param {object} form è il form per cambiare la password. 
 * @returns true se la password inserita è valida, false altrimenti.
 */
function validaModulo_pass(form){
    //non effettuo controlli se i campi sono pieni poichè ho esplicitato con html la parola required
    if (form.newpass.value != form.repassword.value) { //controllo se password e conferma coincidono
        alert("Le due password non corrispondono");
        form.newpass.focus();
        form.newpass.select();
        return false;
    }else{			//se coincidono procedo a controllare se la password rispetta i canoni
        password = form.newpass.value;
        // Almeno 8 caratteri, una lettera maiuscola, un numero e un simbolo speciale
        const passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[!@#$%^&*()\-_=\+{};:,<\.>]).{8,}$/;
        if(passwordRegex.test(password) == false){
          alert("La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un carattere speciale.");
          return false;
        }
          return true;
    }
}
