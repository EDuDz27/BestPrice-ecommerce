    let btnMenu = document.getElementById('btn-menu')
    let menu = document.getElementById('menu-mobile')
    let overlay = document.getElementById('overlay-menu')

    btnMenu.addEventListener('click', ()=>{
        menu.classList.add('abrir-menu')
    })


    menu.addEventListener('click', ()=>{
        menu.classList.remove('abrir-menu')
    })

    overlay.addEventListener('click', ()=>{
        menu.classList.remove('abrir-menu')
    })

    document.addEventListener("DOMContentLoaded", function() {
        const userIcon = document.getElementById("user-icon");
        const userDropdown = document.getElementById("user-dropdown");
    
        userIcon.addEventListener("click", function() {
            userDropdown.style.display = userDropdown.style.display === "block" ? "none" : "block";
        });
    
        document.addEventListener("click", function(event) {
            if (!userIcon.contains(event.target) && !userDropdown.contains(event.target)) {
                userDropdown.style.display = "none";
            }
        });
    });
    