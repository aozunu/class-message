var star = $('.star');
var galaxie = 777;
var galaxieTiers = galaxie / 3;
var galaxieSept = galaxie / 7;
var galaxieVingtUn = galaxie / 21;
var galaxieQuarante = galaxie / 40;
var galaxieSoixante = galaxie / 60;
for (var i = 0; i < galaxie; i++) {
      star.clone().addClass('' +i+ '').appendTo('.all')
    };

var valeursH =[];
var valeursW =[];

$('.star').each(function() {
  var hstar = (Math.random() * 100).toFixed(1);
  var wstar = (Math.random() * 100).toFixed(1);
  
  if (jQuery.inArray(hstar, valeursH) != -1) {
    var doublonH = valeursH.indexOf(hstar);
    if (valeursW[doublonH] == wstar){
      $(this).addClass('geante');
    }
  }
  
  if (hstar <= 50 && wstar <= 50) {
    $(this).addClass('haut-g');
  } else if (hstar >= 50 && wstar <= 50) {
    $(this).addClass('bas-g');
  } else if (hstar <= 50 && wstar >= 50) {
    $(this).addClass('haut-d');
  } else {
    $(this).addClass('bas-d');
  }
  
  valeursH.push(hstar);
  valeursW.push(wstar);
  
  $(this).css({'top': ''+hstar+'%', 'left': ''+wstar+'%'});
  
 });

   

$('.star').each(function(i) {
  $(this).addClass('pink');
  return i<galaxieTiers;
 });

$('.star').not('.pink').each(function(i) {
  $(this).addClass('yellow');
  return i<galaxieTiers;
 });

$('.pink').each(function(i) {
  $(this).addClass('soleil');
  return i<galaxieSept;
 });

$('.yellow').each(function(i) {
  $(this).addClass('naine');
  return i<galaxieVingtUn;
 });

$('.pink').each(function(i) {
  $(this).addClass('novae');
  return i<galaxieQuarante;
 });

$('.yellow').each(function(i) {
  $(this).addClass('novae');
  return i<galaxieSoixante;
 });

function filante(){
  var t = Math.floor(Math.random() * 100);
  var l = Math.floor(Math.random() * 100);
  return [t,l];    
}
    
var first = true;
setInterval(function() {  
  $('.naine').each(function() {
    var trajectoire = filante();
    $(this).animate({
      opacity:Math.random(),
      top: trajectoire[0]+'%', 
      left: trajectoire[1]+'%',
      easing: 'easeInOutQuint',
      complete: function() {
        $(this).animate({
          opacity:Math.random(),
          top: trajectoire[0]+'%', 
          left: trajectoire[1]+'%',
          easing: 'easeInOutQuint',
        }, Math.floor(Math.random() * 5000))
      }
    }, Math.floor(Math.random() * 5000));
  });
}, (first ? 0 : 1000));
first = false;