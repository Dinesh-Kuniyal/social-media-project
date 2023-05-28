const explore_search_input = document.querySelector(".explore_search_input");
const result_container = document.querySelector(".main-container");
let url = "GetArticleSearch.php";

// Default Search On Window Load
let Given_Input_Value = explore_search_input.value;
let Input_Value;
if(Given_Input_Value === ""){
    Input_Value = "";
}else{
    Input_Value = Given_Input_Value;
}
let xhr = new XMLHttpRequest();
xhr.open("POST", "GetArticleSearch.php", true);
xhr.onload = () => {
  if (xhr.readyState === XMLHttpRequest.DONE) {
    if (xhr.status === 200) {
      let result = xhr.response;
      result_container.innerHTML = result;
    }
  }
};
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.send("SearchQuery=" + Input_Value);

// On Search Input Key Up
explore_search_input.onkeyup = () => {
  let Input_Value = explore_search_input.value;
  FetchResults(url, Input_Value);
};

const SetAllTabToNull = () => {
  let AllTabsList = document.querySelectorAll(".list-items");
  for (i = 0; i < AllTabsList.length; i++) {
    // AllTabsList[i].classList.remove = "active-list-items";
    AllTabsList[i].style.borderBottom = "0px";
  }
};

// Change Tab Function
const ChangeTab = (selfElement, value) => {
  let Input_Value = explore_search_input.value;
  SetAllTabToNull();
  selfElement.style.borderBottom = "2px solid #000";
  switch (value) {
    case "Topics":
      url = "GetTopicSearch.php";
      break;
    case "Clubs":
      url = "GetClubSearch.php";
      break;
    case "Peoples":
      url = "GetPeopleSearch.php";
      break;
    default:
      url = "GetArticleSearch.php";
      break;
  }
  FetchResults(url, Input_Value);
};

// Search From Files
const FetchResults = (url, Input_Value) => {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", url, true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let result = xhr.response;
        result_container.innerHTML = result;
      }
    }
  };
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("SearchQuery=" + Input_Value);
};

const ChangeWindowLocation = (url) => {
  window.location.href = url;
}