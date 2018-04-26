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
        <h1 onclick="getData()">FREELANCER</h1>
        <nav>
            <ul>
                <li>
                    <a href="javascript:void(0);" data-title="Projects">Data Freelancer</a>
                </li>
                <!--<li>
                    <a href="javascript:void(0);" data-title="Team">Team</a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-title="Diary">Diary</a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-title="Timeline">Timeline</a>
                </li>
                <li>
                    <a href="javascript:void(0);" data-title="Settings">Settings</a>
                </li>-->
                <li>
                    <a href="javascript:void(0);" data-title="Settings" onclick="logOut()">Logout</a>
                </li>

            </ul>
        </nav>
    </header>
    <main>
        <div class="title">
            <h2>FREELANCERS</h2>
            <a href="javascript:void(0);">ADMIN</a>
        </div>

        <div class="contentform">
        <input type="text" id="myInput" name="myInput" onkeyup="myFunction()" placeholder="cari berdasarkan nama...">
        <select id="selectSearch" onchange="myFunction()">
          <option>Nama</option>
          <option>Email</option>
          <option>Domisili</option>
          <option>Skill</option>
        </select>

            <div class="table100 ver2 m-b-110">
                <table data-vertable="ver2" id="myTable">
                    <thead>
                        <tr class="row100 head">
                            <th class="column100 column1" data-column="column1">Nama</th>
                            <th class="column100 column2" data-column="column2">E-mail</th>
                            <th class="column100 column3" data-column="column3">Nomer HP</th>
                            <th class="column100 column4" data-column="column4">Tanggal Lahir</th>
                            <th class="column100 column5" data-column="column5">Kota Domisili</th>
                            <th class="column100 column6" data-column="column6">Day-Rate</th>
                            <th class="column100 column7" data-column="column7">Status Pekerjaan</th>
                            <th class="column100 column8" data-column="column8">Skills</th>
                            <th class="column100 column9" data-column="column9">Tentang Diri Dan CV</th>
                            <th class="column100 column10" data-column="column10">Pengalaman Kerja dan porto</th>
                        </tr>
                    </thead>
                    <tbody id="freelancer">
                        <!-- <tr class="row100">
                        <td class="column100 column1" data-column="column1">Lawrence Hidayat</td>
                        <td class="column100 column2" data-column="column2">lawrencehdyt@gmail.com</td>
                        <td class="column100 column3" data-column="column3">081333444555</td>
                        <td class="column100 column4" data-column="column4">09-juni-1998</td>
                        <td class="column100 column5" data-column="column5">Cirebon</td>
                        <td class="column100 column6" data-column="column6">160.000</td>
                        <td class="column100 column7" data-column="column7">Mahasiswa</td>
                        <td class="column100 column8" data-column="column8">Animator 3D</td>
                        <td class="column100 column9" data-column="column9">data diri saya lumayan panjang dan sangat panjang untuk diceritakan</td>
                        <td class="column100 column10" data-column="column10">gak pernah</td>
                    </tr> -->


                    </tbody>
                </table>
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
        window.onload = getData;
        searching = () => {
            myFunction(4)
        }


        function myFunction() {
            var hasil = document.getElementById("selectSearch").value.toUpperCase();
            var selectData = 0;
            switch (hasil) {
                case "NAMA":
                    selectData = 0;
                    document.getElementsByName('myInput')[0].placeholder = 'cari berdasarkan nama...';
                    break;
                case "EMAIL":
                    selectData = 1;
                    document.getElementsByName('myInput')[0].placeholder = 'cari berdasarkan email...';
                    break;
                case "DOMISILI":
                    selectData = 4;
                    document.getElementsByName('myInput')[0].placeholder = 'cari berdasarkan domisili...';
                    break;
                case "SKILL":
                    selectData = 7;
                    document.getElementsByName('myInput')[0].placeholder = 'cari berdasarkan skill...';
                    break;
                default:
                    selectData = 0;
                    document.getElementsByName('myInput')[0].placeholder = 'cari berdasarkan nama...';

            }

            var input, filter, table, tr, td, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[selectData];
                if (td) {
                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function getData() {
            var idAdm = sessionStorage.getItem("idAdmin");
            var email = sessionStorage.getItem("emailAdmin");
            var pass = sessionStorage.getItem("passAdmin");

            var arrayEmail = [];
            var arrayPass = [];
            var arrSkill = [];
            firebase.database().ref("admin_account").on('value', function(result) {
                result.forEach(function(snap) {
                    arrayEmail.push(snap.val().email);
                    arrayPass.push(snap.val().password);

                });

                    if (email == (arrayEmail[idAdm] + "-kodeLabtek") && pass == (arrayPass[idAdm] + "-kodeLabtek")) {
                        var dbFreelancer = firebase.database().ref('freelancer_data');
                        dbFreelancer.on('child_added', function(snap) {
                                var content = '';
                                var val = snap.val();
                                content += '<tr class="row100">';
                                content += '<td class="column100 column1" data-column="column1">' + val.namaLengkap + '</td>';
                                content += '<td class="column100 column2" data-column="column2">' + val.email + '</td>';
                                content += '<td class="column100 column3" data-column="column3">' + val.noHp + '</td>';
                                content += '<td class="column100 column4" data-column="column4">' + val.tglLahir + '</td>';
                                content += '<td class="column100 column5" data-column="column5">' + val.domisili + '</td>';
                                var price = parseInt(val.speksDayRate);
                                content += '<td class="column100 column6" data-column="column6">' + 'Rp. ' + price.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>';
                                content += '<td class="column100 column7" data-column="column7">' + val.pekerjaanSaatini + '</td>';

                                var stringOfSkill = '';
                                var dbRef = firebase.database().ref('freelancer_data').child(val.userid).child('ListSkill').child(val.userid).child('skills');
                                dbRef.once('value', function(data) {
                                    if(data != null){
                                        arrSkill.push(data.val());
                                        console.log(arrSkill.length);
                                        for(var i=0;i <= arrSkill.length ; i++){
                                            if(arrSkill[i] != null){
                                               stringOfSkill += arrSkill[i];
                                            }
                                        }
                                    }
                                });
                                content += '<td class="column100 column8" data-column="column8">' + stringOfSkill + '</td>';
                                content += '<td class="column100 column9" data-column="column9">' + '<a style=" color:blue" onclick="viewcv(\'' + val.userid + '\')">view cv</a>' + '</td>';
                                content += '<td class="column100 column10" data-column="column10">' + '<a style=" color:blue" onclick="viewporto(\'' + val.userid + '\')">view porto</a>' + '</td>';
                                content += '</tr>';
                                $("#freelancer").append(content);
                            //})
                        });
                        dbFreelancer.on('child_changed', function(snap) {
                          //setCommentValues(postElement, data.key, data.val().text, data.val().author);
                        });

                        dbFreelancer.on('child_removed', function(snap) {
                            window.location.reload();
                        });

                    }else{
                        window.location.replace("login-ad.php");
                    }
            });
        }

        function LogOut(){
            sessionStorage.clear();
            window.location.replace("login-ad.php");
        }

        logOut=()=>{
            LogOut();
        }

        viewcv = (uid) => {
            var queryString = "?" + uid;
            window.location.href = "cv-page.php" + queryString;
        }

        viewporto = (uid) => {
            var queryString = "?" + uid;
            window.location.href = "porto-page.php" + queryString;
        }

    </script>
</body>

</html>
