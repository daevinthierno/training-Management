<?php
define('BASE_URL', dirname($_SERVER['SCRIPT_NAME'], 2));
define('PATH_URL', $_SERVER['SCRIPT_NAME']);

/**
 * @param int $length
 * @return string
 */
function str_random(int $length): string
{
    $alphabet = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
}

/**
 * @param string $url
 * @return string
 */
function assets(string $url): string
{
    trim($url, '/');
    return BASE_URL . '/assets/' . $url;
}

function session(): void
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}

function user_logged(): void
{
    session();
    if (!isset($_SESSION['user'])) {
        $_SESSION["flash"]["danger"] = "Access denied !!";
        header('Location: ../common/login.php');
        exit();
    }
}

//function cookie(): void
//{
//    $user = str_random(60);
//    setcookie('user', $user);
//}

/**
 * @return mixed
 */
function getPath()
{
    $url = trim(PATH_URL, '/');
    $path = explode('/', $url);

    return $path['2'];
}

function changeFormat($dbDate) {
  $date = DateTime::createFromFormat('Y-m-d', $dbDate);
  $date = $date->format('d/m/Y');

  return $date;
}

function displayTables($conn){
   

    //Do real escaping here

    $sql = "SELECT DISTINCT e.matricule,e.empname, d.depname, en.enterprisename,s.sitename,t.theme,t.trainingType, t.trainer1, t.trainer2, t.trainer3,t.date_and_time as dates FROM attendance AS a, employee AS e, department AS d, training AS t,enterprise as en, site as s  WHERE   t.trainingID = a.trainingID   AND a.status = 'present' AND e.empID = a.empID AND e.depID = d.depID and s.siteID = t.siteID and e.enterpriseID = en.enterpriseID  ";
    if (isset($_POST['validate'])) {
       # code...
                $trainingType = $_POST['trainingType'];
                $topic = $_POST['topic'];
                $department = $_POST['department'];
                $enterprise = $_POST['enterprise'];
                $location  = $_POST['site'];
                $trainer = $_POST['trainer'];
                $date1 = $_POST['date1'];
                $date2  = $_POST['date2'];
              

                //Do real escaping here
                 $conditions = [];

                if(!empty($trainingType)) {
                  $conditions[] = "t.trainingType = '$trainingType'";
                }
                if(!empty($department)) {
                  $conditions[] = "d.depname = '$department'";
                }
                if(!empty($enterprise)) {
                  $conditions[] = "en.enterprisename = '$enterprise'";
                }
                if(!empty($topic)) {
                  $conditions[] = "t.theme LIKE '%$topic%'";
                }
                if(!empty($trainer)) {
                  $conditions[] = " t.trainer1 LIKE '%$trainer%'";
                }
                if(!empty($date1) ){
                  $date = DateTime::createFromFormat('m/d/Y', $date1);
                  $date = $date->format('Y-m-d');
                  $conditions[] = "t.date_and_time >= '$date'";                    
                }
                if(!empty($date2)){
                    $date = DateTime::createFromFormat('m/d/Y', $date2);
                    $date = $date->format('Y-m-d');
                    $conditions[] = "t.date_and_time <= '$date'";
                }
               
                
              if (count($conditions) > 0) {
                  $sql .= " AND ".implode(' AND ', $conditions). "ORDER BY  t.date_and_time DESC";
                }
      
    }else{
         $sql .= " ORDER BY  t.date_and_time DESC LIMIT 100";
        }
    $result = mysqli_query($conn,$sql);
    //die($sql);
    $i = 1;
          if ($result) {
             # code...
              while ($res = mysqli_fetch_array($result)) {
                          # code...
                      echo "<tr><td>".$i++."</td><td>".$res['empname']."</td>";
                      echo "<td>".$res['depname']."</td><td>".$res['enterprisename']."</td>";
                      echo "<td>".$res['sitename']."</td><td>".$res['theme']."</td>";
                      echo "<td>".$res['trainer2'].", ".$res['trainer1']." and ".$res['trainer3']."</td><td>".$res['trainingType']."</td>";
                      echo "<td>".changeFormat($res['dates'])."</td></tr>";
                        } 
           }else{
            var_dump($sql);
           }                      
}


  

function loadDep($conn){
  $sql = "SELECT * from department";
  $result = mysqli_query($conn,$sql);
  if ($result) {
    # code...
    while ($row = mysqli_fetch_array($result)) {
          # code...
          echo '<option value = "'.$row['depname'].'">'.$row['depname'].'</option>';
        }
  }
}
function loadEnt($conn){
  $sql = "SELECT * from enterprise";
  $result = mysqli_query($conn,$sql);
  if ($result) {
    # code...
    while ($row = mysqli_fetch_array($result)) {
          # code...
          echo '<option value = "'.$row['enterprisename'].'">'.$row['enterprisename'].'</option>';
        }
  }
}
function loadSite($conn){
  $sql = "SELECT * from site";
  $result = mysqli_query($conn,$sql);
  if ($result) {
    # code...
    while ($row = mysqli_fetch_array($result)) {
          # code...
          echo '<option value = "'.$row['sitename'].'">'.$row['sitename'].'</option>';
        }
  }
}