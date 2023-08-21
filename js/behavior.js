// とりあえずfront-pageのレイアウトを作成させたい。
// JSでエラー表示が非常に鬱陶しいので一時的にこの処理をやっておく。
// WP。。。

if (document.querySelector('body.home')) {
  // クリックしたらメニューを広げる
  const checkYear = document.getElementById('check-year')
  checkYear.addEventListener('click', function() {
    this.classList.toggle('active')
  })
}


// front-pageページ > service ////////////////////////////////////

const links = document.querySelectorAll('#service li');
const dl = document.querySelectorAll('#service li > dl');
const dd = document.querySelectorAll('#service li > dl > dd');

links.forEach(elem => {
  elem.addEventListener('mouseenter', () => {
    elem.classList.add('active');
  });

  elem.addEventListener('mouseleave', () => {
    elem.classList.remove('active');
  });
});


// newsページ > swiper設定 //////////////////////////////////////////

const frontPageSwiper = new Swiper('.swiper.front-page', {
  // Optional parameters
  direction: 'horizontal',
  // loop: true,
  slidesPerView: 1,
  slidesPerView: 'auto',
  spaceBetween: 50,

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  }
})

const newsPageSwiper = new Swiper('.swiper.news-page', {
  // Optional parameters
  direction: 'horizontal',
  // loop: true,
  slidesPerView: 3,
  spaceBetween: 50,

  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  // And if we need scrollbar
  scrollbar: {
    el: '.swiper-scrollbar',
  },
})



// 全体 > Contact UsのParallax効果 ////////////////////////////////////////////

// // 1つだけの場合
// const thisImage = document.querySelector('.parallax-bg-img')
// thisImage.style.backgroundPosition = `50% ${ innerHeight / 2 }px`

// gsap.to('.parallax-bg-img', {
//   backgroundPosition: `50% ${ -innerHeight / 2 }px`,
//   ease: 'none',
//   scrollTrigger: {
//     tirgger: '.parallax-bg-img',
//     scrub: true,
//     // defaultの値なので省略する。
//     // start: "top bottom", // top of elem meets bottom of screen
//     // end: "bottom top" // Bottom of elem meets top of screen
//     markers: true
//   }
// })

// // 複数対応の場合 その1
// document.querySelectorAll('.parallax-frame').forEach((section) => {
//   const bg = section.querySelector('.parallax-bg-img')
//   bg.style.backgroundPosition = `50% 0`
//   gsap.to(bg, {
//     backgroundPosition: `50% ${ -innerHeight / 2 }px`,
//     ease: 'none',
//     scrollTrigger: {
//       trigger: section,
//       start: 'top bottom',
//       scrub: true,
//       // markers: true
//     }
//   })
// })

// 複数対応の場合 その2
let getRatio = (el) => {
  return window.innerHeight / (window.innerHeight + el.offsetHeight);
};

document.querySelectorAll('.parallax-frame').forEach(section => {
  const bg = section.querySelector('.parallax-bg-img');
  gsap.fromTo(bg, {
    backgroundPosition: `50% ${-window.innerHeight * getRatio(section)}px`
  }, {
    backgroundPosition: () => `50% ${ window.innerHeight * (1 - getRatio(section)) }px`,
    ease: 'none',
    scrollTrigger: {
      trigger: section,
      start: 'top bottom',
      end: 'bottom top',
      scrub: true,
      invalidateOnRefresh: true,
      // markers: true
    }
  })
})

// // origin: 複数でトップの画像がページの最初から始まる場合
// // getRatio()関数定義
// // `el`は、`getRatio(section)`関数の仮引数。
// let getRatio = (el) => {
//   // この例では、セクションの高さを`100vh`にしているのでスクリーンの高さと同じ。
//   // つまりこの式では、常に`0.5`を返す。
//   return window.innerHeight / (window.innerHeight + el.offsetHeight);
// };
// document.querySelectorAll('.parallax-frame').forEach((section, idx) => {
//   const bg = section.querySelector('.parallax-bg-img');
//   gsap.set(bg, {
//     backgroundPosition: '50% 0'
//   })
//   gsap.fromTo(bg, {
//     // `background-position`を最初は、`50% 0`の位置に設定。
//     // 以降の背景に関しては、
//     // 左右: センター、
//     // 縦: スクリーンの高さ × 比率【スクリーンの高さ ÷ (スクリーンの高さ + 背景写真の高さ)】
//     //      つまりスクリーンの半分くらいの位置で見え始める設定。
//     backgroundPosition: () => idx ? `50% ${ -window.innerHeight * getRatio(section) }px` : '50% 0'
//   }, {
//     // この位置まで動くように設定している。
//     backgroundPosition: () => `50% ${ window.innerHeight * (1 - getRatio(section)) }px`,
//     ease: 'none',
//     scrollTrigger: {
//       trigger: section,
//       start: () => idx ? 'top bottom' : 'top top',
//       end: 'bottom top',
//       scrub: true,
//       // `invalidateOnRefresh`属性をtrueとすると、ScrollTriggerに紐付けられたアニメーションは、
//       // `refresh()`が発生するたびに（通常はリサイズ時）`invalidate()`メソッドが呼び出されるようになります。
//       // `invalidate()`メソッドは、内部に記録されている開始値や終了値を全て消去します。
//       invalidateOnRefresh: true,
//       markers: true
//     }
//   })
// })


// front-pageページ > Join Our Teamセクション の acodion menu ////////////////////////////////////////////////

// メニューを開く関数
const slideDown = (elem) => {
  elem.style.height = 'auto' //いったんautoに
  let gethight = elem.offsetHeight //autoにした要素から高さを取得
  elem.style.height = gethight + 'px'
  elem.animate([ //高さ0から取得した高さまでのアニメーション
    { height: 0 },
    { height: gethight + 'px' }
  ], {
    duration: 300, //アニメーションの時間（ms）
  })
}

// メニューを閉じる関数
const slideUp = (elem) => {
  elem.style.height = 0
}

let activeIndex = null //開いているアコーディオンのindex

//アコーディオンコンテナ全てで実行
const accordions = document.querySelectorAll('.include-accordion')
accordions.forEach((accordion) => {
  //アコーディオンのトリガー全てで実行
  const accordionTriggers = accordion.querySelectorAll('.job-type')
  accordionTriggers.forEach((acoTrig, idx) => {
    acoTrig.addEventListener('click', (e) => {
      activeIndex = idx //クリックされたトリガーを把握
      // parentNode => .job-type < li 
      e.target.parentNode.classList.toggle('active') //トリガーの親要素（=ul>li)にクラスを付与／削除
      const content = acoTrig.nextElementSibling //トリガーの次の要素（=ul>ul）
      if(e.target.parentNode.classList.contains('active')){
        slideDown(content) //クラス名がactive（＝閉じていた）なら上記で定義した開く関数を実行
      }else{
        slideUp(content) //クラス名にactiveがない（＝開いていた）なら上記で定義した閉じる関数を実行
      }
    })
  })
})