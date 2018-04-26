<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login/Registration Form Transition</title>


    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Open+Sans'>

    <link rel="stylesheet" href="css/style.css">


</head>

<body>

    <p class="tip"></p>
    <div class="cont">
        <div class="form sign-in">
            <h2>Welcome , Freelancer!</h2>
            <label>
          <span>Email</span>
          <input type="email" id="emailLogin" required/>
        </label>
            <label>
          <span>Password</span>
          <input type="password" id="passLogin" required/>
        </label>
            <p class="forgot-pass">Forgot password?</p>
            <button type="button" class="submit" onclick="emailSignIn()">Sign In</button>
            <button type="button" class="fb-btn" onclick="googleSignIn()">Sign In With <span>Google</span></button>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                    <h2>New here?</h2>
                    <p>Sign up and discover great amount of new opportunities!</p>
                </div>
                <div class="img__text m--in">
                    <h2>One of us?</h2>
                    <p>If you already has an account, just sign in. We've missed you!</p>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>It's time to be part of us , Labtekindie!</h2>
                <label>
            <span>Username</span>
            <input type="text" id="nameRegister" />
          </label>
                <label>
            <span>Email</span>
            <input type="email" id="emailRegister" />
          </label>
                <label>
            <span>Password</span>
            <input type="password" id="passRegister"/>
          </label>
                <button type="button" class="submit" onclick="emailSignUp()">Sign Up</button>
                <button type="button" class="fb-btn" onclick="googleSignIn()">Sign Up With <span>Google</span></button>
            </div>
        </div>
    </div>
    <script src="js/index.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyCwjXEGyaOxTjkH95o_tVjsH6Ezu6XR_Cs",
            authDomain: "freelancer-labtek.firebaseapp.com",
            databaseURL: "https://freelancer-labtek.firebaseio.com",
            projectId: "freelancer-labtek",
            storageBucket: "freelancer-labtek.appspot.com",
            messagingSenderId: "197457116251"
        };
        firebase.initializeApp(config);

        // #Start Of local variabel
        var emailLogin = document.getElementById('emailLogin');
        var passLogin = document.getElementById('passLogin');
        var nameRegister = document.getElementById('nameRegister');
        var emailRegister = document.getElementById('emailRegister');
        var passRegister = document.getElementById('passRegister');
        var pushKey = firebase.database().ref('freelancer').push().key;
        // #End Of local variabel

        function loginFreelancer() { //this function to login using google account
            function newLoginHappened(user) {
                if (user) {
                    window.location.replace("dashboard.php");
                } else {
                    var provider = new firebase.auth.GoogleAuthProvider();
                    firebase.auth().signInWithPopup(provider);
                }
            }
            firebase.auth().onAuthStateChanged(newLoginHappened);
        }

        function CheckAccount() { //this function to check Session of Account
            function newLoginHappened(user) {
                if (user) {
                    app();
                }
            }
            firebase.auth().onAuthStateChanged(newLoginHappened);
        }

        function app() { // this function to directly move to dashboard page
            window.location.replace("dashboard.php");
        }

        window.onload = CheckAccount; // this command to process relogin account while still exist

        function LoginWithEmail() {
            firebase.auth().signInWithEmailAndPassword(emailLogin.value, passLogin.value).then(function(result) {

            }).catch(function(error) {
                // Handle Errors here.
                var errorCode = error.code;
                var errorMessage = error.message;
                alert("ERROR ACCURE : " + errorCode);
                alert("ERROR ACCURE2 : " + errorMessage);
                // ...
            });
        }

        function SaveDatabase(name, email, password) {

        }

        function SignUpWithEmail() {
            firebase.auth().createUserWithEmailAndPassword(emailRegister.value, passRegister.value).then(function(result) {
                firebase.database().ref('freelancer_account').child(result.uid).set({
                    username: nameRegister.value,
                    email: emailRegister.value,
                    password: passRegister.value
                })
            }).catch(function(error) {
                // Handle Errors here.
                var errorCode = error.code;
                var errorMessage = error.message;
                alert("ERROR ACCURE : " + errorCode);
                alert("ERROR ACCURE2 : " + errorMessage);
                // ...
            });
        }

        emailSignIn = () => {
            LoginWithEmail()
        }

        emailSignUp = () => {
            SignUpWithEmail()
        }

        googleSignIn = () => { // this metod tu click SignInWithGoggle
            loginFreelancer()
        }

    </script>
</body>

</html>
