const SendRequestBtn = document.querySelector(".send-request-btn");
const SetBtnToRequested = () => {
  SendRequestBtn.innerHTML = "REQUESTED";
}
const SetBtnToSendRequest = () => {
  SendRequestBtn.innerHTML = "Send Request";
}
SendRequestBtn.onclick = () => {
  const FUID = document.getElementById("FUID").value;
  OpenLoader();
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../components/controllers/SendRequest.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        CloseLoader();
        console.log(xhr.response);
        eval(xhr.response);
      }
    }
  };
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("FUID=" + FUID);
}
const OpenLoader = () => {
  document.querySelector(".user-page-loader").style.display = "block";
}
const CloseLoader = () => {
  document.querySelector(".user-page-loader").style.display = "none";
}
const ReloadPage = () => {
  window.location.reload(true);
}