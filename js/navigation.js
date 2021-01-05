const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
//  navbarLinks.classList.toggle('active')
  
  if (navbarLinks.classList.contains("active")) {
        navbarLinks.classList.remove("active");
         
        // adds the menu (hamburger) icon
        toggleButton.querySelector("a").innerHTML = '<i class="fa fa-bars" aria-hidden="true"></i>';
    } else {
        navbarLinks.classList.add("active");
         
        // adds the close (x) icon
        toggleButton.querySelector("a").innerHTML = '<i class="fa fa-times" aria-hidden="true"></i>';
    }
})


