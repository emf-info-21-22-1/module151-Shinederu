/*
 * Services HTTP
 *
 * @author Théo Jeanneret
 * @version 1.0 / 06.03.2024
 */

var BASE_URL_MESSAGE = "http://localhost:8081/Message.php";
var BASE_URL_ADMIN = "http://localhost:8081/Admin.php";
var BASE_URL_LOGIN = "http://localhost:8081/Login.php";

/**
 * Fonction permettant récupérer les messages
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function getMessages(successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: BASE_URL_MESSAGE,
        data: 'action=getMessage',
        success: successCallback,
        error: errorCallback
    });
}

/**
 * Fonction permettant d'ajouter un message
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function addMessage(message, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_MESSAGE,
        data: 'action=ajouterMessage&message='+message,
        success: successCallback,
        error: errorCallback
    });
}


/**
 * Fonction permettant de s'inscrire.
 * @param {type} teamid, id de l'équipe dans laquelle trouver les joueurs
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function register(username, password ,successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_LOGIN,
        data: 'action=register&username='+username+'&password='+password,
        success: successCallback,
        error: errorCallback
    });
}

/**
 * Fonction permettant de se connecter.
 * @param {type} teamid, id de l'équipe dans laquelle trouver les joueurs
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function checkLogin(successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_LOGIN,
        data: 'action=cehckLogin&username='+username+'&password='+password,
        success: successCallback,
        error: errorCallback
    });
}

/**
 * Fonction permettant de se connecter.
 * @param {type} teamid, id de l'équipe dans laquelle trouver les joueurs
 * @param {type} Fonction de callback lors du retour avec succès de l'appel.
 * @param {type} Fonction de callback en cas d'erreur.
 */
function checkLogin(successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_LOGIN,
        data: 'action=disconnect',
        success: successCallback,
        error: errorCallback
    });
}