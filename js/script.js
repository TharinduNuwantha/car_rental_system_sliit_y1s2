// -------- for control mobile navigation slider --------

navNum = true;
function mobileSlider(){
    const bars = document.getElementById('bars');
    const mobileNav = document.getElementById('mobileNav');

    bars.addEventListener('click',function(){
        
        if(navNum === true){
            console.log('ok');
            mobileNav.style.left = "0%";
            navNum = false;
        }else{
            mobileNav.style.left = "-200%";
            navNum = true;
        }
    });
}
mobileSlider();