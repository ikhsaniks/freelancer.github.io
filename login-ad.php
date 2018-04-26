<html>

<head>
    <style>
        body,
        html {
            height: 100%;
            background-repeat: no-repeat;
           background-image: linear-gradient(120deg, #f6d365 0%, #fda085 100%);
        }

        .card-container.card {
            max-width: 350px;
            padding: 40px 40px;
            background-color: darkkhaki;
        }

        .btn {
            font-weight: 700;
            height: 36px;
            -moz-user-select: none;
            -webkit-user-select: none;
            user-select: none;
            cursor: default;
        }

        /*
 * Card component
 */

        .card {
            background-color: #F7F7F7;
            /* just in case there no content*/
            padding: 20px 25px 30px;
            margin: 0 auto 25px;
            margin-top: 25px;
            /* shadows and rounded borders */
            -moz-border-radius: 2px;
            -webkit-border-radius: 2px;
            border-radius: 5px;
            -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        }

        .profile-img-card {
            background-color: transparent;
            width: 100x;
            height: 100px;
            margin: 0 auto 10px;
            display: block;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 20%;
        }

        /*
 * Form styles
 */

        .profile-name-card {
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            margin: 10px 0 0;
            min-height: 1em;
            color: aliceblue;
        }

        .reauth-email {
            display: block;
            color: #404040;
            line-height: 2;
            margin-bottom: 10px;
            font-size: 14px;
            text-align: center;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin #inputEmail,
        .form-signin #inputPassword {
            direction: ltr;
            height: 44px;
            font-size: 16px;
        }

        .form-signin input[type=email],
        .form-signin input[type=password],
        .form-signin input[type=text],
        .form-signin button {
            width: 100%;
            display: block;
            margin-bottom: 10px;
            z-index: 1;
            position: relative;
            -moz-box-sizing: border-box;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        .form-signin .form-control:focus {
            border-color: rgb(104, 145, 162);
            outline: 0;
            -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb(104, 145, 162);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075), 0 0 8px rgb(104, 145, 162);
        }

        .btn.btn-signin {
            /*background-color: #4d90fe; */
            background-color: rgb(104, 145, 162);
            /* background-color: linear-gradient(rgb(104, 145, 162), rgb(12, 97, 33));*/
            padding: 0px;
            font-weight: 700;
            font-size: 14px;
            height: 36px;
            -moz-border-radius: 3px;
            -webkit-border-radius: 3px;
            border-radius: 3px;
            border: none;
            -o-transition: all 0.218s;
            -moz-transition: all 0.218s;
            -webkit-transition: all 0.218s;
            transition: all 0.218s;
        }

        .btn.btn-signin:hover,
        .btn.btn-signin:active,
        .btn.btn-signin:focus {
            background-color: rgb(12, 97, 33);
        }

        .forgot-password {
            color: rgb(104, 145, 162);
        }

        .forgot-password:hover,
        .forgot-password:active,
        .forgot-password:focus {
            color: rgb(12, 97, 33);
        }
        
        .copyright{
            text-align: center;
            color:aliceblue;
        }
        
    </style>

    <script>
        $(document).ready(function() {
            // DOM ready

            // Test data
            /*
             * To test the script you should discomment the function
             * testLocalStorageData and refresh the page. The function
             * will load some test data and the loadProfile
             * will do the changes in the UI
             */
            // testLocalStorageData();
            // Load profile if it exits
            loadProfile();
        });

        /**
         * Function that gets the data of the profile in case
         * thar it has already saved in localstorage. Only the
         * UI will be update in case that all data is available
         *
         * A not existing key in localstorage return null
         *
         */
        function getLocalProfile(callback) {
            var profileImgSrc = localStorage.getItem("PROFILE_IMG_SRC");
            var profileName = localStorage.getItem("PROFILE_NAME");
            var profileReAuthEmail = localStorage.getItem("PROFILE_REAUTH_EMAIL");

            if (profileName !== null &&
                profileReAuthEmail !== null &&
                profileImgSrc !== null) {
                callback(profileImgSrc, profileName, profileReAuthEmail);
            }
        }

        /**
         * Main function that load the profile if exists
         * in localstorage
         */
        function loadProfile() {
            if (!supportsHTML5Storage()) {
                return false;
            }
            // we have to provide to the callback the basic
            // information to set the profile
            getLocalProfile(function(profileImgSrc, profileName, profileReAuthEmail) {
                //changes in the UI
                $("#profile-img").attr("src", profileImgSrc);
                $("#profile-name").html(profileName);
                $("#reauth-email").html(profileReAuthEmail);
                $("#inputEmail").hide();
                $("#remember").hide();
            });
        }

        /**
         * function that checks if the browser supports HTML5
         * local storage
         *
         * @returns {boolean}
         */
        function supportsHTML5Storage() {
            try {
                return 'localStorage' in window && window['localStorage'] !== null;
            } catch (e) {
                return false;
            }
        }

        /**
         * Test data. This data will be safe by the web app
         * in the first successful login of a auth user.
         * To Test the scripts, delete the localstorage data
         * and comment this call.
         *
         * @returns {boolean}
         */
        function testLocalStorageData() {
            if (!supportsHTML5Storage()) {
                return false;
            }
            localStorage.setItem("PROFILE_IMG_SRC", "//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120");
            localStorage.setItem("PROFILE_NAME", "César Izquierdo Tello");
            localStorage.setItem("PROFILE_REAUTH_EMAIL", "oneaccount@gmail.com");
        }

    </script>
    
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <!--===============================================================================================-->
    
</head>

<body>
    
    <div class="container">
        <br>
        <br>
        <br>
        <br>
        <img id="profile-img" class="profile-img-card" src="image/labtekindie.png" />
        <p id="profile-name" class="profile-name-card">Freelancer Labtek Indie</p>
        <div class="card card-container">
            <form class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" id="emailAdmin" class="form-control" placeholder="Email address" required autofocus>
                <input type="password" id="passAdmin" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" onclick="login()" type="submit">Sign in</button>
            </form>
        </div><!-- /card-container -->
        <br>
        <h5 class="copyright">Copyright &copy Magang 2018 - (Labtekindie - Telkom University)</h5>
    </div><!-- /container -->
    
    
    <!--<img id="profile-img" class="profile-img-card" src="image/labtekindie.png" />
    <p id="profile-name" class="profile-name-card"></p>
    <input type="email" id="emailAdmin" placeholder="email"><br>
    <input type="password" id="passAdmin" placeholder="password"><br>
    <button type="button" onclick="login()">LOGIN</button>-->

    <script src="https://www.gstatic.com/firebasejs/4.12.1/firebase.js"></script>
    <script>
        var config = {
            apiKey: "AIzaSyCwjXEGyaOxTjkH95o_tVjsH6Ezu6XR_Cs",
            authDomain: "freelancer-labtek.firebaseapp.com",
            databaseURL: "https://freelancer-labtek.firebaseio.com",
            projectId: "freelancer-labtek",
            storageBucket: "freelancer-labtek.appspot.com",
            messagingSenderId: "197457116251"
        };

        firebase.initializeApp(config);

        var emailLogin = document.getElementById('emailAdmin');
        var passLogin = document.getElementById('passAdmin');

        var curEmail = [];
        var curPass = [];

        function CheckAccountData() {

            var idAdm = sessionStorage.getItem("idAdmin");
            var email = sessionStorage.getItem("emailAdmin");
            var pass = sessionStorage.getItem("passAdmin");

            firebase.database().ref('admin_account').on('value', function(result) {
                result.forEach(function(snap) {
                    curEmail.push(snap.val().email);
                    curPass.push(snap.val().password);
                })
                if (email == (curEmail[idAdm] + "-kodeLabtek") && pass == (curPass[idAdm] + "-kodeLabtek")) {
                    window.location.replace("Admin.php");
                }
            })
            console.log(curEmail);
        }

        window.onload = CheckAccountData;

        function LoginWithEmail() {
            var email = curEmail.indexOf(emailLogin.value);
            var password = curPass.indexOf(passLogin.value);
            if (emailLogin.value == curEmail[email] && passLogin.value == curPass[password]) {
                window.location.href = "Admin.php";
                console.log("SUCCESS");
                sessionStorage.setItem("idAdmin", email);
                sessionStorage.setItem("emailAdmin", curEmail[email] + "-kodeLabtek");
                sessionStorage.setItem("passAdmin", curPass[password] + "-kodeLabtek");
            } else {
                alert("Your email or password are empty or wrong!")
                console.log("FAIL");
            }

        }
        login = () => {
            LoginWithEmail()
        }

    </script>
</body>

</html>
