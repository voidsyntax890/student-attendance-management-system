<?php
session_start();
    if(isset($_SESSION["current_user"]))
        {
          $facid=$_SESSION["current_user"];
        }
    else{
        header("location:"."/attendanceapp/login.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/attendance.css">
    <title>Document</title>
</head>
<body>
    <!--<h1>Hello</h1>     
    <button id="btnLogout">LOGOUT</button>-->
     <div class="page">
        <div class="header-area">
            <div class="logo-area"> <h2 class="logo">ATTENDANCE APP</h2></div>
            <div class="logout-area"><button class="btnlogout" id="btnLogout">LOGOUT</button></div>
        </div>
        <div class="session-area">
              <div class="label-area"><label>SESSION</label></div>
              <div class="dropdown-area">
                <select class="ddlclass" id="ddlclass">
                   <option>SELECT ONE</option>
                    <option>2025 ODD</option>
                    <option>2025 EVEN</option>
                </select>
              </div>
        </div>

        <div class="classlist-area" id="classlistarea">
          <div class="classcard">IT401</div>
          <div class="classcard">IT402</div>
          <div class="classcard">IT403</div>
          <div class="classcard">M(IT)401</div>
          <div class="classcard">HU401</div>
        </div>

        <div class="classdetails-area" id="classdetailsarea">
            <div class="classdetails">
                <div class="code-area">IT401</div>
                <div class="title-area">OBJECT ORIENTED PROGRAMMING USING JAVA</div>
                <div class="ondate-area">
                    <input type="date">
                </div>
            </div>
        </div>
        
        <div class="studentlist-area" id="studentlistarea">
            <div class="studenttlist"><label>STUDENT LIST</label></div>
            <div class="studentdetails">
                <div class="slno-area">001</div>
                <div class="rollno-area">123241204201</div>
                <div class="name-area">ANIRBAN BHATTACHARYYA</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>

            <div class="studentdetails">
                <div class="slno-area">002</div>
                <div class="rollno-area">123241204206</div>
                <div class="name-area">SUBHAJIT SARKAR</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>

            <div class="studentdetails">
                <div class="slno-area">003</div>
                <div class="rollno-area">123231204018</div>
                <div class="name-area">ARITRA ROY CHOWDHURY</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>

            <div class="studentdetails">
                <div class="slno-area">004</div>
                <div class="rollno-area">123231204006</div>
                <div class="name-area">AHELI DEY</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>

            <div class="studentdetails">
                <div class="slno-area">005</div>
                <div class="rollno-area">123231204007</div>
                <div class="name-area">AMRITA BISWAS</div>
                <div class="checkbox-area">
                    <input type="checkbox">
                </div>
            </div>

        
            
        </div>
     </div>
     <input type="hidden" id="hiddenFacId" value=<?php echo($facid) ?>>
     <input type="hidden" id="hiddenSelectedCourseID" value=-1>
    <script src="js/jquery.js"></script>
    <script src="js/attendance.js"></script>
    <script src="js/logout.js"></script> <!-- ✅ Added later -->
    <!--renamed the files just to keep the filenames
    similar, nothing more than that-->
</body>
</html>