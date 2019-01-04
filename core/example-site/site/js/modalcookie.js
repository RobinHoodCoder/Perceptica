// document.addEventListener('DOMContentLoaded', function(){
//
//     //Input variabelen
//     var functionalCookie = document.getElementById('checkbox_1');
//     var analyticsCookie = document.getElementById('checkbox_2');
//     var advertisingCookie = document.getElementById('checkbox_3');
//     var submitButton = document.querySelector('.submit-cookie');
//     var completeForm = document.getElementById('cookieForm');
//     var editSettings = document.querySelector('.edit-settings');
//     var cookieText = document.querySelector('.cookie-message .content .text');
//
//     //Alle items in localstorage worden JSON Parsed omdat booleans nog niet werken in localstorage... yep.
//
//     //Check of localstorage beschikbaar is
//     if (typeof(Storage) !== "undefined") {
//
//         //Als cookies nog niet geaccepteerd zijn, laat de melding zien
//         if (JSON.parse(localStorage.getItem('acceptedCookies')) !== true) {
//             setTimeout(function(){
//                 document.querySelector('.cookie-message').classList.add('active');
//             },500);
//         }
//
//         function reopenMessage(event){
//             event.preventDefault();
//             document.querySelector('.cookie-message').classList.add('active');
//         }
//
//         function readMoreMobile(event){
//             event.preventDefault();
//             document.querySelector('.cookie-message .text').classList.add('active');
//         }
//
//         //Check wat users wel of niet willen en zet in localstorage
//         function checkCookieSettings(){
//
//             if (functionalCookie.checked === true) {
//                 localStorage.setItem("functionalCookie", "true");
//             }
//             if (analyticsCookie.checked === true) {
//                 localStorage.setItem("analyticsCookie", "true");
//             }else{
//                 localStorage.setItem("analyticsCookie", "false");
//             }
//             if (advertisingCookie.checked === true) {
//                 localStorage.setItem("advertisingCookie", "true");
//             }else{
//                 localStorage.setItem("advertisingCookie", "false");
//             }
//
//             //Cookies zijn geaccepteerd
//             localStorage.setItem("acceptedCookies", "true");
//
//             //reload pagina
//             location.reload();
//         }
//
//         //Luister naar klik op 'ok'
//         submitButton.addEventListener('click', checkCookieSettings);
//         if (editSettings !== null) {
//             editSettings.addEventListener('click', reopenMessage);
//         }
//
//         if (cookieText !== null) {
//             cookieText.addEventListener('click', readMoreMobile);
//         }
//
//     } else {
//         console.error('Oops, geen localstorage/cookie support');
//     }
//
//     //Analytics cookies
//     if (JSON.parse(localStorage.getItem('acceptedCookies')) === true && JSON.parse(localStorage.getItem('analyticsCookie')) === true) {
//         analyticsCookie.checked = true;
//     }
//
//     //Plaats hierin 'advertising' cookies
//     if (JSON.parse(localStorage.getItem('acceptedCookies')) === true && JSON.parse(localStorage.getItem('advertisingCookie')) === true) {
//         advertisingCookie.checked = true;
//     }
//
//     if (JSON.parse(localStorage.getItem('acceptedCookies')) === true && JSON.parse(localStorage.getItem('analyticsCookie')) === false) {
//         analyticsCookie.checked = false;
//     }
//
//
// }, false);