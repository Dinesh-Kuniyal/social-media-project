<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Default Chat || Cultcheck</title>
  <?php include('../components/links.php'); ?>
  <style>
    *,
    *::before,
    *::after {
      padding: 0px;
      margin: 0px;
      box-sizing: border-box;
    }

    .main-app-container {
      width: 100%;
      height: 100vh;
      overflow: hidden;
      display: flex;
      gap: 2px;
      padding: 1rem;
      flex-flow: column;
      align-items: center;
      background-color: rgba(0, 0, 0, 0.2);
      justify-content: center;
    }

    .message-icon {
      width: 40px;
      height: 40px;
    }

    .tagline-chat-default {
      display: block;
      font-size: 18px;
      text-align: center;
      font-family: balsamiq-sans;
      color: rgba(0, 0, 0, 0.7);
    }

    .default-chat-footer {
      position: absolute;
      display: block;
      font-weight: 700;
      bottom: 1rem;
      right: 1rem;
      cursor: pointer;
      transition: all 250ms ease-in-out;
    }

    .default-chat-footer:hover {
      opacity: 0.7;
    }

    .select-heading {
      font-size: 20px;
    }
  </style>
</head>

<body>
  <?php include('../components/loader.php'); ?>
  <div class="main-app-container">
    <i data-feather="message-square" class="message-icon"></i>
    <h2 class="select-heading">Select any user to chat</h2>
    <span class="tagline-chat-default">We provide the end to end encryption because your security is our first
      priority.
    </span>
    <div class="default-chat-footer">OPIVERSE.COM</div>
  </div>
  <script defer>
    const Bottom_Link = document.querySelector(".default-chat-footer");
    Bottom_Link.onclick = () => {
      parent.location.href = "../";
    };
  </script>
</body>

</html>