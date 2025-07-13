// Floating psychic particles effect
const particlesContainer = document.querySelector('.particles');
const colors = ['#ffd700', '#fffde7', '#bfa600', '#e0cfff'];
const numParticles = 24;
for (let i = 0; i < numParticles; i++) {
    const p = document.createElement('div');
    p.className = 'particle';
    const size = Math.random() * 18 + 8;
    p.style.width = `${size}px`;
    p.style.height = `${size}px`;
    p.style.left = `${Math.random() * 100}vw`;
    p.style.top = `${Math.random() * 100}vh`;
    p.style.background = `radial-gradient(circle, ${colors[Math.floor(Math.random()*colors.length)]} 0%, #fffde7 60%, transparent 100%)`;
    p.style.animationDelay = `${Math.random() * 8}s`;
    particlesContainer.appendChild(p);
}
