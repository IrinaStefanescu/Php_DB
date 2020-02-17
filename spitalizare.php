<?php
$connection = new PDO("mysql:host=localhost".";dbname=spital","root", "");
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt =  $connection->prepare("select spital.nume_spital, spital.contact, locatie.adresa from locatie join spital using(id_spital)"); 
$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_NUM);
$spital = $stmt->fetchAll();
$spital = $spital[0];


$query = "select id_salon, id_pacient, concat(nume_pacient,' ',prenume_pacient),internare,externare from spitalizare join pacient using(id_pacient)";
if(isset($_GET["sort"])){
    if($_GET["sort"] == 1)
    $query = "select id_salon, id_pacient, concat(nume_pacient,' ',prenume_pacient),internare,externare from spitalizare join pacient using(id_pacient) order by nume_pacient asc";
    elseif ($_GET["sort"] == 2) {
        $query = "select id_salon, id_pacient, concat(nume_pacient,' ',prenume_pacient),internare,externare from spitalizare join pacient using(id_pacient) order by externare asc";
    }    

}
 
 $connection = new PDO("mysql:host=localhost".";dbname=spital","root", "");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt =  $connection->prepare($query); 
        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_NUM);
        $results = $stmt->fetchAll();


        
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
    <h5 style="float:left;color:white;font-familiy:monospace;margin-left:10px;margin-bottom:0;"> <?php echo $spital[0]." <br> ".$spital[2];?>  </h5>
        <h5  style="float:right;color:white;font-familiy:monospace; margin-right:10px;">Contact: <?php echo $spital[1]?>  </h5>
        <h4 style="font-family:monospace; color:white;width: max-content;margin:0 auto; margin-top: 20px;margin-bottom:20px;text-align:center;font-size:16px;">BD project - SPITAL</h4>
    
    </div>

    <div class="stage" style="overflow-y:auto;">
    <div class="content">
    <h2 style="text-align:center;width:100%;"> SPITALIZARE </h2>

            <div class="select-wrapper">
                <select>
                   
                         <option value="0">Fara sortare</option>
                         <option <?php if(isset($_GET["sort"]) && $_GET["sort"] == 1) echo 'selected="selected"'; ?> value="1">Sortare dupa Nume Pacient</option>
                         <option  <?php if(isset($_GET["sort"]) && $_GET["sort"] == 2) echo 'selected="selected"'; ?> value="2">Sortare dupa Data Externare</option>
                </select>
            <table>

                    <tr>
                        <th >
                            Id_salon
                        </th>
                        <th>
                            Nume pacient
                        </th>
                        <th>
                            Internare
                        </th>
                        <th>
                            Externare
                        </th>
                        <th>
                            Editare
                        </th>  
                        <th> 
                            Stergere
                        </th>     
                    </tr>
    
             <?php foreach($results as $linie){ ?>
                    <tr>
                    
                        <?php $i=0; foreach($linie as $celula){  if($i !=1){?>
                            
                        <td>
                            <?php echo $celula; ?>
                        </td>
                        <?php }  $i++; } ?>
                       
                        
                        <td>
                        <a href="/BDIrina/editSpitalizare.php?id=<?php echo $linie[0];?>&id2=<?php echo $linie[1];?>">Editeaza</a>
                        </td>

                        <td>
                        <a href="/BDIrina/stergereDFK.php?tabel=spitalizare&id_salon=<?php echo $linie[0];?>&id_pacient=<?php echo $linie[1];?>">Sterge</a>
                        </td>
                    </tr>
            <?php } ?>    
           
            </table>
        </div>
    </div>
    <style>
        .content {
            padding: 20px;
            padding-bottom: 0;
        }

        section {
            display: inline-block;
            width: 49%;
        }

        ul {
            list-style: none;
        }

        ul>li {
            margin-top: 10px;
            height: auto;
        }

        ul>li>a {
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
            cursor: pointer;
        }

        ul>li>a:hover {
            transform: scale(1.2);
        }

        table td,table th{
            padding:10px;
            text-align: center;
        }

        table td,table th{
            width:calc(100% / 7);
            font-family:monospace;
        }
    </style>
    <div class="modal-background"
        style="display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5));">
        <div class="modal"
            style="display:block;position:relative;margin:0 auto;top:20%;width:500px;height:350px;background:white;">

        </div>
    </div>
</body>
<a href="index.php" style="position:fixed;bottom:10px;left:10px;padding:10px 30px; background:white;font-family:monospace;text-decoration:none;border:1px solid black "> Home </a>

<script>
   $('select').on('change',function(ev){
    window.location.href="spitalizare.php?sort="+this.value;
})
      /*  $('table thead th, table tbody td').each(function(index,element){
       
            $(element).css('width',''+ (100/$('table thead th').length - 1)+"%");
            
        }) */

    
</script>

</html>