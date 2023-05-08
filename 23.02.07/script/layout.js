$(function(){

  $(window).scroll(function(){
    let sPos = $(this).scrollTop();
    // console.log(sPos);

  //스크롤 기능을 사용하여 header, gnb에 서식을 적용하기
    if(sPos>=600){
      $('header').addClass('h_on');
      $('header i.fas').addClass('on');
      $('header .gnb a').addClass('on');
      $('header h1 img').attr('src','./images/logo-casper.e03ec84.png');
    }else{
      $('header').removeClass('h_on');
      $('header i.fas' ).removeClass('on');
      $('header .gnb a').removeClass('on');
      $('header h1 img').attr('src','./images/logo-casper-white.028f418.png');
    }

    //내비게이션 글자색 변경
    $('main section').each(function(i){
      let sc_w = $('main section').width()
      let top = $(this).offset().top-sc_w;
      if(spos >= top){ //만약에 spos의 값이 top보다 크면
        $('.gnb li a').removeClass('h_nav'); //기존 서식을 제거
        //해당메뉴에 서식적용한다.
        $('.gnb li').eq(i).find('a').addClass('h_nav'); 
      }
    });


  });

  //header에 마우스 오버시 로고, 내비게이션, i.fas에 서식 적용하고
  $('header').hover(function(){
    $('header').addClass('h_on');
    $('header i.fas').addClass('on');
    $('header .gnb a').addClass('on');
    $('header h1 img').attr('src','./images/logo-casper.e03ec84.png');
  },function(){ //header에 마우스 아웃시 로고, 내비게이션, i.fas에 서식 제거하기
    $('header').removeClass('h_on');
    $('header i.fas' ).removeClass('on');
    $('header .gnb a').removeClass('on');
    $('header h1 img').attr('src','./images/logo-casper-white.028f418.png');
  }); 


  //아래로 이동하기 버튼을 클릭시 top콘텐츠가 상단 940높이로 올라오게 하기
  $('#next_btn').click(function(){
    console.log('click');
    $('html, body').animate({scrollTop:$('#top3').offset().top},900,'easeOutQuint')
  });


    //1. 상단 내비게이션
    let mnu_n = $('header .gnb > li');
    mnu_n.click(function(){
      let n = $(this).index();
      // if(n=1){
      //   $('html, body').animate({scrollTop:$('section').eq(3).offset().top-70},900);
      //   n=0;
      // }else if(n=2){
      //   $('html, body').animate({scrollTop:$('section').eq(4).offset().top-70},900);
      // }else if(n=3){
      //   $('html, body').animate({scrollTop:$('section').eq(5).offset().top-70},900);
      // }else if(n=4){
      //   $('html, body').animate({scrollTop:$('section').eq(6).offset().top-70},900);
      // }else if(n=5){
      //   $('html, body').animate({scrollTop:$('section').eq(7).offset().top-70},900);
      // }
      // return false;

      $('html, body').animate({scrollTop:$('section').eq(n+2).offset().top},900);
      
      // return false;
    });

    //2. 사이드 내비게이션
    let aside_n = $('aside #m_nav > ul > li')
    aside_n.click(function(){
      let n = $(this).index();
      $('html, body').animate({scrollTop:$('section').eq(n+2).offset().top},900);

    });

});