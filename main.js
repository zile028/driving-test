class PreviewImg {
  constructor(profil_id, fileImg_id) {
    this.profil = document.getElementById(profil_id);
    this.fileImg = document.getElementById(fileImg_id);

    if (this.fileImg) {
      this.fileImg.addEventListener("change", this.showPicture.bind(this));
    }
  }

  showPicture() {
    let file = this.fileImg.files[0];
    let profil = this.profil;
    let fileImg = this.fileImg;

    let reader = new FileReader();
    reader.readAsDataURL(file);

    let fileName = file.name;
    let extension = fileName.split(".").pop().toLowerCase();

    let allowExt = ["jpg", "jpeg", "png", "bmp"];
    console.log(extension);
    console.log(allowExt.indexOf(extension));
    reader.onload = function () {
      if (allowExt.indexOf(extension) != -1) {
        profil.setAttribute("src", reader.result);
      } else {
        fileImg.value = "";
        profil.setAttribute(
          "src",
          "https://icon-library.com/images/no-icon-png/no-icon-png-14.jpg"
        );
        alert("Wrong format, alowed format is: " + allowExt.join(", "));
      }
    };
  }
}

const showSelected = new PreviewImg("profil", "file-img");
