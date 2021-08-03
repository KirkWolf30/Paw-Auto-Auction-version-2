



const burger = document.querySelector('#burger')
const sNav = document.querySelector('.snav')

burger.addEventListener('click' , function(){
    sNav.classList.toggle('active');
} )

const NavItems = document.querySelectorAll('.snav .navbar-item')
console.log(NavItems);
Array.from(NavItems).forEach(function(links){
    links.addEventListener('click', function(){
        sNav.classList.toggle('active');

    })
})