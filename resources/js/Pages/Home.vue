<template>


<header style="background-image: url('https://mdbootstrap.com/img/Photos/Others/gradient2.png'); background-repeat: no-repeat; background-size: cover; background-position: center center; height:100vh;">

  <div class="view jarallax" data-jarallax='{"speed": 0.2}'>
    <div class="mask rgba-purple-slight d-flex justify-content-center align-items-center">
      <div class="container">
        <div class="row wow fadeIn">
          <div class="col-md-12 text-center">
            <h1 class="display-4 font-weight-bold mb-0 pt-md-5 pt-5 wow fadeInUp">Bienvenue sur SuperQuiz</h1>
            <h5 class="pt-md-5 pt-sm-2 pt-5 pb-md-5 pb-sm-3 pb-5 wow fadeInUp" data-wow-delay="0.2s">Participer à des quiz et vous pouvez même en créer, il faut juste <a :href="url">créer un compte</a> et c'est gratuit.</h5>
            <div class="wow fadeInUp" data-wow-delay="0.4s">
              <a :href="quiz" class="btn btn-purple btn-lg btn-rounded my-5">Jouer à un Quiz</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

</template>


<script>
export default {
  props: ['url', 'quiz'],
    
}
</script>