<template>

<div class="container my-5 p-5 z-depth-1 unique-color-dark">
  <section class="text-center white-text">
    <h2 class="font-weight-bold mb-4 pb-2 text-white text-uppercase">Mon Espace</h2>

    <div class="row d-flex justify-content-around ">

   <a :href="showQuiz" class="col-12 col-md-5 mb-4 itemAccount">
      <div>
        <i class="fab fa-sass fa-3x text-white"></i>
            <h5 class="text-white font-weight-bold my-4 text-uppercase">Créer un Quiz</h5>
      </div>
   </a>

   <a href="#" class="col-12 col-md-5 mb-4 itemAccount">
      <div>
        <i class="fas fa-brain fa-3x text-white"></i>
            <h5 class="text-white font-weight-bold my-4 text-uppercase">Lancer un Quiz</h5>
      </div>
   </a>

      <a href="#" class="col-12 col-md-6 itemAccount">
      <div>
         <i class="fas fa-users fa-3x text-white"></i>
            <h5 class="text-white font-weight-bold my-4 text-uppercase">Modifier mon compte</h5>
      </div>
   </a>

    </div>
  </section>
</div>

</template>


<script>
export default {
  props: ['showQuiz'],
  data () {
    return {
    }
  },
    
}
</script>