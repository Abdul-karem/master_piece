document.addEventListener('DOMContentLoaded', () => {
    const signUpButton = document.getElementById('signUp');
    const signUp1Button = document.getElementById('signUp1');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
      container.classList.add('right-panel-active');
    });

    signUp1Button.addEventListener('click', () => {
      container.classList.add('right-panel-active-lessor');
    });

    signInButton.addEventListener('click', () => {
      container.classList.remove('right-panel-active');
      container.classList.remove('right-panel-active-lessor');
    });

  // Form validation for sign up
  const signupForm = document.getElementById('signup-form');
  signupForm.addEventListener('submit',(e) => {
      e.preventDefault();
      validateSignUpForm();
  });

  function validateSignUpForm() {
    const nameInput = document.getElementById('name-sign');
    const emailInput = document.getElementById('email-sign');
    const passwordInput = document.getElementById('password-sign');
    const confirmPasswordInput = document.getElementById('conf-Password');
    const nameError = document.getElementById('name-error');
    const emailError = document.getElementById('email-error-sign');
    const passwordError = document.getElementById('password-error-sign');
    const confirmPasswordError = document.getElementById('conf-password-error-sign');
    const imageInput = document.getElementById('image_User');
    const errorimageuser = document.getElementById('image-error-user');
    const allowedFormats = ["image/jpeg", "image/png", "image/jpg", "image/gif"];
    const maxFileSize = 2048; // in KB
    // Reset error messages
    nameError.textContent = '';
    emailError.textContent = '';
    passwordError.textContent = '';
    confirmPasswordError.textContent = '';
    errorimageuser.textContent = '';
    const nameRegex = /^[A-Za-z0-9]+$/;
    let isValid = true;

    // Validate name
    if (nameInput.value.trim() === '') {
        nameError.textContent = 'Please enter your name';
        isValid = false;
    }else if (!nameRegex.test(nameInput.value)) {
      nameError.textContent = 'Username should be a-z ,A-Z only ';
      isValid = false;
    } else if (nameInput.value.length < 8 )  {
    nameError.textContent = 'Username length is too short';
    isValid = false;
    }

    // Validate email  
    const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    
    if (emailInput.value.trim() === '') {
        emailError.textContent = 'Please enter your email';
        isValid = false;
    } else if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Please enter a valid email address';
        isValid = false;
    } 

    // Validate password
    const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    // const validpass = passwordRegex.test(passwordInput);

    if (passwordInput.value === '') {
        passwordError.textContent = 'Please enter your password';
        isValid = false;
    }else if (!passwordRegex.test(passwordInput.value)) {
      passwordError.textContent = 'Minimum 5 and upto 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character:';
      isValid = false;
  }

    // Validate confirm password
    if (confirmPasswordInput.value === '') {
        confirmPasswordError.textContent = 'Please confirm your password';
        isValid = false;
    } else if (confirmPasswordInput.value !== passwordInput.value) {
        confirmPasswordError.textContent = 'Passwords do not match';
        isValid = false;
    }
    
    // Validate image USERS
