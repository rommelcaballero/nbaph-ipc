// Copyright 2013 Google Inc. All Rights Reserved.
// You may study, modify, and use this example for any purpose.
// Note that this example is provided "as is", WITHOUT WARRANTY
// of any kind either expressed or implied.

var MainController = function(playerController, P_adTagUrl) {
  this.console = document.getElementById('console');
  this.playButton = document.getElementById('playpause');
  this.playButton.addEventListener(
      'click',
      this.bind(this, this.onClick),
      false);
  this.fullscreenButton = document.getElementById('fullscreen');
  this.fullscreenButton.addEventListener(
      'click',
      this.bind(this, this.onFullscreenClick),
      false);
	
  this.fullscreenWidth = null;
  this.fullscreenHeight = null;

  var fullScreenEvents = [
      'fullscreenchange',
      'mozfullscreenchange',
      'webkitfullscreenchange'];
  for (key in fullScreenEvents) {
    document.addEventListener(
        fullScreenEvents[key],
        this.bind(this, this.onFullscreenChange),
        false);
  }

  this.playing = false;
  this.adsActive = false;
  this.adsDone = false;
  this.fullscreen = false;

  this.playerController = playerController;
  this.adsController = new AdsController(this, this.playerController);
  //this.adTagUrl = 'http://pubads.g.doubleclick.net/gampad/ads?sz=400x300&iu=%2F6062%2Fiab_vast_samples&ciu_szs=300x250%2C728x90&gdfp_req=1&env=vp&output=xml_vast2&unviewed_position_start=1&url=[referrer_url]&correlator=[timestamp]&cust_params=iab_vast_samples%3Dlinear';
  this.adTagUrl = P_adTagUrl;
  this.playerController.registerVideoEndedCallback(
      this.bind(this, this.onContentEnded));
};

MainController.prototype.bind = function(thisObj, fn) {
  return function() {
    fn.apply(thisObj, arguments);
  };
};

MainController.prototype.onClick = function() {
  if (!this.adsDone) {

    // The user clicked/tapped - inform the ads controller that this code
    // is being run in a user action thread.
    this.adsController.initialUserAction();
    // At the same time, initialize the content player as well.
    // When content is loaded, we'll issue the ad request to prevent it
    // from interfering with the initialization.
    // See https://developers.google.com/interactive-media-ads/docs/sdks/html5/v3/ads#iosvideo
    // for more information.
    this.playerController.preloadContent(this.bind(this, this.loadAds));
    this.adsDone = true;
    return;
  }

  if (this.adsActive) {
    if (this.playing) {
      this.adsController.pause();
    } else {
      this.adsController.resume();
    }
  } else {
    if (this.playing) {
      this.playerController.pause();
    } else {
      this.playerController.play();
    }
  }

  this.playing = !this.playing;

  this.updateChrome();
};

MainController.prototype.onFullscreenClick = function() {
  if (this.fullscreen) {
    // The video is currently in fullscreen mode
    var cancelFullscreen = document.exitFullScreen ||
        document.webkitCancelFullScreen ||
        document.mozCancelFullScreen;
    if (cancelFullscreen) {
      cancelFullscreen.call(document);
    } else {
      this.onFullscreenChange();
    }
  } else {
    // Try to enter fullscreen mode in the browser
    var requestFullscreen = document.documentElement.requestFullScreen ||
        document.documentElement.webkitRequestFullScreen ||
        document.documentElement.mozRequestFullScreen;
    if (requestFullscreen) {
      this.fullscreenWidth = window.screen.width;
      this.fullscreenHeight = window.screen.height;
      requestFullscreen.call(document.documentElement);
    } else {
      this.fullscreenWidth = window.innerWidth;
      this.fullscreenHeight = window.innerHeight;
      this.onFullscreenChange();
    }
  }
  //requestFullscreen.call(document.documentElement);
};

MainController.prototype.updateChrome = function() {
  if (this.playing) {
    this.playButton.textContent = 'II';
  } else {
    // Unicode play symbol.
    this.playButton.textContent = String.fromCharCode(9654);
  }
};

MainController.prototype.log = function(message) {
  console.log(message);
  this.console.innerHTML = this.console.innerHTML + '<br/>' + message;
};

MainController.prototype.resumeAfterAd = function() {
  this.playerController.play();
  this.adsActive = false;
  this.updateChrome();
};

MainController.prototype.pauseForAd = function() {
  this.adsActive = true;
  this.playing = true;
  this.playerController.pause();
  this.updateChrome();
};

MainController.prototype.adClicked = function() {
  this.playing = false;
  this.updateChrome();
};

MainController.prototype.loadAds = function() {
  this.adsController.requestAds(this.adTagUrl);
};

MainController.prototype.onFullscreenChange = function() {
  if (this.fullscreen) {
    // The user just exited fullscreen
    // Resize the ad container
    this.adsController.resize(
        this.playerController.width,
        this.playerController.height);
    // Return the video to its original size and position
    this.playerController.resize(
        'relative',
        '',
        '',
        this.playerController.width,
        this.playerController.height);
    this.fullscreen = false;
  } else {
    // The fullscreen button was just clicked
    // Resize the ad container
    var width = this.fullscreenWidth;
    var height = this.fullscreenHeight;
    this.makeAdsFullscreen();
    // Make the video take up the entire screen
    this.playerController.resize('absolute', 0, 0, width, height);
    this.fullscreen = true;
  }
};

MainController.prototype.makeAdsFullscreen = function() {
  this.adsController.resize(
      this.fullscreenWidth,
      this.fullscreenHeight);
};

MainController.prototype.onContentEnded = function() {
  this.adsController.contentEnded();
};
