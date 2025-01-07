class BootstrapVideoplayer {
    constructor(selector, settingsCustom) {
      const settingsDefault = {
        selectors: {
          video: ".video",
          playPauseButton: ".btn-video-playpause",
          playIcon: ".fa-play",
          pauseIcon: ".fa-pause",
          progress: ".progress",
          progressbar: ".progress-bar",
          fullscreenButton: ".btn-video-fullscreen",
          volumeRange: ".form-range-volume",
          volumeButton: ".btn-video-volume",
        },
      };
  
      const deepMerge = (target, ...sources) => {
        sources.forEach((source) => {
          for (let key in source) {
            if (
              Object.prototype.toString.call(source[key]) === "[object Object]"
            ) {
              if (!target[key]) target[key] = {};
              deepMerge(target[key], source[key]);
            } else {
              target[key] = source[key];
            }
          }
        });
        return target;
      };
  
      const settings = deepMerge({}, settingsDefault, settingsCustom);
      const parent = this;
      const player = document.getElementById(selector);
      const video = player.querySelector(settings.selectors.video);
      const progress = player.querySelector(settings.selectors.progress);
      const progressbar = player.querySelector(settings.selectors.progressbar);
      const playbutton = player.querySelector(settings.selectors.playPauseButton);
      const fullscreenbutton = player.querySelector(
        settings.selectors.fullscreenButton
      );
      const volumeinput = player.querySelector(settings.selectors.volumeRange);
  
      try {
        video.addEventListener("loadedmetadata", function () {
          // Configuración inicial de volumen
          volumeinput.value = video.volume * 100;
  
          // Cambiar el volumen con el control deslizante
          volumeinput.addEventListener("input", function (e) {
            video.volume = e.target.value / 100;
          });
  
          // Hacer video fullscreen
          fullscreenbutton.addEventListener("click", function () {
            parent.openFullscreen(video);
          });
  
          // Reproducir/Pausar video
          playbutton.addEventListener("click", function () {
            parent.playpause(video, this, progressbar);
          });
  
          video.addEventListener("click", function () {
            parent.playpause(video, playbutton, progressbar);
          });
  
          // Actualizar barra de progreso automáticamente
          video.addEventListener("timeupdate", function () {
            const percent = (video.currentTime / video.duration) * 100;
            progressbar.style.width = percent + "%";
          });
  
          // Permitir interacción con la barra de progreso
          progress.addEventListener("click", function (e) {
            const width = this.offsetWidth;
            const x = e.offsetX;
            const percent = (x / width) * 100;
            progressbar.style.width = percent + "%";
            video.currentTime = (percent / 100) * video.duration;
          });
        });
      } catch (error) {
        console.error(
          "Bootstrap Video Player: Video object cannot be found. Please check your plugin settings."
        );
        console.error(error);
      }
    }
  
    playpause(video, button, progressbar) {
      if (!video.paused) {
        video.pause();
        button.querySelector(".fa-play").classList.remove("d-none");
        button.querySelector(".fa-pause").classList.add("d-none");
      } else {
        video.play();
        button.querySelector(".fa-play").classList.add("d-none");
        button.querySelector(".fa-pause").classList.remove("d-none");
      }
    }
  
    openFullscreen(video) {
      if (video.requestFullscreen) {
        video.requestFullscreen();
      } else if (video.webkitRequestFullscreen) {
        video.webkitRequestFullscreen(); // Safari
      } else if (video.msRequestFullscreen) {
        video.msRequestFullscreen(); // IE11
      }
    }
  }
  