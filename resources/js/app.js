// Raatrani Atelier Jaipur — Interactive Experience & Animation Engine

document.addEventListener('DOMContentLoaded', () => {
    initScrollReveal();
    initAmbientCursor();
    initAtelierCanvas();
    init3DTilt();
    initMarqueeTicker();
});

/**
 * 1. Scroll-Triggered Reveal Engine (IntersectionObserver)
 */
function initScrollReveal() {
    const revealElements = document.querySelectorAll('.reveal-on-scroll, .scale-on-scroll');
    if (!revealElements.length) return;

    if (!('IntersectionObserver' in window)) {
        revealElements.forEach(el => el.classList.add('is-revealed'));
        return;
    }

    const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-revealed');
                obs.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.12,
        rootMargin: '0px 0px -40px 0px'
    });

    revealElements.forEach(el => observer.observe(el));
}

/**
 * 2. Interactive Ambient Cursor Spotlight (Desktop only)
 */
function initAmbientCursor() {
    // Only run on desktop with fine pointer control
    if (window.matchMedia('(pointer: coarse)').matches) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    let glow = document.getElementById('ambient-glow-cursor');
    if (!glow) {
        glow = document.createElement('div');
        glow.id = 'ambient-glow-cursor';
        document.body.appendChild(glow);
    }

    let mouseX = -1000;
    let mouseY = -1000;
    let currentX = -1000;
    let currentY = -1000;
    let isVisible = false;

    window.addEventListener('mousemove', (e) => {
        mouseX = e.clientX;
        mouseY = e.clientY;
        if (!isVisible) {
            isVisible = true;
            glow.style.opacity = '1';
        }
    }, { passive: true });

    document.addEventListener('mouseleave', () => {
        isVisible = false;
        glow.style.opacity = '0';
    });

    // Animate with gentle damped lerp for liquid, luxurious movement
    function renderGlow() {
        if (isVisible) {
            currentX += (mouseX - currentX) * 0.085;
            currentY += (mouseY - currentY) * 0.085;
            glow.style.transform = `translate3d(${currentX}px, ${currentY}px, 0)`;
        }
        requestAnimationFrame(renderGlow);
    }
    requestAnimationFrame(renderGlow);

    // Subtle scale on hovering interactive elements
    const interactiveTargets = document.querySelectorAll('a, button, .group, .product-card');
    interactiveTargets.forEach(el => {
        el.addEventListener('mouseenter', () => {
            glow.style.width = '680px';
            glow.style.height = '680px';
            glow.style.marginLeft = '-340px';
            glow.style.marginTop = '-340px';
        });
        el.addEventListener('mouseleave', () => {
            glow.style.width = '550px';
            glow.style.height = '550px';
            glow.style.marginLeft = '-275px';
            glow.style.marginTop = '-275px';
        });
    });
}

/**
 * 3. Atelier Interactive Background Canvas (Jaipur Petals & Golden Teak Dust)
 */
