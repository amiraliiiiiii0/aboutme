<?php
// index.php
// Minimal PHP used for dynamic year and active menu example
$page = 'home';
$currentYear = date('Y');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Nightwild — Home</title>

    <!-- Google font (optional) -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=UnifrakturMaguntia&family=Montserrat:300,400,700&display=swap"
        rel="stylesheet"> -->

    <!-- Styles -->
    <link rel="stylesheet" href="assets/styles.css">
</head>

  
<style>

       @font-face {
            font-family: 'Shabnam';
            src: url('Fonts/RedRock/RedRock.woff2') format('woff2');
        }
/* assets/styles.css
   Goth / dark / red background / wild vibe
   Tip: tweak variables below to taste.
*/

:root{
  --bg-1: #0b0203;      /* near-black */
  --bg-2: #2a0506;      /* deep crimson overlay */
  --accent: #d1122a;    /* vivid red */
  --muted: #bfb0a8;
  --glass: rgba(255,255,255,0.04);
  --card: rgba(0,0,0,0.45);
    --max-width: var(--max-width);
  --width: 100%;
  --radius: 14px;
  --transition: 250ms cubic-bezier(.2,.9,.3,1);
  font-family: "Montserrat", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
}

/* Reset-ish */
*{box-sizing:border-box}
html,body{height:100%}
body{
  margin:0;
  background: radial-gradient(1200px 600px at 10% 20%, rgba(209,18,42,0.08), transparent 8%),
              radial-gradient(900px 500px at 90% 80%, rgba(209,18,42,0.06), transparent 6%),
              linear-gradient(180deg, var(--bg-1) 0%, var(--bg-2) 100%);
  color: #f6f3f2;
  -webkit-font-smoothing:antialiased;
  -moz-osx-font-smoothing:grayscale;
  min-height:100%;
  display:flex;
  align-items:flex-start;
  justify-content:center;
  padding:36px 18px;
}

/* smoky animated overlay */
.site-wrap{
  width:100%;
  max-width:var(--max-width);
  position:relative;
  border-radius:18px;
  overflow:hidden;
  box-shadow: 0 20px 60px rgba(0,0,0,0.7);
  background:
    linear-gradient(180deg, rgba(0,0,0,0.35), rgba(0,0,0,0.6));
}

/* subtle animated "smoke" using pseudo elements */
.site-wrap::before,
.site-wrap::after{
  content:"";
  position:absolute;
  inset:0;
  pointer-events:none;
  mix-blend-mode:screen;
  opacity:0.12;
  background-image:
    radial-gradient(600px 200px at 10% 20%, rgba(200,0,10,0.12), transparent 12%),
    radial-gradient(500px 200px at 85% 70%, rgba(150,8,8,0.08), transparent 10%);
  animation: drift 20s linear infinite;
}
@keyframes drift{
  0%{transform:translateY(0) scale(1)}
  50%{transform:translateY(-18px) scale(1.02)}
  100%{transform:translateY(0) scale(1)}
}

/* Header */
.site-header{
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:24px;
  padding:28px 36px;
  position:relative;
  z-index:3;
}
.brand{display:flex;flex-direction:column}
.logo{
  margin:0;
  font-family: 'UnifrakturMaguntia', serif;
  font-size:40px;
  line-height:1;
  letter-spacing:0.02em;
  color:var(--accent);
  text-shadow: 0 6px 20px rgba(0,0,0,0.7);
  transform-origin:left center;
}
img{
    width: 100px;
    border-radius: 10px;

}
.tag{
  font-size:12px;
  color:var(--muted);
  text-transform:uppercase;
  letter-spacing:0.16em;
  margin-top:6px;
}

