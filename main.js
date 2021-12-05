// PREWIEV IMAGE BEFORE UPLOAD
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

    let allowExt = ["png", "jpg", "jpeg", "bmp"];
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
        alert(
          "Format fajla nije dozvoljen, dozvoljni format fajla je: " +
            allowExt.join(", ")
        );
      }
    };
  }
}

const showSelected = new PreviewImg("profil", "file-img");
// ============================================================================
// FLIP LOGIN REGISTER

let toRegister = document.getElementById("to-register");
let toLogin = document.getElementById("to-login");
let registerBox = document.querySelector(".register");
let loginBox = document.querySelector(".login");
let loginRegister = document.querySelector(".login-register");

if (loginRegister) {
  toRegister.addEventListener("click", flipRegister);
  toLogin.addEventListener("click", flipRegister);
}

function flipRegister() {
  loginRegister.classList.toggle("flipOn");
}
// =================================================================

// CHECK ANSWERS
let testBtn = document.querySelectorAll(".testBtn");
let finishTest = document.querySelector("[name='finish_test']");
let formTest = document.getElementById("form-test");
let question;
let inputs;
let points = 0;
if (formTest) {
  finishTest.addEventListener("click", postAnswer);

  testBtn.forEach((element) => {
    element.addEventListener("click", testFetch);
  });
}

async function postAnswer() {
  let qId_input = formTest.querySelectorAll("[data-name='question_id']");
  let answers_input = formTest.querySelectorAll("[data-name='answers']");
  let correctAnswer_input = formTest.querySelectorAll(
    "[data-name='correct_answer']"
  );
  let data = {};
  let question_id = {};
  let correct_answer = {};
  let answers = {};

  qId_input.forEach((el, index) => {
    question_id[el.value] = el.value;
    correct_answer[el.value] = correctAnswer_input[index].value;
  });

  answers_input.forEach((el) => {
    if (el.checked) {
      let qid = el
        .closest(".question")
        .querySelector("[data-name='question_id']").value;

      if (!(qid in answers)) {
        answers[qid] = {};
      }
      answers[qid][el.value] = el.value;
    }
  });

  data = {
    finish_test: true,
    test_id: "1",
    question_id: question_id,
    correct_answer: correct_answer,
    answers: answers,
  };
  await sendData(formTest.getAttribute("action"), data);
}

async function testFetch() {
  question = this.closest(".question");
  inputs = question.querySelectorAll("input");
  let solution = [];
  let questionId = this.getAttribute("data-qid");
  let checkedInput = [];
  inputs.forEach((el) => {
    el.setAttribute("disabled", true);
    if (el.checked) {
      checkedInput.push(el.closest("li"));
      solution.push(el.value);
    }
  });
  this.setAttribute("disabled", true);

  let data = { question_id: questionId, solution_id: solution };
  let answer = await postData(data);

  if (answer.is_correct) {
    question.querySelector(".card-header").classList.add("bg-success");
    points += parseInt(answer.points);
  } else {
    question.querySelector(".card-header").classList.add("bg-danger");
    answer.answers.forEach((el) => {
      question
        .querySelector(`li[data-solutionId="${el}"]`)
        .classList.add("bg-success");
    });
  }

  checkedInput.forEach((el) => {
    let inputValue = el.querySelector("input");
    inputValue.removeAttribute("disabled");
    if (answer.answers.includes(inputValue.value)) {
      el.classList.add("bg-success");
    } else {
      el.classList.add("bg-danger");
    }
  });
}

async function postData(data) {
  url = "checking.php";
  let formData = new FormData();
  formData.set("poslato", JSON.stringify(data));
  try {
    let result = await fetch(url, {
      method: "POST",
      body: formData,
    });
    return await result.json();
  } catch (error) {}
}

async function sendData(url, data) {
  let formData = new FormData();
  formData.set("poslato", JSON.stringify(data));
  try {
    let result = await fetch(url, {
      method: "POST",
      body: formData,
    });
    location.href = "user.php";
  } catch (error) {}
}
