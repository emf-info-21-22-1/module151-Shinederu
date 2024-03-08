/*
 * Services HTTP
 *
 * @author Théo Jeanneret
 * @version 1.0 / 06.03.2024
 */

var BASE_URL_MESSAGE = "http://localhost:8081/Message.php";
var BASE_URL_ADMIN = "http://localhost:8081/Management.php";
var BASE_URL_LOGIN = "http://localhost:8081/Login.php";


function getMessages(successCallback, errorCallback) {
    $.ajax({
        type: "GET",
        dataType: "json",
        url: BASE_URL_MESSAGE,
        data: 'action=getAllMessages',
        success: successCallback,
        error: errorCallback
    });
}


function addMessage(message, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_MESSAGE,
        data: 'action=addMessage&message=' + message,
        success: successCallback,
        error: errorCallback
    });
}



function deleteMessage(pkMessage, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_MESSAGE,
        data: 'action=deleteMessage&pkMessage=' + pkMessage,
        success: successCallback,
        error: errorCallback
    });
}



function checklogin(username, password, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_LOGIN,
        data: 'action=checklogin&username=' + username + '&password=' + password,
        success: successCallback,
        error: errorCallback
    });
}


function disconnect(successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_LOGIN,
        data: 'action=disconnect',
        success: successCallback,
        error: errorCallback
    });
}

function register(username, password, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_LOGIN,
        data: 'action=register&username=' + username + '&password=' + password,
        success: successCallback,
        error: errorCallback
    });
}

function getAllUsers(successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_LOGIN,
        data: 'action=getAllUsers',
        success: successCallback,
        error: errorCallback
    });
}

function updateUser(pkUser, username, isAdmin, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_LOGIN,
        data: 'action=updateUser&pkUser=' + pkUser + '&username=' + username + '&isAdmin=' + isAdmin,
        success: successCallback,
        error: errorCallback
    });
}

function deleteUser(pkUser, successCallback, errorCallback) {
    $.ajax({
        type: "POST",
        dataType: "json",
        url: BASE_URL_LOGIN,
        data: 'action=updateUser&pkUser=' + pkUser,
        success: successCallback,
        error: errorCallback
    });
}
