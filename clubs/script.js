function OpenUserList() {
  document
    .querySelector(".left-sidebar-clubs-list")
    .classList.toggle("left-sidebar-clubs-list-toggler");
}
const GoToHome = () => {
  parent.window.location.href = "../";
};
function ToggleClubsSidebar() {
  if (window.innerWidth <= 700) {
    document
      .querySelector(".left-sidebar-clubs-list")
      .classList.toggle("left-sidebar-clubs-list-toggler");
  }
//   alert("clicked");
}