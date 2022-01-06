
function connexion_button(btn_connexion, username) {
    if (username !== '') {
        btn_connexion.setAttribute('title', 'Dashboard');
        btn_connexion.setAttribute('data-bs-toggle', 'tooltip');
        btn_connexion.setAttribute('data-bs-placement', 'bottom');

        btn_connexion.innerText = username
    }
    btn_connexion.addEventListener('click', function () {
        window.location.href = './verification/verification_connexion.php'
    }, false);
}
