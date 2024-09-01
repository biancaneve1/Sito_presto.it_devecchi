// COMPARSA FORM HEADER
let HeaderTitle = document.querySelector('#headertitle');
let HeaderForm = document.querySelector('#headerform');
let formCreato = false;
HeaderTitle.addEventListener("mouseenter", () => {
    if (formCreato == false) {
        HeaderTitle.classList.add("titolo-header-din-margin");
        HeaderForm.classList.remove("d-none");
        HeaderForm.classList.add("formAnimation");
        formCreato = true;
    }
})
// FINE COMPARSA FORM HEADER

// MODALE LOGOUT
let modale = document.querySelector('#logoutModal');

modale.addEventListener('show.bs.modal', () => {
    modale.classList.add('.modal-bg');
})
modale.addEventListener('shown.bs.modal', () => {
    modale.style.backgroundColor = "rgba(0, 0, 0, 0.8)";
})
// FINE MODALE LOGOUT
