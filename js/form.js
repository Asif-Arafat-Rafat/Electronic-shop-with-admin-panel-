document.querySelector('.login-btn').onclick = function () {
    document.querySelector('.form-pro').style.right='0';
}
document.querySelector('.log-btn').onclick = function () {
    document.querySelector('.log-btn').style.opacity='100%';
    document.querySelector('.reg-btn').style.opacity='50%';
    document.querySelector('.registerform').style.display='none';
    document.querySelector('.loginform').style.display='flex';
}
document.querySelector('.reg-btn').onclick = function () {
    document.querySelector('.reg-btn').style.opacity='100%';
    document.querySelector('.log-btn').style.opacity='50%';    
    document.querySelector('.registerform').style.display='flex';
    document.querySelector('.loginform').style.display='none';

}
window.onscroll = () =>{
    document.querySelector('.form-pro').style.right='-500px';
};

