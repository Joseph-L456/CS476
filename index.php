
<?php

// Database connection
require_once("database.php");

try {
      $conn = new PDO($attr, $db_username, $db_password, $options);
  } catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
  }

?>




<?php


// Sign up PHP

$regname = "";
$regpassword = "";
$regcheck = "";
$regprofilename = "";


if(isset($_POST["regsubmit"]) == TRUE){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $regname = trim($_POST["uname1"]);
        $regpassword = trim($_POST["pswd1"]);
        $regcheck = trim($_POST["pswdr1"]);
        $regprofilename = trim($_POST["pname1"]);
    
    
    $querycheck = "SELECT * FROM Usernames WHERE email = '$regname' ";

    $response = $conn->query($querycheck);
    }
  
        if($response->rowCount() > 0){
          echo "User exist.";
          header("Location: warning.php");
        }
        else{ 


        $queryinsert = "INSERT INTO Usernames(email, password, profileName) VALUES ('$regname', '$regpassword', '$regprofilename')";
        $insert = $conn->query($queryinsert);
        header("Location: index.php");
        }
    

     

}

?>


<?php


//log in PHP

if(isset($_POST["logsubmit"]) == TRUE){
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $logname = trim($_POST["uname"]);
    $logpassword = trim($_POST["pswd"]);
  }

    $queryselect = "SELECT * FROM Usernames WHERE (email = '$logname' AND password = '$logpassword')";
    $select = $conn->query($queryselect);

    if($select->rowCount() > 0)
    {
   
        // user exists;

        // fetch the first row
        $credential = $select->fetch();

        //Collect fields from response
        $userID = $credential["uid"];
        $userName = $credential["profileName"];

        session_start();

        $_SESSION["user_id"] =  $userID;
        $_SESSION["name_of_user"] = $userName; 
    
        header("Location: main.php"); 
    }
    else{
        print("Invalid credentials");
    }
  }

?>



<!DOCTYPE html>
<html lang="en">



<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- 引入css文件 -->
  <link rel="stylesheet" href="style.css">
  <!-- 引入jquery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--validate Login -->
  <script type="text/javascript" src="Login.js"> </script>

  <script type="text/javascript" src="Sign.js"> </script>


  <title>Sign-up + Login</title>
</head>

<body>
  <!-- 最外层的大盒子 -->
  <div class="box">
    <!-- 滑动盒子 -->
    <div class="pre-box">
      <h1>WELCOME</h1>
      <p>Digital Art Gallery</p>
      <div class="img-box">
        <img src="./img/waoku.jpg" alt="">
      </div>
    </div>


    <!---------------------------------------------------------->
    <!-- register box -->
    <div class="register-form">
      <!-- box title -->
      <div class="title-box">
        <h1>Sign-up</h1>
      </div>
      <!-- input box -->
      <form id="Sign" method="post">
        <!--class="info"-->
        <div class="input-box">

          <!--User name error and validate-->
          <label id="msg_uname1" class="err_msg1"></label>
          <!--error msg-->
          <input type="text" name="uname1" size="30" placeholder="username">

          
                <!-- 我这么加就变成这样了，很奇怪-->
          <!-- profolio name-->
          <label id="msg_pname1" class="err_msg1"></label>
          <!--error msg-->
          <input type="text" name="pname1" placeholder="profilename">    <!--User name error and validate-->

          
          <label id="msg_pswd1" class="err_msg1"></label>
          <!--error msg-->
          <input type="password" name="pswd1" placeholder="password">








          <label id="msg_pswdr1" class="err_msg1"></label>
          <!--error msg-->
          <input type="password" name="pswdr1" placeholder="confirm password">
        </div>
        <!-- 按钮盒子 -->
        <div class="btn-box">
          <!--<button>Sign-up</button>-->
          <input type="submit" name="regsubmit" value="SignUp" class="submit">
      </form>
      <span id="display_info"></span>

      <!-- 绑定点击事件 -->
      <p onclick="mySwitch()">click me to login!</p>
    </div>
  </div>

  <!--sign up end-->

  <!--login start-->


  <!------------------------------------------------------------------------------------------------------------------------------>
  <!--login start-->

  <!-- sign-up box -->
  <div class="login-form">
    <!-- box title -->
    <div class="title-box">
      <h1>Login</h1>
    </div>
    <!-- input box -->
    <form id="Login" method="post">
      <div class="input-box">

        <!--User name error and validate-->
        <label id="msg_uname" class="err_msg"></label>
        <!--error msg-->
        <input type="text" name="uname" placeholder="username">


        <!--pswd error and validate-->
        <label id="msg_pswd" class="err_msg"></label></p>
        <!--error msg-->
        <input type="password" placeholder="password" name="pswd">

        <p><span id="display_info"></p>


      </div>
      <!-- 按钮盒子 -->
      <div class="btn-box">
        <!--<button>Login</button>-->
        <input type="submit" name="logsubmit" value="Login" class="submit">
    </form> <!-- login end -->
    <!----------------------------------------------------------------------------------------------------->


    <p onclick="mySwitch()">No account? Go Sign-up</p>
  </div>
  </div>

  </div>

  <script>
    // 滑动的状态
    let flag = true
    const mySwitch = () => {
      if (flag) {
        // 获取到滑动盒子的dom元素并修改它移动的位置
        $(".pre-box").css("transform", "translateX(100%)")
        // 获取到滑动盒子的dom元素并修改它的背景颜色
        $(".pre-box").css("background-color", "#e7fbe4")
        //修改图片的路径
        $("img").attr("src", "./img/wuwu.jpeg")

      }
      else {
        $(".pre-box").css("transform", "translateX(0%)")
        $(".pre-box").css("background-color", "#d0ebf0")
        $("img").attr("src", "./img/waoku.jpg")
      }
      flag = !flag
    }
  </script>
  <script>
    const bubleCreate = () => {
      // 获取body元素
      const body = document.body
      // 创建泡泡元素
      const buble = document.createElement('span')
      // 设置泡泡半径
      let r = Math.random() * 5 + 25 //半径大小为25~30
      // 设置泡泡的宽高
      buble.style.width = r + 'px'
      buble.style.height = r + 'px'
      // 设置泡泡的随机起点
      buble.style.left = Math.random() * innerWidth + 'px'
      // 为body添加buble元素
      body.append(buble)
      // 4s清除一次泡泡
      setTimeout(() => {
        buble.remove()
      }, 4000)
    }
    // 每200ms生成一个泡泡
    setInterval(() => {
      bubleCreate()
    }, 200);
  </script>

  <script type="text/javascript" src="Login-r.js"></script>
  <script type="text/javascript" src="signup-r.js"></script>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function () {
      $("#Login").click(function () {
        if ($(uname).val() == " ") {
          $(".input-box").addClass("error");
        }
        if ($(pswd).val() == " ") {
          $(".input-box").addClass("error");
        }
      })
    })
  </script>

</body>

</html>