let club_id = document.getElementById("club_id").value;
const ChatConatiner = document.querySelector(".chats-container-list");
const MessageForm = document.querySelector(".chat-form-typing-area");
const formSubmitBtn = document.querySelector(".form-submit-btn");
const message_field = document.querySelector(".user-message");
MessageForm.onsubmit = (e) => {
  e.preventDefault();
};
ChatConatiner.onmouseenter = () => {
  ChatConatiner.classList.add("active");
};

ChatConatiner.onmouseleave = () => {
  ChatConatiner.classList.remove("active");
};

formSubmitBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "UpdateChat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        message_field.value = "";
        let data = xhr.response;
        // eval(data);
        scrollToBottom();
      }
    }
  };
  let formData = new FormData(MessageForm);
  xhr.send(formData);
};
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "FetchChat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        ChatConatiner.innerHTML = data;
        if (!ChatConatiner.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("club_id=" + club_id);
}, 2000);
const scrollToBottom = () => {
//   ChatConatiner.scrollTo(0, ChatConatiner.scrollHeight + 100);
  ChatConatiner.scrollTop = ChatConatiner.scrollHeight;
};
