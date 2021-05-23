<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/main.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet"/>
    <title>تصميم بطاقات تهنئة - مدارس جيل الريادة الاهلية</title>
    <meta name="robots" content="all">
    <meta name="author" content="تصميم بطاقة تهنئة - مدارس جيل الريادة الاهلية">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="application-name" content="">
    <meta name="rating" content="General">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="">
    <meta name="msapplication-tooltip" content="">
    <meta name="msapplication-starturl" content="/">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta name="full-screen" content="yes">
    <meta name="title" content="تصميم بطاقة تهنئة - مدارس جيل الريادة الاهلية">
    <meta name="twitter:title" content="تصميم بطاقة تهنئة - مدارس جيل الريادة الاهلية">
    <meta property="og:title" content="تصميم بطاقة تهنئة - مدارس جيل الريادة الاهلية">
    <meta name="keywords" content="alriyada,jeel,congrats">
    <meta property="og:site_name" content="مدارس جيل الريادة الاهلية">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="og:type" content="digital">
    <meta name="twitter:data1" content="Jeel Alriyada">
    <meta name="twitter:label1" content="Jeel">
    <meta property="og:url" content="https://congrat.jeelalriyada.org">

    <style>

      select {
        width: 100%;
        padding: 10px;
      }
      button {
        padding: 5px;
        width: 95px;
        font-weight: bold;
        font-family: 'Cairo';
        background: black;
        color: white;
        border: none;
        outline: none;
        border-radius: 5px;
      }

    </style>
  </head>
  <body>
  <?php include('connection.php') ?>
  
  <div class="logo" style="margin-bottom: 50px;"><a href="https://jeelalriyada.org"><img src="./logo.png" alt=""></a></div>

      <!--<img src="logo.png" alt="مدارس جيل الريادة الاهلية" style="width:100px;height:100px;">-->
      <div class="header-controls">صمم بطاقة التهنئة الخاصة بك</div>

      <div class="app">
      <div class="controls">
      
        <div style="text-align: center;margin-top:3%">
        <form method="POST" action="" style="margin-top: 41px;text-align:right" enctype="multipart/form-data">
          <label style="color: black;margin-bottom: 1%;display: block;">اختر البطاقة المناسبة</label>
          <select name="card-name" style="border-radius: 5px;border:none;outline:none">
            <option value="">اختر البطاقة المناسبة</option>
            <?php
            $sql = "SELECT * FROM template WHERE display=1";
            $query = mysqli_query($connect, $sql);
            while($row = mysqli_fetch_array($query)) {
              $name = $row['name'];
              echo "<option>$name</option>";
            }
            ?>
          </select>
          <label style="color: black;margin-bottom: 1%;margin-top:1%;display: block;">ضع اسمك</label>
          <input class="type" type="text">
          <div style="margin-top: 2%;margin-bottom:2%;text-align:center">
          <button type="submit" name="preview">معاينة</button>
          </form>
          <button class="down">تحميل</button>
          </div>
      </div>
      <div class="preview">
      <?php
        if(isset($_POST['preview'])) {
          $name = $_POST['card-name'];
          if($name !== "") {
            $sql = "SELECT * FROM template WHERE name='$name'";
            $query = mysqli_query($connect, $sql);
            while($row_image = mysqli_fetch_array($query)) {
              $blob = $row_image['image'];
              $style = $row_image['style'];
                        
              echo '
              <div class="container">
                <img src= '.$blob.'>
                <div class="text"></div>
              </div>  
              ';
            }  
          } else {
            echo "<span style='color:red'>الرجاء اختيار القالب أولاً</span>";
          }
        }
        ?>
    </div>

    </div>



    </div>

    <footer>

    <!--<span style="color: #717171;">تم التصميم والبرمجة بواسطة <a href="https://itgo-solutions.com" style="color:#717171">شركة أي تي جو</a></span>-->

    </footer>

    <script src="./js/h2c.js"></script>
    <script src="./js/index.js"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-196937330-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-196937330-1');
    </script>

    <script>
      const styles = {
        imgWidth: 220,
        imgHeight: 320,
        styles: <?php echo  '"'. $style . '"'   ?>,
      };
      init(styles);
    </script>
    <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>
  </body>
</html>
