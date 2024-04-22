
<!-- La modale -->
<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1 class="titre">Votre Profil</h1>
        <div class="image">
            <?php 
                $URLphotoDeProfil = "https://i.pinimg.com/236x/93/d4/2e/93d42e90b085e14f98bbca41c6ba43b4.jpg";
                echo "<img class='pdp' src='$URLphotoDeProfil' alt='Photo de profil'>";
            ?>
        </div>
    </div>
</div>


<style>
    /* modal */
    .modal {
            display: none;
            position: fixed;
            z-index: 9999;
            top: 0;
            left: 0;
            width: 35%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.7); /* Fond gris transparent */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #40852F;
            padding:20px;
            border: 1px solid #888;
            width: 33%; /* Un tiers de la largeur de l'écran */
            height: 97vh;
            max-width: 700px;
            margin: 10px auto;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    .titre{
        display:flex;
        justify-content:center;
    }
    .image {
    display: flex;
    justify-content: center;
    }
    .pdp {
        width: 25%;
        border-radius: 50%;
        opacity: 1;
        height: auto;
        align-self: center; /* Pour centrer l'image horizontalement */
    }
</style>