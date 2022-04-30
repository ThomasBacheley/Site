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

function traitementMOTD(span_motd, motd_array) {
    motd_array.forEach(element => {
        let el = document.createElement('span');
        el.innerText = element['1'];
        switch (element['0']) {
            case 'black':
                el.style.color = '#000000';
                break;
            case 'dark_blue':
                el.style.color = '#0000AA';
                break;
            case 'dark_green':
                el.style.color = '#00AA00';
                break;
            case 'dark_aqua':
                el.style.color = '#00AAAA';
                break;
            case 'dark_red':
                el.style.color = '#AA0000';
                break;
            case 'dark_purple':
                el.style.color = '#AA00AA';
                break;
            case 'gold':
                el.style.color = '#FFAA00';
                break;
            case 'dark_gray':
                el.style.color = '#555555';
                break;
            case 'blue':
                el.style.color = '#5555FF';
                break;
            case 'green':
                el.style.color = '#55FF55';
                break;
            case 'aqua':
                el.style.color = '#55FFFF';
                break;
            case 'red':
                el.style.color = '#FF5555';
                break;
            case 'light_purple':
                el.style.color = '#FF55FF';
                break;
            case 'yellow':
                el.style.color = '#FFFF55';
                break;
            case 'white':
                el.style.color = '#FFFFFF';
                break;
            default:
                el.style.color = '#AAAAAA'
                break;
        }

        spanmotd.appendChild(el)
    });
}