/* Nav */
.main-nav ul{
  list-style:none;
  margin:0;
  padding:0;
  display:flex;
  gap:18px;
  align-items:center;
}
.main-nav a{
  color:var(--muted);
  text-decoration:none;
  padding:8px 12px;
  border-radius:8px;
  font-weight:600;
  transition:var(--transition);
  position:relative;
}
.main-nav a::after{
  content:'';
  position:absolute;
  left:10%;
  right:10%;
  bottom:2px;
  height:2px;
  background:transparent;
  border-radius:2px;
  transform:scaleX(0);
  transition: transform 220ms ease;
  transform-origin:left center;
}
.main-nav a:hover,
.main-nav .active a{
  color: #fff;
}
.main-nav a:hover::after,
.main-nav .active a::after{
  background:linear-gradient(90deg, var(--accent), rgba(255,130,130,0.6));
  transform:scaleX(1);
}

/* HERO */
.hero{
    
  padding:56px 36px;
  display:flex;
  gap:40px;
  align-items:center;
  justify-content:space-between;
  min-height:420px;
  position:relative;
  overflow:visible;
  z-index:2;
}
.music-box{
    width: 260px;
    background: rgba(20,0,0,0.75);
    border-radius: 18px;
    padding: 18px;
    border: 1px solid rgba(255,0,0,0.25);
    box-shadow: 0 0 22px rgba(255,0,0,0.28);
    backdrop-filter: blur(6px);
    display: flex;
    flex-direction: column;
    gap: 14px;
    text-align: center;
}

/* Cover */
.mb-cover img{
    width: 100%;
    height: 220px;
    object-fit: cover;
    border-radius: 14px;
    box-shadow: 0 0 18px rgba(255,20,40,0.45);
    transition: 0.5s ease-in;
}
.mb-cover img:hover{
 width: 230px;
 height: 40%;
}


/* Song text */
.mb-info{
    color: #e6dcdc;
    font-family: "Montserrat", sans-serif;
}
.mb-title{
    font-size: 17px;
    font-weight: 700;
    color: #ff2a43;
    text-shadow: 0 0 12px rgba(255,0,40,0.6);
}
.mb-artist{
    font-size: 13px;
    opacity: .7;
}

/* Progress bar */
.progress{
    width: 100%;
    appearance: none;
    height: 4px;
    background: #330005;
    border-radius: 4px;
}
.progress::-webkit-slider-thumb{
    appearance: none;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background: #ff1d3d;
    box-shadow: 0 0 12px rgba(255,0,20,0.8);
}

/* Controls */
.mb-controls{
    display: flex;
    justify-content: center;
    gap: 14px;
}
.mb-controls button{
    background: rgba(90,0,0,0.6);
    border: 1px solid rgba(255,0,0,0.3);
    color: #ff9ba9;
    padding: 8px 12px;
    border-radius: 8px;
    cursor: pointer;
    transition: .2s;
    font-weight: 700;
}
.mb-controls button:hover{
    background: rgba(255,20,40,0.4);
    color: #fff;
}

.hero-inner{
  max-width:720px;
}
.headline{
  margin:0 0 16px 0;
  font-size:42px;
  font-weight:700;
  text-transform:lowercase;
  letter-spacing:0.02em;
  line-height:1.05;
  color:#fff;
  position:relative;
  display:inline-block;
  transform-origin:left;
  text-shadow: 0 10px 40px rgba(0,0,0,0.7);
}
/* subtle glitch effect */
.headline::after{
  content:attr(data-text);
}
.headline{
  animation: gentlePop 1.1s cubic-bezier(.2,.9,.3,1) both;
}
@keyframes gentlePop{
  0%{transform:translateY(6px) scale(.99)}
  100%{transform:translateY(0) scale(1)}
}
.lead{
  color: #e6dcd9;
  opacity:0.9;
  margin:8px 0 20px 0;
  font-size:16px;
}

