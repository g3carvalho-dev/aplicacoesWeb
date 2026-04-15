const container = document.querySelector('.container');
const registerBtn = document.querySelector('.register-btn');
const loginBtn = document.querySelector('.login-btn');

if(registerBtn) {
    registerBtn.addEventListener('click', () => {
        container.classList.add('active');
    });
}

if (loginBtn) {
    loginBtn.addEventListener('click', () => {
        container.classList.remove('active');
    });
}

function mostrarForca(senha) {
    let pontos = 0;
    if (senha.length >= 8)           pontos++;
    if (/[A-Z]/.test(senha))         pontos++;
    if (/[0-9]/.test(senha))         pontos++;
    if (/[^A-Za-z0-9]/.test(senha))  pontos++;

    const barra  = document.getElementById('nivel-forca');
    const dica   = document.getElementById('dica-senha');
    const cores  = ['#e24b4a', '#ef9f27', '#639922', '#1d9e75'];
    const labels = ['Muito fraca', 'Fraca', 'Boa', 'Forte'];

    barra.style.width      = (pontos * 25) + '%';
    barra.style.background = cores[pontos - 1] || cores[0];
    dica.textContent       = labels[pontos - 1] || 'Digite uma senha';
}

const header = document.querySelector('.header');

if (header) {

    let timerEntrada = null;
    let timerSaida = null;

    header.classList.add('visible');
    agendarSaida(6000);

    document.addEventListener('mousemove', (e) => {

        if (e.clientY <= 60) {
            clearTimeout(timerSaida);
            timerSaida = null;

            if (!header.classList.contains('visible') && !timerEntrada) {
                timerEntrada = setTimeout(() => {
                    timerEntrada = null;
                    header.classList.add('visible');
                    agendarSaida(5000);
                }, 1500);
            }
        } else {
            clearTimeout(timerEntrada);
            timerEntrada = null;
        }

    });

    function agendarSaida(ms) {
        clearTimeout(timerSaida);
        timerSaida = setTimeout(() => {
            header.classList.remove('visible');
            timerSaida = null;
        }, ms);
    }
}