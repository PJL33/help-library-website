<?php
$current_month = getdate()["month"]."-".getdate()["year"];
$DB_DSN = 'mysql:host=localhost;dbname=interns';
$DB_USER = "root";
$DB_PASS = "";
$PDO = new PDO($DB_DSN,$DB_USER,$DB_PASS);
$r = $PDO->query("SELECT COUNT(*) AS visits_number FROM visits WHERE DATE_FORMAT(date,'%M-%Y') = '$current_month'");
$visits_number = $r->fetchAll()[0][0];

$r2 = $PDO->query("SELECT COUNT(gender) AS female FROM `visits` WHERE gender = 'Female' AND DATE_FORMAT(date,'%M-%Y') = '$current_month'");
$female_number = $r2->fetchAll()[0][0];

$r3 = $PDO->query("SELECT COUNT(gender) AS female FROM `visits` WHERE gender = 'Male' AND DATE_FORMAT(date,'%M-%Y') = '$current_month'");
$male_number = $r3->fetchAll()[0][0];

$r4 = $PDO->query("SELECT COUNT(`date`) as count_date, `date` FROM visits WHERE DATE_FORMAT(date,'%M-%Y') = '$current_month' GROUP BY `date` ORDER BY count_date DESC LIMIT 1");
$most_visited = $r4->fetchAll()[0]["date"];

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Rapport mensuel</title>
    <link rel="icon" href="library-logo.jpg">
    <link rel="stylesheet" href="home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <style>
        th,td,tr,table{
            border-collapse: collapse;
            border: 1.5px solid black;
            box-sizing: border-box;
            word-break: break-all; 
            text-align:center;
        }
        td,th{
            width:20%; 
        }

        #buttons,#buttons2{
            display:flex;
            flex-direction:row;
            justify-content:space-between;
        }
        
        .btn{
            background-color:#FF6501;
        }

        h4
        {
            text-align:center;
            margin-top:1%;
        }

        table{
            margin:auto;
        }

        #Print{
            text-align:center;
            margin-top:7px;
            margin-bottom:7px;
        }
    </style>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write("<style>th,td,tr,table{border-collapse: collapse;border: 1.5px solid black;box-sizing: border-box;word-break: break-all;text-align:center;}td,th{width:20%; }h4{text-align:center;margin-top:1%;}table{margin:auto;}</style>");
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
</head>
<body>

    <header>
        <nav class="navbar bg-dark navbar-expand-lg">
            <a class="navbar-brand" href="home.html"><img src="library-logo.jpg" width="40%" style="border-radius: 50%;"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-primary fw-bold me-3" href="home.html" style="background-color:#FF6501;border-radius:15px">Visits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary fw-bold me-3" href="reports.php" style="background-color:#FF6501;border-radius:15px">Reports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-primary fw-bold me-3" href="#" style="background-color:#FF6501;border-radius:15px">Material (supply)</a>
                </li>
                <li class="nav-item" >
                    <h1><span class="fw-bold fs-1" style="color:#FF6501;position:absolute;right:0px;top:1.7vh">HELP'S LIBRARY</span></h1>
                </li>
                </ul>
            </div>
            </nav>
        </header>

    <h1 class="text-center">Rapport Mensuel</h1>
    <div id="dvContainer">
        <table>
            <h4>Tâches réalisées</h4>
            <tr>
                <th>Activités/Tâches</th>
                <th>Personnes responsables</th>
                <th>Matériels utilisés</th>
                <th>Date/Période</th>
                <th>Commentaires</th>
            </tr>
            <tr id="first_tr">
                <td><div contenteditable="true"></div></td>
                <td><div contenteditable="true"></div></td>
                <td><div contenteditable="true"></div></td>
                <td><div contenteditable="true"></div></td>
                <td><div contenteditable="true"></div></td>
            </tr>   
        </table>
        <div id="buttons">
            <div id="button1"><button class="btn btn-primary" id="add1">Add a line</button></div>
            <div><button class="btn btn-primary" id="remove1">Remove line #</button><input type="number" maxlength="2" id="removeNumber"></div>
        </div>

        <table>
            <h4>Inventaire</h4>
            <tr>
                <th>Description/matériel</th>
                <th>Qte</th>
                <th>État</th>
                <th>Besoins</th>
                <th>Justification</th>
            </tr>
            <tr>
                <td><div contenteditable="true"></div></td>
                <td><div contenteditable="true"></div></td>
                <td><div contenteditable="true"></div></td>
                <td><div contenteditable="true"></div></td>
                <td><div contenteditable="true"></div></td>
            </tr>   
        </table>
        <div id="buttons2">
            <div id="button2"><button class="btn btn-primary" id="add2">Add a line</button></div>
            <div><button class="btn btn-primary" id="remove2">Remove line #</button><input type="number" maxlength="2" id="removeNumber2"></div>
        </div>
   
        <table>
            <h4>Visite</h4>
            <tr>
                <th>Nombre total de visite</th>
                <td><?php echo $visits_number;?></td>
            </tr> 
            <tr>
                <th>Fille</th>
                <td><?php echo $female_number;?></td>
            </tr>
            <tr>
                <th>Homme</th>
                <td><?php echo $male_number;?></td>
            </tr>
            <tr>
                <th>Jour avec le plus de vistes</th>
                <td><?php echo $most_visited;?></td>
            </tr> 
        </table>
    </div>
    <div id="Print">
        <input type="button" value="Print Div Contents" id="btnPrint" class="btn btn-primary"/>
    </div>


    <!-- js for adding  and remove line-->
    <script>
        //button for adding a line
        document.getElementById("add1").addEventListener("click",function(){
        const firstTable = document.getElementsByTagName("table")[0];
        let tr = document.createElement("tr");
        for(let i =0;i < 5; i++)
        {
            let td1 = document.createElement("td");
            let div1 = document.createElement("div");
            div1.setAttribute("contenteditable","true");
            td1.append(div1);
            tr.append(td1);
        }
        firstTable.append(tr);
        console.log(tr);
        });

        //button for removing a line
        document.getElementById("remove1").addEventListener("click",function(){
            const firstTable = document.getElementsByTagName("table")[0];
            lineNumber = document.getElementById("removeNumber").value;
            if(lineNumber == 1)
            {
            }
            else{
                firstTable.removeChild(firstTable.children[parseInt(lineNumber) - 1]);
            }
        });

         //button for adding a line #2
         document.getElementById("add2").addEventListener("click",function(){
        const firstTable = document.getElementsByTagName("table")[1];
        let tr2 = document.createElement("tr");
        for(let i =0;i < 5; i++)
        {
            let td2 = document.createElement("td");
            let div2 = document.createElement("div");
            div2.setAttribute("contenteditable","true");
            td2.append(div2);
            tr2.append(td2);
        }
        firstTable.append(tr2);
        console.log(tr2);
        });

        //button for removing a line #2
        document.getElementById("remove2").addEventListener("click",function(){
            const firstTable = document.getElementsByTagName("table")[1];
            lineNumber2 = document.getElementById("removeNumber2").value;
            if(lineNumber2 == 1)
            {
            }
            else{
                firstTable.removeChild(firstTable.children[parseInt(lineNumber2) - 1]);
            }
        });
    </script>

    <footer>
        <div id="div-footer" class="bg-dark text-center p-3 text-light fw-bold">
        HELP's library interns property - 2023
        </div>
    </footer>

</body>
</html>