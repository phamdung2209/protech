// clcik show form signin
// const aTag = document.querySelector('.btn-user-click');
// const divTag = document.querySelector('.modal');

// aTag.addEventListener('click', () => {
//   divTag.style.visibility = 'visible';
// });

function showModal() {
    var modal = document.getElementById("myModal");
    modal.style.visibility = "visible";
    const notificationSound = document.getElementById("notificationSound");
    notificationSound.play();

    const btnProfile = document.querySelectorAll(".btnProfile");
    for(let i = 0; i < btnProfile.length; i++){
        btnProfile[i].addEventListener("mousedown", function () {
            this.style.transform = "scale(0.9)";
            this.style.transition = "0.001s";
        });
        
        btnProfile[i].addEventListener("mouseup", function () {
            this.style.transform = "scale(1)";
            this.style.transition = "0.2s";
        });
    }
}

function showModalOrder(){
    const modal = document.getElementById('myModalOrder');
    modal.style.visibility = 'visible'
}

// function showCart() {
//     const modalCart = document.getElementById("cartModal");
//     modalCart.style.visibility = "visible";
// }

document.querySelectorAll('.payment__option option').forEach(option => {
    option.addEventListener('click', function() {
        const selectedValue = this.value;
        const inputField = document.querySelector('.verificationInput');
        inputField.value = selectedValue;
    });
});


function showCart() {
    const a = document.querySelectorAll(".modal__cart");
    for (let i = 0; i < a.length; i++) {
        a[i].style.visibility = "visible";
    }

    const b = document.querySelector(".cart__inner");
    b.style.visibility = "visible";
    document.querySelector(".cart__inner").classList.add("showEff");
    b.classList.remove("offEff");
}

function offModal() {
    const modal = document.getElementById("myModal");
    modal.style.visibility = "hidden";

    const modalCart = document.getElementById("cartModal");
    modalCart.style.visibility = "hidden";

    const a = document.querySelectorAll(".inner__btn-main.inner__btn-back");
    for (let i = 0; i < a.length; i++) {
        a[i].style.transition = "none";
    }
    const labelInput = document.querySelectorAll(".form__row-label");
    for (let i = 0; i < labelInput.length; i++) {
        labelInput[i].style.transition = "none";
    }

    const b = document.querySelector(".cart__inner");
    b.style.visibility = "hidden";
    document.querySelector(".cart__inner").classList.add("offEff");
    b.classList.remove("showEff");

    const btnProfile = document.querySelectorAll(".btnProfile");
    for(let i = 0; i < btnProfile.length; i++){
        btnProfile[i].style.transition = "none";
    }

    const offModalOrder = document.getElementById('myModalOrder');
    offModalOrder.style.visibility = 'hidden';
}

function backModal() {
    const modal = document.getElementById("myModal");
    modal.style.visibility = "hidden";
    // const a = document.getElementById("a");
    // a.style.transition = "none";
    // const labelInput = document.getElementById("b");
    // labelInput.style.transition = "none";

    const a = document.querySelectorAll(".inner__btn-main.inner__btn-back");
    for (let i = 0; i < a.length; i++) {
        a[i].style.transition = "none";
    }
    const labelInput = document.querySelectorAll(".form__row-label");
    for (let i = 0; i < labelInput.length; i++) {
        labelInput[i].style.transition = "none";
    }

    const btnProfile = document.querySelectorAll(".btnProfile");
    for(let i = 0; i < btnProfile.length; i++){
        btnProfile[i].style.transition = "none";
    }
}

function enbEffModal() {
    const enb = document.querySelectorAll(".form__row-label");
    for (let i = 0; i < enb.length; i++) {
        enb[i].style.transition = "0.5s";
    }
}

function changeToSignIn() {
    const signIn = document.querySelectorAll(
        ".modal__inner-signin.modal__inner-signin"
    );
    for (let i = 0; i < signIn.length; i++) {
        signIn[i].style.display = "none";
    }
    const signUp = document.querySelectorAll(
        ".modal__inner-signup.modal__inner-signin"
    );
    for (let i = 0; i < signUp.length; i++) {
        signUp[i].style.display = "block";
    }

    const soundEff = document.getElementById("notificationSound3");
    soundEff.play();
}

function changeToSignUp() {
    const signIn = document.querySelectorAll(
        ".modal__inner-signin.modal__inner-signin"
    );
    for (let i = 0; i < signIn.length; i++) {
        signIn[i].style.display = "block";
    }
    const signUp = document.querySelectorAll(
        ".modal__inner-signup.modal__inner-signin"
    );
    for (let i = 0; i < signUp.length; i++) {
        signUp[i].style.display = "none";
    }

    const soundEff = document.getElementById("notificationSound3");
    soundEff.play();
}

function showToast() {
    const toast = document.querySelectorAll(".message");
    for (let i = 0; i < toast.length; i++) {
        toast[i].style.visibility = "visible";
    }
    notificationSound1.play();
    message({
        title: "ss",
        message: "abc",
        type: "ss",
        duration: 3000,
    });
    message.classList.add(".show-animation");
}

// close Toast
function closeToast() {
    const close = document.querySelectorAll(".message");
    for (let i = 0; i < close.length; i++) {
        close[i].style.visibility = "hidden";
    }
}

