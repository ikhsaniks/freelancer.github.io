<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
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
    <link rel="stylesheet" href="css/styled.css">


</head>

<body>

    <span class="bckg"></span>
    <header>
        <h1 onclick="getData()">ADMIN</h1>

    </header>
    <main>
        <div class="title">
            <h2>PORTOFOLIO BY <span id="userName"></span></h2>
            <a href="javascript:void(0);">ADMIN</a>
        </div>

        <div class="contentform">
            <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>
            <div class="card">
                <h5 class="card-header">OFFLINE</h5>
                <div class="card-body">
                    <p class="card-text" id="data01"></p>
                </div>
            </div>
            <br>
            <div class="card">
                <h5 class="card-header">UPLOADED</h5>
                <div class="card-body">
                    <div id="idfreelancer">

                    </div>
                </div>
            </div>
            <br>
            <div class="card">
                <h5 class="card-header">LINK ONLINE</h5>
                <div class="card-body">
                    <table>
                        <tr>
                            <td><img src="image/linkedin.png" style="width:25px;"></td>
                            <td>LinkedIn</td>
                            <td> : </td>
                            <td><a href="#" class="btn btn-link">Direct Link</a></td>
                        </tr>
                        <tr>
                            <td><img src="image/github.png" style="width:25px;"></td>
                            <td>Github</td>
                            <td> : </td>
                            <td><a href="#" class="btn btn-link">Direct Link</a></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <!--===============================================================================================-->
        <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/bootstrap/js/popper.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="vendor/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="js/main.js"></script>

        <script src="js/indexd.js"></script>

    </main>

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


        var resumeOffline = document.getElementById('data01');
        var queryString = decodeURIComponent(window.location.search);
        queryString = queryString.substring(1);

        function getDataCV() {
            var idAdm = sessionStorage.getItem("idAdmin");
            var email = sessionStorage.getItem("emailAdmin");
            var pass = sessionStorage.getItem("passAdmin");

            var arrayEmail = [];
            var arrayPass = [];

            firebase.database().ref("admin_account").on('value', function(result) {
                result.forEach(function(snap) {
                    arrayEmail.push(snap.val().email);
                    arrayPass.push(snap.val().password);

                });

                if (email == (arrayEmail[idAdm] + "-kodeLabtek") && pass == (arrayPass[idAdm] + "-kodeLabtek")) {
                    firebase.database().ref('freelancer_data').child(queryString).once('value').then(function(snapshot) {
                        if (snapshot.val().resume != null || snapshot.val().resume != "") {
                            resumeOffline.innerHTML = snapshot.val().resume;
                        } else {
                            resumeOffline.innerHTML = snapshot.val().namaLengkap + " Belum mengisi";
                        }

                        document.getElementById("userName").innerHTML = snapshot.val().namaLengkap
                        firebase.storage().ref('StorageFreelancer/' + queryString + '/Portofolio - (' + snapshot.val().email + ')').getDownloadURL().then(function(url) {
                            var content = '';
                            content += '<a href="' + url + '" class="btn btn-success">DOWNLOAD</a> <p1><span style="color:red">*</span>Data is Exist</p1>'
                            $("#idfreelancer").append(content);
                        }).catch(function(err) {
                            var content = '';
                            content += '<a href="#" class="btn btn-success disabled" >DOWNLOAD</a> <p1><span style="color:red">*</span>Freelancer is not upload yet</p1>'
                            $("#idfreelancer").append(content);
                            console.log("ERROR" + err);
                        });
                    });
                } else {
                    window.location.replace("login-ad.php");
                }
            });
        }
        window.onload = getDataCV;

    </script>
</body>

</html>
