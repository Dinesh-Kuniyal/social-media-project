<?php
if (!isset($_SESSION)) {
    session_start();
}
if (!defined('Opiverse_Pages_Auth_Constant')) {
?>
    <h1>You should have access to this file.</h1>
<?php
} else {
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Opiverse</title>
        <?php include('components/links.php'); ?>
        <link rel="stylesheet" href="resources/home/home.css">
        <!-- <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
        <script src="http://localhost/opiverse/resources/javascript/feather-icons.js"></script> -->
    </head>

    <body>
        <header>
            <div class="inner-width-nav">
                <a style="color: #fff; text-decoration: none; display: flex;gap: 5px;align-items: center;" href="#" class="logo">
                    <img src="favicon.png" alt="Error">
                    <h2>OPIVERSE</h2>
                </a>
                <i onClick="NavFunction()" data-feather="menu" class="menu-toggle-btn"></i>
                <nav id="navigation-menu" class="navigation-menu">
                    <a href=""><i class="nav-icons-feather" data-feather="home"></i> Home</a>
                    <a href="#team"><i class="nav-icons-feather" data-feather="users"></i> Team</a>
                    <a href="#contact"><i class="nav-icons-feather" data-feather="phone"></i> Contact</a>
                    <a href="signup/"><i class="nav-icons-feather" data-feather="user-plus"></i> Sign
                        Up</a>
                    <a href="login/"><i class="nav-icons-feather" data-feather="log-in"></i> Log In</a>
                </nav>
            </div>
        </header>
        <div class="hero-section-container">
            <div class="hero-details">
                <h1 class="hero-section-label">
                    Let's build the community of people sharing same interests.
                </h1>
                <span>
                    OPIVERSE - The Universe Of Opinions
                </span>
                <a href="/signup" class="register-btn">Register</a>
            </div>
            <img class="image-hero-section" src="resources/images/hero.jpg" alt="Error" />
        </div>

        <!-- // About US  -->
        <div class="section-container">
            <h1 class="section-heading">ABOUT US</h1>
            <p class="about-details-text">
                Opiverse is an open platform which provides free speech to users. Here at Opiverse we are building a community where we let you join the people sharing same interests as you virtually. Opiverse is a well-designed and user-friendly platform which opens a new world of opinions to the users. Here users can share their ideas, thoughts and much more in the form of opinions and connect to people through them. Here opinions are most important and thus each opinion should be one which is representing your ideas in a way not hurting others. Opiverse is based on user development and we feel that opiverse can let you develop yourself in a way that it helps you. Join opiverse and become a part of this universe.
            </p>
            <div class="flexed-images-container-about">
                <img src="resources/images/bg-1.jpg" alt="Error" />
                <img src="resources/images/bg-2.jpg" alt="Error" />
                <img src="resources/images/bg-3.jpg" alt="Error" />
                <img src="resources/images/bg-4.jpg" alt="Error" />
            </div>
        </div>

        <!-- // Why Join Opiverse  -->
        <div class="section-container">
            <div class="obj-center">
                <h2 class="section-heading">WHY TO JOIN OPIVERSE</h2>
            </div>
            <div class="flex-box-why-to-join-section">
                <img src="resources/images/whyopiverse.jpg" alt="Error" />
                <div class="why-to-join-details">
                    <h3>
                        Opiverse – Universe of Opinions;
                    </h3>
                    <p>
                        A well-developed social platform designed for you and offers you much more than just wasting your time over the internet.
                    <ul>
                        <li>
                            Opiverse is a platform that works on the principle of community building
                        </li>
                        <li>
                            Connect to the people sharing same interests as you and exchange your opinions.
                        </li>
                        <li>
                            Opinions is what we are based on so we offer free speech to users until it hurts other party in any way.
                        </li>
                        <li>
                            Be a part of the world and all that is happening around by joining us.
                        </li>
                        <li>
                            We offer you to join clubs of your likes and join your own community.
                        </li>
                        <li>
                            Daily topics covers various issues which you can talk about and share your opinions.
                        </li>
                        No matter what you like or what you want to know about, everything is here on opiverse so come join and be a part of this amazing website.
                    </ul>
                    </p>
                </div>
            </div>
        </div>
        <!-- // What Do We Offer  -->
        <div class="section-container">
            <h2 class="section-heading">WHAT DO WE OFFER ?</h2>
            <h3 class="what-do-we-offer-label">Everything that makes to feels you good is the first option for us.</h3>
            <div class="flexed-services-box-container">
                <div class="service-box-outer">
                    <div class="service-icon-container">
                        <i class="service-icons" data-feather="users"></i>
                    </div>
                    <h4>Club Discussion</h4>
                    <p>
                        We offer users the chance to join different clubs and connect to people sharing same interests as them. The website is personalized and offers you to send messages and your ideas through clubs thus gaining knowledge and skills through community building.
                    </p>
                </div>
                <div class="service-box-outer">
                    <div class="service-icon-container">
                        <i class="service-icons" data-feather="voicemail"></i>
                    </div>
                    <h4>Free Speech</h4>
                    <p>
                        We offer users free speech that lets them share their ideas and views easily. *We prohibit users to not use words that could offend others. This website has been set online as a medium where users can open up their thoughts, connect and can publish them as they like through personalized articles of their choice.
                    </p>
                </div>
                <div class="service-box-outer">
                    <div class="service-icon-container">
                        <i class="service-icons" data-feather="clipboard"></i>
                    </div>
                    <h4>Daily Articles</h4>
                    <p>
                        We offer users to write articles on the topics of their interests and share their ideals on the topic itself. The website uses a writer and reader option to differentiate users and give defined functions separately to both. Writers can post the articles related to their clubs and interested topics.
                    </p>
                </div>
            </div>
            <div class="flexed-services-box-container">
                <div class="service-box-outer">
                    <div class="service-icon-container">
                        <i class="service-icons" data-feather="gitlab"></i>
                    </div>
                    <h4>Friends</h4>
                    <p>
                        We offer users to connect to different people let them be friends.
                    </p>
                </div>
                <div class="service-box-outer">
                    <div class="service-icon-container">
                        <i class="service-icons" data-feather="lock"></i>
                    </div>
                    <h4>Privacy</h4>
                    <p>
                        At Opiverse user is first and we keep your data and privacy with atmost security.
                    </p>
                </div>
                <div class="service-box-outer">
                    <div class="service-icon-container">
                        <i class="service-icons" data-feather="user-check"></i>
                    </div>
                    <h4>Profile Management</h4>
                    <p>
                        Create your profile and let others know about your interests and yourself.
                    </p>
                </div>
            </div>
        </div>
        <!-- // Privacy Section  -->
        <div class="section-container">
            <h2 class="privacy-heading-label">
                <i data-feather="lock"></i>
                Your security is our first priority.
            </h2>
            <div class="section-heading-ul"></div>
            <p class="privacy-details">
                Here at opiverse users and their opinions are what we emphasize on. Therefore, users’ privacy is of great importance to us and every day we work towards developing and strengthening our privacy policies so that we can support the users in every way possible.
                <br />
                The user data is kept safe and will be not be shared with any third party in any condition. To keep the user data safe, we will keep developing the security in future to ensure no data theft or breach takes place.
            </p>
        </div>
        <!-- // License and Attributes  -->
        <div class="section-container">
            <h2 class="licension-heading-label"> <i data-feather="layout"></i> License And Attributes</h2>
            <div class="section-heading-ul"></div>
            <p class="privacy-details">
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Porro, culpa dolor odio debitis tenetur eos mollitia quas laborum eum laboriosam facere nihil consequatur ullam vitae commodi suscipit atque, harum, at repellat aliquid rem quod voluptatibus? Maxime, nam inventore odio ipsam voluptates autem quam enim cupiditate consequatur dolore molestias, excepturi delectus.
                Quod, nihil odit fuga ad dolores ratione,
                dolorum dolorem blanditiis corporis quas id quidem illo sit minima
                dolor dolore! <br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Id earum velit praesentium aperiam porro distinctio minima consequuntur odit officiis tempora quasi quos eveniet sequi ipsa saepe delectus nostrum voluptatem nisi libero ducimus dicta, aliquid qui! Neque nesciunt consequatur laborum expedita officiis repudiandae, dolores vel accusamus perferendis quo aperiam veniam odit?
            </p>
        </div>
        <!-- // Collabrator Section  -->
        <!-- <div class="section-container">
            <h2 class="section-heading">OUR COLLABRATORS</h2>
            <div class="flexed-services-box-container">
                <div class="service-box-outer collbrator-box-outer">
                    <p class="collbrator-comment">
                        "Opiverse is a open platform where you can interact with others in group.
                        It is just amazing and easy to use. A app worth your time and addictive for your own good."
                    </p>
                    <div class="collabrator-footer">
                        <img src="resources/images/anurag.jpg" alt="ERROR">
                        <div class="collabrator-details">
                            <span>Anurag Rana</span> <br>
                            <a class="profile-links" href="https://www.instagram.com/ig_anurag__rana/" target="_blank">Check out ! </a>
                        </div>
                    </div>
                </div>
                <div class="service-box-outer collbrator-box-outer">
                    <p class="collbrator-comment">
                        "A really amazing site overall. I love everything opiverse provides us.
                        It is easy or and its content is awesome. Opiverse is a platform where you connect with others.
                        You can have a great experience by using this platform."
                    </p>
                    <div class="collabrator-footer">
                        <img src="resources/images/rohan.jpeg" alt="ERROR">
                        <div class="collabrator-details">
                            <span>Rohan Joshi</span> <br>
                            <a class="profile-links" href="https://www.instagram.com/rohan_joshi05/" target="_blank">Check out ! </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flexed-services-box-container">
                <div class="service-box-outer collbrator-box-outer">
                    <p class="collbrator-comment">
                        "This Platform lets your imagination flow and fly. Free Speech makes this site special, but it isn't like that you can type anything, there are always some regulations. Here, One can literally join any club of their choice and discuss a lot of things happening around the globe making it a good source of news and a great site to spread awareness."
                    </p>
                    <div class="collabrator-footer">
                        <img src="resources/images/mayank.jpg" alt="ERROR">
                        <div class="collabrator-details">
                            <span>Mayank Rawat</span> <br>
                            <a class="profile-links" href="https://www.instagram.com/mayankrawat_3/" target="_blank">Check out ! </a>
                        </div>
                    </div>
                </div>
                <div class="service-box-outer collbrator-box-outer">
                    <p class="collbrator-comment">
                        "theopiverse.com is a great platform to enhance your knowledge. You can even write and share your own articles that too free of any cost. Opiverse helps you unleash your creative side. And, in my opinion the best feature is "Hot Topics"."
                    </p>
                    <div class="collabrator-footer">
                        <img src="resources/images/abhishek.jpg" alt="ERROR">
                        <div class="collabrator-details">
                            <span>Abhishek Sharma</span> <br>
                            <a class="profile-links" href="https://instagram.com/abhishek_sharma_1998r" target="_blank">Check out ! </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="team" class="section-container">
            <div class="obj-center">
                <h1 class="section-heading">OUR TEAM</h1>
            </div>
            <div class="flexed-team-section-div">
                <div class="team-box-outer">
                    <img src="resources/images/dinesh.jpg" alt="Error">
                    <h3>Dinesh Kuniyal</h3>
                    <span>Developer</span>
                    <p>
                        "OPIVERSE is a great platform that can build up your knowledge by mutual sharing of experiences with the people of same interest.. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque soluta asperiores"
                    </p>
                </div>
                <div class="team-box-outer">
                    <img src="resources/images/avdesh.jpeg" alt="Error">
                    <h3>Avdesh Painuly</h3>
                    <span>Co-Founder</span>
                    <p>"Opiverse is a website that let's you to connect in a way that is inspiring.
                        In this world where every other person is a machine
                        I think opiverse can be a place to rediscover being human."</p>
                </div>
            </div>
            <div class="flexed-team-section-div">
                <div class="team-box-outer">
                    <img src="resources/images/yogesh.jpeg" alt="Error">
                    <h3>Yogesh Rawat</h3>
                    <span>Co-Founder</span>
                    <p>
                        "It is free speech that excites me the most about OPIVERSE. OPIVERSE provides you with the luxury of free speech at no cost and aims to provide everyone a fair chance to freely share their thoughts and views with the mass. At, Opiverse, we intend to offer free speech at its uttermost level while simultaneously respecting its boundaries.."
                    </p>
                </div>
                <div class="team-box-outer">
                    <img src="resources/images/priyanshu.jpeg" alt="Error">
                    <h3>Priyanshu Negi</h3>
                    <span>Director</span>
                    <p>"Opiverse-The Universe of Opinions, where people can indulge themselves into a nexus of knowledge and begin their journey towards great feats. It's not just a platform to share interests but one to share thoughts, ideas, art, information and to reshape our sorroundings for greater good.."</p>
                </div>
            </div>
        </div> -->
        <div id="contact" class="section-container">
            <h2 class="section-heading">FEEL FREE TO CONTACT US</h2>
            <div class="flexed-contact-section">
                <div class="contact-detail-box">
                    <h2 class="contact-label">Our team is always ready to response you</h2>
                    <div class="list-item-contact">
                        <i data-feather="map-pin"></i>
                        Dehradun, Uttrakhand (INDIA)
                    </div>
                    <div class="list-item-contact">
                        <i data-feather="phone"></i>
                        +91 1234567890
                    </div>
                    <div class="list-item-contact">
                        <i data-feather="mail"></i>
                        info@theopiverse.com
                    </div>
                    <div class="list-item-contact">
                        <i data-feather="monitor"></i>
                        www.theopiverse.com
                    </div>
                </div>
                <div class="contact-form-box">
                    <form id="contact-form" method="post" class="contact-form">
                        <input required type="text" name="name" placeholder="Name">
                        <input required type="email" name="email" placeholder="Email">
                        <textarea required name="message" placeholder="Your Message"></textarea>
                        <div id="contact-form-loader"></div>
                        <button class="contact-form-send-btn" type="submit">Send</button>
                    </form>
                </div>
            </div>
        </div>
        <script defer>
            const form = document.querySelector(".contact-form");
            form.onsubmit = (e) => {
                e.preventDefault();
            }
            const OpenFormLoader = () => {
                document.getElementById("contact-form-loader").style.display = "block";
            }
            const CloseFormLoader = () => {
                document.getElementById("contact-form-loader").style.display = "none";
            }
            const contactFormBtn = document.querySelector(".contact-form-send-btn");
            contactFormBtn.onclick = () => {
                OpenFormLoader();
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "modules/SendContactMessage.php", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            CloseFormLoader();
                            if (xhr.responseText == "DONE") {
                                alert("Thanks for your message. We will get back to you soon..");
                                window.location.reload();
                            } else {
                                alert("Error in sending your message. Try again Later");
                            }
                        }
                    }
                }
                let formData = new FormData(document.getElementById("contact-form"));
                xhr.send(formData);
            }
        </script>
        <div class="section-container footer-container">
            <div class="footer-inner-container">
                <div class="footer-links-container">
                    <ul>
                        <a href="#">
                            <li><i class="footer-icons" data-feather="home"></i>Home</li>
                        </a>
                        <a href="#about">
                            <li><i class="footer-icons" data-feather="gitlab"></i>About</li>
                        </a>
                        <a href="#contact">
                            <li><i class="footer-icons" data-feather="phone"></i>Contact</li>
                        </a>
                        <a href="login/">
                            <li><i class="footer-icons" data-feather="log-in"></i>Login</li>
                        </a>
                        <a href="signup/">
                            <li><i class="footer-icons" data-feather="user-plus"></i>Signup</li>
                        </a>
                    </ul>
                </div>
                <div class="footer-links-container">
                    <ul>
                        <a href="">
                            <li>Blogs</li>
                        </a>
                        <a href="#team">
                            <li>Team</li>
                        </a>
                        <a href="">
                            <li>Collabrators</li>
                        </a>
                        <a href="">
                            <li>Help</li>
                        </a>
                        <a href="">
                            <li>Feedback</li>
                        </a>
                    </ul>
                </div>
                <div class="footer-links-container">
                    <ul>
                        <a href="">
                            <li>Blogs</li>
                        </a>
                        <a href="">
                            <li>Team</li>
                        </a>
                        <a href="">
                            <li>Collabrators</li>
                        </a>
                        <a href="">
                            <li>Help</li>
                        </a>
                        <a href="">
                            <li>Feedback</li>
                        </a>
                    </ul>
                </div>
                <div class="footer-links-container">
                    <ul>
                        <a href="">
                            <li> <i class="footer-icons" data-feather="instagram"></i> Instagram</li>
                        </a>
                        <a href="">
                            <li> <i class="footer-icons" data-feather="facebook"></i> Facebook</li>
                        </a>
                        <a href="">
                            <li> <i class="footer-icons" data-feather="twitter"></i> Twitter</li>
                        </a>
                        <a href="">
                            <li> <i class="footer-icons" data-feather="linkedin"></i> LinkedIn</li>
                        </a>
                        <a href="">
                            <li> <i class="footer-icons" data-feather="youtube"></i> Youtube</li>
                        </a>
                    </ul>
                </div>
            </div>
            <span class="footer-label">Copyright © 2022. All Rights Resereved</span>
        </div>
        <script>
            // feather.replace();

            function NavFunction() {
                document.getElementById("navigation-menu").classList.toggle("active");
            }
        </script>
    </body>

    </html>
<?php
}
?>