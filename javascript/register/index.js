function checkPassword() {
    var myInput = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
  
    var lowerCaseLetters = /[a-z]/g;
    if (myInput.value.match(lowerCaseLetters)) {
      letter.classList.remove("invalid");
      letter.classList.add("valid");
    } else {
      letter.classList.remove("valid");
      letter.classList.add("invalid");
    }
  
    var upperCaseLetters = /[A-Z]/g;
    if (myInput.value.match(upperCaseLetters)) {
      capital.classList.remove("invalid");
      capital.classList.add("valid");
    } else {
      capital.classList.remove("valid");
      capital.classList.add("invalid");
    }
  
    var numbers = /[0-9]/g;
    if (myInput.value.match(numbers)) {
      number.classList.remove("invalid");
      number.classList.add("valid");
    } else {
      number.classList.remove("valid");
      number.classList.add("invalid");
    }
  
    if (myInput.value.length >= 8) {
      length.classList.remove("invalid");
      length.classList.add("valid");
    } else {
      length.classList.remove("valid");
      length.classList.add("invalid");
    }
  
    // Check if all requirements are met
    var isValidPassword =
      letter.classList.contains("valid") &&
      capital.classList.contains("valid") &&
      number.classList.contains("valid") &&
      length.classList.contains("valid");
  
    return isValidPassword;
  }
  
  function checkNumber(event) {
    const firstnumPH = document.querySelector("#phone");
    let text = document.querySelector("#text1");
    var max_chars = 12;
    var numericInput = /^\d+$/; // Regex to match numeric input
  
    if (numericInput.test(firstnumPH.value) && firstnumPH.value.length === max_chars) {
      firstnumPH.style.border = "2px solid green";
      text.innerText = "Welcome";
      return true;
    } else {
      firstnumPH.style.border = "2px solid red";
      text.innerText =
        "Please type a valid phone number with an amount of 12 numbers";
      event.preventDefault();
      return false;
    }
  }
  
  
  document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const firstnumPH = document.querySelector("#phone");

  

    firstnumPH.addEventListener("input", function (event) {
      this.value = this.value.replace(/[^0-9]/g, ""); // Replace any non-numeric character with an empty string

    form.addEventListener("submit", function (event) {
      if (!checkPassword() || !checkNumber(event)) {
        event.preventDefault();
      }

      
    });
  });
});