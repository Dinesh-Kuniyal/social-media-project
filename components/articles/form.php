<style>
    .new-article-form {
        width: 100%;
        padding: 10px;
    }

    .create-article-form-heading {
        color: #000;
        font-weight: 400;
    }

    .ul2 {
        width: 100px;
        height: 2px;
        background-color: #000;
    }

    .single-input-title-container {
        width: 100%;
        height: auto;
        margin: 10px 0px;
        padding: 5px;
    }

    .single-input-title-container input {
        width: 100%;
        height: 40px;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid var(--base-purple);
    }

    .single-input-title-container input:focus {
        outline: none;
        border: 2px solid var(--base-purple);
    }

    .flexed-form-input-container {
        display: flex;
        width: 100%;
        flex-wrap: wrap;
        padding: 5px;
        gap: 5px;
        align-items: centere;
        justify-content: space-between;
    }

    .flexed-form-input-container textarea {
        width: calc(50% - 5px);
        height: 100px;
        resize: vertical;
        font-size: 16px;
        padding: 10px;
        border-radius: 4px;
        border: 1px solid var(--base-purple);
    }

    .flexed-form-input-container textarea:focus {
        outline: none;
        border: 2px solid var(--base-purple);
    }

    .create-btn-article {
        width: 170px;
        height: 40px;
        display: block;
        margin-left: auto;
        background-color: var(--base-purple);
        color: #fff;
        border: none;
        font-size: 16px;
        margin-top: 1rem;
        border-radius: 2px;
        transition: all 200ms ease-in-out;
    }

    .create-btn-article:hover {
        opacity: .7;
    }

    @media screen and (max-width: 800px) {
        .flexed-form-input-container textarea {
            width: 100%;
        }
    }

    .main-outer-select-container {
        display: flex;
        flex-wrap: wrap;
        margin: 10px 0px;
        gap: 1rem;
    }

    .select-box {
        position: relative;
        width: clamp(300px, 100%, 400px);
    }

    .selected-item {
        width: 100%;
        height: 40px;
        background-color: var(--base-purple);
        color: #fff;
        display: flex;
        padding: 5px;
        align-items: center;
        cursor: pointer;
        border-radius: 3px;
        justify-content: space-between;
    }

    .options-list {
        position: absolute;
        width: 100%;
        top: 46px;
        background-color: #fff;
        /* height: 0px; */
        z-index: 2;
        display: none;
        overflow: hidden;
        border-radius: 3px;
        transition: all 200ms ease-in-out;
        overflow-y: scroll;
        max-height: 200px;
    }

    .options-list::-webkit-scrollbar {
        width: 5px;
        background-color: transparent;
    }

    .options-list::-webkit-scrollbar-thumb {
        background-color: var(--base-purple);
        border-radius: 100px;
    }

    .option {
        width: 100%;
        height: 40px;
        display: flex;
        cursor: pointer;
        align-items: center;
        padding: 5px;
        border-bottom: 1px solid rgba(0, 0, 0, .2);
        transition: all 200ms ease-in-out;
        -webkit-transition: all 200ms ease-in-out;
    }

    .option:hover {
        background-color: rgba(0, 0, 0, .3);
    }

    .option-list-open {
        height: auto;
    }
    .suggest-link{
        margin: 10px;
        text-decoration: underline;
        color: var(--base-purple);
    }
</style>
<form action="index.php" method="POST" class="new-article-form">
    <h2 class="create-article-form-heading">Create a article</h2>
    <div class="ul2"></div>
    <div class="main-outer-select-container">
        <!-- // Select Club  -->
        <div class="select-box" id="first-select">
            <div onclick="OpenClubList()" class="selected-item selected-item-1">Select Club
                <i data-feather="chevron-down"></i>
            </div>
            <div id="options-list" class="options-list">
                <?php
                $SelectAllClubs = mysqli_query($connection, "SELECT * FROM `clubs` WHERE 1");
                while ($LoopedClub = mysqli_fetch_assoc($SelectAllClubs)) {
                ?>
                    <div onclick="ChangeClubId(<?php echo $LoopedClub['id']; ?>, this.innerText)" class="option"><?php echo $LoopedClub['name']; ?></div>
                <?php
                }
                ?>
            </div>
        </div>
        <script defer>
            const ChangeClubId = (club_id, innerText) => {
                SetTopicsList(club_id);
                document.getElementById("options-list").style.display = "none";
                document.getElementById("club_id").value = club_id;
                document.querySelector(".selected-item-1").innerHTML = innerText + '<i data-feather="chevron-down"></i>';
            }
            const OpenClubList = () => {
                document.getElementById("options-list").style.display = "block";
            }
            const SetTopicsList = (club_id) => {
                let xhr = new XMLHttpRequest();
                xhr.open("POST", "../../components/controllers/SetTopicList.php", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            let data = xhr.responseText;
                            console.log(data);
                            eval(data);
                            // document.getElementById("options-list-2").innerHTML = data;
                        }
                    }
                };
                xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("club_id=" + club_id);
            }
            const SetAllTopics = (data) => {
                document.getElementById("options-list-2").innerHTML = data;
            }
            const SetFirstTopic = (name, id) => {
                document.querySelector(".selected-item-2").innerHTML = name;
                document.getElementById("topic_id").value = id;
            }
        </script>
        <!-- // Select Topic  -->
        <!-- // Select Club  -->
        <div class="select-box" id="first-select">
            <div onclick="OpenTopicList()" class="selected-item selected-item-2">Select Topic
                <i data-feather="chevron-down"></i>
            </div>
            <div id="options-list-2" class="options-list">
                <!-- <div onclick="ChangeTopicId(1, this.innerText)" class="option">Technology</div> -->
            </div>
        </div>
        <script defer>
            const ChangeTopicId = (club_id, innerText) => {
                document.getElementById("options-list-2").style.display = "none";
                document.getElementById("topic_id").value = club_id;
                document.querySelector(".selected-item-2").innerHTML = innerText + '<i data-feather="chevron-down"></i>';
            }
            const OpenTopicList = () => {
                document.getElementById("options-list-2").style.display = "block";
            }
        </script>
    </div>

    <input type="text" hidden id="club_id" name="club_id" placeholder="Club ID" required>

    <input type="text" hidden id="topic_id" name="topic_id" placeholder="Topic ID" required>

    <div class="single-input-title-container">
        <input type="text" name="title" placeholder="Title" required>
    </div>
    <div class="flexed-form-input-container">
        <textarea name="overview" placeholder="Overview" required></textarea>
        <textarea name="body" placeholder="Body of the article" required></textarea>
    </div>
    <div class="flexed-form-input-container">
        <textarea name="extra" placeholder="Extra"></textarea>
        <textarea name="conclusion" placeholder="Conclusion" required></textarea>
    </div>
    <button name="submit" type="submit" class="create-btn-article">Create</button>
</form>
<a class="suggest-link" href="http://localhost/opiverse/suggest/">Suggested A Club Or Topic</a>