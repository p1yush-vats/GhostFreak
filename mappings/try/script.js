// script.js
const introVideo = document.getElementById('intro-video');
const websiteContent = document.querySelector('.website-content');

introVideo.addEventListener('ended', () => {
    document.body.style.overflow = 'auto';
    websiteContent.style.display = 'block';
    introVideo.parentNode.style.display = 'none';
});