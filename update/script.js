const edit_profile_form = document.querySelector(".form-edit-profile");
const save_changes_btn = document.querySelector(".save-changes-btn");
const Edit_Profile_Loader = document.querySelector(".edit-profile-loader");
const EditProfileAlertLabel = document.querySelector(
  ".edit-profile-alert-label"
);
const profilePhotoChanger = document.getElementById("user-profile-pic-btn");
const cover = document.querySelector("#cover");
edit_profile_form.onsubmit = (e) => {
  edit_profile_form.preventDefault();
};
const OpenProfileLoader = () => {
  Edit_Profile_Loader.style.display = "block";
};
const CloseProfileLoader = () => {
  Edit_Profile_Loader.style.display = "none";
};
const SetFormAlertEditF = (message) => {
  EditProfileAlertLabel.style.display = "block";
  EditProfileAlertLabel.innerHTML = message;
};
const ReloadWindowAfter = (value) => {
  setTimeout(() => {
    window.location.reload();
  }, value);
};
const UpdateProfilePhoto = (src) => {
  document.getElementById("profile-cover-holder").style.backgroundImage =
    "url(" + src + ")";
};
save_changes_btn.onclick = () => {
  OpenProfileLoader();
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "../modules/save-changes.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        CloseProfileLoader();
        let response = xhr.response;
        eval(response);
      }
    }
  };
  xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  let formData = new FormData(edit_profile_form);
  xhr.send(formData);
};
cover.onchange = () => {
  OpenProfileLoader();
  let xhrCover = new XMLHttpRequest();
  xhrCover.open("POST", "../modules/update-cover-photo.php", true);
  xhrCover.onload = () => {
    if (xhrCover.readyState === XMLHttpRequest.DONE) {
      if (xhrCover.status === 200) {
        CloseProfileLoader();
        let CoverResponse = xhrCover.response;
        eval(CoverResponse);
      }
    }
  };
  let formDataCover = new FormData(edit_profile_form);
  xhrCover.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhrCover.send(formDataCover);
};
const UpdateProfilePhotoPic = (src) => {
  document.querySelector(".user-profile-pic").setAttribute('src',src);
}
profilePhotoChanger.onchange = () => {
  OpenProfileLoader();
  let xhrCover = new XMLHttpRequest();
  xhrCover.open("POST", "../modules/update-profile-photo.php", true);
  xhrCover.onload = () => {
    if (xhrCover.readyState === XMLHttpRequest.DONE) {
      if (xhrCover.status === 200) {
        CloseProfileLoader();
        let CoverResponse = xhrCover.response;
        console.log(CoverResponse);
        eval(CoverResponse);
      }
    }
  };
  let formDataCover = new FormData(edit_profile_form);
  xhrCover.setRequestHeader("X-Requested-With", "XMLHttpRequest");
  xhrCover.send(formDataCover);
};
const ChangeLocation = (src) => {
  window.location.href = src;
}