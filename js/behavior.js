// newsのswiper設定
const swiper = new Swiper('.swiper', {
  // Optional parameters
  direction: 'horizontal',
  // loop: true,
  slidesPerView: 3,

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

const checkYear = document.getElementById('check-year')
checkYear.addEventListener('click', function() {
  this.classList.toggle('active')
})

// Contact UsのParallax効果

// getRatio()関数定義
// `el`は、`getRatio(section)`関数の仮引数。
let getRatio = (el) => {
  // この例では、セクションの高さを`100vh`にしているのでスクリーンの高さと同じ。
  // つまりこの式では、常に`0.5`を返す。
  return window.innerHeight / (window.innerHeight + el.offsetHeight);
};

document.querySelectorAll('.contact-us').forEach((section, idx) => {
  const bg = section.querySelector('.parallax-bg-img');
  gsap.fromTo(bg, {
    // `background-position`を最初は、`50% 0`の位置に設定。
    // 以降の背景に関しては、
    // 左右: センター、
    // 縦: スクリーンの高さ × 比率【スクリーンの高さ ÷ (スクリーンの高さ + 背景写真の高さ)】
    //      つまりスクリーンの半分くらいの位置で見え始める設定。
    backgroundPosition: () => idx ? `50% ${ -window.innerHeight * getRatio(section) }px` : '50% 0'
  }, {
    // この位置まで動くように設定している。
    backgroundPosition: () => `50% ${ window.innerHeight * (1 - getRatio(section)) }px`,
    ease: 'none',
    scrollTrigger: {
      trigger: section,
      start: () => idx ? 'top bottom' : 'top top',
      end: 'bottom top',
      scrub: true,
      // `invalidateOnRefresh`属性をtrueとすると、ScrollTriggerに紐付けられたアニメーションは、
      // `refresh()`が発生するたびに（通常はリサイズ時）`invalidate()`メソッドが呼び出されるようになります。
      // `invalidate()`メソッドは、内部に記録されている開始値や終了値を全て消去します。
      invalidateOnRefresh: true,
      // markers: true
    }
  })
})
