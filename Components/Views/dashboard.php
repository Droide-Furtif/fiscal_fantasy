<html>
<section>
        <!-- Première ligne -->
        <div class="row">
            <div class="content">
                <h1>Content</h1>
            </div>
            <div class="action">
                <button>Voir</button>
            </div>
        </div>
        <!-- Deuxième ligne -->
        <div class="row">
            <div class="action">
                <button>Voir</button>
            </div>
            <div class="content">
                <h1>Content</h1>
            </div>
        </div>
        <!-- Troisième ligne -->
        <div class="row">
            <div class="content">
                <h1>Content</h1>
            </div>
            <div class="action">
                <button>Voir</button>
            </div>
        </div>
    </section>
</html>
<style>
        section{
            color:#759075;
        }
        button {
            decoration: none;
            border: none;
            background-color: #40852F;
            height: 50%;
            width:100%;
            cursor: pointer;
            border-radius: 20px; 
            font-size: 30px;
            color:#AFC0AB;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
            transition: all 0.7s ease; /* Transition pour l'effet de zoom */
        }
        button:hover{
            box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 60px -12px inset, rgba(0, 0, 0, 0.3) 0px 18px 10px -18px inset;
            color: white;
        }

        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px; 
        }

        .content {
            flex: 0 0 70%; 
            height: 200px;
            background-color: #D9E7D9;
            border-radius: 40px; 
            display: flex;
            justify-content: center;
            align-items: center; 
            transition: all 0.5s ease; /* Transition pour l'effet de zoom */
        }
        .content:hover{
            transform: scale(1.01); /* Zoom de 5% */
            box-shadow: 0 0 4px rgba(0,0,0,0.5); /* Léger box shadow */
        }

        .action {
            flex: 0 0 25%;
            display: flex;
            justify-content: center;
            align-items: center; 
        }
    </style>