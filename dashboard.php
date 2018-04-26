<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link rel="stylesheet" href="css/styled.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


</head>

<body>

    <span class="bckg"></span>
    <header>
        <h1>FREELANCER</h1>
        <nav>
            <ul>
                <li>
                    <a href="javascript:void(0);" data-title="Projects">Projects</a>
                </li>
                <li>
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
                </li>
                <li>
                    <a href="javascript:void(0);" data-title="Search" onclick="logout()">Logout</a>
                </li>
            </ul>
        </nav>
    </header>
    <main>
        <div class="title">
            <h2>Profile Data</h2>
            <a href="javascript:void(0);"><span id="username"></span></a>
        </div>

        <form>
            <h1>My Profile Data</h1>

            <div class="contentform">
                <div id="sendmessage"> Your message has been sent successfully. Thank you. </div>
                <div class="leftcontact">
                    <div class="form-group">
                        <p>Alamat E-mail <span>*</span></p>
                        <span class="icon-case"><i class="fa fa-envelope-o"></i></span>
                        <input type="email" name="email" id="email" data-rule="email" data-msg="Vérifiez votre saisie sur les champs : Le champ 'E-mail' est obligatoire." />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <p>Nama Lengkap<span>*</span></p>
                        <span class="icon-case"><i class="fa fa-male"></i></span>
                        <input type="text" name="nom" id="nom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné." />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <p>Tanggal Lahir <span>*</span></p>
                        <span class="icon-case"><i class="fa fa-map-marker"></i></span>
                        <input type="date" name="tglLahir" id="tglLahir" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Code postal' doit être renseigné." />
                        <div class="validation"></div>
                    </div>
                    <p>Pekerjaan Saat Ini <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-map-marker"></i></span>
                    <select name="pekerjaan" id="pekerjaan">
                          <option value=""selected>--Pilih--</option>
                          <option value="Kuliah">Kuliah</option>
                          <option value="Fresh Grad">Fresh Grad</option>
                          <option value="memiliki pekerjaan tetap">Memiliki Pekerjaan tetap</option>
                          <option value="audi">lainnya</option>
                        </select>
                </div>

                <div class="rightcontact">
                    <div class="form-group">
                        <p>Kota Domisili <span>*</span></p>
                        <span class="icon-case"><i class="fa fa-building-o"></i></span>
                        <input type="text" name="ville" id="ville" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Ville' doit être renseigné." />
                        <div class="validation"></div>
                    </div>

                    <div class="form-group">
                        <p>Nomer HP <span>*</span></p>
                        <span class="icon-case"><i class="fa fa-phone"></i></span>
                        <input type="number" name="phone" id="phone" data-rule="maxlen:10" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Téléphone' doit être renseigné. Minimum 10 chiffres" />
                        <div class="validation"></div>
                    </div>
                    <div class="form-group">
                        <p>Ekspektasi Day-Rate<span>*</span></p>
                        <span class="icon-case"><i class="fa fa-phone"></i></span>
                        <input type="number" name="dayrate" id="dayrate" data-rule="maxlen:10" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Téléphone' doit être renseigné. Minimum 10 chiffres" />
                        <div class="validation"></div>
                    </div>
                </div>

                <div class="form-group">
                    <p>Ceritakan diri anda atau drop link CV/Resume profile diri anda <span>*</span></p>
                    <span class="icon-case"><i class="fa fa-comments-o"></i></span>
                    <textarea name="message" id="resume" rows="14" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Message' doit être renseigné."></textarea>
                    <div class="validation"></div>
                </div>
                <span class="icon-case"><i class="fa fa-comments-o"></i></span>
                <input name="cv" type="file" id="fileCV">

                <div class="form-group">
                    <p>Bagikan pengalaman diri anda dengan drop portofolio/repository<span>*</span></p>
                    <span class="icon-case"><i class="fa fa-comments-o"></i></span>
                    <textarea name="message" id="porto" rows="14" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Message' doit être renseigné."></textarea>
                    <div class="validation"></div>
                </div>

                <span class="icon-case"><i class="fa fa-comments-o"></i></span>
                <input name="porto" type="file" id="filePorto">


            </div>
        </form>
        <form>
            <div class="contentform">
                <div class="form-group">
                    <p>Posisi Yang Di Inginkan<span>*</span></p>
                    <input type="checkbox" name="checkbox-option" id="UI Designer" class="hide-checkbox" value="UI Designer">
                    <label for="UI Designer">UI Designer</label>

                    <input type="checkbox" name="checkbox-option" id="UX Designer" class="hide-checkbox" value="UX Designer">
                    <label for="UX Designer">UX Designer</label>

                    <input type="checkbox" name="checkbox-option" id="Content Writer" class="hide-checkbox" value="Content Writer">
                    <label for="Content Writer">Content Writer</label>

                    <input type="checkbox" name="checkbox-option" id="fep web" class="hide-checkbox" value="Front-End Programmer (WEB)">
                    <label for="fep web">Front-End Programmer Web</label>

                    <input type="checkbox" name="checkbox-option" id="fep android" class="hide-checkbox" value="Front-End Programmer Android ">
                    <label for="fep android">Front-End Programmer Android </label>

                    <input type="checkbox" name="checkbox-option" id="bep web" class="hide-checkbox" value="Back-end Programmer (Web)">
                    <label for="bep web">Back end Programmer Web</label>

                    <input type="checkbox" name="checkbox-option" id="bep android" class="hide-checkbox" value="Back-end Programmer Android">
                    <label for="bep android">Back-end Programmer Android</label>

                    <input type="checkbox" name="checkbox-option" id="GameDeveloper" class="hide-checkbox" value="Game Developer">
                    <label for="GameDeveloper">Game Developer</label>

                    <input type="checkbox" name="checkbox-option" id="MultimediaDeveloper" class="hide-checkbox" value="Multimedia Developer">
                    <label for="MultimediaDeveloper">Multimedia Developer </label>

                    <input type="checkbox" name="checkbox-option" id="HardwareDeveloper" class="hide-checkbox" value="Hardware Developer">
                    <label for="HardwareDeveloper">Hardware Developer</label>

                    <input type="checkbox" name="checkbox-option" id="CopyWriter" class="hide-checkbox" value="Copy Writer">
                    <label for="CopyWriter">Copy Writer</label>

                    <input type="checkbox" name="checkbox-option" id="Animator2D" class="hide-checkbox" value="Animator 2D">
                    <label for="Animator2D">Animator 2D</label>

                    <input type="checkbox" name="checkbox-option" id="Animator3D" class="hide-checkbox" value="Animator 3D">
                    <label for="Animator3D">Animator 3D</label>

                    <input type="checkbox" name="checkbox-option" id="ProductDesigner" class="hide-checkbox" value="Product Designer">
                    <label for="ProductDesigner">Product Designer</label>

                    <input type="checkbox" name="checkbox-option" id="SoundEngineer" class="hide-checkbox" value="Sound Engineer">
                    <label for="SoundEngineer">Sound Engineer</label>

                    <input type="checkbox" name="checkbox-option" id="DesignResearcher" class="hide-checkbox" value="Design Researcher">
                    <label for="DesignResearcher">Design Researcher</label>

                    <input type="checkbox" name="checkbox-option" id="VideoGrapher" class="hide-checkbox" value="Video Grapher">
                    <label for="VideoGrapher">Video Grapher</label>
                </div>
            </div>
        </form>
        <button type="submit" class="bouton-contact" onclick="sendProfile()">SAVE PROFILE</button>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
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

        var email = document.getElementById('email');
        var domisili = document.getElementById('ville');
        var namaLengkap = document.getElementById('nom');
        var noHp = document.getElementById('phone');
        var tglLahir = document.getElementById('tglLahir');
        var espeksiDayRate = document.getElementById('dayrate');
        var pekerjaanSaatini = document.getElementById('pekerjaan');
        var resume = document.getElementById('resume');
        var pengalaman = document.getElementById('porto');
        var fileCV = document.getElementById('fileCV');
        var filePorto = document.getElementById('filePorto');
        var fileCVURL;
        var filePortoURL;
        var userData;
        var statusUploadCV = true;
        var statusUploadPorto = true;

        function CheckUser() {
            function newLoginHappened(user) {
                if (user) {
                    getData(user);
                    userData = user;
                } else {
                    window.location.replace("login.php");
                }
            }
            firebase.auth().onAuthStateChanged(newLoginHappened);
        }

        function getData(user) {

            firebase.database().ref('freelancer_data').child(user.uid).once('value').then(function(snapshot) {
                var curEmail = (snapshot.val() && snapshot.val().email) || user.email;
                var curName = (snapshot.val() && snapshot.val().namaLengkap) || user.displayName;
                var curTanggalLahir = (snapshot.val() && snapshot.val().tglLahir) || "";
                var curDomisili = (snapshot.val() && snapshot.val().domisili) || "";
                var curNoHp = (snapshot.val() && snapshot.val().noHp) || "";
                var curSpekDayRate = (snapshot.val() && snapshot.val().speksDayRate) || "";
                var curPekerjaan = (snapshot.val() && snapshot.val().pekerjaanSaatini) || "Kuliah";
                var curResume = (snapshot.val() && snapshot.val().resume) || "";
                var curPengalaman = (snapshot.val() && snapshot.val().pengalaman) || "";
                email.value = curEmail;
                namaLengkap.value = curName;
                tglLahir.value = curTanggalLahir;
                domisili.value = curDomisili;
                noHp.value = curNoHp;
                espeksiDayRate.value = curSpekDayRate;
                pekerjaanSaatini.value = curPekerjaan;
                resume.value = curResume;
                pengalaman.value = curPengalaman;

            });

            firebase.database().ref('freelancer_account').child(user.uid).once('value').then(function(snapshot) {
                var curUsername = (snapshot.val() && snapshot.val().username) || user.displayName;
                document.getElementById("username").innerHTML = curUsername;
            })
            
            var tempSkills = [];
            var dbRef = firebase.database().ref('freelancer_data').child(user.uid).child('ListSkill').child(user.uid).child('skills');    
                dbRef.once('value', function(data) {
                    data.forEach(function(result){
                        tempSkills.push(result.val());
                    })
                    console.log(tempSkills.length + tempSkills[0]);
                    var i = 0;
                    while(i != tempSkills.length){
                        $("input[type=checkbox][value='" + tempSkills[i] +"']").prop("checked",true);
                        i++;
                }
            })
        }

        function logOutAccount() {
            firebase.auth().signOut();
            window.location.replace("login.php");
        }

        fileCV.addEventListener('change', function(e) {
            var file = e.target.files[0];

            //create storage referance
            var storageRef = firebase.storage().ref('StorageFreelancer/' + userData.uid + '/' + 'CV' + ' - ' + '(' + userData.email + ')');

            //upload file
            var task = storageRef.put(file);

            //update progress bar
            task.on('state_changed',
                function progress(snapshot) {
                    statusUploadCV = false;
                },

                function error(err) {

                },

                function complete() {
                    statusUploadCV = true;
                    console.log("SUKSES UPLOAD CV");
                    fileCVURL = task.snapshot.downloadURL;
                    console.log(fileCVURL);
                }
            );
        });

        filePorto.addEventListener('change', function(e) {
            var file = e.target.files[0];

            //create storage referance
            var storageRef = firebase.storage().ref('StorageFreelancer/' + userData.uid + '/' + 'Portofolio' + ' - ' + '(' + userData.email + ')' /* + '.pdf'*/ );

            //upload file
            var task = storageRef.put(file);

            //update progress bar
            task.on('state_changed',
                function progress(snapshot) {
                    statusUploadPorto = false;
                },

                function error(err) {

                },

                function complete() {
                    statusUploadPorto = true;
                    console.log("SUKSES UPLOAD PORTO");
                    filePortoURL = task.snapshot.downloadURL;
                    console.log(filePortoURL);
                }
            );
        });

        function saveProfileData() {
            var skills = [];
            $("input:checkbox[name=checkbox-option]:checked").each(function() {
                skills.push($(this).val());
            });

            firebase.database().ref('freelancer_data').child(userData.uid).set({
                userid: userData.uid,
                email: email.value,
                domisili: domisili.value,
                namaLengkap: namaLengkap.value,
                noHp: noHp.value,
                tglLahir: tglLahir.value,
                speksDayRate: espeksiDayRate.value,
                pekerjaanSaatini: pekerjaanSaatini.value,
                resume: resume.value,
                pengalaman: pengalaman.value

            });
            firebase.database().ref('freelancer_data').child(userData.uid).child('ListSkill').child(userData.uid).set({
                 skills
            });
        }

        sendProfile = () => {
            if (statusUploadCV == false || statusUploadPorto == false) {
                alert('We Uploading Your File, Please Wait!');
            } else {
                saveProfileData()
                location.reload();
                $(document).scrollTop(0);
            }
        }

        logout = () => {
            logOutAccount()
        }

        window.onload = CheckUser;

    </script>

</body>

</html>
