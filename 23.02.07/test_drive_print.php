<!doctype html>
<html lang="ko">
<head>
  <meta charset="usf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>라면정보 데이터베이스 자료 화면출력하기</title>
    <!-- 초기화 -->
    <link rel="stylesheet" href="./css/reset.css" type="text/css">
  <!-- 기본서식, 공통서식 -->
  <link rel="stylesheet" href="./css/base.css" type="text/css">
  <!-- 레이아웃서식 -->
  <link rel="stylesheet" href="./css/layout.css" type="text/css">
  <!-- 아이콘 폰트 주소 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <style>
    header{background: #000;}
    main{padding: 140px 0px 50px 0px;}
    .car_reverse{
      margin: 0px auto;
    }
  </style>
</head>
<body>
  <header>

    <h1>
      <a href="index.html" title="메인페이지로 바로가기">
        <img src="./images/logo-casper-white.028f418.png" alt="상단로고">
      </a>
    </h1>

    <!-- 상단 스크롤시 고정 내비게이션 -->
    <nav>
      <ul class="gnb">
        <li><a href="#" title="소개">소개</a></li>
        <li><a href="#" title="체험">체험</a></li>
        <li><a href="#" title="이벤트">이벤트</a></li>
        <li><a href="#" title="구매">구매</a></li>
        <li><a href="#" title="고객지원">고객지원</a></li>
      </ul>
    </nav>

    <i class="fas fa-user"></i><!--로그인아이콘-->
    <i class="fas fa-bell"></i><!--알림아이콘-->
  </header>

  <form action="test_drive_print.php" method="post" name="search">
<main>
    <?php
    //1. 변수선언(서버주소, 아이디, 패스워드, 데이터베이스명)
    $mysql_host = 'localhost';
    $mysql_user = 'root';
    $mysql_password = '';
    $mysql_db = 'goods';

    //2. 데이터베이스 계정연결
    $conn = mysqli_connect($mysql_host, $mysql_user, $mysql_password, $mysql_db);

    //3. 데이터베이스 연결 오류구문
    if(mysqli_connect_errno()){
      printf("%s \n", mysqli_connect_error());
      exit;
    }

    //4. 데이터 조회하기
    $query = 'select * from test_drive';
    // $query = 'select * from test_drive where name="$search_txt"';
    $result = mysqli_query($conn, $query);//조회결과값을 변수에 담는다.

    print "<table class='car_reverse'><caption>현대자동차 시승 예약 조회</caption><tr>". 
          "<th>code</th>".
          "<th>name</th>".
          "<th>num</th>".
          "<th>sms</th>".
          "<th>email</th>".
          "<th>region</th>".
          "<th>car</th>".
          "<th>own_car</th>".
          "<th>datetime</th>".
          "</tr>";

    while($row = mysqli_fetch_row($result)){
      print "<tr><td>".$row[0]."</td>".
      "<td>".$row[1]."</td>".
      "<td>".$row[2]."</td>".
      "<td>".$row[3]."</td>".
      "<td>".$row[4]."</td>".
      "<td>".$row[5]."</td>".
      "<td>".$row[6]."</td>".
      "<td>".$row[7]."</td>".
      "<td>".$row[8]."</td></tr>";
    }
    print "</table>";
    mysqli_free_result($result);
    mysqli_close($conn);
    ?>

    <a href="test_drive.html" title="데이터 입력하기">시승 신청하러 가기</a>

    <fieldset class="search_box">
      <legend>예약조회하기</legend>
      <input type="text" id="search_txt" name="search_txt">
      <input type="submit" value="예약조회하기">
    </fieldset>
</main>
  <footer>
    <div class="footer_wrap">
      <h2><img src="./images/logo-hyundai.a9ebdc6.png" alt=""></h2>
      <div class="footer_wrap2">
        <nav class="lnb">
          <ul>
            <li><a href="" title="이용약관">이용약관</a></li>
            <li><a href="" title="개인정보 처리방침">개인정보 처리방침</a></li>
            <li><a href="" title="저작권안내">저작권안내</a></li>
            <li><a href="" title="공동인증서 안내">공동인증서 안내</a></li>
            <li><a href="" title="현대자동차 홈페이지">현대자동차 홈페이지</a></li>
          </ul>
        </nav>
        <ul class="f_info">
          <li>사업자등록번호 : 101-81-09147</li>
          <li>통신판매업신고번호 : 2002-01546</li>
          <li>대표이사 : 장재훈 <a href="#" title="사업자정보확인">사업자정보확인 ></a></li>
          <li>캐스퍼 고객센터 : 080-500-6000</li>
          <li>주소 : 서울시 서초구 헌릉로 12</li>
          <li>호스팅서비스 제공 : 현대오토에버(주)</li>
          <li></li>
        </ul>
        <address>COPYRIGHT&#x24D2;HYUNDAI MOTORS COMPANY, ALLRIGHTRESERVED.</address>
      </div>
    </div>
  </footer>

</form>
</body>
</html>