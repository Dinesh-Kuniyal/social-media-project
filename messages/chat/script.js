const Message_Form = document.querySelector(".chat-form-typing-area");
const shared_files_open_btn = document.querySelector(".more_horiz_chat_banner");
const chat_container = document.querySelector(".chats-container-list");
const ChatterId = document.querySelector(".Chatter-ID").value;
const FormSubmitBtn = document.querySelector(".form-submit-btn");
const message_field = document.querySelector(".user-message");
chat_container.onmouseenter = () => {
  chat_container.classList.add("active");
};

chat_container.onmouseleave = () => {
  chat_container.classList.remove("active");
};
Message_Form.onsubmit = (e) => {
  e.preventDefault();
};
FormSubmitBtn.onclick = () => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "SubmitChat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if (data != "ERROR" && data === "DONE") {
          message_field.value = "";
        } else {
          console.log(data);
        }
        scrollToBottom();
      }
    }
  };
  let formData = new FormData(Message_Form);
  xhr.send(formData);
};
message_field.focus();
shared_files_open_btn.onclick = () => {
  document
    .querySelector(".chats-info-container-right-side")
    .classList.toggle("chats-info-container-right-side-open");
};
const back_btn_chat_banner = document.querySelector(".BackBtnChatBanner");
back_btn_chat_banner.onclick = () => {
  parent.OpenUserList();
};
setInterval(() => {
  if (window.innerWidth <= 700) {
    document.querySelector(".BackBtnChatBanner").style.display = "block";
    // document.querySelector(".chats-info-container-right-side").style.marginRight = "-300px";
    // document.querySelector(".main-chat-area-container").style.paddingRight = "0px";
  } else {
    document.querySelector(".BackBtnChatBanner").style.display = "none";
    // document.querySelector(".chats-info-container-right-side").style.marginRight = "0px";
    // document.querySelector(".main-chat-area-container").style.paddingRight = "300px";
  }
}, 100);

// Fetch Chat in every 500ms
setInterval(() => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "FetchChat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chat_container.innerHTML = data;
        feather.replace();
        if (!chat_container.classList.contains("active")) {
          scrollToBottom();
        }
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("ChatterId=" + ChatterId);
}, 1200);


const ChangeParentLocation = (url) => {
  parent.window.location.href = url;
}
const scrollToBottom = () => {
  //   chat_container.scrollTo(0, chat_container.scrollHeight + 100);
    chat_container.scrollTop = chat_container.scrollHeight;
  };
  