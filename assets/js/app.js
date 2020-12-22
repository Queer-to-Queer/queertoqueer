// DOM Elements

const darkButton = document.getElementById('dark');
const lightButton = document.getElementById('light');
const solarButton = document.getElementById('solar');
const body = document.body;


// Apply the cached theme on reload

const theme = localStorage.getItem('theme');

if (theme) {
  body.classList.add(theme);
  if(theme == 'dark'){
    darkButton.style.display='none'
  }else if(theme =='light'){
    lightButton.style.display='none'
  }
  /*isSolar && body.classList.add('solar');*/
}

// Button Event Handlers

darkButton.onclick = () => {
  body.classList.replace('light', 'dark');
  lightButton.style.display='block'
  darkButton.style.display='none'
  localStorage.setItem('theme', 'dark');
};

lightButton.onclick = () => {
  body.classList.replace('dark', 'light');
  darkButton.style.display='block'
  lightButton.style.display='none'
  localStorage.setItem('theme', 'light');
};

/*solarButton.onclick = () => {

  if (body.classList.contains('solar')) {
    
    body.classList.remove('solar');
    solarButton.style.cssText = `
      --bg-solar: var(--yellow);
    `

    solarButton.innerText = 'solarize';

    localStorage.removeItem('isSolar');

  } else {

    solarButton.style.cssText = `
      --bg-solar: white;
    `

    body.classList.add('solar');
    solarButton.innerText = 'normalize';

    localStorage.setItem('isSolar', true);
  }
};*/


const player = $('#nowPlayingBarContainer')
const showButton = $('#show_player #show')
const hideButton = $('#show_player #hide')

showButton.hide()

hideButton.click(function(){
    player.hide("slide")
    showButton.show()
    hideButton.hide()
    localStorage.setItem('display', 'none');
})

showButton.click(function(){
    player.show("slide")
    showButton.hide()
    hideButton.show()
    localStorage.setItem('display', 'block');
})



