$(function(){

  let gnb=$('.gnb');
  // 메인메뉴에 마우스 오버시
  gnb.mouseenter(function(){
    $('#h_bottom').stop().animate({'height':'320px'},500,'easeInExpo');
    $('.sub').fadeIn(3000);
  });

  // 메인메뉴에 마우스 때면
  gnb.mouseleave(function(){
    $('#h_bottom').stop().animate({'height':'46px'},500);
    $('.sub').fadeOut();
  });

  //메인 좌, 우 슬라이드
  let l_btn=$('.slide i.fa-angle-left')
  let r_btn=$('.slide i.fa-angle-right')

  //1. 5번 이미지를 1번 앞쪽으로 자리를 재배치한다.
  $('.slide li:last-child').insertBefore('.slide li:first-child');
  $('.slide ul').css('margin-left','-1600px');

  //2. 움직이는 함수
  function moveLeft(){
    // console.log('왼쪽 이동');
    //왼쪽으로 3200만큼 이동하고
    $('.slide ul').animate({'margin-left':'-3200px'},500,function(){
      //왼쪽 첫번째 li태그를 마지막 li태그의 뒤쪽에다가 자리를 옮긴다.
      $('.slide li:first-child').insertAfter('.slide li:last-child');
      $('.slide ul').css('margin-left','-1600px');
    });    
  }

  function moveRight(){
    $('.slide ul').animate({'margin-left':'0px'},500,function(){
      //오른쪽 마지막 li태그를 왼쪽 첫번째 li태그의 앞에 자리를 옮긴다.
      $('.slide li:last-child').insertBefore('.slide li:first-child');
      $('.slide ul').css('margin-left','-1600px');
    });
  }
  //3. 시간객체로 3초마다 함수 호출하기
  let Timer=setInterval(moveLeft,2000);
  // let Timer=setInterval(moveRight,2000);

  //4. 좌, 우버튼 클릭시 각가 해당하는 함수 호출하여 움직이게 하기
  l_btn.click(function(){
    moveRight();
  });
  
  r_btn.click(function(){
    moveLeft();
  });
  //좌, 우버튼에 마우스 오버시 시간을 제거해서 슬라이드 멈추게하고
  $('.slide i.fas').hover(function(){
    clearInterval(Timer);
  },function(){//다시 마우스 빼면 시간을 넣어서 움직이게 한다.
    Timer=setInterval(moveLeft,3000);
  });

});