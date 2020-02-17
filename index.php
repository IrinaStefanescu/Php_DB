
<?php

$connection = new PDO("mysql:host=localhost".";dbname=spital","root", "");
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt =  $connection->prepare("select spital.nume_spital, spital.contact, locatie.adresa from locatie join spital using(id_spital)"); 
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_NUM);
$results = $stmt->fetchAll();
$results = $results[0];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BDSpital</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>
<body>
    <div class="fixed-nav">
        <h5 style="float:left;color:white;font-familiy:monospace;margin-left:10px;margin-bottom:0;"> <?php echo $results[0]." <br> ".$results[2];?>  </h5>
        <h5  style="float:right;color:white;font-familiy:monospace; margin-right:10px;">Contact: <?php echo $results[1]?>  </h5>
        <h4 style="font-family:monospace; color:white;width: max-content;margin:0 auto; margin-top: 20px;margin-bottom:20px;text-align:center;font-size:16px;">BD project - SPITAL</h4>
    </div>

    <div class="stage" style="overflow-y:auto;">
        <div class="content">
        <section class="vizualizare"> 
          <h3> Vizualizare  </h3>
          <ul class="grid"> <li>
                  <a  class="blocks" href="/BDIrina/doctori.php">Doctori</a>
                </li>
                <li>
                  <a  class="blocks"  href="/BDIrina/pacient.php">Pacient</a>
                </li>
                <li>
                  <a  class="blocks"  href="/BDIrina/Tratament.php">Tratament</a>
                </li>
                <li>
                  <a  class="blocks"  href="/BDIrina/Operatii.php">Operatii</a>
                </li>
                <li>
                  <a  class="blocks"  href="/BDIrina/Programari.php">Programari</a>
                </li>
                <li>
                  <a  class="blocks"  href="/BDIrina/Interventii.php">Interventii</a>
                </li>
                <li>
                  <a  class="blocks"  href="/BDIrina/Spitalizare.php">Spitalizare</a>
                </li>
                <li>
                  <a  class="blocks"  href="/BDIrina/Saloane.php">Saloane</a>
                </li>
                <li>
                  <a  class="blocks"  href="/BDIrina/Departament.php">Departament</a>
                </li>
            </ul>
        </section>
        <section class="adaugare"> 
        
    </div>
    <style>

        .content{
            padding:20px;
            padding-bottom:0;
        }
        section{
            display:inline-block;
            width:100%;
        }
        ul{
            list-style:none;
        }
        ul>li{
            margin-top:10px;
            height:auto;
        }
        ul>li>a{
            background: white;
            text-decoration: none;
            color: black;
        
            font-family: monospace;
            font-weight: 300; 
            border-radius: 7px;
            transition: .25s linear;
            display: block;
            padding: 10px 0;
            text-align: center;
            max-width: 100px;
            cursor:pointer;

        }
        ul>li>a:hover{
            transform:scale(1.2);
        }

        .blocks{
              background:white;
              color:black;
              margin: 0 auto!important;
          }
      .grid {
          width:100%;
          margin:0 auto;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: .5rem;
            padding: .5rem;
            grid-auto-rows: minmax(100px, auto);
}

 .blocks{
     font-family: monospace;
     font-size:19px;
     text-decoration: none;;
     user-select: none;
     cursor: pointer;
    margin:10px;
    transition:.2s ease-in-out;
    color:black;
    text-align: center;
    padding:50px;
    
}
 .blocks:hover{
         transform:scale(1.1);
    }

    </style>
    <div  class="modal-background" style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
        <div class="modal" style="display:block;position:relative;margin:0 auto;top:20%;width:500px;height:350px;background:white;">
               
        </div>
    </div>
</body>
<script>

</script>
</html>