/* CTA buttons */
.btn{
  display:inline-block;
  padding:12px 18px;
  border-radius:10px;
  text-decoration:none;
  font-weight:700;
  letter-spacing:0.04em;
  transition:var(--transition);
  box-shadow: 0 8px 30px rgba(0,0,0,0.6);
}
.btn-primary{
  background:linear-gradient(90deg, var(--accent), #ff6b6b 90%);
  color:#100;
}
.btn-ghost{
  background:transparent;
  color:var(--muted);
  border:1px solid rgba(255,255,255,0.06);
  backdrop-filter: blur(4px);
}
.btn:hover{transform:translateY(-6px)}

/* wild accent shapes - jagged */
.accent-shapes{
  position:absolute;
  right:4%;
  top:10%;
  width:260px;
  height:260px;
  z-index:1;
  filter:drop-shadow(0 24px 40px rgba(0,0,0,0.6));
  pointer-events:none;
}
.accent-shapes::before,
.accent-shapes::after{
  content:"";
  position:absolute;
  inset:0;
  background:
    conic-gradient(from 220deg at 50% 50%, rgba(209,18,42,0.16), rgba(0,0,0,0) 45%),
    repeating-linear-gradient(-45deg, rgba(0,0,0,0.06) 0 6px, transparent 6px 12px);
  clip-path: polygon(20% 0, 100% 10%, 80% 40%, 95% 80%, 60% 100%, 0 70%, 5% 30%);
  transform:rotate(-6deg);
  mix-blend-mode:overlay;
  animation: spinSlow 18s linear infinite;
  opacity:0.9;
}
.accent-shapes::after{
  transform:translate(18px,18px) rotate(12deg) scale(.86);
  opacity:0.6;
  filter: blur(8px);
}
@keyframes spinSlow{ to { transform: rotate(360deg) } }

/* content grid */
.content-grid{
  display:grid;
  grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
  gap:20px;
  padding:32px 36px 48px 36px;
  z-index:2;
  position:relative;
}
.card{
  background: linear-gradient(180deg, rgba(255,255,255,0.02), rgba(0,0,0,0.18));
  border-radius:12px;
  padding:20px;
  min-height:120px;
  box-shadow: 0 8px 26px rgba(0,0,0,0.55);
  border: 1px solid rgba(255,255,255,0.02);
  text-align:center;
  margin:18px;
}
.card h3{margin:0 0 8px 0; color:var(--accent)}

h3{margin:0 0 8px 0; color:var(--accent);
}



/* Footer */
.site-footer{
  display:flex;
  justify-content:space-between;
  align-items:center;
  gap:10px;
  padding:18px 36px;
  color:var(--muted);
  font-size:13px;
  border-top:1px solid rgba(255,255,255,0.02);
}

/* small tweaks for no-js: slightly reduce motion */
.no-js .accent-shapes::before{animation:none}
.no-js .site-wrap::before{animation:none}

/* Responsive */
@media (max-width:860px){
  .hero{flex-direction:column; padding:36px}
  .accent-shapes{position:absolute; right:6%; top:6%; width:160px; height:160px}
  .logo{font-size:32px}
  .headline{font-size:30px}
}

/* final little flourish */
.heart{color:var(--accent); margin-left:6px}




</style>


<body class="no-js">
    <div class="site-wrap">
        <header class="site-header">
            <div class="brand">
                <h1 class="logo">
                </h1>
                <img src="./photo_2025-09-22_19-31-41.jpg" alt="" class="me">

                <span class="tag">Mine~</span>
            </div>

            <nav class="main-nav" aria-label="Main navigation">
                <ul>
                    <li class="<?php echo $page === 'home' ? 'active' : ''; ?>"><a href="#">Home</a></li>
                    <li class="<?php echo $page === 'gallery' ? 'active' : ''; ?>"><a href="gallery/index.php">Gallery</a></li>
                    <li class="<?php echo $page === 'contact' ? 'active' : ''; ?>"><a href="./Contact/index.php">Contact Me</a></li>
                </ul>
            </nav>
        </header>

        <main class="hero" role="main">

            <div class="hero-inner">
                <h3 class="headline">Im 
                    <h1>not</h1>
                    <h2>afraid</h2>
                    <h2>of</h4>
                    <h2>god</h2>
                    <h2>im</h2>
                    <h2>afraid</h2>
                    <h2>of</h2>
                    <h1 style="color:var(--accent);">MEN</h3>
                </h3>
                <br>
                <br>
                <br>
                <div class="cta-row">

                    <a class="btn btn-ghost" href="./gallery/index.php">Explore Gallery</a>
                </div>
            </div>
            <div class="accent-shapes" aria-hidden="true"></div>
        </main>
        <h3 class="card-h3" class="topp" style="text-align:center;font-family: Shabnam;">

My Fav Songs
        
        </h3>
        <section class="content-grid">

            <article class="card">

    <div class="music-box" data-src="assets/music/All-I-Need.mp3" data-title="All i Need" data-artist="Radiohead"
                    data-cover="assets/music/In Rainbows.jpg">
                    <div class="mb-cover"><img src="assets/music/In Rainbows.jpg" alt="cover"></div>
                    <div class="mb-info">
                        <div class="mb-title">All i Need</div>
                        <div class="mb-artist">RadioHead</div>
                    </div>
                    <div class="mb-controls">
                        <button class="playBtn">▶</button>
                    </div>
                    <input type="range" class="progress" value="0" step="1">
                    <audio class="player"></audio>
                </div>

            </article>

            <article class="card">
                <div class="music-box" data-src="assets/music/Agora_Hills.mp3" data-title="Agora Hills"
                    data-artist="Doja Cat" data-cover="assets/music/Can't Wait.jpg">
                    <div class="mb-cover"><img src="assets/music/Can't Wait.jpg" alt="cover"></div>
                    <div class="mb-info">
                        <div class="mb-title">Agora Hills</div>
                        <div class="mb-artist">Doja Cat</div>
                    </div>
                    <div class="mb-controls">
                        <button class="playBtn">▶</button>
                    </div>
                    <input type="range" class="progress" value="0" step="1">
                    <audio class="player"></audio>
                </div>
            </article>

            <article class="card">
                <div class="music-box" data-src="assets/music/Radiohead-Let-Down_bibis.ir.mp3" data-title="LetDown" data-artist="Radiohead"
                    data-cover="assets/music/let down - radiohead.jpg">
                    <div class="mb-cover"><img src="assets/music/let down - radiohead.jpg" alt="cover"></div>
                    <div class="mb-info">
                        <div class="mb-title">Let Down</div>
                        <div class="mb-artist">Radiohead</div>
                    </div>
                    <div class="mb-controls">
                        <button class="playBtn">▶</button>
                    </div>
                    <input type="range" class="progress" value="0" step="1">
                    <audio class="player"></audio>
                </div>

    </article>
    <!-- Optional tiny JS for "no-js" fallback and small interaction -->
    <script>
        document.body.classList.remove('no-js');
        // small nav animation hook (progressive enhancement)
        document.querySelectorAll('.main-nav a').forEach(a => {
            a.addEventListener('mouseover', () => a.classList.add('hovered'));
            a.addEventListener('mouseout', () => a.classList.remove('hovered'));
        });
    </script>
</body>
<script>
    document.querySelectorAll('.music-box').forEach(box => {
        const audio = box.querySelector('.player');
        const playBtn = box.querySelector('.playBtn');
        const progress = box.querySelector('.progress');

        // Load song from data attributes
        audio.src = box.dataset.src;

        // Play / Pause 
        playBtn.addEventListener('click', () => {

            document.querySelectorAll('.player').forEach(a => {
                if (a !== audio) a.pause();
            });

            if (audio.paused) {
                audio.play();
                playBtn.textContent = '⏸';
            } else {
                audio.pause();
                playBtn.textContent = '▶';
            }
        });

        // Update progress bar
        audio.addEventListener('timeupdate', () => {
            progress.max = audio.duration;
            progress.value = audio.currentTime;
        });

        // Seek song
        progress.addEventListener('input', () => {
            audio.currentTime = progress.value;
        });

        // Reset button when song ends
        audio.addEventListener('ended', () => {
            playBtn.textContent = '▶';
            progress.value = 0;
        });
    });

</script>

</html>


