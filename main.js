class PreviewImg {
  constructor(profil_id, fileImg_id) {
    this.profil = document.getElementById(profil_id);
    this.fileImg = document.getElementById(fileImg_id);
    if (this.fileImg) {
      this.fileImg.addEventListener("change", this.showPicture);
    }
  }
  showPicture() {
    let file = this.files[0];
    let reader = new FileReader();
    reader.readAsDataURL(file);
    let fileName = file.name;
    let extension = fileName.split(".").pop();
    let allowExt = ["jpg", "jpeg", "png", "bmp"];
    reader.onload = function () {
      if (allowExt.indexOf(extension) == 0) {
        profil.setAttribute("src", reader.result);
      } else {
        fileImg.value = "";
        profil.setAttribute("src", "");
      }
    };
  }
}

const showSelected = new PreviewImg("profil", "file-img");
