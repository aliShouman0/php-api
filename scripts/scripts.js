//DOM get all thing will need
const p_seconds = document.querySelector("#seconds");
const p_minutes = document.querySelector("#minutes");
const p_hours = document.querySelector("#hours");
const p_days = document.querySelector("#days");
const palindrome = document.querySelector("#palindrome");
const isPalindrome = document.querySelector("#isPalindrome");
const expressionResult = document.querySelector("#expressionResult");
const a = document.querySelector("#a");
const b = document.querySelector("#b");
const c = document.querySelector("#c");
const expression_btn = document.querySelector("#expression-btn");
const palindrome_btn = document.querySelector("#palindrome-btn");
const password = document.querySelector("#password");
const password_btn = document.querySelector("#password-btn");
const strong_Not = document.querySelector("#strong_Not");
const whyNot = document.querySelector("#whyNot");

// api
const Christmas_api = "http://localhost:3000/phpApi/api_christmas.php";
const expression_api = "http://localhost:8080/phpApi/api_expression.php";
const password_api = "http://localhost:8080/phpApi/api_strongPassword.php";
const palindrome_api =
  "http://localhost:8080/phpApi/api_palindrome.php?string=";
// call it one time and it will go infinite
ChristmasTime();

// get time to Christmas
function ChristmasTime() {
  //Christmas api
  fetch(Christmas_api).then((res) => {
    if (res.ok) {
      res.json().then((data) => {
        let days = data.days;
        let hour = data.hour;
        let seconds = data.seconds;
        let min = data.min;
        p_seconds.textContent = seconds;
        p_hours.textContent = hour;
        p_minutes.textContent = min;
        p_days.textContent = days;
      });
    } else {
      seconds.textContent = `some went wrong`;
    }
  });
  setTimeout(ChristmasTime, 1000);
}

//palindrome
palindrome_btn.addEventListener("click", () => {
  let string = palindrome.value;
  if (string != "") {
    fetch(palindrome_api + string).then((res) => {
      if (res.ok) {
        res.json().then((data) => {
          //res will be as boolean
          let res = data.isPalindrome;
          isPalindrome.textContent = res ? "Palindrome" : "Not Palindrome";
        });
      } else {
        isPalindrome.textContent = `some went wrong`;
      }
    });
  }
});

//expression
expression_btn.addEventListener("click", () => {
  let aValue = a.valueAsNumber;
  let bValue = b.valueAsNumber;
  let cValue = c.valueAsNumber;
  if (aValue != "" && bValue != "" && cValue != "") {
    //to sent the post data in body
    let postData = new FormData();
    postData.append("a", aValue);
    postData.append("b", bValue);
    postData.append("c", cValue);
    fetch(expression_api, {
      method: "POST",
      body: postData,
    }).then((res) => {
      if (res.ok) {
        res
          .json()
          .then((data) => {
            let res = data.solution;
            expressionResult.textContent = res;
          })
          .catch((err) => {
            console.log("caught it!", err);
          });
      } else {
        expressionResult.textContent = `some went wrong`;
      }
    });
  }
});

//password strong
password_btn.addEventListener("click", () => {
  let passwordValue = password.value;
  whyNot.textContent = "";
  if (passwordValue != "") {
    //to sent the post data
    let postData = new FormData();
    postData.append("password", passwordValue);
    fetch(password_api, {
      method: "POST",
      body: postData,
    }).then((res) => {
      if (res.ok) {
        res
          .json()
          .then((data) => {
            let isStrong = data.isStrong;
            let errors = data.errors;
            strong_Not.textContent = isStrong ? "Strong" : "not Strong";
            if (!isStrong) {
              whyNot.textContent = errors.toString();
            }
          })
          .catch((err) => {
            console.log("caught it!", err);
            whyNot.textContent = "some went wrong";
          });
      } else {
        expressionResult.textContent = `some went wrong`;
      }
    });
  }
});
