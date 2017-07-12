// sticky header for mobile view

( function() {
  const header = document.getElementById('sticky-header')

  const nav = document.getElementById('site-navigation')
  let navBottom = nav.scrollHeight
  window.addEventListener('scroll', menuAppear)

  function menuAppear(evt) {
   if ( window.innerWidth <= 768 && (evt.target.body.scrollTop > navBottom || evt.target.documentElement.scrollTop === 0) ) {
      header.style.position = 'fixed'
      header.style.top = '0'
      header.style.display = 'block'
      window.addEventListener('scroll', menuDisappear)
    }
  }

  function menuDisappear(evt) {
    if ( window.innerWidth <= 768 && (evt.target.body.scrollTop < 90 || (!evt.target.body.scrollTop && evt.target.documentElement.scrollTop === 0 ))) {
        header.style.top = '-4em'
        // header.style.position = 'absolute'
    }
  }

})()


