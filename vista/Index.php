<?php include 'includes/header.php'; ?>
<link rel="stylesheet" href="estilo.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<div class="card">
    <h2>Bienvenido a Nuestra empresa</h2>
    <p>Donde cada día es una nueva oportunidad para alcanzar tus sueños. Recuerda, el camino hacia el éxito puede estar lleno de desafíos, pero cada obstáculo es una oportunidad para crecer y aprender.</p>
    <p><strong>Si lo puedes imaginar, lo puedes programar.</strong></p>
    <p>¡Únete a nosotros y haz realidad tus metas más ambiciosas!</p>
</div>

<div class="slider">
    <div class="slides">
        <div class="slide"><img src="/IMG/busy-diverse-professional-business-people-260nw-2346440433.webp" alt="Imagen 1"></div>
        <div class="slide"><img src="/IMG/grupo-personas-trabajando-plan-negocios-oficina_1303-15861.avif" alt="Imagen 2"></div>
        <div class="slide"><img src="/IMG/images.jpg" alt="Imagen 3"></div>
    </div>
</div>

<script>
    let currentIndex = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    function showSlide(index) {
        const newIndex = index % totalSlides;
        const offset = -newIndex * 100;
        document.querySelector('.slides').style.transform = `translateX(${offset}%)`;
        currentIndex = newIndex;
    }

    function nextSlide() {
        showSlide(currentIndex + 1);
    }

    setInterval(nextSlide, 3000);
</script>
<?php include 'includes/footer.php'; ?>
