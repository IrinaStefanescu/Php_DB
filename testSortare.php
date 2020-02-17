<?php
$query = "select * from doctori";
if(isset($_GET["sort"])){
    if($_GET["sort"] == 1)
    $query = "select doctori.id_doctor,doctori.nume_doctor,doctori.prenume_doctor,doctori.telefon_doctor,departament.nume_departament from doctori join departament using(id_departament) order by doctori.nume_doctor asc";
    elseif ($_GET["sort"] == 2) {
        $query = "select doctori.id_doctor,doctori.nume_doctor,doctori.prenume_doctor,doctori.telefon_doctor,departament.nume_departament from doctori join departament using(id_departament) order by departament.nume_departament asc";

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
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
</head>

<body>
    <div class="fixed-nav">
        <h4
            style="font-family:monospace; color:white; float:left;width: 100%; margin-top: 15px;text-align:center;font-size:16px;">
            Pai project</h4>
    </div>

    <div class="stage" style="overflow-y:auto;">
        <div class="content">
            <div class="select-wrapper">
                <select class="sort">
                   
                         <option  value="0">Fara sortare</option>
                         <option <?php if($_GET["sort"] == 1) echo 'selected="selected"'; ?> value="1">Sortare dupa nume A-Z</option>
                         <option <?php if($_GET["sort"] == 2) echo 'selected="selected"'; ?> value="2">Sortare dupa nume Departament A-Z</option>
                </select>
            <table style="margin-top:20px;">

                    <tr>
                        <th >
                            Id
                        </th>
                        <th>
                            Nume
                        </th>
                        <th>
                            Prenume
                        </th>
                        <th>
                            Telefon
                        </th>
                        <th>
                            Departament
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
                    
                        <?php foreach($linie as $celula){ ?>

                        <td>
                            <?php echo $celula; ?>
                        </td>
                        <?php } ?>
                       
                        
                        <td>
                            <a href="/BDIrina/editDoctor.php?id=23">Editeaza</a>
                        </td>

                        <td>
                            <a href="/BDIrina/deleteDoctor.php?id=23">Sterge</a>
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
            width:calc(100% / 8);
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
<script>
$('.sort').on('change',function(ev){
    window.location.href="doctori.php?sort="+this.value;
})
   
      /*  $('table thead th, table tbody td').each(function(index,element){
       
            $(element).css('width',''+ (100/$('table thead th').length - 1)+"%");
            
        }) */

    
</script>

</html>