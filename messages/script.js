function OpenUserList() {
  if (window.innerWidth <= 700) {
    document
      .querySelector(".messages-sidebar-container")
      .classList.toggle("messages-sidebar-container-toggler");
  }
}

function GoToSelectedUserChat() {
  document.querySelector(".messages-sidebar-container").style.left = "-100%";
}
const GoToHome = () => {
  window.location.href = "../";
};

const chats_sidebar = document.querySelector(".users-container-chat-sidebar");
setInterval(() => {
  UpdateMessageSidebar();
}, 3000);
const UpdateMessageSidebar = () => {
  let Error_Code = "DISON GASG";
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "UpdateSidebar.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        chats_sidebar.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("ErrorCode=" + Error_Code);
};

const ChangeChat = (url) => {
  document.querySelector(".chats-iframe").setAttribute("src", url);
};


const chatSearchBar = document.querySelector(".SearchBar");
const sidebar_search_box = document.querySelector(".sidebar-search-box");
chatSearchBar.onkeyup = () => {
  if(chatSearchBar.value != ""){
  sidebar_search_box.style.height = "200px";
  }else{
    sidebar_search_box.style.height = "0px";
  }
  PrintSidebarSearchResult(chatSearchBar.value);
  // sidebar_search_box.style.height = "200px";
}

const ChangeWindowLocation = (url) => {
  parent.window.location.href = url;
}


const PrintSidebarSearchResult = (InputValue) => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "GetSearchResultSidebar.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        sidebar_search_box.innerHTML = data;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("query=" + InputValue);
}