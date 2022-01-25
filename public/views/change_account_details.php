<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/selectable-bar.css">
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <title>Account</title>
</head>
<body>
<div class="home-container">
    <?php include 'top-photo.php'; ?>
    <div class="bottom">
        <nav id="menu">
            <ul>
                <li>
                    <a class="notactive" href="home"><i class="fas fa-home"></i>HOME</a>
                </li>
                <li>
                    <a class="notactive" href="discover"><i class="fas fa-map-marked-alt"></i>DISCOVER</a>
                </li>
                <li>
                    <a class="notactive" href="favourite"><i class="fas fa-heart"></i>FAVOURITE</a>
                </li>
                <li>
                    <a class="notactive" href="your_plans"><i class="far fa-clock"></i>YOUR PLANS</a>
                </li>
                <li>
                    <a class="active" href="account_details"><i class="fas fa-user-circle"></i>ACCOUNT</a>
                </li>
            </ul>
        </nav>
        <main class="your-plans-bottom">
            <div class="selectable-bar">
                <a class="notactive" href="account_details">Account Details</a>
                <a class="active" href="change_account_details">Change Details</a>
                <a class="notactive" href="change_password">Change Password</a>
            </div>
            <section class="account">
                <p>Change Your Personal Information</p>
                <div class="box-informations">
                    <div class="changing-photo-1">
                        <p>Change your profile photo.</p>
                        <div class="button">
                            <form id="submit_photo" action="addPhoto" method="post" enctype="multipart/form-data">
                                <div class="messages">
                                    <?php if(isset($messages)){
                                        foreach ($messages as $message ){
                                            echo $message;
                                        }
                                    }
                                    ?>
                                </div>
                                <input type="file" name="file">
                                <a onclick="submit_photo()">Save Photo</a>
                            </form>
                        </div>
                    </div>
                    <div class="personal-details">
                        <form id="submit_det" action="addDetails" method="post" enctype="multipart/form-data">
                            <div class="messages">
                                <?php if(isset($messages)){
                                    foreach ($messages as $message ){
                                        echo $message;
                                    }
                                }
                                ?>
                            </div>
                            <div>
                                <p>name:</p>
                                <input name="name" type="text">
                            </div>
                            <div>
                                <p>surname:</p>
                                <input name="surname" type="text">
                            </div>
                            <div>
                                <p>country:</p>
                                <select name="country" id="country" size="1" form="submit_det">
                                    <?php foreach($countries as $key): ?>
                                        <option value="<?=$key['country_name']?>"><?=$key['country_name']?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <a class="save_changes" onclick="submit_det()">Save Changes</a>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>
</body>
<script>
    function submit_photo() {
        document.getElementById("submit_photo").submit();
    }
    function submit_det() {
        document.getElementById("submit_det").submit();
    }
    function submit_logout() {
        document.getElementById("submit_logout").submit();
    }
</script>



