<!DOCTYPE html>

<head>
    <link rel="stylesheet" type="text/css" href="/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="/public/css/plans-home.css">
    <script src="https://kit.fontawesome.com/62f42132ad.js" crossorigin="anonymous"></script>
    <title>Home page</title>
</head>

<body>
<div class="home-container">
    <div class="top-photo">
        <div class="left">
            <a class="settings"><i class="fas fa-sliders-h"></i></a>
            <a class="log-out" href="login" ><i class="fas fa-sign-out-alt"></i></a>
        </div>
        <div class="right">
            <div class="logo-home">
                <img src="/public/img/logo.svg">
            </div>
            <div class="person">
                <div>Hi, <? echo $_COOKIE['nick']?> </div>
                <div>
                    <img src="/public/img/osoba.svg">
                </div>
            </div>
        </div>
    </div>
    <div class="bottom">
        <nav>
            <ul>
                <li>
                    <a class="active" href="home"><i class="fas fa-home"></i>HOME</a>
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
                    <a class="notactive" href="account_details"><i class="fas fa-user-circle"></i>ACCOUNT</a>
                </li>
            </ul>
        </nav>
        <main class="home-bottom">
            <div class="left">
                <p class="txt1">The most popular plans for the day</p>
                <p class="txt2">TOP 10 in Poland</p>
                <section class="plans-home">
                    <div id="plan1">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>1</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                    <div id="plan2">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>2</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                    <div id="plan3">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>3</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                    <div id="plan4">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>4</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                    <div id="plan5">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>5</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                    <div id="plan6">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>6</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                    <div id="plan7">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>7</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="right">
                <div class="counter">
                    <div class="left">
                        <p>Day plans made:</p>
                        <div class="number">180</div>
                    </div>
                    <div class="right">
                        <p>Cities with plans:</p>
                        <div class="number">180</div>
                    </div>
                </div>
                <p class="txt2">TOP 10 Viral</p>
                <section class="plans-home">
                    <div id="plan21">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>1</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                    <div id="plan22">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>2</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                    <div id="plan23">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>3</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                    <div id="plan24">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>4</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                    <div id="plan25">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>5</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                    <div id="plan26">
                        <img src="/public/img/uploads/photo.jpg">
                        <div class="plan-photograph" >
                            <p>6</p>
                        </div>
                        <div class="description">
                            <div class="plan-informations">
                                <div>
                                    <div><i class="fas fa-map-marker-alt"></i>location</div>
                                    <div><i class="fas fa-clock"></i>time</div>
                                    <div><i class="fas fa-comment"></i>comments</div>
                                    <div>
                                        <i class="fas fa-user"></i>
                                        nick
                                    </div>
                                </div>
                            </div>
                            <div class="likes">
                                <i class="fas fa-heart"></i>
                                <p>300</p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</div>
</body>