if (!imageInput.files || imageInput.files.length === 0) {
  errorimageuser.textContent = "Please select an image.";
  isValid = false;
} else {
  const selectedFile = imageInput.files[0];
  if (!allowedFormats.includes(selectedFile.type)) {
    errorimageuser.textContent = "Please select a valid image format (jpeg, png, jpg, gif).";
    isValid = false;
  } else if (selectedFile.size > maxFileSize * 1024) {
    errorimageuser.textContent = "Image size must be less than " + maxFileSize + " KB.";
    isValid = false;
  } 
}


    if (isValid) {
        // Submit the form
        signupForm.submit();
    }
    // console.log('Sign Up form validation');
  }

  // Form validation for sign up as lessor
  const signupLessorForm = document.getElementById('lessor-signup-form');
  signupLessorForm.addEventListener('submit', (e) => {
    e.preventDefault();
    validateLessorForm();
  });

  function validateLessorForm() {
    const nameInput = document.getElementById('name-sign-lessor');
    const emailInput = document.getElementById('email-sign-lessor');
    const passwordInput = document.getElementById('password-sign-lessor');
    const confirmPasswordInput = document.getElementById('conf-Password-lessor');
    const nameError = document.getElementById('name-error-lessor');
    const emailError = document.getElementById('email-error-sign-lessor');
    const passwordError = document.getElementById('password-error-sign-lessor');
    const confirmPasswordError = document.getElementById('conf-password-error-sign-lessor');
    const phoneInput = document.getElementById('mobile_number');
    const errorphoneInput = document.getElementById('mobile_number-error-sign-lessor');
    const imageInput = document.getElementById('image_lessor');
    const errorimagelessor = document.getElementById('image-error-lessor');
    const allowedFormats = ["image/jpeg", "image/png", "image/jpg", "image/gif"];
    const maxFileSize = 2048; // in KB
    // Reset error messages
    nameError.textContent = '';
    emailError.textContent = '';
    passwordError.textContent = '';
    confirmPasswordError.textContent = '';
    errorphoneInput.textContent = '';
    errorimagelessor.textContent = '';
    const nameRegex = /^[A-Za-z0-9]+$/;
    let isValid = true;

    // Validate name
    if (nameInput.value.trim() === '') {
      nameError.textContent = 'Please enter your name';
      isValid = false;
    }else if (!nameRegex.test(nameInput.value)) {
      nameError.textContent = 'Username should be a-z ,A-Z only ';
      isValid = false;
    } else if (nameInput.value.length < 8 )  {
    nameError.textContent = 'Username length is too short';
    isValid = false;
    }

    // Validate email
    const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (emailInput.value.trim() === '') {
      emailError.textContent = 'Please enter your email';
      isValid = false;
    } else if (!emailRegex.test(emailInput.value)) {
      emailError.textContent = 'Please enter a valid email address';
      isValid = false;
    }

    // Validate password
    const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

    if (passwordInput.value === '') {
      passwordError.textContent = 'Please enter your password';
      isValid = false;
    }else if (!passwordRegex.test(passwordInput.value)) {
      passwordError.textContent = 'Minimum 5 and upto 15 characters, at least one uppercase letter, one lowercase letter, one number and one special character:';
      isValid = false;
  }

    // Validate confirm password
    if (confirmPasswordInput.value === '') {
      confirmPasswordError.textContent = 'Please confirm your password';
      isValid = false;
    } else if (confirmPasswordInput.value !== passwordInput.value) {
      confirmPasswordError.textContent = 'Passwords do not match';
      isValid = false;
    }

  // Validate phone numper
  const phonePattern = /^(07)(7|8|9)\d{7}$/;
   if(phoneInput.value === ''){
    errorphoneInput.textContent = 'Please confirm your phone numper';
    isValid = false;
   }else if (!phonePattern.test(phoneInput.value)){
    errorphoneInput.textContent = 'Please enter a valid phone numper';
    isValid = false;
   }else if (phoneInput.value.length !== 10 )  {
    errorphoneInput.textContent = 'The phone number must be ten digits';
    isValid = false;
    }
    
// Validate image lessors
if (!imageInput.files || imageInput.files.length === 0) {
  errorimagelessor.textContent = "Please select an image.";
  isValid = false;
} else {
  const selectedFile = imageInput.files[0];
  if (!allowedFormats.includes(selectedFile.type)) {
    errorimagelessor.textContent = "Please select a valid image format (jpeg, png, jpg, gif).";
    isValid = false;
  } else if (selectedFile.size > maxFileSize * 1024) {
    errorimagelessor.textContent = "Image size must be less than " + maxFileSize + " KB.";
    isValid = false;
  } 
}


    if (isValid) {
      // Submit the form
      document.getElementById('form-container signup-lessor-form').submit()
    }
    // console.log('Sign Up as Lessor form validation');
  }

  // Form validation for sign in
  const loginForm = document.getElementById('login-form');
  loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      validateLoginForm();
  });

  function validateLoginForm() {
    const emailInput = document.getElementById('floatingInputSignIn');
    const passwordInput = document.getElementById('password-login');
    const emailError = document.getElementById('email-error-login');
    const passwordError = document.getElementById('password-error-login');

    // Reset error messages
    emailError.textContent = '';
    passwordError.textContent = '';

    let isValid = true;

    // Validate email
    const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (emailInput.value.trim() === '') {
        emailError.textContent = 'Please enter your email';
        isValid = false;
    } else if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Please enter a valid email address';
        isValid = false;
    }

    // Validate password
    const passwordRegex = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    if (passwordInput.value === '') {
        passwordError.textContent = 'Please enter your password';
        isValid = false;
    }else if (!passwordRegex.test(passwordInput.value)) {
      passwordError.textContent = 'The password does not match';
      isValid = false;
  }

    if (isValid) {
        // Submit the form
        loginForm.submit();
    }
    // console.log('Sign In form validation');
  }
});

function password_show_hide() {
 
  var x = document.getElementById("password-sign-lessor");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");

  if (x.type === "password") {
      x.type = "text";
      show_eye.style.display = "none";
      hide_eye.style.display = "block";
  } else {
      x.type = "password";
      show_eye.style.display = "block";
      hide_eye.style.display = "none";
  }


}

function password_hide() {
  var x = document.getElementById("password-sign");
  var show_eye = document.getElementById("show_eye");
  var hide_eye = document.getElementById("hide_eye");
  hide_eye.classList.remove("d-none");

  if (x.type === "password") {
      x.type = "text";
      show_eye.style.display = "none";
      hide_eye.style.display = "block";
  } else {
      x.type = "password";
      show_eye.style.display = "block";
      hide_eye.style.display = "none";
  }


}

function password_login() {
  var x = document.getElementById("password-login");
  var show_eye = document.getElementById("show_eyee");
  var hide_eye = document.getElementById("hide_eyee");
  hide_eye.classList.remove("d-none");

  if (x.type === "password") {
      x.type = "text";
      show_eye.style.display = "none";
      hide_eye.style.display = "block";
  } else {
      x.type = "password";
      show_eye.style.display = "block";
      hide_eye.style.display = "none";
  }


}
