/*$(document).ready(function(){
  var str = window.location.href;
  
    if(str.includes("?register=success")){
    Swal.fire({
      icon: 'success',
        html:
    '<h4> Paskyros sukurta! Aktyvuokite savo el. paštą</h4>' +
        '<br>' +
    '<p>Pamatei klaidą ar iškilo techninių bėdų, susiekite : <strong> pagalba@bkworks.lt</strong></p>'
    })
    }

    if(str.includes("?register=fail")){
    Swal.fire({
      icon: 'success',
        html:
    '<h4> Paskyros sukurti nepavyko! Bandykite dar kartą</h4>' +
        '<br>' +
    '<p>Pamatei klaidą ar iškilo techninių bėdų, susiekite : <strong> pagalba@bkworks.lt</strong></p>'
    })
    }
});*/

const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
