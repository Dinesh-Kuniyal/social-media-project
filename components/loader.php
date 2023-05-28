<style>
    .main-loader-container {
        width: 100%;
        height: 100vh;
        position: fixed;
        top: 0px;
        left: 0px;
        display: flex;
        align-items: center;
        overflow: hidden;
        z-index: 999999999999;
        justify-content: center;
        background-color: rgb(232, 240, 254); 
    }
    .main-loader-container img{
        width: 250px;
    }
</style>
<div class="main-loader-container">
    <img src="http://localhost/opiverse/logo.png" alt="LOGO" class="logo-image-loader">
</div>
<script defer>
    const body = document.body;
    const loader = document.querySelector(".main-loader-container");
    body.onload = () => {
        loader.style.display = "none";
    }
</script>