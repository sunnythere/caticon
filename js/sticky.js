// sticky header for mobile view

( function() {
  const header = document.getElementById('sticky-header')

  if (header) {
    const nav = document.getElementById('site-navigation')
    let navBottom = nav.scrollHeight
    window.addEventListener('scroll', (function(evt) {

      if ( evt.target.body.scrollTop > navBottom || evt.target.documentElement.scrollTop > 100 ) {
          header.style.position = 'fixed'
          header.style.top = '0px'
      }

    }))
  }
})()
