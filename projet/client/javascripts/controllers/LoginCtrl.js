class LoginCtrl {
    constructor(httpService) {
        // Ajouter des écouteurs d'événements aux boutons de connexion et d'inscription
        const btnConnexion = document.getElementById('btn_connexion');
        const btnRegister = document.getElementById('btn_register');

        if (btnConnexion) {
            btnConnexion.addEventListener('click', this.connexion.bind(this));
        }

        if (btnRegister) {
            btnRegister.addEventListener('click', this.inscription.bind(this));
        }

    }



    connexion(event) {
        event.preventDefault();

        // Récupérer les valeurs des champs de connexion
        const username = document.getElementById('login-username').value;
        const password = document.getElementById('login-password').value;


        console.log(username);
        console.log(password);
        checklogin(username, password, this.callback, this.callback);
        //var obj = JSON.parse(temp);

        // Effectuer la logique de connexion ici
        // Vous pouvez envoyer les données au serveur via une requête AJAX par exemple
        // Et gérer la réponse du serveur en conséquence
    }

    inscription(event) {
        event.preventDefault();

        // Récupérer les valeurs des champs d'inscription
        const username = document.getElementById('register-username').value;
        const password = document.getElementById('register-password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        if (password == confirmPassword) {
            register(username, password, this.callback, this.callback);

        } else {
            alert("Les mots de passes ne sont pas identique !");
        }


        // Effectuer la logique d'inscription ici
        // Vous pouvez envoyer les données au serveur via une requête AJAX par exemple
        // Et gérer la réponse du serveur en conséquence
    }


    callback(data, text, jqXHR) {

        alert(data.infos);
        console.log(data);
        if(data.status == true){
       // window.location.href = 'index.html';
        }
    }






}

// Initialisation de la classe LoginCtrl lors du chargement de la page
$(document).ready(function () {
    const loginCtrl = new LoginCtrl();
});
