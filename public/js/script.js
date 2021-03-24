//Page d'accueil
//Système d'onglet de la page d'accueil, section "Nos Services"
$('.tab').mouseenter(function () {  //Quand on passe la souris sur l'un des onglets

    //On retire la classe active du bouton
    //sélection du bouton via le parent du bouton cliqué, pour être sur de ne pas agir sur d'éventuels autre système d'onglets sur la même page
    $(this).parent().find('.tab.active').removeClass('active');

    $(this).addClass('active');//les propriétés css s'applique sur celui sur lequel on a cliqué

    //On enlève la classe active de la vue qui se trouve dans la div située après la div contenant le bouton qui a été cliqué
    $(this).parent().next().find('.view.active').removeClass('active');

    let viewNumber = $(this).data('view') -1; //déclaration d'une variable qui récupère le n°de view de l'onglet sur lequel on a cliqué

    //Ajout de la classe active à la xème vue (=viewNumber) à l'intérieur de la div contenant les vues à côté de la div parente du bouton qui a été cliqué
    $(this).parent().next().find('.view').eq(viewNumber).addClass('active');
});




//Popover
$(function () {
    $('[data-toggle="popover"]').popover()
});




//Animation d'apparition d'image sur ma page Produire Elec

let sr = new ScrollReveal();

sr.reveal('.load-hidden', {
    interval: 800

});

sr.reveal('.load-speed-hidden', {
    interval: 300
});

sr.reveal('.load-very-speed-hidden',{
    interval: 150
});


