const SetLike = (article_id, SelfElement) => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "components/controllers/SetLike.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        if (xhr.responseText === "DONE" && xhr.responseText != "ERROR") {
          SelfElement.classList.toggle("active-like-btn");
        }else{
            console.log(xhr.response);
        }
      }
    }
  };
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("article_id=" + article_id);
};