function message({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("message");
    if (message) {
        const message = document.createElement("div");
        message.classList.add("message");
        message.classList.add("message--sucessed");

        message.innerHTML = `
            <div class="message__icon">
            <i class="fa-sharp fa-solid fa-circle-check"></i>
        </div>
        <div class="message__body">
            <div class="message__body--titlle">
                Succesed
            </div>
            <div class="message__body--content">
                Congratulations, you have successfully logged in!
            </div>
        </div>
        <div onclick="closeToast()" class="message__close">
            <i class="fa-solid fa-xmark"></i>
        </div>
        `;
        main.appendChild(message);
    }
}

message({
    title: "ss",
    message: "abc",
    type: "ss",
    duration: 3000,
});

// test

// function showSuccessToast() {
//     toast({
//       title: "Thành công!",
//       message: "Bạn đã đăng ký thành công tài khoản tại F8.",
//       type: "success",
//       duration: 5000
//     });
//   }

//   function showErrorToast() {
//     toast({
//       title: "Thất bại!",
//       message: "Có lỗi xảy ra, vui lòng liên hệ quản trị viên.",
//       type: "error",
//       duration: 5000
//     });
//   }

// toast

// Toast function
function toast({ title = "", message = "", type = "info", duration = 3000 }) {
    const main = document.getElementById("toast");
    if (main) {
        const toast = document.createElement("div");

        // Auto remove toast
        const autoRemoveId = setTimeout(function () {
            main.removeChild(toast);
        }, duration + 1000);

        // Remove toast when clicked
        toast.onclick = function (e) {
            if (e.target.closest(".toast__close")) {
                main.removeChild(toast);
                clearTimeout(autoRemoveId);
            }
        };

        const icons = {
            success: "fas fa-check-circle",
            info: "fas fa-info-circle",
            warning: "fas fa-exclamation-circle",
            error: "fas fa-exclamation-circle",
        };
        const icon = icons[type];
        const delay = (duration / 1000).toFixed(2);

        toast.classList.add("toast", `toast--${type}`);
        toast.style.animation = `slideInLeft ease .3s, fadeOut linear 1s ${delay}s forwards`;

        toast.innerHTML = `
                      <div class="toast__icon">
                          <i class="${icon}"></i>
                      </div>
                      <div class="toast__body">
                          <h3 class="toast__title">${title}</h3>
                          <p class="toast__msg">${message}</p>
                      </div>
                      <div class="toast__close">
                          <i class="fas fa-times"></i>
                      </div>
                  `;
        main.appendChild(toast);
    }
}
//end

// function validateInputsAndSubmit() {
//   var phoneInput = document.querySelectorAll('.phoneInput');
//   var passwordInput = document.querySelectorAll('.passwordInput');
//   var verificationInput = document.querySelectorAll('.verificationInput');

//   for( let i = 0; i < phoneInput.length; i++){
//     if (phoneInput[i].value === null) {
//       showErrorToast();
//     }
//   }
//   for( let i = 0; i < passwordInput.length; i++){
//     if (passwordInput[i].value === null) {
//       showErrorToast();
//     }
//   }
//   for( let i = 0; i < verificationInput.length; i++){
//     if (verificationInput[i].value === null) {
//       showErrorToast();
//     }
//   }

// var phoneInput = document.getElementById('phoneInput');
// var passwordInput = document.getElementById('passwordInput');
// var verificationInput = document.getElementById('verificationInput');

// if ( phoneInput.value === '' || passwordInput.value === '' || verificationInput.value === ''){
//   showErrorToast();
// }

// }

function validateInputsAndSubmit() {
    var inputs = document.querySelectorAll(".form__row");
    var isEmpty = false;

    inputs.forEach(function (input) {
        if (input.value === "") {
            isEmpty = true;
        } else {
            isEmpty = false;
        }
    });

    if (isEmpty) {
        showErrorToast();
    }

    // Thực hiện hành động khi tất cả các giá trị input không trống
    // ...
}

//updating
function updating() {
    toast({
        title: "Error!",
        message: "Updating ..........!",
        type: "error",
        duration: 5000,
    });
    notificationSound1.play();
}

function rqSignIn() {
    toast({
        title: "Error!",
        message: "An account login is required to place an order!",
        type: "error",
        duration: 5000,
    });
    notificationSound1.play();
}

//loader
function showSuccessToastCart(event) {
    // event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

    // Thêm đoạn HTML vào trong thẻ <a>
    event.target.innerHTML = `
  <div class="load">
      <div class="progress"></div>
      <div class="progress"></div>
      <div class="progress"></div>
  </div>`;
}

function showFormProfile(formNumber) {
    // Ẩn tất cả các form trước khi hiển thị form tương ứng
    hideAllForms();

    // Hiển thị form tương ứng với formNumber
    var formId = "profile__info-num profile__info-" + formNumber;
    var form = document.getElementById(formId);
    form.style.display = "block";

    var btnId = "btn__info-" + formNumber;
    var btn = document.getElementById(btnId);
    btn.classList.add("profile__info-nav-active");
}

function hideAllForms() {
    var forms = document.getElementsByClassName("formProfile");
    for (var i = 0; i < forms.length; i++) {
        forms[i].style.display = "none";
    }

    var btnProfile = document.getElementsByClassName("btnProfile");
    for (var j = 0; j < btnProfile.length; j++) {
        btnProfile[j].classList.remove("profile__info-nav-active");
        btnProfile[j].classList.remove("btnProfile-first");
    }
}



// Lắng nghe sự kiện submit của form thứ hai
document.getElementById("form2").addEventListener("submit", function(event) {
    // Lấy giá trị của trường input trong form đầu tiên
    var quantityValue = document.getElementById("quantityInput").value;

    // Đặt giá trị vào trường input trong form thứ hai
    var hiddenInput = document.createElement("input");
    hiddenInput.setAttribute("type", "hidden");
    hiddenInput.setAttribute("name", "quantity");
    hiddenInput.setAttribute("value", quantityValue);
    document.getElementById("form2").appendChild(hiddenInput);
});