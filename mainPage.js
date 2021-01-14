const profile = document.querySelector("#signin");
const gallery = document.querySelector("#signup");
const bar = document.querySelector('.sign');
const logout = document.createElement('li');
logout.innerHTML = `
<a class="nav-link" href="#"><button id='signup'class="sign-up" style = "background:silver">Log out </button></a>
`
async function checkLogin() {
    let data = await fetch('http://localhost//CarRentingWebSite/api/checklogin.php');
    let check = await data.json();

    if (check.user) {
        console.log('admin');


        profile.innerText = 'Profile';
        profile.addEventListener('click', () => {

            window.location.href = 'clientProfile/clientProfile.php';
        })
        gallery.innerText = 'Gallery';
        gallery.addEventListener('click', () => {

            window.location.href = 'gallery/gallery.php';
        });
        bar.appendChild(logout);
        logout.addEventListener('click', () => {
            window.location.href = 'api/logout.php'
        })



    } else if (check.admin) {
        profile.innerText = 'Profile';
        profile.addEventListener('click', () => {

            window.location.href = 'clientProfile/adminProfile.php';
        })
        gallery.innerText = 'Gallery';
        gallery.addEventListener('click', () => {

            window.location.href = 'gallery/gallery.php';
        });
        bar.appendChild(logout);
        logout.addEventListener('click', () => {
            window.location.href = 'api/logout.php'
        })
    } else {

        profile.addEventListener('click', () => {
            window.location.href = 'Login/login.php';
        })
        gallery.addEventListener('click', () => {

            window.location.href = 'signup/signup.php';
        })
    }
}
checkLogin();