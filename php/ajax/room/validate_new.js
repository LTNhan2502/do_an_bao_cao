const setError = (selector, message) => $(selector + '_error').text(message);
const clearError = (selector) => $(selector + '_error').text('');

// Kiểm tra trống
const check_empty = (...args) => {
  let flag = false;
  args.forEach(selector => {
    const value = $(selector).val();
    if (value === '') {
      setError(selector, 'Bạn chưa nhập thông tin này!');
      flag = true;
    } else {
      clearError(selector);
    }
  });
  return flag;
}

const check_email = (...args) => {
  let flag = false;
  args.forEach(selector => {
    const emailValue = $(selector).val();
    if (!/^[^\s@]+@gmail\.com$/.test(emailValue)) {
      setError(selector, 'Email không hợp lệ');
      flag = true;
    } else {
      clearError(selector);
    }
  });
  return flag;
}

// Kiểm tra tên có ký tự đặc biệt và số
const check_name = (...args) => {
  const digitPattern = /\d/;
  const specialCharPattern = /[~!@#$%^&*()_+`\-={}[\]:;"'<>,.?/\\|]/;
  let flag = false;

  args.forEach(selector => {
    const value = $(selector).val();
    if (digitPattern.test(value)) {
      setError(selector, 'Họ tên không được chứa số');
      flag = true;
    } else if (specialCharPattern.test(value)) {
      setError(selector, 'Họ tên không chứa ký tự đặc biệt');
      flag = true;
    } else if (value.trim() === '') {
      setError(selector, 'Bạn chưa nhập thông tin này');
      flag = true;
    } else {
      clearError(selector);
    }
  });
  return flag;
}


// Kiểm tra password trùng 
const check_password = (password, confirm_password) => {
  const flag = $(password).val() !== $(confirm_password).val();
  flag ? setError(password, 'Mật khẩu không giống nhau') : clearError(password);
  return flag;
}

// Kiểm tra ký tự 
const check_password_length = (...args) => {
  let flag = false;
  args.forEach(selector => {
    const value = $(selector).val();
    if (value.length <= 6) {
      setError(selector, 'Mật khẩu phải trên 6 ký tự');
      flag = true;
    } else {
      clearError(selector);
    }
  });
  return flag;
}


// Kiểm tra số điện thoại
const check_number_phone = (selector) => {
  const check = $(selector).val();
  const flag = !/^(0\d{9,10})$/.test(check);
  flag ? setError(selector, 'Số điện thoại không hợp lệ') : clearError(selector);
  return flag;
}

