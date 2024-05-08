const inputUsernameRegister = document.querySelector(".input-signup-username");
const inputPasswordRegister = document.querySelector(".input-signup-password");
const inputPhoneRegister = document.querySelector(".input-signup-phone");
const btnRegister = document.querySelector(".signup_signInButton");

const emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
const phoneRegex = /^\d+$/; // Only digits

// Bắt sự kiện nhập liệu cho ô số điện thoại
inputPhoneRegister.addEventListener("input", (e) => {
  // Kiểm tra giá trị nhập vào
  if (!phoneRegex.test(e.target.value)) {
    // Hiển thị thông báo lỗi
    alert("Số điện thoại chỉ được nhập số!");
    // Xóa phần nhập không hợp lệ
    e.target.value = e.target.value.slice(0, -1);
  }

  // Giới hạn độ dài tối đa
  if (e.target.value.length > 11) {
    e.target.value = e.target.value.slice(0, 11);
  }
});

btnRegister.addEventListener("click", (e) => {
  e.preventDefault();

  if (
    inputUsernameRegister.value === "" ||
    inputPasswordRegister.value === "" ||
    inputPhoneRegister.value === ""
  ) {
    alert("Vui lòng không để trống");
    return;
  }

  if (!emailRegex.test(inputUsernameRegister.value)) {
    alert("Vui lòng nhập email đúng định dạng (e.g., example@domain.com)");
    return;
  }

  const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)[^\s]{6,}$/; // At least 6 chars, 1 digit, 1 lowercase, 1 uppercase, 1 special char, no whitespace
  if (!passwordRegex.test(inputPasswordRegister.value)) {
    alert("Mật khẩu phải có ít nhất 6 ký tự, bao gồm chữ số, chữ cái thường, chữ cái hoa và ký tự đặc biệt.");
    return;
  }

  if (!phoneRegex.test(inputPhoneRegister.value)) {
    alert("Số điện thoại chỉ được nhập số!");
    return;
  }

  // Lưu trữ thông tin đăng ký

  const user = {
    username: inputUsernameRegister.value,
    password: inputPasswordRegister.value,
    phone: inputPhoneRegister.value,
  };

  let json = JSON.stringify(user);
  localStorage.setItem(user.username, json);

  alert("Đăng Ký Thành Công");
});