function initAtelierCanvas() {
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    let canvas = document.getElementById('atelier-canvas');
    if (!canvas) {
        canvas = document.createElement('canvas');
        canvas.id = 'atelier-canvas';
        document.body.prepend(canvas);
    }

    const ctx = canvas.getContext('2d');
    if (!ctx) return;

    let width = canvas.width = window.innerWidth;
    let height = canvas.height = window.innerHeight;

    let resizeTimer;
    window.addEventListener('resize', () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            width = canvas.width = window.innerWidth;
            height = canvas.height = window.innerHeight;
        }, 200);
    }, { passive: true });

    // Particles: Flower Petals & Gold Dust
    const particleCount = window.innerWidth < 768 ? 12 : 24;
    const particles = [];

    const colors = [
        { r: 217, g: 125, b: 125, a: 0.45 }, // Soft Rose
        { r: 228, g: 155, b: 82,  a: 0.45 }, // Saffron Marigold
        { r: 212, g: 163, b: 115, a: 0.50 }, // Warm Sand/Teak
        { r: 163, g: 180, b: 153, a: 0.40 }, // Sage Olive
    ];

    for (let i = 0; i < particleCount; i++) {
        const isPetal = i % 2 === 0;
        particles.push({
            x: Math.random() * width,
            y: Math.random() * height,
            size: isPetal ? 5 + Math.random() * 5 : 2 + Math.random() * 2.5,
            vx: 0,
            vy: 0,
            speedY: 0.35 + Math.random() * 0.45,
            sway: Math.random() * Math.PI * 2,
            swaySpeed: 0.015 + Math.random() * 0.015,
            rotation: Math.random() * Math.PI * 2,
            rotSpeed: (Math.random() - 0.5) * 0.02,
            color: colors[Math.floor(Math.random() * colors.length)],
            isPetal: isPetal,
            alpha: 0.3 + Math.random() * 0.4
        });
    }

    // Mouse Interaction: Breeze stir
    let mouse = { x: -1000, y: -1000, active: false };
    window.addEventListener('mousemove', (e) => {
        mouse.x = e.clientX;
        mouse.y = e.clientY;
        mouse.active = true;
    }, { passive: true });

    let isTabActive = true;
    document.addEventListener('visibilitychange', () => {
        isTabActive = !document.hidden;
    });

    function draw() {
        if (!isTabActive) {
            requestAnimationFrame(draw);
            return;
        }

        ctx.clearRect(0, 0, width, height);

        for (let i = 0; i < particles.length; i++) {
            const p = particles[i];

            // Normal natural breeze physics
            p.sway += p.swaySpeed;
            p.y += p.speedY + p.vy;
            p.x += Math.sin(p.sway) * 0.5 + p.vx;
            p.rotation += p.rotSpeed;

            // Interactive Repel / Wind Gust from mouse
            if (mouse.active) {
                const dx = p.x - mouse.x;
                const dy = p.y - mouse.y;
                const dist = Math.hypot(dx, dy);
                if (dist < 140 && dist > 0) {
                    const force = (140 - dist) / 140;
                    p.vx += (dx / dist) * force * 0.8;
                    p.vy += (dy / dist) * force * 0.8;
                }
            }

            // Damping velocity
            p.vx *= 0.94;
            p.vy *= 0.94;

            // Wrap edges seamlessly
            if (p.y > height + 20) {
                p.y = -20;
                p.x = Math.random() * width;
            }
            if (p.x < -20) p.x = width + 20;
            if (p.x > width + 20) p.x = -20;

            // Render Particle
            ctx.save();
            ctx.translate(p.x, p.y);
            ctx.rotate(p.rotation);

            if (p.isPetal) {
                // Draw delicate curved organic petal
                ctx.beginPath();
                ctx.ellipse(0, 0, p.size * 1.5, p.size * 0.9, 0, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(${p.color.r}, ${p.color.g}, ${p.color.b}, ${p.alpha * 0.45})`;
                ctx.fill();
            } else {
                // Draw soft glowing gold dust speck
                ctx.beginPath();
                ctx.arc(0, 0, p.size, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(217, 163, 115, ${p.alpha * 0.6})`;
                ctx.shadowColor = 'rgba(217, 163, 115, 0.4)';
                ctx.shadowBlur = 6;
                ctx.fill();
            }

            ctx.restore();
        }

        requestAnimationFrame(draw);
    }
    requestAnimationFrame(draw);
}

/**
 * 4. Interactive 3D Parallax Tilt for Cards
 */
function init3DTilt() {
    if (window.matchMedia('(pointer: coarse)').matches) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const tiltCards = document.querySelectorAll('[data-tilt]');
    tiltCards.forEach(card => {
        card.classList.add('tilt-element');

        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = ((y - centerY) / centerY) * -6; // max 6 deg
            const rotateY = ((x - centerX) / centerX) * 6;  // max 6 deg

            card.style.transform = `perspective(1000px) rotateX(${rotateX.toFixed(2)}deg) rotateY(${rotateY.toFixed(2)}deg) scale3d(1.02, 1.02, 1.02)`;
        });

        card.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
        });
    });
}

/**
 * 5. Smooth Marquee Ticker
 */
function initMarqueeTicker() {
    const marquee = document.querySelector('.animate-marquee-smooth');
    if (!marquee) return;

    // Duplicate ticker children for seamless infinite scroll
    const items = marquee.innerHTML;
    marquee.innerHTML += items;
}
