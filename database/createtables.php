<?php


$path=$_SERVER['DOCUMENT_ROOT'];
require_once $path."/attendanceapp/database/database.php";
function clearTable($dbo,$tabName)
{
    $c="delete from :tabname";
    $s=$dbo->conn->prepare($c);
    try{
        $s->execute([":tabname"=>$tabName]);
    }catch(PDOException $oo) {

    }
}
$dbo=new Database();
$c="create table student_details
(
    id int auto_increment primary key,
    roll_no varchar(20) unique,
    name varchar(50)
)";
$s=$dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>student details created");
} catch (PDOException $o) {
    echo ("<br>student details not created");
}

$c="create table course_details
(
    id int auto_increment primary key,
    code varchar(20) unique,
    title varchar(50),
    credit int
)";
$s=$dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>course details created");
} catch (PDOException $o) {
    echo ("<br>course details not created");
}

$c="create table faculty_details
(
    id int auto_increment primary key,
    user_name varchar(20) unique,
    name varchar(100),
    password varchar(50)
)";
$s=$dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>faculty details created");
} catch (PDOException $o) {
    echo ("<br>faculty details not created");
}

$c="create table session_details
(
    id int auto_increment primary key,
    year int,
    term varchar(50),
    unique (year,term)
)";
$s=$dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>session details created");
} catch (PDOException $o) {
    echo ("<br>session details not created");
}

$c="create table course_registration
(
    student_id int,
    course_id int,
    session_id int,
    primary key (student_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>course registration details created");
} catch (PDOException $o) {
    echo ("<br>course registration details not created");
}

$c="create table course_allotment
(
    faculty_id int,
    course_id int,
    session_id int,
    primary key (faculty_id,course_id,session_id)
)";
$s=$dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>course allotment details created");
} catch (PDOException $o) {
    echo ("<br>course allotment details not created");
}

$c="create table attendance_details
(
    student_id int,
    course_id int,
    session_id int,
    faculty_id int,
    on_date date,
    status varchar(10),
    primary key (student_id,course_id,session_id,faculty_id,on_date)
)";
$s=$dbo->conn->prepare($c);
try {
    $s->execute();
    echo ("<br>attendance details created");
} catch (PDOException $o) {
    echo ("<br>attendance details not created");
}

$c="insert into student_details
(id,roll_no,name)
values
   (1,'123241204201','ANIRBAN BHATTACHARYYA'),
   (2,'123241204206','SUBHAJIT SARKAR'),
   (3,'123231204018','ARITRA ROY CHOWDHURY'),
   (4,'123231204006','AHELI DEY'),
   (5,'123231204007','AMRITA BISWAS')";

   $s=$dbo->conn->prepare($c);
   try {
    $s->execute();
   } catch (PDOException $o) {
    echo ("<br>duplicate entry");
   }

    $c="insert into faculty_details
    (id,user_name,password,name)
    values
        (1,'RB','123','RUPASHRI BARIK'),
        (2,'JP','123','JUI PATTNAYAK'),
        (3,'AB','123','ANNWESHA BANERJEE'),
        (4,'SDG','123','SUPARNA DAS GUPTA'),
        (5,'SN','123','SOUMENDU NATH'),
        (6,'AD','123','ASISH DUTTA')";
    
        $s=$dbo->conn->prepare($c);
        try {
        $s->execute();
        } catch (PDOException $o) {
        echo ("<br>duplicate entry");
        }

    $c="insert into session_details
    (id,year,term)
    values
       (1,'2025','ODD SEMESTER'),
       (2,'2025','EVEN SEMESTER')";
    
       $s=$dbo->conn->prepare($c);
       try {
        $s->execute();
       } catch (PDOException $o) {
        echo ("<br>duplicate entry");
       }

       $c="insert into course_details
       (id,title,code,credit)
       values
          (1,'OBJECT ORIENTED PROGRAMMING USING JAVA','IT401','3'),
          (2,'SOFTWARE ENGINEERING','IT402','3'),
          (3,'OPERATING SYSTEM','IT403','3'),
          (4,'DISCRETE MATHEMATICS','M(IT)401','2'),
          (5,'ECONOMICS FOR ENGINEER','HU401','2')";
                 
          $s=$dbo->conn->prepare($c);
          try {
           $s->execute();
          } catch (PDOException $o) {
           echo ("<br>duplicate entry");
          }
    //if any record already there in the table delete them
    clearTable($dbo,"course_registration");
    $c= "insert into course_registration
    (student_id,course_id,session_id)
    values
    (:sid,:cid,:sessid)";
    $s=$dbo->conn->prepare($c);
    //iterate over all the 5 students
    //for each of them choose max 3 random courses, from 1 to 5

    for($i=1;$i<=5;$i++)
    {
        for($j=0;$j<3;$j++)
        {
            $cid=rand(1,5);
            //insert the selected course into course_registration table for
            //session 1 and student_id $i
            try {
                $s->execute([":sid"=>$i,":cid"=>$cid,":sessid"=>1]);
            } catch (PDOException $pe) {
            }

            //repeat for session 2
            $cid=rand(1,5);
            //insert the selected course into course_registration table for
            //session 2 and student_id $i
            try {
                $s->execute([":sid"=>$i,":cid"=>$cid,":sessid"=>2]);
            } catch (PDOException $pe) {
            }
        }
    }


    //if any record already there in the table delete them
    clearTable($dbo,"course_allotment");
    $c= "insert into course_allotment
    (faculty_id,course_id,session_id)
    values
    (:fid,:cid,:sessid)";
    $s=$dbo->conn->prepare($c);
    //iterate over all 6 students
    //for each of them choose max 2 random courses, from 1 to 5

    for($i=1;$i<=6;$i++)
    {
        for($j=0;$j<2;$j++)
        {
            $cid=rand(1,5);
            //insert the selected course into course_allotment table for
            //session 1 and faculty_id $i
            try {
                $s->execute([":fid"=>$i,":cid"=>$cid,":sessid"=>1]);
            } catch (PDOException $pe) {
            }

            //repeat for session 2
            $cid=rand(1,5);
            //insert the selected course into course_registration table for
            //session 2 and student_id $i
            try {
                $s->execute([":fid"=>$i,":cid"=>$cid,":sessid"=>2]);
            } catch (PDOException $pe) {
            }

        }
    }

?>