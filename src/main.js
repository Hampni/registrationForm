import "./style.css";
import { firstStep, secondStep } from "./steps";

const second_form = document.querySelector(".agileits-top-second");
const buttons = document.querySelector(".agileits-top-third");
const titlePart = document.querySelector(".titlePart");

$("#phone").mask(" (999) 999-999?9", {
  placeholder: "",
});

$("#birthday").datepicker({
  dateFormat: "dd-mm-yy",
  changeYear: true,
  changeMonth: true,
  yearRange: "1951:2021",
  currentText: "Now",
  maxDate: "-1y",
});

const array = [
  "first_name",
  "last_name",
  "birthday",
  "report_subject",
  "country",
  "phone",
  "email",
  "company",
  "position",
  "about_me",
];

const arrayLabels = [];
for (const item in array) {
  arrayLabels[array[item]] = document.getElementById(
    array[item] + "_label"
  ).innerHTML;
}

const input = document.querySelector("#phone");

window.intlTelInput(input, {
  autoPlaceholder: "aggressive",
});
const iti = intlTelInput(input);
$("#phone").on("change", function () {
  $("#phone")[0].value =
    "+" + iti.getSelectedCountryData().dialCode + $("#phone")[0].value;
});

$(document).on("click", function (e) {
  if (!$(e.target).closest("#position").length) {
    $("#position")[0].placeholder = "Position";
  }
});

const dateMask = IMask(document.getElementById("birthday"), {
  mask: Date,
  min: new Date(1951, 0, 1),
  max: new Date(2021, 12, 30),
  lazy: false,
});

const first_name = IMask(document.getElementById("first_name"), {
  mask: "********************",
});

const last_name = IMask(document.getElementById("last_name"), {
  mask: "********************",
});

$(".iti.iti--allow-dropdown")[0].style.width = "100%";
$(".iti.iti--allow-dropdown")[0].style.marginBottom = "13px";
$(".iti.iti--allow-dropdown")[1].style.width = "100%";

if ($.session.get("data") == "second_part") {
  $("#agileits-top-first").hide();
  second_form.style.display = "";
} else {
  second_form.style.display = "none";
}

$("#first-form").submit(function (e) {
  e.preventDefault();
  for (const item in array) {
    const label = document.getElementById(array[item] + "_label");
    const html = arrayLabels[array[item]];
    label.style.color = "floralwhite";
    label.innerHTML = html;
    document.getElementById(array[item]).style.border = "";
  }

  let formFirstStep = document.getElementById("first-form");

  let userFirstStep = {};
  for (let input of formFirstStep) {
    userFirstStep[input.id] = input.value;
  }
  delete userFirstStep[""];
  let response = firstStep(userFirstStep);

  response.then((msg) => {
    if (msg == "ok") {
      $("#first-form").hide("slow");
      $("#agileits-top-first").hide("slow");
      second_form.style.display = "";
      $.session.set("data", "second_part");
    } else {
      console.log(msg);
      const fields = msg;
      for (const key in fields) {
        if (document.getElementById(key).value == "") {
          document.getElementById(key + "_label").innerHTML =
            "These field cannot be empty!";
          document.getElementById(key + "_label").style.color = "red";
        }
        document.getElementById(key + "_label").style.color = "red";
        document.getElementById(key + "_label").innerHTML = fields[key];
        document.getElementById(key).style.border = "red solid 1px";
      }
    }
  });
});

let files; // переменная. будет содержать данные файлов

// заполняем переменную данными, при изменении значения поля file
$("input[type=file]").on("change", function () {
  files = this.files;
});

$("#second-form").submit(function (e) {
  e.preventDefault();

  for (const item in array) {
    const label = document.getElementById(array[item] + "_label");
    const html = arrayLabels[array[item]];
    label.style.color = "floralwhite";
    label.innerHTML = html;
    document.getElementById(array[item]).style.border = "";
  }

  // создадим объект данных формы
  const data = new FormData(document.querySelector(".second-form"));
  $.each(files, function (key, value) {
    data.append(key, value);
  });
  data.append("my_file_upload", 1);
  data.append("id", 1);

  let formSecondStep = document.getElementById("second-form");

  let userSecondStep = {};
  for (let input of formSecondStep) {
    userSecondStep[input.id] = input.value;
  }
  delete userSecondStep[""];
  delete userSecondStep["formFileLg"];

  let response = secondStep(data, userSecondStep);

  response.then((msg) => {
    
    if (msg == "ok") {
      $("#first-form").hide();
      $("#agileits-top-first").hide();
      $("#second-form").hide("slow");
      $("#agileits-top-second").hide("slow");
      $.session.clear();
      buttons.style.display = "block";
      titlePart.style.display = "none";
    } else {
      const fields = msg;
      for (const key in fields) {
        if (document.getElementById(key).value == "") {
          document.getElementById(key + "_label").innerHTML =
            "These field cannot be empty!";
          document.getElementById(key + "_label").style.color = "red";
        }
        document.getElementById(key + "_label").style.color = "red";
        document.getElementById(key + "_label").innerHTML = fields[key];
        document.getElementById(key).style.border = "red solid 1px";
      }
    }
  });
});
