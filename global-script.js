// use default if not configured
if(typeof navigationOptions === 'undefined'){
  window.navigationOptions = {
     language : 'en',
     otherLocation : "http://www.nba.com/",
     usLocation : "http://www.nba.com/",
     optionText : "NBA.com",
     editionCookie: "edition"
   }
}

function handle_edition(){
  $("#edition_wrapper").show("slow"); // Using this to slowly display the div
  var hpc = $.cookie(navigationOptions.editionCookie);
  if (hpc != null && hpc == "us")
    document.editionForm.edition[1].checked = true;
  else
    document.editionForm.edition[0].checked = true;
}

function handle_redirect(){
  var hpCookie = $.cookie(navigationOptions.editionCookie);

  if (hpCookie == null) {
    window.location.href = navigationOptions.otherLocation;
  } else {
    if (hpCookie == "us") {
      window.location.href = navigationOptions.usLocation;
    } else {
      window.location.href = navigationOptions.otherLocation;
    }
  }
}

function set_HP_default(val){
  var expires = 1000 * 60 * 60 * 24 * 7; // set 7 days
  var today = new Date();
  today.setTime(today.getTime());
  expires = new Date(today.getTime() + (expires));
  $.cookie(navigationOptions.editionCookie, val, expires, "/")
  editionSetMessage();
  setTimeout('closeEdition()', 4000);
}

function closeEdition(){

  $("#edition_wrapper").hide(2000);
  document.getElementById("edition").className = "edition_open";
  document.getElementById("edition_message").className = "edition_closed";
}
function editionSetMessage(){
  document.getElementById("edition").className = "edition_closed";
  document.getElementById("edition_message").className = "edition_open";

}

function setEdition(){
  var selectedEdition = $('select#edition-select').val();
  set_HP_default(selectedEdition);
}

$(function(){
  $('<input> ' + navigationOptions.optionText + '</input>').attr({
    'type' : 'radio',
    'name' : 'edition',
    'value' : navigationOptions.language
  }).prependTo(".controls").click(function(){
    return set_HP_default(navigationOptions.language)
  });
  
 
  $('<option>' + navigationOptions.optionText + '</option>').attr({
    'value': navigationOptions.language
    }).prependTo("select#edition-select");
  
});