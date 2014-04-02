// Copyright 2013 Google Inc. All Rights Reserved.
// You may study, modify, and use this example for any purpose.
// Note that this example is provided "as is", WITHOUT WARRANTY
// of any kind either expressed or implied.


var PlayerController = function() {
  this.contentPlayer = document.getElementById('content');
  this.adContainer = document.getElementById('adcontainer');
  this.videoPlayerContainer = document.getElementById('videoplayer');

  this.width = 640;
  this.height = 360;

  this.adPlaying = false; //default false
};

PlayerController.prototype.setAdPlaying = function(adPlaying) {
  this.adPlaying = adPlaying;
};

PlayerController.prototype.preloadContent = function(contentLoadedAction) {
  // If this is the initial user action on iOS or Android device,
  // simulate playback to enable the video element for later program-triggered
  // playback.
  if (this.isMobilePlatform()) {
    this.contentPlayer.addEventListener(
        'loadedmetadata',
        contentLoadedAction,
        false);
    this.contentPlayer.load();
  } else {
    contentLoadedAction();
  }
};

PlayerController.prototype.play = function() {
  this.contentPlayer.play();
};

PlayerController.prototype.pause = function() {
  this.contentPlayer.pause();
};

PlayerController.prototype.isMobilePlatform = function() {
  return this.contentPlayer.paused &&
      (navigator.userAgent.match(/(iPod|iPhone|iPad)/) ||
       navigator.userAgent.toLowerCase().indexOf('android') > -1);
};

PlayerController.prototype.resize = function(
    position, top, left, width, height) {
  this.videoPlayerContainer.style.position = position;
  this.videoPlayerContainer.style.top = top + 'px';
  this.videoPlayerContainer.style.left = left + 'px';
  this.videoPlayerContainer.style.width = width + 'px';
  this.videoPlayerContainer.style.height = height + 'px';
  this.contentPlayer.style.width = width + 'px';
  this.contentPlayer.style.height = height + 'px';
};

PlayerController.prototype.getVideoPlayer = function() {
  return this.contentPlayer;
};

PlayerController.prototype.registerVideoEndedCallback = function(callback) {
  this.contentPlayer.addEventListener(
      'ended',
      callback,
      false);
};
