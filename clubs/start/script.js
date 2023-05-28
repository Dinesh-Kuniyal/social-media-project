// const back_btn_clubs_banner = document.getElementById("BackBtnClubBanner");
// back_btn_clubs_banner.onclick = () => {
//     alert("d");
//     // parent.OpenUserList();
// }
function ToggleInfoBox(){
    document.querySelector(".clubs-start-right-sidebar").classList.toggle("clubs-start-right-sidebar-toggler");
}
function OpenUserListInner(){
    parent.OpenUserList();
}