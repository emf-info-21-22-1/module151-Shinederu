$(document).ready(function () {
    // service et indexCtrl sont des variables globales qui doivent être accessible depuis partout => pas de mot clé devant ou window.xxx
    httpService = new servicesHttp();
    indexCtrl = new IndexCtrl();  // ctrl principal
});

class IndexCtrl {

    constructor() {
    }

    
}