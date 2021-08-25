<footer class="footer">
        <div class="footer__line">
          &nbsp;
        </div>
          <img src="<?php echo get_theme_file_uri('img/logo-cefet-completa.png') ?>" alt="Logo cefet-mg" class="footer__logo">
        <div class="footer__creditos">
        <p class="Poppins-regular-14 m-b-16">
          <strong>FALE CONOSCO</strong><br/>
          Caso possua alguma informação sobre as imagens e os documentos apresentados ou queira contribuir com <br/>
          materiais e memórias para a construção deste projeto, entre em contato conosco através do e-mail: <strong>memoriacefetmg@gmail.com</strong>
          </p>
          <p class="footer__item">
            Realização Departamento de História do CEFET-MG </br>
            Desenvolvido por <a href="http://andre-victor.com">André Victor</a>
          </p>
        </div>
</footer>
</div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/ScrollTrigger.min.js"></script>
<script src="https://unpkg.com/gsap@3/dist/ScrollToPlugin.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.7/glider.js"></script>
<!-- <script src="https://unpkg.com/@barba/core"></script> -->

<script>
 /*  function pageTransition() {
    var tl = gsap.timeline();

    tl.to('ul.transition li', {
      duration: .5, 
      scaleY: 1, 
      transformOrigin: "bottom left", 
      stagger: .2
    });
    
    tl.to('ul.transition li', {
      duration: .5, 
      scaleY: 0,
      transformOrigin: "bottom left",
      stagger: .1,
      delay: .1

    });
  }

  function contentAnimation() {
  }

  function delay(n) {
    n = n || 2000;
    return new Promise(done => {
      setTimeout(() => {
        done();
      }, n)
    });
  }

  barba.init({
    sync: true,
    transitions: [{
      
      async leave(data) {
        const done = this.async();
        pageTransition();
        await delay(1500);
        done();
      },

      async enter(data) {
        contentAnimation();
      },

      async once(data) {
        contentAnimation();
      }

    }]
  }) */
</script>

  <?php wp_footer(); ?> 

</body>
</html>
