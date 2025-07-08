// Dans votre fichier JS
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('liturgyCarousel');
    const inner = carousel.querySelector('.carousel-inner');
    const indicators = carousel.querySelector('.liturgy-indicators');
    
    // Charger les données
    fetch('/api/liturgie.php')
        .then(response => response.json())
        .then(data => {
            if (data.status !== 'success' || !data.lectures) {
                throw new Error(data.message || 'Aucune lecture disponible');
            }
            
            // Filtrer et ordonner les lectures
            const orderedLectures = orderLectures(data.lectures);
            
            // Générer le carrousel
            generateCarousel(orderedLectures);
            
            // Initialiser les animations
            initAnimations();
        })
        .catch(error => {
            console.error('Erreur:', error);
            // Fallback UI
            inner.innerHTML = `
                <div class="carousel-item active">
                    <div class="liturgy-error text-center p-5">
                        <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                        <h4>${error.message}</h4>
                    </div>
                </div>`;
        });
    
    function orderLectures(lectures) {
        // Ordonner : lecture_1 -> psaume -> lecture_2 -> évangile
        const order = ['première lecture', 'psaume', 'deuxième lecture', 'évangile'];
        return [...lectures].sort((a, b) => {
            return order.indexOf(a.type) - order.indexOf(b.type);
        });
    }
    
    function generateCarousel(lectures) {
        let indicatorsHtml = '';
        let itemsHtml = '';
        
        lectures.forEach((lecture, index) => {
            // Activer le premier élément
            const isActive = index === 0;
            
            // Indicateurs
            indicatorsHtml += `
                <button type="button" data-bs-target="#liturgyCarousel" 
                        data-bs-slide-to="${index}" 
                        class="${isActive ? 'active' : ''}" 
                        aria-label="Slide ${index + 1}">
                    <span class="lecture-type-badge">${getTypeIcon(lecture.type)}</span>
                </button>`;
            
            // Items
            itemsHtml += `
                <div class="carousel-item ${isActive ? 'active' : ''}">
                    <div class="liturgy-card text-center p-4 p-md-5">
                        <div class="lecture-type mb-3">
                            <span class="badge bg-primary rounded-pill px-3 py-2">
                                ${lecture.type.toUpperCase()}
                            </span>
                        </div>
                        <h3 class="lecture-title mb-4">${lecture.titre}</h3>
                        <div class="lecture-ref mb-4">
                            <i class="fas fa-quote-left me-2"></i>
                            <em>${lecture.reference}</em>
                            <i class="fas fa-quote-right ms-2"></i>
                        </div>
                    </div>
                </div>`;
        });
        
        indicators.innerHTML = indicatorsHtml;
        inner.innerHTML = itemsHtml;
    }
    
    function getTypeIcon(type) {
        const icons = {
            'lecture': '<i class="fas fa-book"></i>',
            'psaume': '<i class="fas fa-music"></i>',
            'évangile': '<i class="fas fa-cross"></i>'
        };
        return icons[type.toLowerCase()] || '<i class="fas fa-scroll"></i>';
    }
    
    function initAnimations() {
        // Animation GSAP pour les entrées
        gsap.from(".carousel-item.active .lecture-type", {
            duration: 0.7,
            y: -50,
            opacity: 0,
            ease: "back.out(1.7)"
        });
        
        gsap.from(".carousel-item.active .lecture-title", {
            duration: 0.7,
            y: 30,
            opacity: 0,
            delay: 0.3,
            ease: "power3.out"
        });
        
        gsap.from(".carousel-item.active .lecture-ref", {
            duration: 0.7,
            y: 30,
            opacity: 0,
            delay: 0.5,
            ease: "power3.out"
        });
        
        // Écouter les événements du carrousel
        carousel.addEventListener('slide.bs.carousel', function(e) {
            const nextItem = e.relatedTarget;
            
            // Réinitialiser avant animation
            gsap.set([nextItem.querySelector('.lecture-type'), 
                     nextItem.querySelector('.lecture-title'),
                     nextItem.querySelector('.lecture-ref')], 
                     { y: 30, opacity: 0 });
            
            // Animer le nouvel élément
            gsap.to(nextItem.querySelector('.lecture-type'), {
                duration: 0.7,
                y: 0,
                opacity: 1,
                ease: "back.out(1.7)"
            });
            
            gsap.to(nextItem.querySelector('.lecture-title'), {
                duration: 0.7,
                y: 0,
                opacity: 1,
                delay: 0.2,
                ease: "power3.out"
            });
            
            gsap.to(nextItem.querySelector('.lecture-ref'), {
                duration: 0.7,
                y: 0,
                opacity: 1,
                delay: 0.4,
                ease: "power3.out"
            });
        });
    }
});