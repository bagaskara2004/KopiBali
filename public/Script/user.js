// dark mode
const btnTheme = document.getElementById('tema');
changeTheme();
function changeTheme() {
    let theme = localStorage.getItem('theme');
    if (theme == 'light') {
        document.body.setAttribute('data-bs-theme','light');
        btnTheme.children[0].classList.remove('bi-moon-fill');
        btnTheme.children[0].classList.add('bi-sun-fill');
    }else if (theme == 'dark') {
        document.body.setAttribute('data-bs-theme','dark');
        btnTheme.children[0].classList.remove('bi-sun-fill');
        btnTheme.children[0].classList.add('bi-moon-fill');
    }else{
        localStorage.setItem('theme','light');
        changeTheme();
    }
}
btnTheme.addEventListener('click',()=>{
    if (localStorage.getItem('theme') == 'light') {
        localStorage.setItem('theme','dark');
    }else{
        localStorage.setItem('theme','light');
    }
    changeTheme();
})

// navbar

const btnNavbar = document.getElementById('btnNavbar')
const navbarLink = document.getElementById('navbar-link')

btnNavbar.addEventListener('click',function () {
    navbarLink.classList.toggle('d-none')
    btnNavbar.children[0].classList.toggle('bi-x')
})